<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<!-- Brand -->
<span class="navbar-brand finger" id="logo-menu">
<img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Jazz Logo" style="width:90px;">
</span>

<!-- Toggler/collapsibe Button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbar-menu">
<!-- Links -->
<div class="mr-auto">
  <ul class="navbar-nav">
    <li class="nav-item">
      <span class="nav-link finger" id="home-menu">
        <span class="ti-home"></span>
        Home
      </span>
    </li>
    <?php if($this->session->userdata('l') == 'administrator' || $this->session->userdata('l') == 'operator'): ?>
    <li class="nav-item dropdown" id="reservation-container">
      <span class="nav-link dropdown-toggle finger" data-toggle="dropdown">Reservation</span>
      <div class="dropdown-menu">
        <div class="dropdown-item finger" id="reservation-menu">Booking</div>
        <div class="dropdown-item finger" id="resdata-submenu">Reservation Data</div>
      </div>
    </li>
    <li class="nav-item dropdown" id="voucher-menu">
      <span class="nav-link dropdown-toggle finger" data-toggle="dropdown">Voucher</span>
      <div class="dropdown-menu">
        <div class="dropdown-item finger" id="user-voucher-submenu">User Hotspot</div>
        <?php if($this->session->userdata('l') == 'administrator'): ?>
        <div class="dropdown-item finger" id="profile-voucher-submenu">Profile User</div>
        <?php endif; ?>
      </div>
    </li>
  <?php endif; ?>

    <!-- Dropdown -->
    <?php if($this->session->userdata('l') == 'administrator'):  ?>
    <li class="nav-item dropdown" id="master-data-container">
      <span class="nav-link dropdown-toggle finger" id="master-data-menu" data-toggle="dropdown">
        Master Data
      </span>
      <div class="dropdown-menu">
        <span class="dropdown-item finger" id="guest-submenu">Guest</span>
        <span class="dropdown-item finger" id="rooms-submenu">Rooms</span>
        <span class="dropdown-item finger" id="user-submenu">User</span>
      </div>
    </li>
  <?php endif; ?>

  <?php if($this->session->userdata('l') == 'administrator'):  ?>
    <li class="nav-item"><span class="nav-link finger" id="walled-menu">Walled Garden</span></li>
  <?php endif; ?>

    <li class="nav-item"><span class="nav-link finger" id="about-menu">About</span></li>
  </ul>
</div>

<div class="ml-auto">
  <ul class="navbar-nav">

  <li class="nav-item">
    <span class="nav-link finger" role="button" data-toggle="tooltip" title="Login name" id="user-welcome">
      <span class="" id="user-profile" >
        Welcome,<br />
        <span class="ti-user">
        </span> <?php echo ($this->session->userdata('n')) ? $this->session->userdata('n') : 'Guest'; ?>
      </span>
    </span>
  </li>

    <?php if($this->session->userdata('l') == 'operator' || $this->session->userdata('l') == 'administrator'):  ?>
      <li class="nav-item">
        <span class="nav-link finger" role="button" data-toggle="tooltip" id="setting-menu"  title="Setting">
          <span class="fa fa-cogs font-weight-bold"></span>
        </span>
      </li>
    <?php endif; ?>

    <li class="nav-item">
      <span
      class="nav-link finger"
      role="button"
      data-toggle="tooltip"
      id="<?php echo ($this->session->userdata('n')) ? 'log-out' : 'log-in' ?>"
      title="Sign <?php echo ($this->session->userdata('n')) ? 'out' : 'in'; ?>">
      <?php echo ($this->session->userdata('n')) ? 'Log-out' : 'Log-in'; ?>
      </span>
    </li>
  </ul>
</div>

</div>
</nav>
<!-- End of Navbar -->
