<?php $this->load->view('login/forms/signin_modal'); ?>
<?php $this->load->view('login/forms/signup_modal'); ?>
<?php $this->load->view('login/forms/pass_root_modal'); ?>
<?php $this->load->view('setting/forms/mtik_server_modal'); ?>
<!-- start of footer -->
  <div class="footer">
          <p class="text-center">
          Copyright 2018 - Jazz Senggigi Hotel Mataram.
          </p>
  </div>
  <!-- load main.js -->
  <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
  <!-- load js based on page loaded -->
<?php if ($this->uri->segment(1) == 'rooms') { ?>
  <script src="<?php echo base_url('assets/js/rooms.js'); ?>"></script>
<?php } ?>

<?php if ($this->uri->segment(1) == 'user') { ?>
<script src="<?php echo base_url('assets/js/user.js'); ?>"></script>
<?php } ?>

<?php if ($this->uri->segment(1) == 'reservation') { ?>
  <script src="<?php echo base_url('assets/js/reservation.js'); ?>"></script>
<?php } ?>

<?php if ($this->uri->segment(1) == 'resdata') { ?>
<script src="<?php echo base_url('assets/js/resdata.js'); ?>"></script>
<?php } ?>

<?php if ($this->uri->segment(1) == 'profileuser') { ?>
<script src="<?php echo base_url('assets/js/profileuser.js'); ?>"></script>
<?php } ?>

<?php if ($this->uri->segment(1) == 'userhotspot') { ?>
<script src="<?php echo base_url('assets/js/userhotspot.js'); ?>"></script>
<?php } ?>

</body>
</html>
