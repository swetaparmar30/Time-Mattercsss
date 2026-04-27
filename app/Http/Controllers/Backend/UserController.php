<?php

namespace App\Http\Controllers\Backend;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Category;
use App\Models\User;
use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Mail\UserApprovedMail;
use App\Mail\UserRejectedMail;
use App\Mail\UserPendingApprovalMail;
use App\Mail\AdminNewUserMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index() {
        // $user = User::where('role','!=','admin')->get();
        return view('user.add');
    }
    public function generate(Request $request)
    {
        $password = Str::random(12);
        return response()->json(['password' => $password]);
    }

    public function save(Request $request) {
        $user_id = $request->user_id;
        $auth_user = null;
        if($user_id !== null || $user_id !== ''){
            $auth_user=User::find($user_id);
        }
        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['required','email',Rule::unique('users')->ignore($auth_user ? $auth_user->id : null)],
            'phone' => 'nullable|max:255',
            'website' => 'nullable|url|max:255',
            'role' => 'required|string|max:255',
            'status' => 'nullable|in:0,1,2,3',
        ];

        if ($user_id === null && $user_id === '') {
            $rules['password'] = 'required|min:6';
        }else{
            $rules['password'] = 'nullable';
        }
        $validatedData = $request->validate($rules);
        
        if (!$request->has('status')) {
            $validatedData['status'] = $user_id ? ($auth_user->status ?? 1) : 1;
        }

        if ($request->has('password') && $request->input('password') !== null) {
            $validatedData['password'] = Hash::make($request->input('password'));
        }
        if ($user_id === null || $user_id === '') {
            $user = User::create($validatedData);
            if($request->notify === "on"){
                Mail::to($user->email)->send(new NotifyMail($user));
            }
            return redirect()->intended('/admin/users')
                            ->withSuccess('User Added Successfully');
        }else{
            if ($request->input('password') === null) {
                unset($validatedData['password']);
            }
            $user = User::where('id', $user_id)->update($validatedData);
            return redirect()->intended('/admin/users')
                            ->withSuccess('User Edited Successfully');
        }
    }
    public function delete($id) {
        if ($id !== "" && $id !== null) {
           User::where('id', $id)->delete();
           return redirect()->intended('/admin/users')
           ->withSuccess('User Deleted');
        }
    }

    public function edit(Request $request) {
        $id = $request->id;
        if ($id) {
            $data = User::where('id', $id)->first();
            return json_encode($data);
        }
    }

    public function list() {
        $user = User::where('role','!=','admin')->get();
    
        $counter = 1;
        $user->transform(function ($item) use (&$counter) {
            $item['ser_id'] = $counter++;
            if ($item['status'] == 0) {
                // Pending - Show Approve and Decline buttons
                $item['status'] = '<div class="text-center">';
                $item['status'] .= '<a href="javascript:void(0)" class="label theme-bg2 text-white f-12 table-btn table-btn1 approve-user" data-id="' . $item['id'] . '" title="Approve"><i class="fa fa-check"></i></a>';
                $item['status'] .= ' <a href="javascript:void(0)" class="label theme-bg text-white f-12 table-btn table-btn1 decline-user" data-id="' . $item['id'] . '" title="Decline"><i class="fa fa-times" aria-hidden="true"></i></a>';
                $item['status'] .= '</div>';
            } elseif ($item['status'] == 1 || $item['status'] == 3) {
                // Approved: 1 = Active, 3 = Inactive
                $item['status'] = '<div class="text-center"><input type="checkbox" data-id="' . $item['id'] . '" class="is_status is_featured_class" ' . ($item['status'] == 1 ? 'checked' : '') . '></div>';
            } elseif ($item['status'] == 2) {
                // Rejected
                $item['status'] = '<div class="text-center"><span style="color: #ff5252; font-weight: 600;">Rejected</span></div>';
            }
            $item['action'] = '<a class="label theme-bg2 text-white f-12 table-btn table-btn1 edit" data-id="' . $item['id'] . '"><i class="fa fa-edit"></i></a>';
            $item['action'] .= '<a data-href="' . route('users.delete',$item['id']) . '" data-title="testrete" data-original-title="Delete user" class="label theme-bg text-white f-12 table-btn table-btn1 delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            return $item;
        });
    
        return response()->json(['data' => $user]);
    }


    public function change_status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $record = User::find($id);
        if ($record) {
            $oldStatus = $record->status;
            $record->status = $status;
            $record->save();

            // Only send approval email if transitioning from Pending (0) or Rejected (2) to Active (1)
            if ($status == 1 && ($oldStatus == 0 || $oldStatus == 2)) {
                try {
                    Mail::to($record->email)->send(new UserApprovedMail($record));
                } catch (\Exception $e) {
                    \Log::error("User approval email failed: " . $e->getMessage());
                }
            }

            // Only send rejection email if transitioning to Rejected (2)
            if ($status == 2 && $oldStatus != 2) {
                try {
                    Mail::to($record->email)->send(new UserRejectedMail($record));
                } catch (\Exception $e) {
                    \Log::error("User rejection email failed: " . $e->getMessage());
                }
            }

            if ($status == 1) {
                $message = ($oldStatus == 0 || $oldStatus == 2) ? 'User approved successfully.' : 'User activated successfully.';
            } elseif ($status == 2) {
                $message = 'User rejected successfully.';
            } elseif ($status == 3) {
                $message = 'User deactivated successfully.';
            } else {
                $message = 'User marked as pending.';
            }
            return response()->json(['status' => 1, 'message' => $message ]);
        }
        return response()->json(['status' => 0, 'message' => 'User not found.']);
    }

}
