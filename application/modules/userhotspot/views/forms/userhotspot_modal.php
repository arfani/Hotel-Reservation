<!-- pop up with The Modal -->
  <div class="modal fade" id="userhotspot-modal">
    <div class="modal-dialog modal-dialog-centered modal">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Title</h4>
          <span class="la-timer dark text-danger float-right ml-4 d-none" id="loader-img-hotspot">
            <div></div>
          </span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <!-- <div class="d-flex justify-content-left"> -->
            <div class="form-group">
              <label for="profile-name">Name</label>
              <input id="profile-name" type="text" class="form-control" name="profile-name" placeholder="Profile name" autofocus required />
            </div>
          <!-- </div> -->
          <!-- <div class="d-flex justify-content-left"> -->
              <div class="form-group">
                <label for="profile-shared-users">Shared Users</label>
                <input id="profile-shared-users" type="number" min=1 class="form-control" name="profile-shared-users" value="1" required />
              </div>
          <!-- </div> -->
          <!-- <div class="d-flex justify-content-left"> -->
              <div class="form-group">
                <label for="profile-rate-limit">Rate Limit (Rx/Tx)</label>
                <input id="profile-rate-limit" type="text" placeholder="20m/10m" class="form-control" name="profile-rate-limit" required />
              </div>
          <!-- </div> -->
          <div class="col-sm-12">
            <div class="alert alert-success alert-dismissable mt-2 d-none" id="profile-add-alert">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              Status : <span id="profile-add-status"></span>
            </div>
          </div>

      </div> <!-- End of Modal Body -->

        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="button" class="btn btn-primary w-100" value="Save" id="profile-submit"/>
          <input type="button" class="btn btn-danger w-100" value="Reset" id="profile-reset" />
        </div>

      </div>
    </div>
  </div>
