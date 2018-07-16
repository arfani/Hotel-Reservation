$(document).ready(function(){

    // Get current date
      Date.prototype.toDateInputValue = (function() {
          var local = new Date(this)
          local.setMinutes(this.getMinutes() - this.getTimezoneOffset())
          return local.toJSON().slice(0,10)
      })

    // Every time a modal is shown, if it has an autofocus element, focus on it.
    $('.modal').on('shown.bs.modal', function() {
      $(this).find('[autofocus]').focus();
    });

  // =======================
  // Login Employee
  // =======================
    $('#login-reset').click(function(){
      $('#username-emp').val('')
      $('#password-emp').val('')
    })

    const masterData = $('#master-data-container').children().detach()

    $('#login-submit').click(function(){
      loginProcess()
      const uname = $('#username-emp').val()
      const pwd = $('#password-emp').val()

      $.ajax({
        type: 'post',
        url: site_url+'login/auth',
        data: {uname: uname, pwd: pwd},
        success: function(res){
          $('#login-status').text(res)
          $('.mr-auto #master-data-container').prepend(masterData)
          loginProcessEnd()
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
        $('#login-status').html(msg)
        loginProcessEnd()

        }
      })
    })

    function loginProcess(){
      $('#login-submit').val('Processing...')
      $('#login-submit').attr('disabled', true)
      $('#loader-img-login').toggleClass('d-none')
      $('#login-reset').attr('disabled', true)
      $('#login-alert').removeClass('d-block')
      $('#login-alert').addClass('d-none')
    }

    function loginProcessEnd(){
      $('#login-submit').val('Login')
      $('#login-submit').attr('disabled', false)
      $('#loader-img-login').toggleClass('d-none')
      $('#login-reset').attr('disabled', false)
      $('#login-alert').removeClass('d-none')
      $('#login-alert').addClass('d-block')
    }
  // =======================
  // END OF Login Employee
  // =======================

  // =======================
  // Connect to mtik server
  // =======================
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
                $('#server-status').text(res)
                connectProcessEnd()
              },
              error: function(){
                  alert("Invalid! Ajax error.")
                  connectProcessEnd()
              }
          })
  })

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

  // =====================
  // Reset button mtik-Server

  $('#mtik-reset').click(function(){
    $('#hostname').val('')
    $('#username').val('')
    $('#password').val('')
    $('#server-alert').removeClass('d-block')
    $('#server-alert').addClass('d-none')
  })


  // ==============
  //  Navbar links
  // ==============

  $('#setting-menu').on('click', function(){
      $('#mtik-setting-modal').modal('show')
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
    },
    'mouseenter': function(){
      $(this).css('cursor', 'pointer')
    }
  })

  $('#log-in-out').on('click', function(){
    $('#login-modal').modal({
      backdrop: 'static',
      keyboard: false
    })
  })

  // End of navbar links
  // ====================

}) //END OF FILE
