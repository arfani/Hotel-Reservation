
<!-- form data tamu -->
  <div class="col-sm-6">
    <div class="col-sm-12 data-tamu rounded">
<div class="form-group">
  <label for="name">Name :</label>
  <input type="text" class="form-control" id="name" name="name" placeholder="e.g: Umar Abdullah" required autofocus/>
</div>
<div class="form-group">
  <label for="id-numb">Number Id :</label>
  <input type="text" class="form-control" id="id-numb" placeholder="e.g: 1234567890"/>
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
  <input type="date" class="form-control" name="birth" id="birth" />
</div>
<div class="form-group">
  <label for="phone">Phone :</label>
  <input type="tel" pattern="^\d{10,12}$" class="form-control" name="phone" id="phone" placeholder="e.g: 081907456710"/>
</div>
<div class="form-group">
  <label for="email">Email :</label>
  <input type="email" class="form-control" name="email" id="email" placeholder="e.g: arfanihidayat@gmail.com"/>
</div>
<div class="form-group">
  <label for="address">Address :</label>
  <textarea rows="4" class="form-control" name="address" id="address" placeholder="e.g: Jl. Beo2 No.22 Karang Kemong, Cakranegara barat, Mataram."></textarea>
</div>
</div>
</div>
<!-- END OF form data tamu -->
