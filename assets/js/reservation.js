
  function hideResAlert(){
    $('#reservation-alert').addClass('d-none')
  }

$(function(){

  // =============Arrival and Departure Date ================
  // ========================================================


  //call func when load
  arrDepDate()

  // when night or arrival date field changed
  $('#night, #arrival-date').on('keyup mouseup change', function(){
    arrDepDate()
  })

  function arrDepDate(){
    //get current date
    const curDate = new Date().toDateInputValue()
    //put current date to arrival date of reservation form
    $('#arrival-date').val(curDate)
    const night = $('#night').val()
    const arrDateE = $('#arrival-date').val()

    let depDate = moment(arrDateE).add(night, 'd').toDate()
    const arrY = depDate.getFullYear()
    let arrM = depDate.getMonth()+1
    let arrD = depDate.getDate()
    if(arrM.toString().length === 1){
      arrM = "0"+arrM
    }
    if(arrD.toString().length === 1){
      arrD = "0"+arrD
    }
    const depDateEnd = arrY+'-'+arrM+'-'+arrD

    $('#departure-date').val(depDateEnd)
  }

  // ===============End of Arrival and Departure Date =============
  // ==============================================================

    // ===================================================
    //  ============fill numb room by type room===========
    // ===================================================

      function buildDropdown(result, dropdown, emptyMessage){
        // Remove current options
        dropdown.html('');
        // Add the empty option with the empty message
        // dropdown.append('<option value="">' + emptyMessage + '</option>');
        // Check result isnt empty
        if(result != '')
        {
            // Loop through each of the results and append the option to the dropdown
            $.each(result, function(k, v) {
                dropdown.append('<option value="' + v.numb + '">' + v.numb + '</option>');
            });
        }
      }

    function fillNumb(){
      const type = $('#room-type').val()

      $.ajax({
        type: 'post',
        url: site_url+'reservation/numb_by_type',
        data: {type: type},
        success: function(data){
          buildDropdown(
            jQuery.parseJSON(data),
            $('#room-numb')
          )
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
          alert('error getting data numb by type')
        }//end error
      })//end ajax
    }

    fillNumb()

    $('#room-type').change(function(){
      fillNumb()
    })//end func

    // =====================End fill numbe by type==============
    // =========================================================

  // ===========================================================
  // ====================Reservation Saving=====================
  // ===========================================================
  // get guest data element
  const id = $('#id-numb')
  const name = $('#name')
  const gender = $('#gender')
  const birth = $('#birth')
  const phone = $('#phone')
  const email = $('#email')
  const address = $('#address')

  // get hotel data element
  const night = $('#night')
  const arrivalDate = $('#arrival-date')
  const departureDate = $('#departure-date')
  const roomType = $('#room-type')
  const roomNumb = $('#room-numb')
  const adult = $('#adult')
  const child = $('#child')

  function generateVoucher(uName='guest-name', uInd=$('#guest-name').text().indexOf(' '), pwd='guest-id', pInd=6 ){
    const dnsName = $('#dns-name').text()
    const username = $('#'+uName+'').text().substr(0, uInd)
    const password = $('#'+pwd+'').text().substr(0, pInd)

    $('#voucher-username').text(username)
    $('#voucher-password').text(password)

    $('#voucher-qrcode').qrcode({
      width: 200,
      height: 200,
      text: 'http://'+dnsName+'/login?username='+username+'&password='+password
    })


    $('#reservation-new').click(function(){
      $('#guest-name').text('')
      $('#guest-id').text('')
      $('#guest-date-from').text('')
      $('#guest-cod').text('')

      $('#voucher-username').text('')
      $('#voucher-password').text('')
      $('#voucher-uptime').text('')
      $('#voucher-qrcode').text('')
      $('#frame-qrcode').addClass('d-none')
      $('#reservation-alert').addClass('d-none')
      $('#reservation-save').attr('disabled', false)
      $('#reservation-modal').modal('hide')
      $('#reservation-reset').trigger('click')
      $('#id-numb').focus()
      arrDepDate()
    })

    $('#reservation-reset').click(function(){
      $('#guest-name').text('')
      $('#guest-id').text('')
      $('#guest-date-from').text('')
      $('#guest-cod').text('')

      $('#voucher-username').text('')
      $('#voucher-password').text('')
      $('#voucher-uptime').text('')
      $('#voucher-qrcode').text('')
      $('#frame-qrcode').addClass('d-none')
      $('#reservation-alert').addClass('d-none')
      $('#reservation-save').attr('disabled', false)
    })

  } //end func

  // when gonna confirm
  $('#reservation-submit').on('click', function(){
    arrDepDate()
    $('#frame-qrcode').removeClass('d-none')
    if (isNaN(id.val()) || id.val().length < 1 ){
      // alert('Id data invalid!')
      // id.focus()
      id.val('0123456789')
    }else if (name.val() === ''){
      // alert('Name cannot be empty!')
      // name.focus()
      name.val('Muhammad Arfani Hidayat')
    }else{
      $('#no-booking').text(Math.floor(Math.random()*10000000001))
      $('#guest-name').text(name.val())
      $('#guest-id').text(id.val())
      $('#guest-gender').text(gender.val())
      $('#guest-birth').text(birth.val())
      $('#guest-phone').text(phone.val())
      $('#guest-email').text(email.val())
      $('#guest-address').text(address.val())
      // ===========
      $('#guest-night').text(night.val())
      $('#guest-arrival-date').text(arrivalDate.val())
      $('#guest-departure-date').text(departureDate.val())
      $('#guest-room-type').text(roomType.val())
      $('#guest-room-numb').text(roomNumb.val())
      $('#guest-adult').text(adult.val())
      $('#guest-child').text(child.val())
      // ===========
      if($('#guest-name').text().indexOf(' ') == -1){
        $('#guest-name').text($('#guest-name').text()+' ')
      }
      if(!change){ generateVoucher() }

      $('#voucher-uptime').text(night.val()+' day(s)')

      $('#reservation-modal').modal({
        backdrop: 'static',
        keyboard: false
      })

      //prevent duplicate qrcode by delete when close
      $('#reservation-modal').on('hidden.bs.modal',function(){
        $('#voucher-qrcode').text('')
        $('#voucher-username').text('')
        $('#voucher-password').text('')
        $('#reservation-alert').addClass('d-none')
      })
    } //end if else
  }) //end when want to confirm

  function processBtn(){
    $('#reservation-save').val('Saving...')
    $('#reservation-save').attr('disabled', true)
    $('#loader-img-reservation').removeClass('d-none')
    $('#reservation-alert').addClass('d-none')
    // $('#frame-qrcode').addClass('d-none')
  }

  function processBtnEnd(){
    $('#reservation-save').val('Confirm')
    $('#reservation-alert').removeClass('d-none')
    // $('#frame-qrcode').removeClass('d-none')
    $('#loader-img-reservation').addClass('d-none')
  }

  // when save
  $('#reservation-save').on('click', function(){
    processBtn()

    const uName = $('#voucher-username').text()
    const pwd = $('#voucher-password').text()
    $.ajax({
            type:"post",
            url: site_url+"reservation/save",
            data:{
              noBooking:$('#no-booking').text(),
              id:id.val(),
              name:name.val(),
              gender:gender.val(),
              birth:birth.val(),
              phone:phone.val(),
              email:email.val(),
              address:address.val(),
              night:night.val(),
              arrivalDate:arrivalDate.val(),
              departureDate:departureDate.val(),
              roomType:roomType.val(),
              roomNumb:roomNumb.val(),
              adult:adult.val(),
              child:child.val(),
              uName:uName,
              pwd:pwd
            },
            success:function(response){
              if(response == 'disconnect'){
                $('#reservation-status').html('<span class="text-danger">Failed!<br />There is no connection to MikroTik Server!</span>')
                $('#reservation-save').val('Re-Confirm')
                $('#reservation-save').attr('disabled', false)
                $('#reservation-alert').removeClass('d-none')
                $('#loader-img-reservation').addClass('d-none')
              }else {
                $('#reservation-status').html('Success!<br />'+response)
                  processBtnEnd()
                }
              },
              error: function (jqXHR, exception) {
                let msg = ''
                if (jqXHR.status === 0) {
                    msg = 'Not connect.<br />Verify Network.'
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]'
                } else if (jqXHR.status == 500) {
                    msg = 'Username is used!<br />Internal Server Error [500].'
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.'
                } else if (exception === 'timeout') {
                    msg = 'Time out error.'
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.'
                } else {
                    msg = 'Uncaught Error.<br />' + jqXHR.responseText
                }
                  $('#reservation-status').html('<span class="text-danger">'+msg+'</span>')
                  processBtnEnd()
                  $('#frame-qrcode').addClass('d-none')
                  $('#reservation-modal').on('hidden.bs.modal', function(){
                    location.reload()
                })
              }
        })
  }) // End when save

  // ==============================
  // Changing Username or Password
  // ==============================
  var change = false

  $('#change-uname-pwd').click(function(){
    $('#upc-modal').modal({
      backdrop: 'static',
      keyboard: false
    })

    $('#reservation-modal').modal('hide')
  })

  $('#upc-done').click(function(){
    if($('#digit-uname').val() === ''){
      alert('Digit Cannot Empty')
      $('#digit-uname').focus()
    }else if($('#digit-pwd').val() === ''){
      alert('Digit Cannot Empty')
      $('#digit-pwd').focus()
    }else{
      change = true
      $('#reservation-submit').trigger('click')

      const u = $('#upc-uname-option').val()
      const uInd = parseInt($('#digit-uname').val())
      const p = $('#upc-pwd-option').val()
      const pInd = $('#digit-pwd').val()
      generateVoucher(u, uInd, p, pInd)
      $('#upc-modal').modal('hide')
      change = false
    }
  })



}) //END OF FILE
