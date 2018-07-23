$(function(){
  $('#resdata-tbl').DataTable()

  $('#resdata-add').click(function(){
    location.href = site_url+'reservation'
  })

  // =========
  // Check-out
  // =========
  $('.check-out').click(function(){
    // debugger
    const id = $(this).val()
    $.ajax({
      url: site_url+'resdata/check_out/'+id,
      success: function(res){
          location.reload()
          // console.log(res) // use this when error
          if(res === 'disconnect'){
            alert('There is no connection to MikroTik Server!')
          }
      },
      error: function (jqXHR, exception) {
      let msg = '';
      if (jqXHR.status === 0) {
          msg = 'Not connect.<br />Verify Network.'
      } else if (jqXHR.status == 404) {
          msg = 'Requested page not found. [404]'
      } else if (jqXHR.status == 500) {
          msg = 'Internal Server Error [500].'
      } else if (exception === 'parsererror') {
          msg = 'Requested JSON parse failed.'
      } else if (exception === 'timeout') {
          msg = 'Time out error.'
      } else if (exception === 'abort') {
          msg = 'Ajax request aborted.'
      } else {
          msg = 'Uncaught Error.<br />' + jqXHR.responseText;
      }
      console.log(msg)
      }
    }) //end ajax
  })
})
