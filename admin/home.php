<h4>Bienvenido: <?php echo $_settings->userdata('firstname') ?> <?php echo $_settings->userdata('lastname') ?></h4>
<hr>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-secondary elevation-1"><i class="fas fa-th-list"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Canchas</span>
          <span class="info-box-number text-right">
            <?php 
              $court = $conn->query("SELECT * FROM court_list where `delete_flag` = 0 and `status` = 1")->num_rows;
              echo format_num($court);
            ?>
            <?php ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-boxes"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Productos</span>
          <span class="info-box-number text-right">
            <?php 
              $product = $conn->query("SELECT * FROM product_list where `delete_flag` = 0 and `status` = 1")->num_rows;
              echo format_num($product);
            ?>
            <?php ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-table"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Servicios</span>
          <span class="info-box-number text-right">
            <?php 
              $service = $conn->query("SELECT * FROM service_list where `delete_flag` = 0 and `status` = 1")->num_rows;
              echo format_num($service);
            ?>
            <?php ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-coins"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Alquileres Hoy</span>
          <span class="info-box-number text-right">
            <?php 
              $court = $conn->query("SELECT COALESCE(SUM(total),0) FROM court_rentals where date(date_created) = '".(date("Y-m-d"))."' ")->fetch_array()[0];
              echo format_num($court);
            ?>
            <?php ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-coins"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Ventas Hoy</span>
          <span class="info-box-number text-right">
            <?php 
              $sales = $conn->query("SELECT COALESCE(SUM(total),0) FROM sales_transaction where date(date_created) = '".(date("Y-m-d"))."' ")->fetch_array()[0];
              echo format_num($sales);
            ?>
            <?php ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-coins"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Mano de Obra Hoy</span>
          <span class="info-box-number text-right">
            <?php 
              $service = $conn->query("SELECT COALESCE(SUM(total),0) FROM service_transaction where date(date_created) = '".(date("Y-m-d"))."' ")->fetch_array()[0];
              echo format_num($service);
            ?>
            <?php ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
