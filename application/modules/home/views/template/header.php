<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Jazz Senggigi Hotel</title>
  <!-- ================ -->
  <!-- VIA CDN -->
  <!-- ================ -->

  <!--Bootstrap & jQuery -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> -->

  <!-- jQuery datatable -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->

  <!-- jQuery QRcode -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js" integrity="sha256-9MzwK2kJKBmsJFdccXoIDDtsbWFh8bjYK/C7UjB1Ay0=" crossorigin="anonymous"></script> -->
  <!-- Animate css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />

  <!-- ================ -->
  <!-- VIA LOCAL -->
  <!-- ================ -->

  <!--Bootstrap & jQuery -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

  <!-- jQuery datatable -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css'); ?>">
  <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js'); ?>"></script>

  <!-- themify-icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/themify-icons.css'); ?>">

  <!-- jQuery QRcode -->
  <script src="<?php echo base_url('assets/js/jquery.qrcode.min.js'); ?>"></script>

  <!-- moment.js -->
  <script src="<?php echo base_url('assets/js/moment.min.js'); ?>"></script>

  <!-- ================ -->
  <!-- ONLY LOCAL -->
  <!-- ================ -->

  <!-- load main css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
  <!-- load css based on page loaded -->
  <?php if($this->uri->segment(1) == 'reservation'){ ?>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/reservation.css'); ?>">
  <?php } ?>

  <?php if($this->uri->segment(1) == 'resdata'){ ?>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/resdata.css'); ?>">
  <?php } ?>

  <!-- load load_awesome css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/timer.min.css'); ?>">

  <!-- set site_url js-->
  <script>
    const site_url = '<?php echo site_url(); ?>'
  </script>
</head>
<body>

  <!-- End of header -->
