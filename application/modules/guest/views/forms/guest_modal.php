<!-- pop up with The Modal -->
  <div class="modal fade" id="guest-modal">
    <div class="modal-dialog modal-dialog-centered modal">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update guest!</h4>
          <span class="la-timer dark text-danger float-right ml-4 d-none" id="loader-img-guest">
            <div></div>
          </span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label for="id-numb">KTP/Passport Number</label>
            <input type="text" class="form-control" id="id-numb" placeholder="1234567890" disabled/>
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Umar Abdullah"/>
          </div>
          <div class="form-inline">
            <label for="gender" class="w-50" style="justify-content:left;">Gender</label>
            <label for="birth" class="w-50" style="justify-content:left;">Date of Birth</label>
          </div>
          <div class="form-inline mb-3">
            <select class="form-control w-25 mr-auto" name="gender" id="gender">
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
            <input type="date" value="1993-05-01" class="form-control w-50" name="birth" id="birth" />
          </div>
          <div class="form-inline">
            <label for="phone" class="w-50" style="justify-content:left;">Phone</label>
            <label for="email" class="w-50" style="justify-content:left;">Email</label>
          </div>
          <div class="form-inline mb-2">
            <input type="tel" class="form-control w-50" pattern="^\d{10,12}$" name="phone" id="phone" placeholder="081907456710"/>
            <input type="email" class="form-control w-50" name="email" id="email" placeholder="arfanihidayat@gmail.com"/>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <textarea rows="4" class="form-control" name="address" id="address" placeholder="LOMBOK, MATARAM."></textarea>
          </div>
          <div class="col-sm-12">
            <div class="alert alert-success alert-dismissable mt-2 d-none" id="guest-add-alert">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              Status : <span id="guest-add-status"></span>
            </div>
          </div>

      </div> <!-- End of Modal Body -->

        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="button" class="btn btn-primary w-100" value="Save" id="guest-submit"/>
          <input type="button" class="btn btn-danger w-100" value="Reset" id="guest-reset" />
        </div>

      </div>
    </div>
  </div>
