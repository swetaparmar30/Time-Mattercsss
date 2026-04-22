<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GetInTouch;
use Illuminate\Support\Str;
use Carbon\Carbon;
class InquiryController extends Controller
{
    public function index()
    {
        return view('inquiry.contact');
    }

    public function list(Request $request)
    {

        $query = GetInTouch::query()->where('deleted_at', null)->latest();

        if ($request->has('from_date') && $request->has('to_date') && !empty($request->from_date) && !empty($request->to_date)) {
            $from_date = Carbon::createFromFormat('d-M-yy', $request->from_date)->startOfDay();
            $to_date = Carbon::createFromFormat('d-M-yy', $request->to_date)->endOfDay();
            $query->whereBetween('created_at', [$from_date, $to_date]);
        }
        $totalRecords = $query->count();

        if ($request->has('search') && !empty($request->input('search')['value'])) {
            $searchValue = $request->input('search')['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->where('name', 'LIKE', "%{$searchValue}%")
                    ->orWhere('phone', 'LIKE', "%{$searchValue}%")
                    ->orWhere('company', 'LIKE', "%{$searchValue}%")
                    ->orWhere('email', 'LIKE', "%{$searchValue}%")
                    ->orWhere('message', 'LIKE', "%{$searchValue}%");
            });
        }

        $filteredRecords = $query->count();
        $filteredRecords = $query->count();

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $draw = $request->input('draw', 1);

        $inquiry_list = $query->offset($start)->limit($length)->latest()->get();
        $data = $inquiry_list->map(function ($item, $key) use ($start) {
            $formattedDate = Carbon::parse($item->created_at)->format('Y-m-d');
            $action = '<a data-href="' . route('inquiry.delete', $item['id']) . '" data-title="Delete Inquiry" class="label theme-bg text-white f-12 product_delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';

            if (auth()->user()->role === 'dealer' || auth()->user()->role === 'marketing') {
                $action = '';
            }

            return [
                'ser_id' => $start + $key + 1,
                'name' => $item->name,
                'phone' => $item->phone,
                'zipcode' => $item->zipcode,
                'email' => $item->email,
                'created_at' => $formattedDate,
                'message' => $item->message,
                'action' => $action,
            ];
        });

        return response()->json([
            'draw' => intval($draw),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data
        ]);
    }
    public function delete($id)
    {
        if ($id != "") {
            $record = GetInTouch::find($id);
            $record->delete();
            return redirect()->route('inquiry.index')
                ->withSuccess('Record Delete Successfully.');
        }
    }
    public function export_excel(Request $request)
    {
        $data_ar = [];

        $contact = GetInTouch::select('name', 'phone', 'company', 'url', 'email', 'message', 'created_at')->where('deleted_at', null);

        if ($request->has('from_date') && $request->has('to_date') && !empty($request->from_date) && !empty($request->to_date)) {
            $from_date = date('Y-m-d 00:00:00', strtotime($request->input('from_date')));
            $to_date = date('Y-m-d 23:59:59', strtotime($request->input('to_date')));
            $contact->whereBetween('created_at', [$from_date, $to_date]);
        }
        $contactData = $contact->latest()->get();

        if (isset($contactData) && $contactData != '' && count($contactData) > 0) {

            foreach ($contactData as $key => $val) {

                $data_ar[$key]['Sr No'] = $key + 1;
                $data_ar[$key]['Name'] = isset($val->name) && $val->name != '' ? $val->name : '-';
                $data_ar[$key]['Phone'] = isset($val->phone) && $val->phone != '' ? $val->phone : '-';
                $data_ar[$key]['Company'] = isset($val->company) && $val->company != '' ? $val->company : '-';
                $data_ar[$key]['URL'] = isset($val->url) && $val->url != '' ? $val->url : '-';
                $data_ar[$key]['Email'] = isset($val->email) && $val->email != '' ? $val->email : '-';
                $data_ar[$key]['Message'] = isset($val->message) && $val->message != '' ? $val->message : '-';
                $data_ar[$key]['Date'] = isset($val->created_at) && $val->created_at != ''
                    ? $val->created_at->format('d-m-Y')
                    : '-';

            }
        } else {
            $data_ar = 'blank';
        }
        echo json_encode($data_ar);
        die;
    }


}
