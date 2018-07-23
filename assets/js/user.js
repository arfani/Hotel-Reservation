// move all user js here when done from main.js

  // =================================================
  // user js
  // =================================================
  $('#user-tbl').DataTable()

    // ======================
    // Adding
    // ======================
  $('#user-add').click(function(){
    $('#pass-root-modal').modal({
      backdrop: 'static',
      keyboard: false
    })
    $('#pass-root-alert').addClass('d-none')
  })

  // ======================
  // Removing
  // ======================
  $('.user-remove').click(function() {
    const id = $(this).val()

    $.ajax({
      url: site_url + 'user/remove/' + id,
      // data: {id: id}, //not required to send id from here bcoz url's ci handle it
      success: function(res) {
        if (res == 'success') {
          location.reload()
        } else {
          alert('Removing user failed')
        }
      },
      error: function(jqXHR, exception) {
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
        alert(msg)
      } //end error
    }) //end ajax
  }) //end function


    // ======================
  	// Updating
  	// ======================
  	// btn update clicked
  	// ===============
  	$('#user-pwd-update').on('click', function() {
  		$('#user-pwd-update-modal').modal('show')

      $('#user-pwd-update-modal').on('hidden.bs.modal', function(){
        $('#pwd-update-reset').trigger('click')
      })
  	})

    $('#pwd-update-reset').click(function(){
      $('#cur-pwd').val('')
      $('#new-pwd').val('')
      $('#reenter-new-pwd').val('')
      $('#cur-pwd').focus()
      $('#loader-img-pwd-update').addClass('d-none')
      $('#pwd-update-alert').addClass('d-none')
      $('#pwd-update-submit').html('Save')
      $('#pwd-update-submit').attr('disabled', false)
    })

    function processUpdateEnd(){
      $('#pwd-update-alert').removeClass('d-none')
      $('#loader-img-pwd-update').addClass('d-none')
      $('#pwd-update-submit').text('Save')
      $('#pwd-update-submit').attr('disabled', false)
    }

    function processUpdate(){
      $('#pwd-update-submit').text('Saving...')
      $('#pwd-update-submit').attr('disabled', true)
      $('#loader-img-pwd-update').addClass('d-none')
      $('#pwd-update-alert').addClass('d-none')
    }

    function fieldEmpty(){
      $('#pwd-update-alert').html('<div class="text-danger text-uppercase">Field cannot be empty !!!</div>')
      $('#pwd-update-alert').removeClass('d-none')
      $('#pwd-update-submit').attr('disabled', false)
    }

    $('#pwd-update-submit').click(function(){
      processUpdate()

      const curPwd = $('#cur-pwd').val()
      const newPwd = $('#new-pwd').val()
      const reNewPwd = $('#reenter-new-pwd').val()

      if(curPwd == ''){
        $('#cur-pwd').focus()
        fieldEmpty()
      }else if(newPwd == ''){
        $('#new-pwd').focus()
        fieldEmpty()
      }else if(reNewPwd == ''){
        $('#reenter-new-pwd').focus()
        fieldEmpty()
      }else if(newPwd !== reNewPwd){
        $('#reenter-new-pwd').focus()
        $('#pwd-update-alert').html('<div class="text-danger text-uppercase">The new password not match !!!</div>')
        $('#pwd-update-alert').removeClass('d-none')
        $('#pwd-update-submit').attr('disabled', false)
      }else{
        $.ajax({
          type: 'post',
          url: site_url+'user/update',
          data: {curPwd: curPwd, newPwd: newPwd},
          success: function(res){
            if(res=='success'){
              $('#pwd-update-alert').html(res+'<br />Your password updated')
              processUpdateEnd()
            }else if(res=='unauthenticated'){
              $('#pwd-update-alert').html('<div class="text-danger">'+res+'<br />Your password not updated</div>')
              processUpdateEnd()
            }else{
              $('#pwd-update-alert').html('<div class="text-danger">'+res+' unknown error.<br />Your password not updated</div>')
              processUpdateEnd()
            }
          },
          error: function(jqXHR, exception) {
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
            $('#pwd-update-alert').html(msg)
          } //end error
        })//end ajax
      }//end if else
    })//end function

    // ===============================
    // END of user js
    // ===============================
