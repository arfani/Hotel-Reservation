<!-- form data kamar / jadwal -->
<div class="col-sm-12 col-md-6">
	<div class="col-sm-12 data-tamu rounded">
		<div class="form-group">
			<label for="night">Night</label>
			<input type="number" class="form-control" name="night" value="1" min=1 id="night" />
		</div>
		<div class="form-inline mb-2">
			<label for="arrival-date" class="w-50" style="justify-content: left;">Arrival Date </label>
			<label for="departure-date" class="w-50" style="justify-content: left;">Departure Date </label>
		</div>
		<div class="form-inline mb-3">
			<input type="date" class="w-50 form-control" name="arrival-date" id="arrival-date" />
			<input type="date" class="w-50 form-control" name="departure-date" id="departure-date" disabled/>
		</div>
		<div class="form-group">
			<label for="room-type">Room type</label>
			<select class="form-control text-capitalize" name="room-type" id="room-type">
				<?php foreach ($types as $type) { ?>
					<option value="<?php echo $type->type ?>"><?php echo $type->type ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label for="room-numb">Room Number</label>
			<select class="form-control" name="room-numb" id="room-numb">
				</select>
		</div>
		<div class="form-inline">
			<label for="adult" class="w-50" style="justify-content: left">Adult</label>
			<label for="child" class="w-50" style="justify-content: left">Child</label>
		</div>
		<div class="form-inline">
			<input type="number" class="w-50 form-control" name="adult" min=1 value="1" id="adult" />
			<input type="number" class="w-50 form-control" name="child" min=0 value="0" id="child" />
		</div>

		<!-- buttons -->
		<div class="form-group text-center mt-3">
			<button class="form-inline btn btn-primary font-weight-bold w-25" type="button" id="reservation-submit">Submit</button>
			<button class="form-inline btn btn-danger font-weight-bold w-25" type="reset" id="reservation-reset">Reset</button>
		</div>
	</div>
</div>
<!-- END OF form data kamar / jadwal -->
