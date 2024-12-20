<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('admin/header'); ?>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?= $this->include('admin/asidebar'); ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <!-- <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div> -->
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <?= $this->include('admin/navbar'); ?>
                <!-- End Navbar -->
            </div>

            <?= $this->renderSection('content'); ?>
            <!-- footetr -->
            <?= $this->include('admin/footer'); ?>
            <!-- end footer -->
        </div>

        <!-- Custom template | don't include it in your project! -->

        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <?= $this->include('admin/jscript'); ?>
</body>

</html>