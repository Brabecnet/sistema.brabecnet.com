/**
 * Controls modal pages
 *
 * @param object context app.modal
 */
(function (context) {
    /**
     * Contains simple templates
     */
    var templates;

    /**
     * Points to main element
     */
    var root = $('body > main');

    /**
     * Object initialization
     */
    function init() {
        /*
         * Load dependencies
         */
        templates = window.app.templates;

        /*
         * Prepare root
         */
        root.empty();
        loadTemplate('spinner');
    }

    /**
     * Loads a template into a new modal
     *
     * @param string  template Template name
     * @param mixed[] options  Arguments for the template
     *
     * @return jQuery
     */
    function loadTemplate(template, options) {
        var tmp = templates.output(template, options),
            el = $('<section class="modal-' + template + '">').append(tmp);

        root.append(el);
        return el;
    }

    /**
     * ...
     */
    function load(modal, options) {
        // code...
    }

    /**
     * Public properties
     */
    context.root = root;
    context.init = init;
})(getNamespace('app.modal'));
