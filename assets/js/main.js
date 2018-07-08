// form reservation
$(document).ready(function(){
  
  $('#date-from').val(new Date().toDateInputValue())
})

// get current date
  Date.prototype.toDateInputValue = (function() {
      var local = new Date(this);
      local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
      return local.toJSON().slice(0,10);
  });
