<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>SPK AHP Penentuan UMKM Terbaik</title>

   <!-- Custom fonts for this template-->
   <link href="<?php echo base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

   <!-- Custom styles for this template-->
   <link href="<?php echo base_url('assets/') ?>css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

   <div class="container">
      <h4 class="text-center mt-5 text-white">SPK AHP Penentuan UMKM Terbaik</h4>
      <div class="card card-login mx-auto mt-3">
         <div class="card-header">Login</div>
         <div class="card-body">
            <?php echo $this->session->userdata('message') ?>
            <form action="<?php echo base_url('login/verify') ?>" method="post">
               <div class="form-group">
                  <div class="form-label-group">
                     <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus="autofocus">
                     <label for="username">Username</label>
                  </div>
               </div>
               <div class="form-group">
                  <div class="form-label-group">
                     <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                     <label for="password">Password</label>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
         </div>
      </div>
   </div>

   <!-- Bootstrap core JavaScript-->
   <script src="<?php echo base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
   <script src="<?php echo base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="<?php echo base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>