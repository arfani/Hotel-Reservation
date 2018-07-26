<!-- pop up with The Modal -->
  <div class="modal fade" id="walled-modal">
    <div class="modal-dialog modal-dialog-centered modal">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Title</h4>
          <span class="la-timer dark text-danger float-right ml-4 d-none" id="loader-img-walled">
            <div></div>
          </span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group w-100">
              <label for="walled-dst" class="w-100 text-center">Destination</label>
              <input id="walled-dst" type="text" class="form-control" name="walled-dst" placeholder="www.jazzsenggigihotel.com" autofocus required />
            </div>
              <div class="form-inline w-100 bg-light rounded border-right-danger">
                <label for="walled-action" class="w-50" style="justify-content: left;">Action Status</label>
                <label for="walled-active" class="w-50" style="justify-content: left;">Active Status</label>
              </div>
              <div class="form-inline w-100 bg-light rounded">
                <span id="walled-action" class="w-50">
                <input id="action-allow" type="radio" name="action" value="allow" checked/><span class="mr-2">Allow</span>
                <input id="action-deny" type="radio" name="action" value="deny" /><span>Deny</span>
              </span>
              <span id="walled-active" class="w-50">
                <input id="active-enabled" type="radio" name="active" value="no" checked/><span class="mr-2">Enable</span>
                <input id="active-disabled" type="radio" name="active" value="yes" /><span>Disable</span>
              </span>
              </div>

          <div class="col-sm-12">
            <div class="alert alert-success alert-dismissable mt-2 d-none" id="walled-add-alert">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              Status : <span id="walled-add-status"></span>
            </div>
          </div>

      </div> <!-- End of Modal Body -->

        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="button" class="btn btn-primary w-100" value="Save" id="walled-submit"/>
          <input type="button" class="btn btn-danger w-100" value="Reset" id="walled-reset" />
        </div>

      </div>
    </div>
  </div>
