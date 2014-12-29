/* ==========================================================
 * Libraries (plugins, etc. Probably don't need to touch these)
 ========================================================= */

/**
 * Bootstrap
 */
// @codekit-prepend "../bower_components/bootstrap/js/transition.js"
// @codekit-prepend "../bower_components/bootstrap/js/affix.js"
// @codekit-prepend "../bower_components/bootstrap/js/alert.js"
// @codekit-prepend "../bower_components/bootstrap/js/button.js"
// @codekit-prepend "../bower_components/bootstrap/js/carousel.js"
// @codekit-prepend "../bower_components/bootstrap/js/collapse.js"
// @codekit-prepend "../bower_components/bootstrap/js/dropdown.js"
// @codekit-prepend "../bower_components/bootstrap/js/modal.js"
// @codekit-prepend "../bower_components/bootstrap/js/tooltip.js"
// @codekit-prepend "../bower_components/bootstrap/js/popover.js"
// @codekit-prepend "../bower_components/bootstrap/js/scrollspy.js"
// @codekit-prepend "../bower_components/bootstrap/js/tab.js"

/**
 * Conditionizr
 */
// @codekit-prepend "../bower_components/conditionizr/src/conditionizr.js"
// @codekit-prepend "../bower_components/conditionizr/detects/chrome.js"
// @codekit-prepend "../bower_components/conditionizr/detects/chrome.js"
// @codekit-prepend "../bower_components/conditionizr/detects/chromium.js"
// @codekit-prepend "../bower_components/conditionizr/detects/firefox.js"
// @codekit-prepend "../bower_components/conditionizr/detects/ie6.js"
// @codekit-prepend "../bower_components/conditionizr/detects/ie7.js"
// @codekit-prepend "../bower_components/conditionizr/detects/ie8.js"
// @codekit-prepend "../bower_components/conditionizr/detects/ie9.js"
// @codekit-prepend "../bower_components/conditionizr/detects/ie10.js"
// @codekit-prepend "../bower_components/conditionizr/detects/ie10touch.js"
// @codekit-prepend "../bower_components/conditionizr/detects/ie11.js"
// @codekit-prepend "../bower_components/conditionizr/detects/ios.js"
// @codekit-prepend "../bower_components/conditionizr/detects/linux.js"
// @codekit-prepend "../bower_components/conditionizr/detects/localhost.js"
// @codekit-prepend "../bower_components/conditionizr/detects/mac.js"
// @codekit-prepend "../bower_components/conditionizr/detects/opera.js"
// @codekit-prepend "../bower_components/conditionizr/detects/phantomjs.js"
// @codekit-prepend "../bower_components/conditionizr/detects/retina.js"
// @codekit-prepend "../bower_components/conditionizr/detects/safari.js"
// @codekit-prepend "../bower_components/conditionizr/detects/touch.js"
// @codekit-prepend "../bower_components/conditionizr/detects/windows.js"
// @codekit-prepend "../bower_components/conditionizr/detects/winPhone7.js"
// @codekit-prepend "../bower_components/conditionizr/detects/winPhone8.js"
// @codekit-prepend "../bower_components/conditionizr/detects/winPhone75.js"

/**
 * Modernizr
 */
// @codekit-prepend "../bower_components/sprockets-modernizr/modernizr.js"
// @codekit-prepend "../bower_components/sprockets-modernizr/svgasimg.js"

/**
 * Plugins
 */
// load jquery and bootstrap plugins here

// initialize resize-dependant scripts
(function($) {
  $(window).trigger('resize');
})(jQuery);

// conditionizr config
(function($) {
  conditionizr.config({
    tests : {
      'chrome' : ['class'],
      'firefox' : ['class'],
      'ie8' : ['class'],
      'ie9' : ['class'],
      'ie10' : ['class'],
      'ie11' : ['class'],
      'ie10touch' : ['class'],
      'ios' : ['class'],
      'retina' : ['class'],
      'safari' : ['class'],
      'touch' : ['class'],
      'winPhone7' : ['class'],
      'winPhone8' : ['class'],
      'winPhone75' : ['class']
    }
  });
})(jQuery);