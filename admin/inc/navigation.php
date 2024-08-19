<style>
  aside.main-sidebar{
    background-image:url('<?= validate_image("uploads/default/portrait1.jpg") ?>') !important;
    background-repeat:no-repeat;
    background-size:cover;
    background-position:center center;
  }
  aside.main-sidebar a.nav-link,  aside.main-sidebar li.nav-header {
    background: transparent;
  }
  aside.main-sidebar li.nav-item:hover {
    background: #4fb87b !important;
}
</style>
<!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-success elevation-4 sidebar-no-expand">
        <!-- Brand Logo 
        <a href="<?php echo base_url ?>admin" class="brand-link bg-gradient-success text-sm">
        <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 1.5rem;height: 1.5rem;max-height: unset">
        <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
        </a>
        -->  
        <!-- Brand Logo -->
        <div class="user-panel mb-3">
          <a href="index.php" >
            <span class="brand-image d-flex justify-content-center align-items-center">
              <img src="../uploads/logosidebar.png" style="width: 250px;height:65px" class="img-fluid" alt="User Image" id="logito">
            </span>
          </a>
        </div>        
        
        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
          <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="clearfix"></div>
                <!-- Sidebar Menu -->
                <nav class="mt-5">
                   <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item dropdown">
                      <a href="./" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                        </p>
                      </a>
                    </li> 
                    <li class="nav-header">Main</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=court_rentals" class="nav-link nav-court_rentals">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                          Alquiler de Canchas
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=sales" class="nav-link nav-sales">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                          Ventas
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=service_transactions" class="nav-link nav-service_transactions">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                          Transacciones de Servicio
                        </p>
                      </a>
                    </li>
                    <li class="nav-header">Reportes</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=reports/daily_court_rental_report" class="nav-link nav-reports_daily_court_rental_report">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                          Alquileres diarios
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=reports/daily_sales_report" class="nav-link nav-reports_daily_sales_report">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                          Ventas Diarias
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=reports/daily_services_report" class="nav-link nav-reports_daily_services_report">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                          Servicios Diarios
                        </p>
                      </a>
                    </li>
                    <?php if($_settings->userdata('type') == 1): ?>
                    <li class="nav-header">Master List</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=courts" class="nav-link nav-courts">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                          Lista de Canchas
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=products" class="nav-link nav-products">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                          Lista de Productos
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=services" class="nav-link nav-services">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                          Lista de Servicios
                        </p>
                      </a>
                    </li>
                    <li class="nav-header">Mantenimiento</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link nav-user_list">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                          Lista de Usuarios
                        </p>
                      </a>
                    </li>

                    <?php endif; ?>
                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
      </aside>
      <script>
    $(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      page = page.replace(/\//g,'_');
      console.log(page)

      if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
        if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
          $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

      }
      $('.nav-link.active').addClass('bg-gradient-success')
    })
  </script>