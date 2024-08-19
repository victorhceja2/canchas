<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
 <?php require_once('inc/header.php') ?>
<body class="hold-transition login-page">
  <script>
    start_loader()
  </script>
  <style>
    body{
      background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
      background-size:cover;
      background-repeat:no-repeat;
      backdrop-filter: contrast(1);
    }
    #page-title{
      text-shadow: 6px 4px 7px black;
      font-size: 3.5em;
      color: #fff4f4 !important;
      background: #8080801c;
    }
  </style>
  <!-- <h1 class="text-center text-white px-4 py-5" id="page-title"><b><?php echo $_settings->info('name') ?></b></h1> -->
  
<div class="wrapper">
<div class="miwrapper fadeInDown" >
  <div id="formContent">
    <div class="fadeIn first" id="formlogo"> 
         <a href="./" class="h1"><img src="../uploads/logosidebar.png" style="width: 250px;height:65px" class="img-fluid" alt="User Image"></a>
    </div>

      <form id="login-frm" action="" method="post" >
          <input type="text" class="fadeIn second" name="username" placeholder="Username">
              <span class="fas fa-user"></span>

          <input type="password" class="fadeIn second" name="password" placeholder="Password">
              <span class="fas fa-lock"></span>
        <hr>
         <input type="submit" class="fadeIn fourth" value="Ingresar">

       <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="javascript:void(0)" id="create_account">No tienes cuenta? Crea una!!</a>      
        </div>     
      </form>

  </div>
  <!-- /.card -->
</div>
</div>
<!-- /.login-box -->
    
    

<!-- jQuery -->
<script src="<?= base_url ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url ?>dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    end_loader();
  })
</script>
</body>
</html>