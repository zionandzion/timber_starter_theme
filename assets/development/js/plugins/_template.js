// run find/replace for:
// Component => [Name]
// component => [name]

(function($) {
  // constructor
  var Component = function(element, properties) {
    var self      = this;

    // 'static' constants
    self.SELECTOR = '';
    self.DEFAULTS = {};

    // instance related
    self.element  = element;
    self.$element = $(element);
    self.props    = $.extend({}, properties, self.DEFAULTS);

    // get 'er done
    self.bindEvents();
  };

  Component.prototype.bindEvents = function() {
    var self  = this;
  };

  // ---------------------------------------------------------------------------

  // instantiate
  function Plugin(option) {
    return this.each(function () {
      var $this       = $(this);
      var data        = $this.data('custom.component');
      var options     = $.extend({}, Component.DEFAULTS, $this.data(), typeof option == 'object' && option);
      var component   = new Component($this, options);

      if (!data) {
        $this.data('custom.component', (data = component));
      }
      if (typeof option == 'string') data[option]();
    });
  }

  // make jQuery plugin
  var old                    = $.fn.component;
  $.fn.component             = Plugin;
  $.fn.component.Constructor = Component;
  $.fn.component.noConflict  = function () {
    $.fn.component = old;
    return this
  };

  // Bind to DOM elements
  $(Component.SELECTOR).each(function() {
    var $this   = $(this);
    var data    = $this.data('custom.component');
    var option  = data && $this.data();

    Plugin.call($this, option);
  });

})(jQuery);