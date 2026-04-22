<?php $__env->startSection('main_content'); ?>
    <div class="pcoded-wrapper">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->

                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!--[ daily sales section ] start-->
                                <!--<div class="col-md-6 col-xl-4">
                                        <div class="card daily-sales">
                                            <div class="card-block">
                                                <h6 class="mb-4">Daily Sales</h6>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-9">
                                                        <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>$ 249.95</h3>
                                                    </div>

                                                    <div class="col-3 text-right">
                                                        <p class="m-b-0">67%</p>
                                                    </div>
                                                </div>
                                                <div class="progress m-t-30" style="height: 7px;">
                                                    <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                <!--[ daily sales section ] end-->
                                <!--[ Monthly  sales section ] starts-->
                                <!--<div class="col-md-6 col-xl-4">
                                        <div class="card Monthly-sales">
                                            <div class="card-block">
                                                <h6 class="mb-4">Monthly Sales</h6>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-9">
                                                        <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-down text-c-red f-30 m-r-10"></i>$ 2.942.32</h3>
                                                    </div>
                                                    <div class="col-3 text-right">
                                                        <p class="m-b-0">36%</p>
                                                    </div>
                                                </div>
                                                <div class="progress m-t-30" style="height: 7px;">
                                                    <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                <!--[ Monthly  sales section ] end-->
                                <!--[ year  sales section ] starts-->
                                <!--<div class="col-md-12 col-xl-4">
                                        <div class="card yearly-sales">
                                            <div class="card-block">
                                                <h6 class="mb-4">Yearly Sales</h6>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-9">
                                                        <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>$ 8.638.32</h3>
                                                    </div>
                                                    <div class="col-3 text-right">
                                                        <p class="m-b-0">80%</p>
                                                    </div>
                                                </div>
                                                <div class="progress m-t-30" style="height: 7px;">
                                                    <div class="progress-bar progress-c-theme" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                <!--[ year  sales section ] end-->
                                <!--[ Recent Users ] start-->
                                <div class="col-md-12 col-xl-3">
                                    <div class="card card-social">
                                        <div class="card-block">
                                            <a href="<?php echo e(route('articles.index')); ?>">
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col-auto">
                                                        <i class="feather icon-list text-primary f-36"></i>
                                                    </div>
                                                    <div class="col text-right">
                                                        <h3><?php echo e(isset($post) ? $post : 0); ?></h3>
                                                        <h5 class="text-c-green mb-0 dashboard_heading"><span
                                                                class="text-muted">Total Blogs</span></h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card card-social">
                                        <div class="card-block">
                                            <a href="<?php echo e(route('pages.index')); ?>">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-file-minus text-c-blue f-36"></i>
                                                </div>
                                                <div class="col text-right">
                                                    <h3><?php echo e(isset($page) ? $page : 0); ?></h3>
                                                    <h5 class="text-c-purple mb-0 dashboard_heading"><span class="text-muted">Total Pages</span></h5>
                                                </div>
                                            </div>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card card-social">
                                        <div class="card-block">
                                            <a href="<?php echo e(route('gallery.index')); ?>">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-image text-c-red f-36"></i>
                                                </div>
                                                <div class="col text-right">
                                                    <h3><?php echo e(isset($gallery) ? $gallery : 0); ?></h3>
                                                    <h5 class="text-c-blue mb-0 dashboard_heading"><span class="text-muted">Gallery</span></h5>
                                                </div>
                                            </div>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card card-social">
                                        <div class="card-block">
                                            <a href="<?php echo e(route('inquiry.index')); ?>">
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col-auto">
                                                        <i class="feather icon-package text-c-green  f-36"></i>
                                                    </div>
                                                    <div class="col text-right">
                                                        <h3><?php echo e(isset($inquiry) ? $inquiry : 0); ?></h3>
                                                        <h5 class="text-c-blue mb-0 dashboard_heading"><span class="text-muted">Inquirys</span></h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-12">

                                    <div class="card">
                                        <div class="card-header dashboard_chart">
                                            <h5>Visitors</h5>
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-primary sm chart_toggle active">
                                                    <input type="radio" class="d-none" name="t_alignment" id="t_left" value="monthly">
                                                    Monthly
                                                </label>
                                                <label class="btn btn-primary sm chart_toggle">
                                                    <input type="radio" class="d-none" name="t_alignment" id="t_center" value="daily">
                                                    Daily
                                                </label>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <canvas id="myChart" height="340"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-xl-7 col-md-12">
                                    <div class="card Recent-Users">
                                        <div class="card-header">
                                            <h5>Recent Posts</h5>
                                        </div>
                                        <div class="card-block px-0 py-3 dashboard_fix_tables">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <?php if(isset($recent_post)): ?>
                                                            <?php $__currentLoopData = $recent_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr class="unread">
                                                                    <td>
                                                                        <?php if(isset($val->image) && $val->image != '' && $val->image != null): ?>
                                                                            <?php
                                                                                $img = App\Models\MediaImage::select('name')
                                                                                    ->where('id', $val->image)
                                                                                    ->first();
                                                                            ?>
                                                                            <?php if(isset($img) && $img != '' && $img != null): ?>
                                                                                <img class="rounded-circle"
                                                                                    style="width:40px;height:40px;"
                                                                                    src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                                    alt="activity-user">
                                                                            <?php else: ?>
                                                                                <img class="rounded-circle"
                                                                                    style="width:40px;height:40px;"
                                                                                    src="<?php echo e(asset('assets/images/user/avatar-1.jpg')); ?>"
                                                                                    alt="activity-user">
                                                                            <?php endif; ?>
                                                                        <?php else: ?>
                                                                            <img class="rounded-circle"
                                                                                style="width:40px;height:40px;"
                                                                                src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                                alt="activity-user">
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td>
                                                                        <p class="m-0"><?php echo e($val->title); ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <h6 class="text-muted"><i
                                                                                class="fas fa-circle text-c-green f-10 m-r-15"></i><span><?php echo e(\Carbon\Carbon::parse($val->updated_at)->format('d M Y')); ?></span>
                                                                        </h6>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <!-- <div class="col-xl-5 col-md-12">
                                    <div class="card Recent-Users">
                                        <div class="card-header">
                                            <h5>Testimonials</h5>
                                        </div>
                                        <div class="card-block px-0 py-3 dashboard_fix_tables">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <?php if(isset($testi)): ?>
                                                            <?php $__currentLoopData = $testi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr class="unread">
                                                                    <td>
                                                                        <p class="m-0"><?php echo e($item->name); ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <?php for($i = 1; $i <= 5; $i++): ?>

                                                                    <?php if($i <= $item->rating): ?>

                                                                        <i class="fa fa-star" style="color: #E4B513;font-size: 20px;    margin-right: 5px;"></i>

                                                                    <?php else: ?>

                                                                        <i class="fa fa-star" style="color: #f0f0f0;font-size: 20px;    margin-right: 5px;"></i>

                                                                    <?php endif; ?>

                                                                <?php endfor; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!--[ Recent Users ] end-->

                                <!-- [ statistics year chart ] start -->
                                <!--<div class="col-xl-4 col-md-6">
                                        <div class="card card-event">
                                            <div class="card-block">
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col">
                                                        <h5 class="m-0">Upcoming Event</h5>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="label theme-bg2 text-white f-14 f-w-400 float-right">34%</label>
                                                    </div>
                                                </div>
                                                <h2 class="mt-3 f-w-300">45<sub class="text-muted f-14">Competitors</sub></h2>
                                                <h6 class="text-muted mt-4 mb-0">You can participate in event </h6>
                                                <i class="fab fa-angellist text-c-purple f-50"></i>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-block border-bottom">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-auto">
                                                        <i class="feather icon-zap f-30 text-c-green"></i>
                                                    </div>
                                                    <div class="col">
                                                        <h3 class="f-w-300">235</h3>
                                                        <span class="d-block text-uppercase">TOTAL IDEAS</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-block">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-auto">
                                                        <i class="feather icon-map-pin f-30 text-c-blue"></i>
                                                    </div>
                                                    <div class="col">
                                                        <h3 class="f-w-300">26</h3>
                                                        <span class="d-block text-uppercase">TOTAL LOCATIONS</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                <!-- [ statistics year chart ] end -->
                                <!--[social-media section] start-->
                                <!--<div class="col-md-12 col-xl-4">
                                        <div class="card card-social">
                                            <div class="card-block border-bottom">
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col-auto">
                                                        <i class="fab fa-facebook-f text-primary f-36"></i>
                                                    </div>
                                                    <div class="col text-right">
                                                        <h3>12,281</h3>
                                                        <h5 class="text-c-green mb-0">+7.2% <span class="text-muted">Total Likes</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-block">
                                                <div class="row align-items-center justify-content-center card-active">
                                                    <div class="col-6">
                                                        <h6 class="text-center m-b-10"><span class="text-muted m-r-5">Target:</span>35,098</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width:60%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <h6 class="text-center  m-b-10"><span class="text-muted m-r-5">Duration:</span>3,539</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-c-theme2" role="progressbar" style="width:45%;height:6px;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card card-social">
                                            <div class="card-block border-bottom">
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col-auto">
                                                        <i class="fab fa-twitter text-c-blue f-36"></i>
                                                    </div>
                                                    <div class="col text-right">
                                                        <h3>11,200</h3>
                                                        <h5 class="text-c-purple mb-0">+6.2% <span class="text-muted">Total Likes</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-block">
                                                <div class="row align-items-center justify-content-center card-active">
                                                    <div class="col-6">
                                                        <h6 class="text-center m-b-10"><span class="text-muted m-r-5">Target:</span>34,185</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-c-green" role="progressbar" style="width:40%;height:6px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <h6 class="text-center  m-b-10"><span class="text-muted m-r-5">Duration:</span>4,567</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-c-blue" role="progressbar" style="width:70%;height:6px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card card-social">
                                            <div class="card-block border-bottom">
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col-auto">
                                                        <i class="fab fa-google-plus-g text-c-red f-36"></i>
                                                    </div>
                                                    <div class="col text-right">
                                                        <h3>10,500</h3>
                                                        <h5 class="text-c-blue mb-0">+5.9% <span class="text-muted">Total Likes</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-block">
                                                <div class="row align-items-center justify-content-center card-active">
                                                    <div class="col-6">
                                                        <h6 class="text-center m-b-10"><span class="text-muted m-r-5">Target:</span>25,998</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width:80%;height:6px;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <h6 class="text-center  m-b-10"><span class="text-muted m-r-5">Duration:</span>7,753</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-c-theme2" role="progressbar" style="width:50%;height:6px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                <!--[social-media section] end-->
                                <!-- [ rating list ] starts-->
                                <!--<div class="col-xl-4 col-md-6">
                                        <div class="card user-list">
                                            <div class="card-header">
                                                <h5>Rating</h5>
                                            </div>
                                            <div class="card-block">
                                                <div class="row align-items-center justify-content-center m-b-20">
                                                    <div class="col-6">
                                                        <h2 class="f-w-300 d-flex align-items-center float-left m-0">4.7 <i class="fas fa-star f-10 m-l-10 text-c-yellow"></i></h2>
                                                    </div>
                                                    <div class="col-6">
                                                        <h6 class="d-flex  align-items-center float-right m-0">0.4 <i class="fas fa-caret-up text-c-green f-22 m-l-10"></i></h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>5</h6>
                                                        <h6 class="align-items-center float-right">384</h6>
                                                        <div class="progress m-t-30 m-b-20" style="height: 6px;">
                                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>4</h6>
                                                        <h6 class="align-items-center float-right">145</h6>
                                                        <div class="progress m-t-30  m-b-20" style="height: 6px;">
                                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>3</h6>
                                                        <h6 class="align-items-center float-right">24</h6>
                                                        <div class="progress m-t-30  m-b-20" style="height: 6px;">
                                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>2</h6>
                                                        <h6 class="align-items-center float-right">1</h6>
                                                        <div class="progress m-t-30  m-b-20" style="height: 6px;">
                                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>1</h6>
                                                        <h6 class="align-items-center float-right">0</h6>
                                                        <div class="progress m-t-30  m-b-20" style="height: 6px;">
                                                            <div class="progress-bar" role="progressbar" style="width:0;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                <!-- [ rating list ] end-->
                                <!--<div class="col-xl-8 col-md-12 m-b-30">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Today</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">This Week</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">All</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>User</th>
                                                            <th>Activity</th>
                                                            <th>Time</th>
                                                            <th>Status</th>
                                                            <th class="text-right"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h6 class="m-0"><img class="rounded-circle m-r-10" style="width:40px;" src="assets/images/user/avatar-1.jpg" alt="activity-user">Ida Jorgensen</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">The quick brown fox</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">3:28 PM</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0 text-c-green">Done</h6>
                                                            </td>
                                                            <td class="text-right"><i class="fas fa-circle text-c-green f-10"></i></td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="<?php echo e(asset('assets/images/user/avatar-2.jpg')); ?>" alt="activity-user">Albert Andersen</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">Jumps over the lazy</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">2:37 PM</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0 text-c-red">Missed</h6>
                                                            </td>
                                                            <td class="text-right"><i class="fas fa-circle text-c-red f-10"></i></td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="<?php echo e(asset('assets/images/user/avatar-3.jpg')); ?>" alt="activity-user">Silje Larsen</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">Dog the quick brown</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">10:23 AM</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0 text-c-purple">Delayed</h6>
                                                            </td>
                                                            <td class="text-right"><i class="fas fa-circle text-c-purple f-10"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="<?php echo e(asset('assets/images/user/avatar-1.jpg')); ?>" alt="activity-user">Ida Jorgensen</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">The quick brown fox</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">4:28 PM</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0 text-c-green">Done</h6>
                                                            </td>
                                                            <td class="text-right"><i class="fas fa-circle text-c-green f-10"></i></td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                            <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>User</th>
                                                            <th>Activity</th>
                                                            <th>Time</th>
                                                            <th>Status</th>
                                                            <th class="text-right"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="<?php echo e(asset('assets/images/user/avatar-2.jpg')); ?>" alt="activity-user">Albert Andersen</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">Jumps over the lazy</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">2:37 PM</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0 text-c-red">Missed</h6>
                                                            </td>
                                                            <td class="text-right"><i class="fas fa-circle text-c-red f-10"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="m-0"><img class="rounded-circle m-r-10" style="width:40px;" src="<?php echo e(asset('assets/images/user/avatar-1.jpg')); ?>" alt="activity-user">Ida Jorgensen</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">The quick brown fox</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">3:28 PM</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0 text-c-green">Done</h6>
                                                            </td>
                                                            <td class="text-right"><i class="fas fa-circle text-c-green f-10"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="<?php echo e(asset('assets/images/user/avatar-1.jpg')); ?>" alt="activity-user">Ida Jorgensen</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">The quick brown fox</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">4:28 PM</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0 text-c-green">Done</h6>
                                                            </td>
                                                            <td class="text-right"><i class="fas fa-circle text-c-green f-10"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="<?php echo e(asset('assets/images/user/avatar-3.jpg')); ?>" alt="activity-user">Silje Larsen</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">Dog the quick brown</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">10:23 AM</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0 text-c-purple">Delayed</h6>
                                                            </td>
                                                            <td class="text-right"><i class="fas fa-circle text-c-purple f-10"></i></td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>User</th>
                                                            <th>Activity</th>
                                                            <th>Time</th>
                                                            <th>Status</th>
                                                            <th class="text-right"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="<?php echo e(asset('assets/images/user/avatar-3.jpg')); ?>" alt="activity-user">Silje Larsen</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">Dog the quick brown</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">10:23 AM</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0 text-c-purple">Delayed</h6>
                                                            </td>
                                                            <td class="text-right"><i class="fas fa-circle text-c-purple f-10"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="m-0"><img class="rounded-circle m-r-10" style="width:40px;" src="<?php echo e(asset('assets/images/user/avatar-1.jpg')); ?>" alt="activity-user">Ida Jorgensen</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">The quick brown fox</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">3:28 PM</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0 text-c-green">Done</h6>
                                                            </td>
                                                            <td class="text-right"><i class="fas fa-circle text-c-green f-10"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="<?php echo e(asset('assets/images/user/avatar-2.jpg')); ?>" alt="activity-user">Albert Andersen</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">Jumps over the lazy</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">2:37 PM</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0 text-c-red">Missed</h6>
                                                            </td>
                                                            <td class="text-right"><i class="fas fa-circle text-c-red f-10"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="<?php echo e(asset('assets/images/user/avatar-1.jpg')); ?>" alt="activity-user">Ida Jorgensen</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">The quick brown fox</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0">4:28 PM</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0 text-c-green">Done</h6>
                                                            </td>
                                                            <td class="text-right"><i class="fas fa-circle text-c-green f-10"></i></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>-->

                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/customchart.js')); ?>"></script>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart;

        function updateChart(labels, data) {

            if (myChart) {
                myChart.destroy();
            }

            myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Visitors',
                        data: data,
                        fill: false,
                        borderColor: '#2196f3',
                        backgroundColor: '#2196f3',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                    display: false 
                    }
                }
            });
        }
        function getChartData(selected)
        {
            $.ajax({
            url: '<?php echo e(route('get_chart_data')); ?>', 
            method: 'POST',
            data: {
                    type: selected
                },
            dataType: 'json',
            success: function (response) {
                var labels = response.labels;
                var data = response.data;
                updateChart(labels, data);
            },
            error: function (error) {
                console.error('Error fetching data:', error);
            }
        });

        }
        $( document ).ready(function() {
            var selected = $('#t_left').val();
            getChartData(selected);
        });

        $('input[name="t_alignment"]').change(function () {
            var selected = $('input[name="t_alignment"]:checked').val();
            getChartData(selected);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/dashboard/dashboard.blade.php ENDPATH**/ ?>