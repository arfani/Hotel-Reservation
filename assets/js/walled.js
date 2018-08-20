$(function() {
	// create datatable to table rooms
	$('#profile-tbl').DataTable()

	let destHost, actionStatus, activeStatus;
  let idWalled = ''
	// ======================
	// Adding
	// ======================
	$('#walled-add').on('click', function() {
		idWalled = ''
		$('#walled-modal').modal('show')
		$('#walled-modal .modal-title').html('<h4> Adding a new Walled Garden!</h4>')
	})

	// btn reset clicked
	// =================
	$('#walled-reset').click(function() {
		if(idWalled==''){
			$('#walled-dst').val('').focus()
			$('#action-allow').prop('checked', true)
			$('#active-enable').prop('checked', true)
			$('#walled-submit').val('Save')
			$('#walled-submit').attr('disabled', false)
			$('#walled-add-alert').addClass('d-none')
			$('#loader-img-walled').addClass('d-none')
		}else{
	    $('#walled-dst').val(destHost)
			$('#action-'+actionStatus).prop('checked', true)
			$('#active-'+activeStatus).prop('checked', true)
			$('#walled-submit').val('Save')
			$('#walled-submit').attr('disabled', false)
			$('#walled-add-alert').addClass('d-none')
			$('#loader-img-walled').addClass('d-none')
		}
	})

	//function when process saving and process ending
	function process() {
		$('#walled-submit').val('Saving...')
		$('#walled-submit').attr('disabled', true)
		$('#walled-add-alert').removeClass('d-none')
		$('#loader-img-walled').removeClass('d-none')
	}

	function processEnd() {
		$('#walled-submit').val('Save')
		$('#walled-submit').attr('disabled', false)
		$('#walled-add-alert').removeClass('d-none')
		$('#loader-img-walled').addClass('d-none')
			$('#walled-modal').on('hidden.bs.modal', function() {
				location.reload()
				$('#walled-reset').trigger('click')
			})
	}

	$('#walled-submit').click(function() {

		const destHost = $('#walled-dst').val()
		const actionStatus = $('input[name="action"]:checked').val()
		const activeStatus = $('input[name="active"]:checked').val()

		const id = idWalled
    const url = (id=='') ? site_url + 'walledgarden/add' : site_url + 'walledgarden/update'
    const action = (id=='') ? 'Adding' : 'Updating'

		if (destHost === ''){
			$('#walled-dst').focus()
		}
		 else {
			process()
			$.ajax({
				type: 'post',
				url: url,
				data: {destHost: destHost, actionStatus: actionStatus, activeStatus: activeStatus, id: id},
				success: function(res) {
					if (res == 'success') {
						$('#walled-add-status').html(res+'!<br />'+action+' walled-garden successfuly!<br />')
					} else {
            $('#walled-add-status').html('Unknown error!<br /> No changed!')
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
					$('#walled-add-status').html(msg)
					processEnd()
				}
			}) // end ajax
		} // end else if no empty
	}) // end function

	// ======================
	// Removing
	// ======================
	$('#walled-tbl').on('click', '.walled-remove', function() {
		const id = $(this).val()

		$.ajax({
			type: 'post',
			url: site_url + 'walledgarden/remove',
			data: {id: id},
			success: function(res) {
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
	$('#walled-tbl').on('click', '.walled-update', function() {
		$('#walled-modal').modal('show')
    $('#walled-modal .modal-title').html('<h4> Update walled garden!</h4>')

    idWalled = $(this).val()
		destHost = $(this).closest("tr").find('td:eq(1)').text()
		actionStatus = $(this).closest("tr").find('td:eq(2)').text()
		activeStatus1 = $(this).closest("tr").find('td:eq(3)').text()
		activeStatus = activeStatus1.trim()

    $('#walled-dst').val(destHost)
		$('#action-'+actionStatus+'').prop('checked', true)
		$('#active-'+activeStatus+'').prop('checked', true)
    $('#walled-modal').on('hidden.bs.modal', function(){
			$('#walled-dst').val('').focus()
			$('#action-allow').prop('checked', true)
			$('#active-enable').prop('checked', true)
			$('#profile-submit').val('Save')
			$('#profile-submit').attr('disabled', false)
			$('#profile-add-alert').addClass('d-none')
			$('#loader-img-profile').addClass('d-none')
    })
	})


}) //end file
