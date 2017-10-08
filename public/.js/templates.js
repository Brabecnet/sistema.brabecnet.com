/**
 * Simple templates
 *
 * @param object context app.templates
 */
(function (context) {
    /**
     * List of templates
     */
    var templates = {
        spinner: '<i class="icon-spinner spinner"></i>'
    };

    /**
     * Returns requested template
     *
     * @param string  template Template name
     * @param mixed[] options  Arguments for the template
     *
     * @return string|jQuery
     */
    function output(template, options) {
        if (templates.hasOwnProperty(template)) {
            var tmp = templates[template];
            if (typeof tmp === 'function') {
                return tmp(options);
            } else {
                return tmp;
            }
        }
    }

    /**
     * Public properties
     */
    context.output = output;
})(getNamespace('app.templates'));
