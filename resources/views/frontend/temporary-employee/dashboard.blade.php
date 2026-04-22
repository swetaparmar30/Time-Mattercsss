@extends('layouts.app')

@section('title', 'Temporary Employee Portal - TimeMatters')

@section('content')
<div class="min-vh-100 bg-light">

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm py-3">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center">
                <div style="background:#1e40af; color:white; width:38px; height:38px; border-radius:6px; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:20px;">
                    TM
                </div>
                <div class="ms-3">
                    <strong class="fs-5">TimeMatters</strong>
                </div>
            </div>

            <div class="ms-auto d-flex align-items-center gap-4">
                <input type="text" class="form-control" placeholder="Search..." style="width: 320px; border-radius:8px;">

                <div class="d-flex align-items-center gap-3">
                    <div class="text-end">
                        <strong>{{ auth()->user()->name ?? 'John Doe' }}</strong><br>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="rounded-circle overflow-hidden border" style="width:42px;height:42px;">
                        <img src="https://via.placeholder.com/42" alt="User" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-lg-2 bg-white border-end min-vh-100 p-3" style="height: calc(100vh - 76px); overflow-y:auto;">
                <ul class="nav flex-column">
                    <li class="nav-item mb-1">
                        <a href="{{ route('frontend.temporary-employee.dashboard') }}" class="nav-link active d-flex align-items-center gap-3 bg-primary text-white rounded-3 py-3 px-3">
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
                    <li class="nav-item mb-1">
                        <a href="#" class="nav-link d-flex align-items-center gap-3 text-dark py-3 px-3">
                            <i class="fas fa-folder-open"></i>
                            <span>Forms & Resources</span>
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="#" class="nav-link d-flex align-items-center gap-3 text-dark py-3 px-3">
                            <i class="fas fa-shield-alt"></i>
                            <span>Policies</span>
                        </a>
                    </li>
                    <li class="nav-item mt-5">
                        <a href="{{ route('frontend.logout') }}" class="nav-link text-danger d-flex align-items-center gap-3 py-3 px-3"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10 p-4">
                <h4 class="fw-semibold mb-1">Welcome Back, <span class="text-primary">{{ auth()->user()->first_name ?? 'John Doe' }}</span></h4>
                <p class="text-muted">Access onboarding, policies, and resources</p>

                <div class="row g-4 mt-4">
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary text-white rounded-circle p-3 me-3">
                                        <i class="fas fa-clipboard-list fa-2x"></i>
                                    </div>
                                    <h5>Onboarding</h5>
                                </div>
                                <p class="text-muted small">Welcome memo, banking forms, and setup instructions.</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">View More →</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success text-white rounded-circle p-3 me-3">
                                        <i class="fas fa-folder fa-2x"></i>
                                    </div>
                                    <h5>Forms & Resources</h5>
                                </div>
                                <p class="text-muted small">Pay schedule, expense form, invoice template.</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">View More →</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-info text-white rounded-circle p-3 me-3">
                                        <i class="fas fa-shield-alt fa-2x"></i>
                                    </div>
                                    <h5>Policies</h5>
                                </div>
                                <p class="text-muted small">Health & Safety, Workplace policies and more.</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">View More →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <small>© {{ date('Y') }} TimeMatters Inc.</small>
    </footer>

    <form id="logout-form" action="{{ route('frontend.logout') }}" method="POST" style="display:none;">
        @csrf
    </form>
</div>
