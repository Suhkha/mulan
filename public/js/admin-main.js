$('#delete__confirm').on('show.bs.modal', function (e) {
      $message = $(e.relatedTarget).attr('data-message');
      $(this).find('.modal-body p').text($message);
       
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);
       
      $btntxt = $(e.relatedTarget).attr('data-btntxt');
      $(this).find('.modal-footer x').text($btntxt);
   
      $btncan = $(e.relatedTarget).attr('data-btncancel');
      $btnac = $(e.relatedTarget).attr('data-btnaction');
   
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
  });
   
  $('#delete__confirm').find('.modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });