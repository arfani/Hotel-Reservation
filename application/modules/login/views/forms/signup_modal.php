<!-- pop up with The Modal -->
  <div class="modal fade" id="signup-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title w-100">
              Create a new user!
            </h4>
            <span class="la-timer dark text-danger float-right ml-4 d-none" id="loader-img-signup">
              <div></div>
            </span>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <!-- <div class="d-flex justify-content-center"> -->
            <div class="form-group">
              <!-- <div class="form-inline"> -->
                <label for="new-name">Name </label>
                <input class="form-control" placeholder="Full name" id="new-name" required autofocus/>
              <!-- </div> -->
            </div>
          <!-- </div> -->
          <!-- <div class="d-flex justify-content-center"> -->
            <div class="form-group">
              <!-- <div class="form-inline"> -->
                <label for="new-username">Username </label>
                <input class="form-control" placeholder="username" id="new-username" required/>
              <!-- </div> -->
            </div>
          <!-- </div> -->
          <!-- <div class="d-flex justify-content-center"> -->
            <div class="form-group">
              <!-- <div class="form-inline"> -->
                <label for="new-password">Password </label>
                <input type="password" class="form-control" maxlength="16" placeholder="Password" id="new-password" required />
              <!-- </div> -->
            </div>
          <!-- </div> -->
          <!-- <div class="d-flex justify-content-center"> -->
            <div class="form-group">
              <!-- <div class="form-inline"> -->
                <label for="new-level">Level </label>
                <select class="form-control" name="lvl" id="new-level">
                    <option value="administrator">Administrator</option>
                    <option value="operator">Operator</option>
                </select>
              <!-- </div> -->
            </div>
          <!-- </div> -->



          <div class="alert alert-success alert-dismissable d-none" id="signup-alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Status : <span id="signup-status"></span>
          </div>
      </div> <!-- End of Modal Body -->

              <!-- Modal footer -->
              <div class="modal-footer">
                <div class="row">
                  <div class="col-sm-12">
                    <input class="btn btn-primary" value="Register" id="signup-submit" readonly />
                    <input class="btn btn-danger" value="Reset" id="signup-reset" readonly />
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
