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
  const username = name.val().slice(0, name.val().indexOf(' ')) //get first word from name


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

      $('#reservation-modal .modal-title').text('Confirm your data!')
      $('#reservation-modal').modal('show')
    } //end if else
  }) //end when want to confirm

  // when save
  $('#reservation-save').on('click', function(){
            // event.preventDefault()
            const gName = name.val()
            const gId = id.val()
            const dateFrom1 = dateFrom.val()
            const cod1 = cod.val()

            $.ajax({
                    type:"post",
                    url: site_url+"reservation/save",
                    data:{gName: gName, gId: gId, dateFrom: dateFrom1, cod: cod1},
                    success:function(response)
                    {
                      const dnsName = $('#dns-name').text()
                      const uName = $('#voucher-username').text()
                      const pwd = $('#voucher-password').text()
                        $('#reservation-status').html(response)
                        $('#reservation-alert').removeClass('d-none')
                        $('#reservation-alert').addClass('d-block')
                        $('#frame-qrcode').removeClass('d-none')
                        $('#frame-qrcode').addClass('d-block')
                        $('#voucher-qrcode').qrcode({
                          width: 256,
                          height: 256,
                          text: dnsName+'/login?username='+uName+'&password='+pwd
                        })},
                    error: function()
                    {
                        alert("Invalid!")
                    }
                })
  }) // And when save

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
