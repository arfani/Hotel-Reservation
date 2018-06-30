<?php
  $this->load->view('mtik/routeros_api.class.php');

  $API = new routeros_api();

  $hostname = "192.168.1.2";
  $user = "rfun";
  $pass = "qwerty";

  if($API->connect($hostname, $user, $pass)){
    ?>
    <script>
      alert('konek mtik')
    </script>
    <?php
  }
 ?>
