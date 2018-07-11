<!-- form data kamar / jadwal -->
<div class="col-sm-6">
	<div class="col-sm-12 data-tamu rounded">
		<div class="form-group">
				<label for="room-type">Room type : </label>
				<select class="form-control" name="room-type" id="room-type">
					<?php foreach ($types as $type) {
							echo "<option value=".$type->type.">".$type->type."</option>";
					} ?>

				</select>
			</div>
		<div class="form-group">
				<label for="room-numb">Room type : </label>
				<select class="form-control" name="room-numb" id="room-numb">
					<option value="prem01">101</option>
					<option value="prem02">102</option>
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
			<textarea rows="4" class="form-control" name="note" id="note"></textarea>
		</div>

		<!-- buttons -->
		<div class="form-group text-right">
			<button class="btn btn-primary" type="button" id="reservation-submit">Submit</button>
			<button class="btn btn-danger" type="reset">Reset</button>
		</div>
	</div>
</div>
<!-- END OF form data kamar / jadwal -->
