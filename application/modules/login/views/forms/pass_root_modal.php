<!-- pop up with The Modal -->
  <div class="modal fade" id="pass-root-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">
            Administrator Authentication
            <span class="la-timer dark text-danger float-right ml-4 d-none" id="loader-img-pass-root">
              <div></div>
            </span>
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <div class="d-flex justify-content-center">
            <div class="form-group">
              <div class="form-inline">
                <label for="password-admin">Admin Password</label>
                <input type="password" class="form-control ml-3" maxlength="16" id="password-admin" required autofocus/>
              </div>
            </div>
          </div>

          <div class="alert alert-success alert-dismissable d-none" id="pass-root-alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Status : <span id="pass-root-status"></span>
          </div>
      </div> <!-- End of Modal Body -->

              <!-- Modal footer -->
              <div class="modal-footer">
                  <input class="btn btn-primary w-100" value="Submit" id="pass-root-submit" readonly />
                  <input class="btn btn-danger w-100" value="Cancel" id="pass-root-cancel" readonly />
              </div>

            </div>
          </div>
        </div>
