$(document).ready(function(){
    //tooltip
    $('[data-toggle="tooltip"]').tooltip()

    // Get current date
    Date.prototype.toDateInputValue = (function() {
        var local = new Date(this)
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset())
        return local.toJSON().slice(0,10)
    })

    // Every time a modal is shown, if it has an autofocus element, focus on it.
    $('.modal').on('shown.bs.modal', function() {
      $(this).find('[autofocus]').focus()
    })

  // =======================
  // Login User
  // =======================
    function loginProcess(){
      $('#login-submit').val('Processing...')
      $('#login-submit').attr('disabled', true)
      $('#loader-img-login').removeClass('d-none')
      $('#login-reset').attr('disabled', true)
      // $('#login-alert').removeClass('d-block')
      $('#login-alert').addClass('d-none')
    }

    function loginProcessEnd(){
      $('#login-submit').val('Login')
      $('#login-submit').attr('disabled', false)
      $('#loader-img-login').addClass('d-none')
      $('#login-reset').attr('disabled', false)
      $('#login-alert').removeClass('d-none')
      // $('#login-alert').addClass('d-block')
    }

    $('#login-reset').click(function(){
      $('#username-emp').val('').focus()
      $('#password-emp').val('')
      // $('#login-alert').removeClass('d-block')
      $('#login-alert').addClass('d-none')
    })

    // add below what you gonna hide when no login
    // const masterData = $('#master-data-container').children().detach()

    // ===========================================

    $('#login-submit').click(function(){ //submit user login
      loginProcess()
      const uname = $('#username-emp').val()
      const pwd = $('#password-emp').val()

      $.ajax({
        type: 'post',
        url: site_url+'login/auth',
        data: {uname: uname, pwd: pwd},
        success: function(res){
          if (res == 'administrator') {
            $('#login-status').html('Success<br /> You\'re loged in as '+res+'!')
            location.reload()
          } else if (res == 'operator') {
            $('#login-status').html('Success<br /> You\'re loged in as '+res+'!')
            location.reload()
          } else {
             $('#login-status').html(res)
           }
          loginProcessEnd()
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
        $('#login-status').html(msg)
        loginProcessEnd()
        }
      })
    }) // end function

    // ==================
    // End login function
    // ==================


  // =======================
  // Sign up user
  // =======================

      // auth admin first...
      // =====================
      $('#create-new-user').click(function(){
        $('#signin-modal').modal('hide')
        $('#pass-root-modal').modal({
          backdrop: 'static',
          keyboard: false
        })
        $('#pass-root-alert').addClass('d-none')
      })

      // cancel create new user and back to sign in auth...
      // ==================================================
      $('#pass-root-cancel').click(function(){
        $('#pass-root-modal').modal('hide')
        $('#signin-modal').modal({
          backdrop: 'static',
          keyboard: false
        })
      })

      // functions properties in auth admin modal
      // =======================================
      function adminAuthProcEnd(){
        $('#pass-root-alert').removeClass('d-none')
        $('#loader-img-pass-root').addClass('d-none')
        $('#password-admin').val('')
      }

      function adminAuthProc(){
        $('#pass-root-alert').addClass('d-none')
        $('#loader-img-pass-root').removeClass('d-none')
      }

      // submit auth admin
      // =================
      $('#pass-root-submit').click(function(){
        const pwd = $('#password-admin').val()
        adminAuthProc()

        $.ajax({
          type: 'post',
          url: site_url+'login/auth_admin',
          data: {pwd: pwd},
          success: function(res){
            if (res == 'authenticated') {
              $('#pass-root-status').html(res)

              //notif on create new user modal
              $('#signup-modal .modal-title').html("<h6 class='alert alert-success w-100'>Authenticated successfuly!</h6>")
              setTimeout(function(){
                $('#signup-modal .modal-title').html("Create a new user!")
              },5000)

              $('#pass-root-modal').modal('hide')
              $('#signup-modal').modal({
                backdrop: 'static',
                keyboard: false
              })

              $('#signup-modal').on('hidden.bs.modal', function(){
                location.reload()
              })
              adminAuthProcEnd()
            } else {
              $('#pass-root-status').html(res)
              adminAuthProcEnd()
            }
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
          $('#pass-root-status').html(msg)
          adminAuthProcEnd()
          }
        })

      }) // end function auth admin

      // functions properties in create a new user modal
      // ===============================================
      function createUserProcEnd(){
        $('#signup-submit').text('Register')
        $('#signup-alert').removeClass('d-none')
        $('#loader-img-signup').addClass('d-none')
      }

      function createUserProc(){
        $('#signup-submit').text('Registering...')
        $('#signup-submit').attr('disabled', true)
        $('#signup-alert').addClass('d-none')
        $('#loader-img-signup').removeClass('d-none')
      }

      function whenEmpty(){
        $('#loader-img-signup').addClass('d-none')
        $('#signup-alert').addClass('d-none')
      }

      function reset(){
        $('#new-name').val('').focus()
        $('#new-username').val('')
        $('#new-password').val('')
        $('#new-level').val('administrator')
        $('#signup-submit').attr('disabled', false)
        whenEmpty()
      }

      // when signup-reset click
      $('#signup-reset').click(function(){
        reset()
      })

      $('#new-name').keyup(function(){
        $(this).val($(this).val().toUpperCase())
      })

      // submit create user
      // ==================
      $('#signup-submit').click(function(){
        createUserProc()

        const name = $('#new-name').val()
        const uname = $('#new-username').val()
        const pwd = $('#new-password').val()
        const lvl = $('#new-level').val()

        if(name === ''){
          $('#new-name').focus()
          whenEmpty()
        }else if (uname === '') {
          $('#new-username').focus()
          whenEmpty()
        }else if (pwd === '') {
          $('#new-password').focus()
          whenEmpty()
        }else {
          $.ajax({
            type: 'post',
            url: site_url+'login/create_user',
            data: {name: name, uname: uname, pwd:pwd, lvl:lvl},
            success: function(res){
              if(res == 'success'){
                $('#signup-status').html('Data saved successfuly.')
              } else {
                $('#signup-status').html('<p class="text-danger">Data saved successfuly.</p>')
              }
              createUserProcEnd()
            },
            error: function (jqXHR, exception) {
            let msg = ''
            if (jqXHR.status === 0) {
                msg = 'Not connect.<br />Verify Network.'
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]'
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].<br />Duplicate username!'
                $('#new-username').select()
                setTimeout(function(){
                  $('#signup-submit').attr('disabled', false)
                },500)
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.'
            } else if (exception === 'timeout') {
                msg = 'Time out error.'
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.'
            } else {
                msg = 'Uncaught Error.<br />' + jqXHR.responseText
            }
            $('#signup-status').html(msg)
            createUserProcEnd()
          }//end error
          }) //end ajax
        } //end else
      }) // end of submit


      // =======================
      // End of sign up user
      // =======================

  // =======================
  // Connecting to mtik server
  // =======================

  function connectProcess(){
    $('#mtik-connect').val('Connecting...')
    $('#mtik-connect').attr('disabled', true)
    $('#loader-img').removeClass('d-none')
    $('#loader-img').addClass('d-block')
    $('#mtik-reset').attr('disabled', true)
    $('#server-alert').removeClass('d-block')
    $('#server-alert').addClass('d-none')
  }

  function connectProcessEnd(){
    $('#mtik-connect').val('Connect')
    $('#mtik-connect').attr('disabled', false)
    $('#loader-img').removeClass('d-block')
    $('#loader-img').addClass('d-none')
    $('#mtik-reset').attr('disabled', false)
    $('#server-alert').removeClass('d-none')
    $('#server-alert').addClass('d-block')
  }

  $('#mtik-connect').on('click', function(){
    connectProcess()

    const hName = $('#hostname').val()
    const uName = $('#username').val()
    const pwd = $('#password').val()

      $.ajax({
              type:"post",
              url: site_url+"setting/connect",
              data:{hostname: hName, username: uName, password: pwd},
              success:function(res){
                $('#server-status').html(res)
                connectProcessEnd()
              },
              error: function (jqXHR, exception) {
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
              $('#server-status').html(msg)
              connectProcessEnd()
              }
          })
  })

    // ========================
    // disconnect button mtik-Server
    // =========================
  $('#mtik-disconnect').click(function(){
    connectProcess()
    $.ajax({
      url: site_url+'setting/disconnect',
      success: function(res, stt){
        if(stt == 'success'){
          $('#server-status').html('Disconnected!')
        }else {
          $('#server-status').html(res)
        }
        connectProcessEnd()
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
      console.log(msg);
      connectProcessEnd()
      }
    })//end ajax
  })//end function

    // =================================
    // end disconnect button mtik-Server
    // =================================

  // ========================
  // Reset button mtik-Server
  // =========================
  $('#mtik-reset').click(function(){
    $('#hostname').val('')
    $('#username').val('')
    $('#password').val('')
    $('#server-alert').removeClass('d-block')
    $('#server-alert').addClass('d-none')
  })

  // ====================
  // end connection mtik
  // ====================

  // ==============
  //  Navbar links
  // ==============

  $('#setting-menu').on('click', function(){
      $('#mtik-setting-modal').modal({
      backdrop: 'static',
      keyboard: false
    })
  })

  $('#logo-menu').on('click', function(){
    location.href = site_url
  })

  $('#home-menu').on('click', function(){
    location.href = site_url
  })

  $('#reservation-menu').on('click', function(){
    location.href = site_url+'reservation'
  })

  $('#rooms-submenu').on({
    'click': function(){
      location.href = site_url+'rooms'
    }
  })

  $('#user-submenu').click(function(){
    location.href = site_url+'user'
  })

  $('#log-in').on('click', function(){
    $('#signin-modal').modal({
      backdrop: 'static',
      keyboard: false
    })
  })

  $('#log-out').click(function(){
    $.ajax({
      url: site_url+'login/out',
      success: function(res){
        location.href = site_url
      },
      error: function (jqXHR, exception) {
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
      console.log(msg);
      }
    })//end ajax

  })//end function

  // End of navbar links
  // ====================

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



}) //END OF FILE
