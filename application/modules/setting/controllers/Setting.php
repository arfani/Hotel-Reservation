<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

  function index(){

  }

  function connection(){
    $API = new mtikapi();

    $hostname = $this->input->post('hostname');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$msg = "Status";

    if($API->connect($hostname, $username, $password)){
      ?>
      <script>
        const hostname = '<?php echo $hostname; ?>'
        alert('Connected to '+hostname)
        location.href = '<?php echo site_url(); ?>'
      </script>
      <?php
    }else{
      ?>
      <script>
        const hostname = '<?php echo $hostname; ?>'
        alert('Failed connecting to '+hostname)
        location.href = '<?php echo site_url(); ?>'
      </script>
      <?php
    }
  }

}
