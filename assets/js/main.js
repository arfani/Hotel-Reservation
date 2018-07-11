$(document).ready(function(){
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

  // get current date
    Date.prototype.toDateInputValue = (function() {
        var local = new Date(this)
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset())
        return local.toJSON().slice(0,10)
    })
  //put current date to date from of reservation form
  $('#date-from').val(new Date().toDateInputValue())

  // Every time a modal is shown, if it has an autofocus element, focus on it.
  $('.modal').on('shown.bs.modal', function() {
    $(this).find('[autofocus]').focus();
  });





  // create datatable to table rooms
  // $('#rooms-tbl').DataTable()
  //
  // $('.room_edit').on('click', function(){
  //     save_method = 'edit';
  //     var id = $(this).val()
  //
  //     $('#rooms-tbl').on('click','.room_edit',function(){
  //     $id=$(this).val()
  //     $('#room-numb').val($(this).closest("tr").find('td:eq(1)').text())
  //     $('#room-type').val($(this).closest("tr").find('td:eq(2)').text())
  //     $('#annotation').val($(this).closest("tr").find('td:eq(3)').text())
  //     $('.modal-title').html('UPDATE ROOM')
  //     $('#modalAddRoom').modal('show')
  //   })
  // })
  //
  //
  // // add
  // $('#add-room').on('click', function(){
  //   $('.modal-title').html('ADD A NEW ROOM')
  //   save_method = 'add';
  //   $('#room-form')[0].reset(); // reset form on modals
  //   // $('.form-group').removeClass('has-error'); // clear error class
  //   // $('.help-block').empty(); // clear error string
  //   $('#modalAddRoom').modal('show')
  // })
  //
  // $('#room-submit').on('click', function(){
  //     $('#room-submit').text('saving...'); //change button text
  //     $('#room-submit').attr('disabled',true); //set button disable
  //     var url;
  //
  //     if(save_method == 'add') {
  //         url = site_url+"hotel/ajax_add";
  //     } else if(save_method == 'edit') {
  //         url = site_url+"hotel/ajax_update";
  //     }
  //
  //     // ajax adding data to database
  //     $.ajax({
  //         url : url,
  //         type: "POST",
  //         data: $('#room-form').serialize(),
  //         dataType: "JSON",
  //         success: function(data)
  //         {
  //
  //             if(data.status) //if success close modal and reload ajax table
  //             {
  //                 $('#modalAddRoom').modal('hide');
  //                 reload_table();
  //             }
  //             else
  //             {
  //                 // for (var i = 0; i < data.inputerror.length; i++)
  //                 // {
  //                 //     $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
  //                 //     $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
  //                 // }
  //                 console.log('error func save!')
  //             }
  //             $('#btnSave').text('Save'); //change button text
  //             $('#btnSave').attr('disabled',false); //set button enable
  //
  //
  //         },
  //         error: function (jqXHR, textStatus, errorThrown)
  //         {
  //             alert('Error adding / update data');
  //             $('#room-submit').text('Save'); //change button text
  //             $('#room-submit').attr('disabled',false); //set button enable
  //
  //         }
  //     });
  // })




}) //END OF FILE
