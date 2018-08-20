$(function() {
	// create datatable to table rooms
	$('#guest-tbl').DataTable()

	// btn reset clicked
	// =================
	$('#guest-reset').click(function() {
		$('#id-numb').val(idGuest)
		$('#name').val(name)
		$('#gender').val(gender)
		$('#birth').val(birth)
		$('#phone').val(phone)
		$('#email').val(email)
		$('#address').val(address)
		$('#guest-submit').attr('disabled', false)
		$('#guest-add-alert').addClass('d-none')
		$('#loader-img-guest').addClass('d-none')
	})

	//function when process saving and process ending
	function process() {
		$('#guest-submit').val('Saving...')
		$('#guest-submit').attr('disabled', true)
		$('#loader-img-guest').removeClass('d-none')
		$('#guest-add-alert').addClass('d-none')
	}

	function processEnd() {
		$('#guest-submit').val('Save')
		$('#loader-img-guest').addClass('d-none')
		$('#guest-add-alert').removeClass('d-none')
		$('#guest-modal').on('hidden.bs.modal', function() {
			location.reload()
		})
	}

	$('#guest-submit').click(function() {
		const id = $('#id-numb').val()
		const name = $('#name').val()
		const gender = $('#gender').val()
		const birth = $('#birth').val()
		const phone = $('#phone').val()
		const email = $('#email').val()
		const address = $('#address').val()
		if (id === '') {
			$('#id-numb').focus()
		} else if(name === ''){
			$('#name').focus()
		}
		else{
			process()
			$.ajax({
				type: 'post',
				url: site_url + 'guest/update',
				data: {
					id: id,
					name: name,
					gender: gender,
					birth: birth,
					phone: phone,
					email: email,
					address: address
				},
				success: function(res) {
					if (res == 'success') {
						$('#guest-add-status').html(res + '!<br />Update guest successfuly!')
					} else {
						$('#guest-add-status').html('Unknown error!<br /> No changed!')
					}
					processEnd()
				},
				error: function(jqXHR, exception) {
					let msg = '';
					if (jqXHR.status === 0) {
						msg = 'Not connect.<br />Verify Network.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {
						msg = 'Requested JSON parse failed.';
					} else if (exception === 'timeout') {
						msg = 'Time out error.';
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.<br />' + jqXHR.responseText;
					}
					$('#guest-add-status').html(msg)
					processEnd()
				}
			}) // end ajax
		} // end else if no empty
	}) // end function

	// ======================
	// Removing
	// ======================
	$('#guest-tbl').on('click', '.guest-remove', function() {
		const id = $(this).val()

		$.ajax({
			url: site_url + 'guest/remove/' + id,
			// data: {id: id}, //not required to send id from here bcoz url's ci handle it
			success: function(res) {
				if (res == 'success') {
					location.reload()
				} else {
					alert('Removing guest failed')
				}
			},
			error: function(jqXHR, exception) {
				let msg = '';
				if (jqXHR.status === 0) {
					msg = 'Not connect.<br />Verify Network.';
				} else if (jqXHR.status == 404) {
					msg = 'Requested page not found. [404]';
				} else if (jqXHR.status == 500) {
					msg = 'Internal Server Error [500].';
				} else if (exception === 'parsererror') {
					msg = 'Requested JSON parse failed.';
				} else if (exception === 'timeout') {
					msg = 'Time out error.';
				} else if (exception === 'abort') {
					msg = 'Ajax request aborted.';
				} else {
					msg = 'Uncaught Error.<br />' + jqXHR.responseText;
				}
				alert(msg)
			} //end error
		}) //end ajax

	}) //end function


	// ======================
	// Updating
	// ======================
	// btn update clicked
	// ===============
	$('#guest-tbl').on('click', '.guest-edit', function() {
		$('#guest-modal').modal('show')
		$('#guest-modal .modal-title').html('<h4> Update guest!</h4>')
		// $('#room-reset').hide()
		idGuest = $(this).val()
		name = $(this).closest("tr").find('td:eq(2)').text()
		gender = $(this).closest("tr").find('td:eq(3)').text()
		birth = $(this).closest("tr").find('td:eq(4)').text()
		phone = $(this).closest("tr").find('td:eq(5)').text()
		email = $(this).closest("tr").find('td:eq(6)').text()
		address = $(this).closest("tr").find('td:eq(7)').text()

		$('#id-numb').val(idGuest)
		$('#name').val(name)
		$('#gender').val(gender)
		$('#birth').val(birth)
		$('#phone').val(phone)
		$('#email').val(email)
		$('#address').val(address)

	})


}) //end file
