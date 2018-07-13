<!-- pop up with The Modal -->
  <div class="modal fade" id="mtik-setting-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Mikrotik Server Setting <span class="la-timer dark text-danger float-right ml-4 d-none" id="loader-img"><div></div></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <!-- <form method="post" action="<?php echo site_url('setting/connection'); ?>"> -->
        <div class="modal-body">
          <div class="d-flex justify-content-center">
          <div class="form-group">
            <div class="form-inline">
              <label for="hostname">Hostname </label>
              <input id="hostname"  maxlength="15" class="form-control" placeholder="192.168.88.1" pattern="\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3}" autofocus required />
            </div>
          </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="form-group">
              <div class="form-inline">
                <label for="username">Username </label>
                <input class="form-control" placeholder="Mikrotik uname" id="username" required />
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="form-group">
              <div class="form-inline">
                <label for="password">Password </label>
                <input type="password" class="form-control" placeholder="Mikrotik pwd" id="password" />
              </div>
            </div>
          </div>

          <div class="alert alert-success alert-dismissable d-none" id="server-alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Connection Status : <span id="server-status"></span>
          </div>
      </div> <!-- End of Modal Body -->

              <!-- Modal footer -->
              <div class="modal-footer">
                <input class="btn btn-primary" value="Connect" id="mtik-connect" readonly />
                <input class="btn btn-danger" value="Reset" id="mtik-reset" readonly />
              </div>
            <!-- </form> -->

            </div>
          </div>
        </div>
