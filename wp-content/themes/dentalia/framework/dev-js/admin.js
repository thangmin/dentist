"use strict";

jQuery(document).ready(function($) {

  /* Toggle Post Format Meta Box
  ============================================================ */
  function dentalia_toggle_post_format_meta_box() {
    var prefix = 'dentalia_post_format_';
    var formats = ['video', 'audio', 'gallery', 'link', 'image', 'aside', 'quote', 'status', 'chat'];
    var active_format = $('input:radio[name=post_format]:checked').val();

    formats.forEach(function(format) {
      var meta_box = $('#' + prefix + format);
      if(format != active_format) {
            meta_box.hide();
        } else {
            meta_box.show();
        }        
    });
  }

  dentalia_toggle_post_format_meta_box();
  $('input:radio[name=post_format]').change(dentalia_toggle_post_format_meta_box);

  /* remove anoying revslider activate message */
  $('.plugins-php a[href^="http://revolution.themepunch"]').closest('.plugin-update-tr').css("display", "none");

})