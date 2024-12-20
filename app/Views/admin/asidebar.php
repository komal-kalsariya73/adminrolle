
<div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
                src="<?= base_url('public/assets/img/kaiadmin/logo_light.svg')?>"
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
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item active">
                <a href="<?= base_url('/admin')?>">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                  <span class="caret"></span>
                </a>
                <!-- <div class="collapse" id="dashboard">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="dashbord.php">
                        <span class="sub-item">Dashboard</span>
                      </a>
                    </li>
                  </ul>
                </div> -->
              </li>
              <?php if (session()->get('role') == 1) : ?>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-layer-group"></i>
                  <p>User</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <li>
                    <a href="<?= base_url('/staff/view')?>">
                        <span class="sub-item">All Staff</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url('/staff')?>">
                        <span class="sub-item">Add Staff</span>
                      </a>
                    </li>
                   
                  
                    
                  
                    
                   
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts">
                  <i class="fas fa-th-list"></i>
                  <p>Customer</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                  <ul class="nav nav-collapse">
                    <li>
                    <a href="<?= base_url('/customer/view')?>">
                        <span class="sub-item">All Customer</span>
                      </a>
                    </li>
                    <li>
                    <a href="<?= base_url('/customer')?>">
                        <span class="sub-item">Add Customer</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#forms">
                  <i class="fas fa-pen-square"></i>
                  <p>Project</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="forms">
                  <ul class="nav nav-collapse">
                    <li>
                    <a href="<?= base_url('/project/view')?>">
                        <span class="sub-item">All Project</span>
                      </a>
                    </li>
                    <li>
                    <a href="<?= base_url('/project')?>">
                        <span class="sub-item">Add project</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            
             
             
             
             
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu">
                  <i class="
fas fa-plus"></i>
                  <p>All FollowUp</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="submenu">
                  <ul class="nav nav-collapse">
                    <li>
                    <a href="<?= base_url('/followup/view')?>">
                        <span class="sub-item">All FollowUp</span>
                        <!-- <span class="caret"></span> -->
                      </a>
                      
                    </li>
                    <li>
                    <a href="<?= base_url('/followup')?>">
                        <span class="sub-item">Add FollowUp</span>
                        <!-- <span class="caret"></span> -->
                      </a>
                    
                    </li>
                   
                  </ul>
                </div> 
              </li>
              <!-- <li class="nav-item">
                <a href="email.php">
                  <i class="fas fa-file"></i>
                  <p>Mail</p>
               
                </a>
              </li> -->
            
              <?php elseif (session()->get('role') == 2) : ?>    

 <div class="nav-item">
 <a href="<?= base_url('/project/view')?>">
 <i class="fas fa-box"></i><span>View Projects</span></a>
</div> 
 <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu">
                  <i class="
fas fa-plus"></i>
                  <p>All FollowUp</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="submenu">
                  <ul class="nav nav-collapse">
                    <li>
                    <a href="<?= base_url('/followup/view')?>">

                        <span class="sub-item">All FollowUp</span>
                      
                      </a>
                      
                    </li>
                    <li>
                    <a href="<?= base_url('/followup')?>">

                        <span class="sub-item">Add FollowUp</span>
                      
                      </a>
                    
                    </li>
                   
                  </ul>
                </div> 
              </li> 

              <?php endif; ?>
<li class="nav-item">
<a href="<?= base_url('/chat')?>">
                  <i class="fas fa-file"></i>
                  <p>Chat</p>
                  <!-- <span class="badge badge-secondary">1</span> -->
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div> 