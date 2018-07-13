$(function(){
  // create datatable to table rooms
  $('#rooms-tbl').DataTable()

  $('#room-add').on('click', function(){
    $('#room-modal').modal('show')
  })

})
