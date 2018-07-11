<!-- form data kamar / jadwal -->
<div class="col-sm-6">
	<div class="col-sm-12 data-tamu rounded">
		<div class="form-group">
				<label for="room-type">Room type : </label>
				<select class="form-control" name="room-type" id="room-type">
					<option value="Premium">Premium</option>
					<option value="Budget">Budget</option>
				</select>
			</div>
		<div class="form-group">
				<label for="room-numb">Room Number : </label>
				<select class="form-control" name="room-numb" id="room-numb">
					<option value="101">101</option>
					<option value="102">102</option>
					<option value="103">103</option>
					<option value="104">104</option>
					<option value="105">105</option>
				</select>
		</div>
		<div class="form-group">
			<label for="name">Date:</label>
			<div class="col-xs-6">
			<input type="date" class="form-control" name="date-from" id="date-from" />
			</div>
		</div>
		<div class="form-group">
			<label for="">Number of day :</label>
			<input type="number" class="form-control" name="days" value="1"/>
		</div>

		<div class="form-group">
			<label for="note">Note :</label>
			<textarea rows="4" class="form-control" name="note" id="note" placeholder="Special guest"></textarea>
		</div>

		<!-- buttons -->
		<div class="form-group text-right">
			<button class="btn btn-primary" type="button" id="reservation-submit">Submit</button>
			<button class="btn btn-danger" type="reset">Reset</button>
		</div>
	</div>
</div>
<!-- END OF form data kamar / jadwal -->
