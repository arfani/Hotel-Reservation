$(function(){
  $('#reservation-submit').on('click', function(){
    $('#reservation-modal .modal-title').text('Confirm your data!')
    $('#reservation-modal').modal('show')
  })

})
