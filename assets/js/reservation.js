'use strict'

$(function(){
  const name = $('#name')
  const id = $('#id-numb')

  const dateFrom = $('#date-from')
  const cod = $('#cod')

  // when confirm
  $('#reservation-submit').on('click', function(){
    $('#reservation-save').val('Confirm')

    if (name.val() === ''){
      alert('Name cannot be empty')
      name.focus()
    }else if (isNaN(id.val()) || id.val().length < 1 ){
      alert('Invalid data')
      id.focus()
    }else{
      const username = name.val().slice(0, name.val().indexOf(' '))

      $('#guest-name').text(name.val())
      $('#guest-id').text(id.val())
      $('#guest-date-from').text(dateFrom.val())
      $('#guest-cod').text(cod.val())

      $('#voucher-username').text(username)
      $('#voucher-password').text(id.val().slice(0, 6))
      $('#voucher-active').text(cod.val()+' day(s)')

      $('#voucher-qrcode').qrcode({
        width: 256,
        height: 256,
        text: username
      })

      $('#reservation-modal .modal-title').text('Confirm your data!')
      $('#reservation-modal').modal('show')
    } //end if else
  }) //end onclick

  // when save
  $('#reservation-save').on('click', function(){
            // event.preventDefault()
            const name = 'cobaaaaaaaaa'

            $.ajax({
                    type:"post",
                    url: site_url+"reservation/generated",
                    data:{guestName: name},
                    success:function(response)
                    {
                        console.log(response)
                        $('#reservation-status').html(response)
                        $('#reservation-alert').removeClass('d-none')
                        $('#reservation-alert').addClass('d-block')
                    },
                    error: function()
                    {
                        alert("Invalid!")
                    }
                })
  })

})
