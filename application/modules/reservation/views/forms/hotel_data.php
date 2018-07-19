<!-- form data kamar / jadwal -->
<div class="col-sm-6">
	<div class="col-sm-12 data-tamu rounded">
		<div class="form-group">
				<label for="room-type">Room type : </label>
				<select class="form-control text-capitalize" name="room-type" id="room-type">
				<?php foreach ($types as $type) { ?>
					<option value="<?php echo $type->type ?>"><?php echo $type->type ?></option>
				<?php } ?>
				</select>
			</div>
		<div class="form-group">
				<label for="room-numb">Room Number : </label>
				<select class="form-control" name="room-numb" id="room-numb">
				</select>
		</div>
		<div class="form-group">
			<label for="name">Date:</label>
			<div class="col-xs-6">
			<input type="date" class="form-control" name="date-from" id="date-from" />
			</div>
		</div>
		<div class="form-group">
			<label for="">Count of day :</label>
			<input type="number" class="form-control" name="days" value="1" id="cod"/>
		</div>

		<div class="form-group">
			<label for="note">Note :</label>
			<textarea rows="4" class="form-control" name="note" id="note" placeholder="Special guest"></textarea>
		</div>

		<!-- buttons -->
		<div class="form-group text-right">
			<button class="btn btn-primary" type="button" id="reservation-submit">Submit</button>
			<button class="btn btn-danger" type="reset" id="reservation-reset">Reset</button>
		</div>
	</div>
</div>
<!-- END OF form data kamar / jadwal -->
