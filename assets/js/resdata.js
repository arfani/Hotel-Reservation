$(function(){
  $('#resdata-tbl').DataTable()

  // ====================LINKER============
  $('#resdata-add').click(function(){
    location.href = site_url+'reservation'
  })

  let extId=''
  $('.extend').click(function(){
    extId = $(this).val()
    $('#extend-modal').modal({
      backdrop: 'static',
      keyboard: false
    })
  })
  // ====================END LINKER============

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
  }) // end checkout


  // =========
  // Extend
  // =========
  $('#ext-done').click(function(){
    $('#loader-img-ext').removeClass('d-none')
    const extNight = $('#night-ext').val()
    $.ajax({
      type: 'post',
      url: site_url+'resdata/extend',
      data: {id: extId, extNight: extNight},
      success: function(res){
        $('#loader-img-ext').addClass('d-none')
        if(res==='disconnect'){
            alert('There is no connection!')
        }
        // else{
          // alert(res)
        //
        // }
        location.reload()
      },
      error: function (jqXHR, exception) {
        let msg = ''
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
            msg = 'Uncaught Error.<br />' + jqXHR.responseText
        }
        $('#ext-status').html(msg)
        $('#ext-alert').removeClass('d-none')
        $('#loader-img-ext').addClass('d-none')
        $('#extend-modal').on('hidden.bs.modal',function(){
          $('#ext-alert').addClass('d-none')
        })
      }//end error
    })

  })

})//end file
