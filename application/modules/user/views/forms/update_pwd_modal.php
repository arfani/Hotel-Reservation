<!-- pop up with The Modal -->
  <div class="modal fade" id="user-pwd-update-modal">
    <div class="modal-dialog modal-dialog-centered modal">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update your password!</h4>
          <span class="la-timer dark text-danger float-right ml-4 d-none" id="loader-img-pwd-update">
            <div></div>
          </span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
              <label for="cur-pwd">Current Password </label>
              <input id="cur-pwd" type="password" class="form-control" placeholder="Enter your current password" name="cur-pwd" autofocus required />
            </div>
            <div class="form-group">
              <label for="new-pwd">New Password </label>
              <input id="new-pwd" type="password" class="form-control" placeholder="Enter new password" name="new-pwd" required />
            </div>
            <div class="form-group">
              <label for="reenter-new-pwd">Re-enter new password </label>
              <input id="reenter-new-pwd" type="password" class="form-control" placeholder="Re-enter new password" name="reenter-new-pwd" required />
            </div>

          <div class="col-sm-12">
            <div class="alert alert-success alert-dismissable mt-2 d-none" id="pwd-update-alert">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              Status : <span id="pwd-update-status"></span>
            </div>
          </div>

      </div> <!-- End of Modal Body -->

        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="button" class="btn btn-primary w-100" value="Save" id="pwd-update-submit"/>
          <input type="button" class="btn btn-danger w-100" value="Reset" id="pwd-update-reset" />
        </div>

      </div>
    </div>
  </div>
