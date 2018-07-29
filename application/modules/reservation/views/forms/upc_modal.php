<!-- pop up with The Modal -->
  <div class="modal fade" id="upc-modal">
    <div class="modal-dialog modal-dialog-centered moda">
      <div class="modal-content bg-light">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold mr-auto">
            Changing Username/Password Voucher
          </h5>
          <span class="la-timer dark text-danger float-right ml-4 d-none" id="loader-img-upc">
            <div></div>
          </span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
          <input type="hidden" name="id" value="">
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="form-group w-50">
                <label for="upc-uname-option">Username</label>
                <select class="form-control" name="upc-uname-option" id="upc-uname-option" autofocus>
                  <option value="guest-name">Name</option>
                  <option value="guest-id">KTP/Passport</option>
                  <option value="guest-phone">Phone</option>
                  <option value="guest-email">Email</option>
                </select>
              </div>
              <div class="form-group w-25 ml-3">
                <label for="digit">Digit</label>
                <input class="form-control" type="number" id="digit-uname" />
              </div>
              <div class="form-group w-50">
                <label for="upc-pwd-option">Password</label>
                <select class="form-control" name="upc-pwd-option" id="upc-pwd-option">
                  <option value="guest-name">Name</option>
                  <option value="guest-id" checked>KTP/Passport</option>
                  <option value="guest-phone">Phone</option>
                  <option value="guest-email">Email</option>
                </select>
              </div>
              <div class="form-group w-25 ml-3">
                <label for="digit">Digit</label>
                <input class="form-control" type="number" id="digit-pwd" />
              </div>
            </div>
          </div>
      </div> <!-- End of Modal Body -->

        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="form-group font-weight-bold w-100 text-center">
          <span class="form-control btn btn-info font-weight-bold w-75" id="upc-done"/>
          Done
        </span>
          </div>
        </div>

      </div>
    </div>
  </div>
