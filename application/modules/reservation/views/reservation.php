<!-- Reservation Content -->
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-12" id="form-res">
        <h2 class="text-center font-weight-bold bg-light rounded-circle">Reservation Form</h2>
        <form action="<?php site_url('hotel/connect') ?>">
          <div class="row">
            <?php
            $this->load->view('forms/data_tamu');
            $this->load->view('forms/data_hotel');
            $this->load->view('forms/reservation_modal');
             ?>
           </div>
        </form>
      </div>
    </div>
  </div>
</div>
