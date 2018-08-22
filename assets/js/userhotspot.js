$(function() {
	// create datatable to table rooms
	$('#user-tbl').DataTable()

	// ======================
	// Removing
	// ======================
	$('#user-tbl').on('click', '.user-remove', function() {
		const id = $(this).val()
		const uname = $(this).closest("tr").find('td:eq(2)').text()

		$.ajax({
			type: 'post',
			url: site_url + 'userhotspot/remove',
			data: {id: id, uname: uname},
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
	$('#user-tbl').on('click', '.qrcode-show', function() {
			uname = $(this).closest("tr").find('td:eq(2)').text()
			pwd = $(this).closest("tr").find('td:eq(3)').text()

			$('#qrcode-uname').text(uname)
			$('#qrcode-pwd').text(pwd)

			const dnsName = $('#dns-name').val()
			$('#qrcode').qrcode({
				width: 300,
				height: 300,
				text: 'http://'+dnsName+'/login?username='+uname+'&password='+pwd
			})

			$('#qrcode-modal').modal('show')
			$('#qrcode-modal .modal-title').html('<h4>Just scan your code!</h4>')

			$('#qrcode-modal').on('hidden.bs.modal', function(){
				$('#qrcode-uname').text('')
				$('#qrcode-pwd').text('')
				$('#qrcode').text('')
			})
    })

		$('#qrcode-close').click(function(){
			$('#qrcode-modal').modal('hide')
		})

}) //end file
