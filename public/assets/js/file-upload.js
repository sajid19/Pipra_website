$(function() {
  'use strict';
  $(function() {
      $(document).on('click', '.file-upload-browse', function(e) {
          var file = $(this).parent().parent().parent().find('.file-upload-default');
          file.trigger('click');
      });
      $(document).on('change', '.file-upload-default', function(e) {
          $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
      });
  });
});
