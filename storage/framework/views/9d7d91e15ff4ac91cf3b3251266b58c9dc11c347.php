<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"></a></li>
            <li class="breadcrumb-item text-sm text-dark active text-capitalize"></li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-capitalize"><?php echo e(str_replace('-', ' ', Request::path())); ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar"> 
            <div class="nav-item d-flex align-self-end">
                <a href="http://127.0.0.1:8000" target="_blank" class="btn btn-primary active mb-0 text-white" role="button" aria-pressed="true">
                    public Page
                </a>
            </div>
            <div class="ms-md-3 pe-md-3 d-flex align-items-center">
            <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Type here...">
            </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <a href="<?php echo e(url('/logout')); ?>" class="nav-link text-body font-weight-bold px-0">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">Sign Out</span>
                </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
                </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
                <?php if(Auth::user()->unreadNotifications->count() > 0): ?>
                        <span  style="color: black"><?php echo e(Auth::user()->unreadNotifications->count()); ?></span>
                    <?php endif; ?>
                </a>
                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                    <?php $__empty_1 = true; $__currentLoopData = Auth::user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                        <div class="d-flex py-1">
                            Technician Has Accepted the order id: <?php echo e($notification->data['id']); ?> 
                            
                        </div>
                    </a>
                </li>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                       No record found
                    </div>
                </a>
                    <?php endif; ?>
                
                </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar --><?php /**PATH C:\xampp\htdocs\GBS-10-5-2023\resources\views/layouts/navbars/auth/nav.blade.php ENDPATH**/ ?>