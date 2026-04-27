@extends('user-layout.layout.app')

@section('main_content')
<div class="profile-page-wrapper" style="background-color: #f8fafc; width: 100%; padding: 40px 30px;">
    <div class="profile-content-area" style="max-width: 1100px; margin: 0 auto;">
            
            <!-- @if(session('success'))
                <script>
                    setTimeout(function() {
                        window.location.href = "{{ route('frontend.independent-contractor.dashboard') }}";
                    }, 3000);
                </script>
            @endif -->

            <form action="{{ route('frontend.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Profile Main Card -->
                <div class="profile-card">
                    <div class="profile-card-body">
                        <div style="flex-grow: 1;">
                            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 40px;">
                                <div style="color: #284884;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                </div>
                                <h2 class="profile-title">Profile</h2>
                            </div>

                            <div class="profile-form-grid">
                                <div class="form-group">
                                    <label style="display: block; font-size: 14px; font-weight: 600; color: #64748b; margin-bottom: 10px;">First name</label>
                                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" style="width: 100%; padding: 14px 18px; border: 1px solid #e2e8f0; border-radius: 12px; font-size: 16px; color: #1e293b; background: #f8fafc; outline: none; transition: all 0.2s;">
                                    @error('first_name') <small style="color: #ef4444; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</small> @enderror
                                </div>
                                 <div class="form-group">
                                    <label style="display: block; font-size: 14px; font-weight: 600; color: #64748b; margin-bottom: 10px;">Last name</label>
                                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" style="width: 100%; padding: 14px 18px; border: 1px solid #e2e8f0; border-radius: 12px; font-size: 16px; color: #1e293b; background: #f8fafc; outline: none;">
                                    @error('last_name') <small style="color: #ef4444; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</small> @enderror
                                </div>
                            
                                <div class="form-group">
                                    <label style="display: block; font-size: 14px; font-weight: 600; color: #64748b; margin-bottom: 10px;">Phone number</label>
                                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" style="width: 100%; padding: 14px 18px; border: 1px solid #e2e8f0; border-radius: 12px; font-size: 16px; color: #1e293b; background: #f8fafc; outline: none;" placeholder="+1 (555) 000-0000">
                                    @error('phone') <small style="color: #ef4444; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</small> @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label style="display: block; font-size: 14px; font-weight: 600; color: #64748b; margin-bottom: 10px;">Email address</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}" readonly style="width: 100%; padding: 14px 18px; border: 1px solid #e2e8f0; border-radius: 12px; font-size: 16px; color: #1e293b; background: #f8fafc; outline: none;">
                                    @error('email') <small style="color: #ef4444; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</small> @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label style="display: block; font-size: 14px; font-weight: 600; color: #64748b; margin-bottom: 10px;">Password</label>
                                    <button type="button" id="togglePasswordBtn" style="width: 100%; padding: 14px 18px; background: #284884; color: white; border: none; border-radius: 12px; font-weight: 700; cursor: pointer; transition: background 0.3s;">Change password</button>
                                </div>
                            </div>
                        </div>

                        <!-- Image Section -->
                        <div class="profile-image-section">
                            <div style="position: relative;">
                                @if($user->image)
                                    <img src="{{ asset('uploads/profile/' . $user->image) }}" id="preview-img" alt="Profile" style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1);">
                                @else
                                    <div id="preview-placeholder" style="width: 200px; height: 200px; border-radius: 50%; background: #e2e8f0; display: flex; align-items: center; justify-content: center; color: #94a3b8;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    </div>
                                    <img src="" id="preview-img" style="display: none; width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
                                @endif
                                <label for="image" style="position: absolute; bottom: 10px; right: 10px; background: #284884; color: white; width: 44px; height: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; border: 4px solid white; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </label>
                                <input type="file" name="image" id="image" style="opacity:0; position:absolute; width:0; height:0;" onchange="previewImage(this)">
                            </div>
                        </div>
                    </div>

                    <!-- Hidden Password Section -->
                    <div id="passwordFieldsSection" style="display: none; margin-top: 40px; padding-top: 30px; border-top: 1px solid #f1f5f9; max-width: 800px;">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                            <div class="form-group">
                                <label style="display: block; font-size: 14px; font-weight: 600; color: #64748b; margin-bottom: 10px;">New password</label>
                                <div style="position: relative;">
                                    <input type="password" name="password" id="password" style="width: 100%; padding: 14px 18px; padding-right: 50px; border: 1px solid #e2e8f0; border-radius: 12px; font-size: 16px; color: #1e293b; background: #f8fafc; outline: none;">
                                    <button type="button" class="toggle-password" data-target="password" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #64748b; cursor: pointer; padding: 5px; display: flex; align-items: center;">
                                        <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        <svg class="eye-off-icon" style="display: none;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="display: block; font-size: 14px; font-weight: 600; color: #64748b; margin-bottom: 10px;">Confirm new password</label>
                                <div style="position: relative;">
                                    <input type="password" name="password_confirmation" id="password_confirmation" style="width: 100%; padding: 14px 18px; padding-right: 50px; border: 1px solid #e2e8f0; border-radius: 12px; font-size: 16px; color: #1e293b; background: #f8fafc; outline: none;">
                                    <button type="button" class="toggle-password" data-target="password_confirmation" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #64748b; cursor: pointer; padding: 5px; display: flex; align-items: center;">
                                        <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        <svg class="eye-off-icon" style="display: none;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="display: flex; justify-content: flex-end; margin-top: 40px;">
                        <button type="submit" style="background: #284884; color: white; padding: 12px 50px; border-radius: 14px; font-weight: 700; font-size: 16px; border: none; cursor: pointer; transition: all 0.3s; box-shadow: 0 4px 14px 0 rgba(40, 72, 132, 0.39);">Save</button>
                    </div>
                </div>
            </form>
        </div>
</div>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('preview-img');
                const placeholder = document.getElementById('preview-placeholder');
                img.src = e.target.result;
                img.style.display = 'block';
                if(placeholder) placeholder.style.display = 'none';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.getElementById('togglePasswordBtn').addEventListener('click', function() {
        const section = document.getElementById('passwordFieldsSection');
        if (section.style.display === 'none') {
            section.style.display = 'block';
            this.textContent = 'Cancel change';
            this.style.background = '#64748b';
        } else {
            section.style.display = 'none';
            this.textContent = 'Change password';
            this.style.background = '#284884';
            section.querySelectorAll('input').forEach(i => {
                i.value = '';
                i.type = 'password';
            });
            document.querySelectorAll('.toggle-password').forEach(btn => {
                btn.querySelector('.eye-icon').style.display = 'block';
                btn.querySelector('.eye-off-icon').style.display = 'none';
            });
        }
    });

    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const input = document.getElementById(targetId);
            const eyeIcon = this.querySelector('.eye-icon');
            const eyeOffIcon = this.querySelector('.eye-off-icon');

            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.style.display = 'none';
                eyeOffIcon.style.display = 'block';
            } else {
                input.type = 'password';
                eyeIcon.style.display = 'block';
                eyeOffIcon.style.display = 'none';
            }
        });
    });
</script>

@endsection