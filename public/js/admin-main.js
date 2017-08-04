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

  //Dropzone -- Gallery
  Dropzone.options.imagesDropzone = {
    paramName: "path",
    uploadMultiple:true,
    maxFilesize:100,
    autoProcessQueue: true,
    uploadMultiple: true,
    parallelUploads:10,
    acceptedFiles: ".png, .jpg, .jpeg",
    dictFallbackMessage:"Your browser does not support drag'n'drop file uploads.",
    dictFileTooBig:"Image is bigger than 100MB",

    accept: function(file, done) {
      console.log("Uploaded");
      done();
    }, 
    success: function(file,done){
      console.log("All files done!");
    }
  };

    //Dropzone -- Videos
  Dropzone.options.videosDropzone = {
    paramName: "path",
    uploadMultiple:true,
    maxFilesize:500,
    autoProcessQueue: true,
    uploadMultiple: true,
    parallelUploads:10,
    acceptedFiles: ".webm, .ogv, .mp4",
    dictFallbackMessage:"Your browser does not support drag'n'drop file uploads.",
    dictFileTooBig:"Video is bigger than 500MB",

    accept: function(file, done) {
      console.log("Uploaded");
      done();
    }, 
    success: function(file,done){
      console.log("All files done!");
    }
  };