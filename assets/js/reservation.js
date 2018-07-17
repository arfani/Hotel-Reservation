$(function(){
  //put current date to date from of reservation form
  $('#date-from').val(new Date().toDateInputValue())

  // guest data
  const name = $('#name')
  const id = $('#id-numb')

  // hotel data
  const dateFrom = $('#date-from')
  const cod = $('#cod')

  // voucher data
  const username = name.val().slice(0, name.val().indexOf(' ')) //get first name


  // when want to confirm
  $('#reservation-submit').on('click', function(){

    if (name.val() === ''){
      alert('Name cannot be empty!')
      name.focus()
    }else if (isNaN(id.val()) || id.val().length < 1 ){
      alert('Id data invalid!')
      id.focus()
    }else{
      const uName = name.val().slice(0, name.val().indexOf(' '))

      $('#guest-name').text(name.val())
      $('#guest-id').text(id.val())
      $('#guest-date-from').text(dateFrom.val())
      $('#guest-cod').text(cod.val())

      $('#voucher-username').text(uName)
      $('#voucher-password').text(id.val().slice(0, 6))
      $('#voucher-active').text(cod.val()+' day(s)')

      $('#reservation-modal').modal('show')
    } //end if else
  }) //end when want to confirm

  // when save
  $('#reservation-save').on('click', function(){
    processBtn()

    const gName = name.val()
    const gId = id.val()
    const dateFrom1 = dateFrom.val()
    const cod1 = cod.val()

    const dnsName = $('#dns-name').text()
    const uName = $('#voucher-username').text()
    const pwd = $('#voucher-password').text()

    let reqAjax =
    $.ajax({
            type:"post",
            url: site_url+"reservation/save",
            data:{gName: gName, gId: gId, dateFrom: dateFrom1, cod: cod1, uName: uName, pwd: pwd},
            success:function(response){
                $('#reservation-status').html(response)

                let qrVoucher = $('#voucher-qrcode').qrcode({
                  width: 256,
                  height: 256,
                  text: dnsName+'/login?username='+uName+'&password='+pwd
                })
                processBtnEnd()
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
    $('#voucher-active').text('')
    $('#voucher-qrcode').text('')
    $('#frame-qrcode').addClass('d-none')
    $('#reservation-alert').addClass('d-none')
    $('#reservation-save').attr('disabled', false)
    $('#reservation-modal').modal('hide')
    $('#reservation-reset').trigger('click')
  })


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

  // ==============
  //  Connect to the latest successed mtik server
  // ==============
  function connectTheLatest(){
    $.ajax({
      url: site_url+'setting/connect_latest',
      success: function(res){
        console.log(res)
      },
      error: function(){
        console.error('Cannot connect!')
      }
    })
  }


}) //END OF FILE
