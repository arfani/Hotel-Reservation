$(function(){

  // =============Arrival and Departure Date ================
  // ========================================================
  //get current date
  const curDate = new Date().toDateInputValue()
  //put current date to arrival date of reservation form
  $('#arrival-date').val(curDate)

  //call func when load
  arrDepDate()

  // when night or arrival date field changed
  $('#night, #arrival-date').on('keyup mouseup change', function(){
    arrDepDate()
  })

  function arrDepDate(){
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

  // ====================Reservation Saving===============
  const noBooking = Math.floor(Math.random()*10000000001)
  // get guest data element
  const name = $('#name')
  const id = $('#id-numb')
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

  // when gonna confirm
  $('#reservation-submit').on('click', function(){

      // default u/p voucher data
      const dnsName = $('#dns-name').text()
      const uName = name.val().slice(0, name.val().indexOf(' '))
      const pwd = id.val().substr(0, 3)

    // if (name.val() === ''){
    //   alert('Name cannot be empty!')
    //   name.focus()
    // }else if (isNaN(id.val()) || id.val().length < 1 ){
    //   alert('Id data invalid!')
    //   id.focus()
    // }else{
      $('#no-booking').text(noBooking)
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

      $('#voucher-qrcode').qrcode({
        width: 256,
        height: 256,
        text: 'http://'+dnsName+'/login?username='+uName+'&password='+pwd
      })

      $('#voucher-username').text(uName)
      $('#voucher-password').text(pwd)
      $('#voucher-uptime').text(night.val()+' day(s)')

      $('#reservation-modal').modal('show')

      $('#reservation-modal').on('hidden.bs.modal',function(){
        $('#voucher-qrcode').text('')
      })
    // } //end if else
  }) //end when want to confirm


  function processBtn(){
    $('#reservation-save').val('Saving...')
    $('#reservation-save').attr('disabled', true)
    $('#loader-img-reservation').removeClass('d-none')
    $('#reservation-alert').addClass('d-none')
    $('#frame-qrcode').addClass('d-none')
  }

  function processBtnEnd(){
    $('#reservation-save').val('Confirm')
    $('#reservation-alert').removeClass('d-none')
    $('#frame-qrcode').removeClass('d-none')
    $('#loader-img-reservation').addClass('d-none')
  }

  // when save
  $('#reservation-save').on('click', function(){
    processBtn()

    const gName = name.val()
    const gId = id.val()
    const dateFrom1 = dateFrom.val()
    const cod1 = cod.val()

    $.ajax({
            type:"post",
            url: site_url+"reservation/save",
            data:{gName: gName, gId: gId, dateFrom: dateFrom1, cod: cod1, uName: uName, pwd: pwd},
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
              $('#reservation-status').html(msg)
              processBtnEnd()
              $('#frame-qrcode').addClass('d-none')
              }
        })
  }) // And when save

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

  // ==============
  //  fill numb room by type room
  // ==============

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


}) //END OF FILE
