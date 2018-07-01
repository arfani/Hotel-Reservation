<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {
  public function index(){
    $this->load->view('template/header');
      echo anchor('home');
      echo '<br />';
      echo base_url('reserve');
      echo site_url();

  }

  public function connect(){
    $API = new mtikapi();

    $hostname = "192.168.1.2";
    $user = "rfun";
    $pass = "qwerty";

    if($API->connect($hostname, $user, $pass)){
      ?>
      <script>
        alert('konek mtik')
        location.href ='<?php echo site_url(); ?>'
      </script>
      <?php
    }else{
      ?>
      <script>
        alert('gagal konek mtik')
      </script>
      <?php
    }
    // redirect('reserve');
  }

  public function test_connection(){
    // $this->connect();
    // $backLink = site_url();
  }

}
