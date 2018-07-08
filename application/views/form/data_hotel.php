<!-- form data kamar / jadwal -->
<div class="col-sm-6">
	<div class="col-sm-12 data-tamu rounded">
		<div class="form-group">
				<label for="room-type">Room type : </label>
				<div class="form-check-inline">
					<label for="premium" class="form-check-label">
					<input type="radio" class="form-check-input" id="premium" name="room-type" value="premium" checked>
					Premium
					</label>
				</div>
				<div class="form-check-inline">
					<label for="budget" class="form-check-label">
					<input type="radio" class="form-check-input" id="budget" name="room-type" value="budget">
					Budget
					</label>
				</div>
				<select class="form-control" name="room-num">
					<option value="prem01">Premium 01</option>
					<option value="prem02">Premium 02</option>
					<option value="prem03">Premium 03</option>
					<option value="prem04">Premium 04</option>
				</select>
			</div>
		<div class="form-group">
			<label for="name">Date:</label>
			<div class="col-xs-6">
			<input type="date" class="form-control" id="date-from" />
			</div>
		</div>
		<div class="form-group">
			<label for="">How much day :</label>
			<input type="number" class="form-control" value="1"/>
		</div>

		<div class="form-group">
			<label for="note">Note :</label>
			<textarea rows="4" class="form-control" id="note"></textarea>
		</div>

		<!-- buttons -->
		<div class="form-group text-right">
			<button class="btn btn-primary" type="submit">Submit</button>
			<button class="btn btn-danger" type="reset">Reset</button>
		</div>
	</div>
</div>
<!-- END OF form data kamar / jadwal -->
