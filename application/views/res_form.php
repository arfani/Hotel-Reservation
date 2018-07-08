<!-- Reservation Content -->
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-12" id="form-res">
        <h2 class="text-center font-weight-bold bg-light rounded-circle">Reservation Form</h2>
        <form action="#">
          <div class="row">
            <?php
            $this->load->view('form/data_tamu');
            $this->load->view('form/data_hotel');
             ?>
           </div>
        </form>
      </div>
    </div>
  </div>
</div>
