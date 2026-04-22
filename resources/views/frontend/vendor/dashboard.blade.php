@extends('layouts.app')

@section('title', 'Vendor Portal - TimeMatters')

@section('content')
<div class="min-vh-100 bg-light">

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm py-3">
        <div class="container-fluid px-4">
            <!-- Logo -->
            <div class="d-flex align-items-center">
                <div style="background:#1e40af; color:white; width:38px; height:38px; border-radius:6px; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:20px;">
                    TM
                </div>
                <div class="ms-3">
                    <strong class="fs-5">TimeMatters</strong>
                </div>
            </div>

            <div class="d-flex align-items-center gap-4">
                <div class="input-group" style="width: 320px;">
                    <input type="text" class="form-control" placeholder="Search..." style="border-radius: 8px;">
                </div>
                
                <div class="d-flex align-items-center gap-3">
                    <div class="text-end">
                        <strong class="d-block">{{ auth()->user()->name ?? 'John Doe' }}</strong>
                        <small class="text-muted">Vendor</small>
                    </div>
                    <div class="rounded-circle overflow-hidden border" style="width:42px; height:42px;">
                        <img src="https://via.placeholder.com/42" alt="Profile" style="width:100%; height:100%; object-fit:cover;">
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-lg-2 bg-white border-end min-vh-100 p-3" style="position: sticky; top: 0; height: calc(100vh - 76px);">
                <ul class="nav flex-column">
                    <li class="nav-item mb-1">
                        <a href="#" class="nav-link active d-flex align-items-center gap-3 bg-primary text-white rounded-3 py-3 px-3">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="#" class="nav-link d-flex align-items-center gap-3 text-dark py-3 px-3">
                            <i class="fas fa-clipboard-list"></i>
                            <span>Onboarding</span>
                        </a>
                    </li>
            
                    <li class="nav-item mt-5">
                        <a href="{{ route('logout') }}" class="nav-link text-danger d-flex align-items-center gap-3 py-3 px-3"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10 p-4">
                <div class="mb-4">
                    <h4 class="fw-semibold">Welcome Back, <span class="text-primary">{{ auth()->user()->first_name ?? 'John Doe' }}</span></h4>
                    <p class="text-muted">Access onboarding, policies, and resources</p>
                </div>

                <div class="row g-4">

                    <!-- Onboarding Card -->
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-start">
                                    <div class="bg-primary text-white rounded-circle p-3 me-4">
                                        <i class="fas fa-clipboard-list fa-2x"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-2">Onboarding</h5>
                                        <p class="text-muted mb-3">Welcome memo, banking forms, Beeline & Bullhorn setup instructions.</p>
                                        <a href="#" class="text-primary fw-medium text-decoration-none">
                                            View More <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Forms & Resources Card -->

                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <small>© {{ date('Y') }} TimeMatters Inc.</small>
    </footer>

    <form id="logout-form" action="{{ route('frontend.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
@endsection