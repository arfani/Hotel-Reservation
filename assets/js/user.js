$(function() {
	// create datatable to table rooms
	$('#user-tbl').DataTable()

	let numb, type, annotation;
	// ======================
	// Adding
	// ======================
	// btn add clicked
	// ===============
	$('#room-add').on('click', function() {
		$('#room-modal').modal('show')
    $('#room-modal .modal-title').html('<h4> Add a new room!</h4>')
    idRoom = $(this).val()
	})

	// btn reset clicked
	// =================
	$('#room-reset').click(function() {
		if(idRoom==''){
			$('#room-numb').val('').focus()
			$('#room-type').val('premium')
			$('#annotation').val('')
			$('#room-submit').attr('disabled', false)
			$('#room-add-alert').addClass('d-none')
			$('#loader-img-room').addClass('d-none')
		}else{
	    $('#room-numb').val(numb)
	    $('#room-type').val(type)
	    $('#annotation').val(annotation)
			$('#room-submit').attr('disabled', false)
			$('#room-add-alert').addClass('d-none')
			$('#loader-img-room').addClass('d-none')
		}
	})

	//function when process saving and process ending
	function process() {
		$('#room-submit').val('Saving...')
		$('#room-submit').attr('disabled', true)
		$('#loader-img-room').removeClass('d-none')
		$('#room-add-alert').addClass('d-none')
	}

	function processEnd() {
		$('#room-submit').val('Save')
		$('#loader-img-room').addClass('d-none')
		$('#room-add-alert').removeClass('d-none')
		$('#room-modal').on('hidden.bs.modal', function() {
			location.reload()
			$('#room-reset').trigger('click')
		})
	}

	$('#room-submit').click(function() {
		//get room data
		const numb = $('#room-numb').val()
		const type = $('#room-type').val()
		const annotation = $('#annotation').val()
    //for update
		const id = idRoom
    const url = (id=='') ? site_url + 'rooms/add' : site_url + 'rooms/update'
    const action = (id=='') ? 'Adding' : 'Updating'

		if (numb === '') {
			$('#room-numb').focus()
		} else {
			process()
			$.ajax({
				type: 'post',
				url: url,
				data: {
          id: id,
					numb: numb,
					type: type,
					annotation: annotation
				},
				success: function(res) {
					if (res == 'success') {
						$('#room-add-status').html(res+'!<br />'+action+' room successfuly!')
					} else if (res == 'duplicate'){
						$('#room-add-status').html(res+'!<br />Room number is exist!')
            $('#room-numb').select()
            $('#room-submit').attr('disabled', false)
					} else {
            $('#room-add-status').html('Unknown error!<br /> No changed!')
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
					$('#room-add-status').html(msg)
					processEnd()
				}
			}) // end ajax
		} // end else if no empty
	}) // end function

	// ======================
	// Removing
	// ======================
	$('.room-remove').click(function() {
		const id = $(this).val()

		$.ajax({
			url: site_url + 'rooms/remove/' + id,
			// data: {id: id}, //not required to send id from here bcoz url's ci handle it
			success: function(res) {
				if (res == 'success') {
          location.reload()
				} else {
					alert('Removing room failed')
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
	$('.room-edit').on('click', function() {
		$('#room-modal').modal('show')
    $('#room-modal .modal-title').html('<h4> Update room!</h4>')
    // $('#room-reset').hide()
    idRoom = $(this).val()
		numb = $(this).closest("tr").find('td:eq(1)').text()
		type = $(this).closest("tr").find('td:eq(2)').text()
		annotation = $(this).closest("tr").find('td:eq(3)').text()

    $('#room-numb').val(numb)
    $('#room-type').val(type)
    $('#annotation').val(annotation)
    $('#room-modal').on('hidden.bs.modal', function(){
      $('#room-reset').trigger('click')
    })
	})


}) //end file
