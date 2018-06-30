<!-- Reservation Content -->
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-6" id="form-res">
        <h2>Form Reservation</h2>
        <form action="#">
          <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" class="form-control" id="name" placeholder="e.g : Umar Abdullah" required/>
          </div>
          <div class="form-group">
            <label for="name">Number Id :</label>
            <input type="text" class="form-control" id="name" placeholder="e.g : 1234567890"/>
          </div>

          <label for="">Gender :</label>
          <div class="form-group">
            <div class="form-check-inline">
              <label for="male" class="form-check-label">
                <input type="radio" class="form-check-input" id="male" name="gender" value="male" checked>
                Male
              </label>
          </div>
            <div class="form-check-inline">
              <label for="female" class="form-check-label">
                <input type="radio" class="form-check-input" id="female" name="gender" value="female">
                Female
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="birth">Birthday :</label>
            <input type="date" class="form-control" id="birth" />
          </div>
          <div class="form-group">
            <label for="address">Address :</label>
            <textarea rows="4" class="form-control" id="address"></textarea>
          </div>

          <!-- buttons -->
          <div class="form-group">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-danger" type="reset">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
