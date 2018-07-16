<!-- pop up with The Modal -->
  <div class="modal fade" id="login-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Authentication Employee <span class="la-timer dark text-danger float-right ml-4 d-none" id="loader-img-login"><div></div></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="d-flex justify-content-center">
            <div class="form-group">
              <div class="form-inline">
                <label for="username-emp">Username </label>
                <input class="form-control" placeholder="Employee uname" id="username-emp" required autofocus/>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="form-group">
              <div class="form-inline">
                <label for="password-emp">Password </label>
                <input type="password" class="form-control" maxlength="16" placeholder="Employee pwd" id="password-emp" required />
              </div>
            </div>
          </div>

          <div class="alert alert-success alert-dismissable d-none" id="login-alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Login Status : <span id="login-status"></span>
          </div>
      </div> <!-- End of Modal Body -->

              <!-- Modal footer -->
              <div class="modal-footer">
                <input class="btn btn-primary" value="Login" id="login-submit" readonly />
                <input class="btn btn-danger" value="Reset" id="login-reset" readonly />
              </div>

            </div>
          </div>
        </div>
