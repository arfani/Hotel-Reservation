<!-- Reservation Content -->
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="text-center font-weight-bold bg-light rounded">Reservation Form</h2>
        <form action="#" name="reservation-form">
          <div class="row">
            <?php
            $this->load->view('forms/guest_data');
            $this->load->view('forms/hotel_data');
            $this->load->view('forms/reservation_modal');
             ?>
           </div>
        </form>
      </div>
    </div>
  </div>
</div>
