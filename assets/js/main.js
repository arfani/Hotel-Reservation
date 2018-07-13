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
  // Connect to mtik server
  // =======================

  $('#mtik-connect').on('click', function(){
    $(this).val('Connecting...')
    $(this).attr('disabled', true)
    const hName = $('#hostname').val()
    const uName = $('#username').val()
    const pwd = $('#password').val()

      $.ajax({
              type:"post",
              url: site_url+"setting/connect",
              data:{hostname: hName, username: uName, password: pwd},
              success:function(res){
                $('#server-status').text(res)
                $('#server-alert').removeClass('d-none')
                $('#server-alert').addClass('d-block')
                $('#mtik-connect').val('Connect')
                $('#mtik-connect').attr('disabled', false)
              },
              error: function(){
                  alert("Invalid! Ajax error.")
                  $('#mtik-connect').val('Connect')
                  $('#mtik-connect').attr('disabled', false)
              }
          })
  })

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
  // End of navbar links
  // ====================

}) //END OF FILE
