<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
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
      <span class="nav-link finger" id="home-menu">Home</span>
    </li>
    <?php if($this->session->userdata('l') == 'administrator' || $this->session->userdata('l') == 'operator'): ?>
    <li class="nav-item" id="reservation-container">
      <span class="nav-link finger" id="reservation-menu">Reservation</span>
    </li>
  <?php endif; ?>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <span class="nav-link dropdown-toggle finger" id="service" data-toggle="dropdown">
        Services
      </span>
      <div class="dropdown-menu finger">
        <span class="dropdown-item finger">Restaurant</span>
        <span class="dropdown-item finger">Rooms</span>
        <span class="dropdown-item finger">Salon & Spa</span>
        <span class="dropdown-item finger">Barber Shop</span>
        <span class="dropdown-item finger">Others</span>
      </div>
    </li>

    <!-- Dropdown -->
    <?php if($this->session->userdata('l') == 'administrator'):  ?>
    <li class="nav-item dropdown" id="master-data-container">
      <span class="nav-link dropdown-toggle finger" id="master-data-menu" data-toggle="dropdown">
        Master Data
      </span>
      <div class="dropdown-menu">
        <span class="dropdown-item finger" id="emp-submenu">Employees</span>
        <span class="dropdown-item finger" id="rooms-submenu">Rooms</span>
      </div>
    </li>
  <?php endif; ?>

    <li class="nav-item"><span class="nav-link finger">About</span></li>
    <li class="nav-item"><span class="nav-link finger">Contact</span></li>
  </ul>
</div>

<div class="ml-auto">
  <ul class="navbar-nav">
    <form class="form-inline" action="#">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" id="search">
    </form>

    <?php if($this->session->userdata('l') == 'operator' || $this->session->userdata('l') == 'administrator'):  ?>
    <li class="nav-item">
      <span class="nav-link finger" role="button" id="setting-menu"  title="Setting">
        <span class="octicon octicon-tools"></span>
      </span>
    </li>
  <?php endif; ?>

    <li class="nav-item">
      <span class="nav-link finger" role="button" id="user-welcome">
        <span class="small" id="user-profile" style="">Welcome,<br /> <?php echo ($this->session->userdata('n')) ? $this->session->userdata('n') : 'Guest'; ?></span>
      </span>
    </li>

    <li class="nav-item">
      <span class="nav-link finger" role="button" id="<?php echo ($this->session->userdata('n')) ? 'log-out' : 'log-in' ?>" title="Sign <?php echo ($this->session->userdata('n')) ? 'out' : 'in'; ?>">
        <span class="octicon <?php echo ($this->session->userdata('n')) ? 'octicon-sign-out' : 'octicon-sign-in'; ?>"></span>
      </span>
    </li>
  </ul>
</div>

</div>
</nav>
<!-- End of Navbar -->
