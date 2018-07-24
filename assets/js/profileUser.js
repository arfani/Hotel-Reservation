$(function() {
	// create datatable to table rooms
	$('#profile-tbl').DataTable()

	let name, sharedUsers, rateLimit;
  let idProf = ''
	// ======================
	// Adding
	// ======================
	$('#profile-add').on('click', function() {
		idProf = ''
		$('#profile-modal').modal('show')
		$('#profile-modal .modal-title').html('<h4> Adding a new profile!</h4>')
	})

	// btn reset clicked
	// =================
	$('#profile-reset').click(function() {
		if(idProf==''){
			$('#profile-name').val('').focus()
			$('#profile-shared-users').val(1)
			$('#profile-rate-limit').val('')
			$('#profile-submit').val('Save')
			$('#profile-submit').attr('disabled', false)
			$('#profile-add-alert').addClass('d-none')
			$('#loader-img-profile').addClass('d-none')
		}else{
	    $('#profile-name').val(name)
	    $('#profile-shared-users').val(sharedUsers)
	    $('#profile-rate-limit').val(rateLimit)
			$('#profile-submit').val('Save')
			$('#profile-submit').attr('disabled', false)
			$('#profile-add-alert').addClass('d-none')
			$('#loader-img-profile').addClass('d-none')
		}
	})

	//function when process saving and process ending
	function process() {
		$('#profile-submit').val('Saving...')
		$('#profile-submit').attr('disabled', true)
		$('#profile-add-alert').removeClass('d-none')
		$('#loader-img-profile').removeClass('d-none')
	}

	function processEnd() {
		$('#profile-submit').val('Save')
		$('#profile-submit').attr('disabled', false)
		$('#profile-add-alert').removeClass('d-none')
		$('#loader-img-profile').addClass('d-none')
			$('#profile-modal').on('hidden.bs.modal', function() {
				location.reload()
				$('#profile-reset').trigger('click')
			})
	}

	$('#profile-submit').click(function() {

		const name = $('#profile-name').val()
		const sharedUsers = $('#profile-shared-users').val()
		const rateLimit = $('#profile-rate-limit').val()

		const id = idProf
    const url = (id=='') ? site_url + 'profileuser/add' : site_url + 'profileuser/update'
    const action = (id=='') ? 'Adding' : 'Updating'

		if (name === ''){
			$('#profile-name').focus()
		} else if (sharedUsers === '') {
			$('#profile-rate-limit').focus()
		}else if(rateLimit === ''){
			$('#profile-rate-limit').focus()
		}
		 else {
			process()
			$.ajax({
				type: 'post',
				url: url,
				data: {name: name, sharedUsers: sharedUsers, rateLimit: rateLimit, id: id},
				success: function(res) {
					if (res == 'success') {
						$('#profile-add-status').html(res+'!<br />'+action+' profile successfuly!<br />'+
						'<b>Note : Won\'t added or updated if rate-limit isn\'t like the pattern!</b>')
					} else {
            $('#profile-add-status').html('Unknown error!<br /> No changed!')
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
						msg = 'Internal Server Error [500].<br />Room number duplicate!';
					} else if (exception === 'parsererror') {
						msg = 'Requested JSON parse failed.';
					} else if (exception === 'timeout') {
						msg = 'Time out error.';
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.<br />' + jqXHR.responseText;
					}
					$('#profile-add-status').html(msg)
					processEnd()
				}
			}) // end ajax
		} // end else if no empty
	}) // end function

	// ======================
	// Removing
	// ======================
	$('.profile-remove').click(function() {
		const id = $(this).val()

		$.ajax({
			type: 'post',
			url: site_url + 'profileuser/remove',
			data: {id: id},
			success: function(res) {
				alert('Profile removed.');
				location.reload()
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
	$('.profile-edit').on('click', function() {
		$('#profile-modal').modal('show')
    $('#profile-modal .modal-title').html('<h4> Update profile!</h4>')

    idProf = $(this).val()
		name = $(this).closest("tr").find('td:eq(1)').text()
		sharedUsers = $(this).closest("tr").find('td:eq(2)').text()
		rateLimit = $(this).closest("tr").find('td:eq(3)').text()

    $('#profile-name').val(name)
    $('#profile-shared-users').val(sharedUsers)
    $('#profile-rate-limit').val(rateLimit)
    $('#profile-modal').on('hidden.bs.modal', function(){
			$('#profile-name').val('').focus()
			$('#profile-shared-users').val(1)
			$('#profile-rate-limit').val('')
			$('#profile-submit').val('Save')
			$('#profile-submit').attr('disabled', false)
			$('#profile-add-alert').addClass('d-none')
			$('#loader-img-profile').addClass('d-none')
    })
	})


}) //end file
