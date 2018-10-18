<!-- pop up with The Modal -->
  <div class="modal animated jackInTheBox" id="mtik-setting-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Mikrotik Server Setting <span class="la-timer dark text-danger float-right ml-4 d-none" id="loader-img"><div></div></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
                <label for="hostname" class="text-center w-100">Hostname </label>
                <input id="hostname"  maxlength="15" class="form-control" placeholder="192.168.88.1" pattern="\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3}" autofocus required />
            </div>
            <div class="form-inline w-100">
              <label class="w-50" for="username">Username </label>
              <label class="w-50" for="password">Password </label>
            </div>
            <div class="form-inline w-100">
              <input type="text" class="form-control w-50" placeholder="Mikrotik uname" id="username" required />
              <input type="password" class="form-control w-50" placeholder="Mikrotik pwd" id="password" />
            </div>
            <div class="form-group text-center m-2">
              <!-- Server Host : <span id="dns-name"><?php if(isset($this->session->hostname)){ echo $this->session->hostname; } else { echo 'MikroTik Server Not Connect'; } ?></span> -->
              <div><b>IP Server Hotspot</b></div><center><input class="form-control w-50 text-center" value="192.168.100.1" id="dns-name" /></center>
            </div>

          <div class="alert alert-success alert-dismissable d-none" id="server-alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Status : <span id="server-status"></span>
          </div>
      </div> <!-- End of Modal Body -->

              <!-- Modal footer -->
              <div class="modal-footer">
                <input class="btn btn-primary w-25" value="Connect" id="mtik-connect" readonly />
                <input class="btn btn-danger w-25" value="Disconnect" id="mtik-disconnect" readonly />
                <input class="btn btn-dark w-25" value="Reset" id="mtik-reset" readonly />
              </div>
            <!-- </form> -->

            </div>
          </div>
        </div>
