"use strict";

jQuery(function ($) {
  /* this only loads in gutenberg */
  dentalia_toggle_post_format_meta_box_gutenberg();
  var initialFormat = wp.data.select('core/editor').getEditedPostAttribute('format');
  wp.data.subscribe(function () {
    if ('undefined' != initialFormat) {
      /* Format data updated. */
      var activeFormat = wp.data.select('core/editor').getEditedPostAttribute('format');

      if (activeFormat != initialFormat) {
        /* a change has been detected. This should fire only once per detected change. */
        initialFormat = activeFormat;
        dentalia_toggle_post_format_meta_box_gutenberg(activeFormat);
      }
    }
  });

  function dentalia_toggle_post_format_meta_box_gutenberg(activeFormat) {
    if ('undefined' == activeFormat) {
      var activeFormat = 'standard'; // just to hide all
    }

    var prefix = 'dentalia_post_format_';
    var formats = ['video', 'audio', 'gallery', 'link', 'image', 'aside', 'quote', 'status', 'chat'];
    formats.forEach(function (format) {
      var metastring = '#' + prefix + format;
      var meta_box = $(metastring);

      if (format != activeFormat) {
        $(metastring).addClass('gutenhide');
        $(metastring).removeClass('gutenshow');
        $(metastring).css('background', '#f7f7f7');
      } else {
        $(metastring).addClass('gutenshow');
        $(metastring).removeClass('gutenhide');
      }
    });
  }
});