$(function() {
	// create datatable to table rooms
	$('#user-tbl').DataTable()

	// ======================
	// Removing
	// ======================
	$('.user-remove').click(function() {
		const id = $(this).val()

		$.ajax({
			type: 'post',
			url: site_url + 'userhotspot/remove',
			data: {id: id},
			success: function(res) {
				// alert('User removed.')
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
	// Showing
	// ======================
	$('.qrcode-show').on('click', function() {
			const dnsName = $('#dns-name').text()
			uname = $(this).closest("tr").find('td:eq(2)').text()
			pwd = $(this).closest("tr").find('td:eq(3)').text()

			$('#qrcode-modal').modal('show')
	    $('#qrcode-modal .modal-title').html('<h4>Just scan your code!</h4>')

			$('#qrcode-uname').text(uname)
			$('#qrcode-pwd').text(pwd)
			$('#qrcode').qrcode({
				width: 300,
				height: 300,
				text: 'http://'+dnsName+'/login?username='+uname+'&password='+pwd
			})

			$('#qrcode-modal').on('hidden.bs.modal', function(){
				$('#qrcode-uname').text('')
				$('#qrcode-pwd').text('')
				$('#qrcode').text('')
			})
    })

}) //end file
