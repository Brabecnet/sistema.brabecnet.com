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
        var spinner = loadTemplate('spinner');

        /*
         * Load Home
         */
        request('home', null, {
            done: function () {
                spinner.remove();
            }
        });
    }

    /**
     * ...
     */
    function create(name, content) {
        var el = $('<section class="modal-' + name + '">')
            .append(content)
            .appendTo(root);

        change(el);

        return el;
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
            el = create(template, tmp);

        return el;
    }

    /**
     * ...
     */
    function request(modal, data, callbacks) {
        if (typeof data === 'undefined') {
            data = null;
        }

        var el;

        var ajax = $.post('/modal/' + modal, data)
            .done(function (result) {
                el = create(modal, result);
            })
            .fail(function (result) {
                console.log('ERROR:', result);
            });

        if (typeof callbacks === 'object') {
            if (callbacks.hasOwnProperty('done')) {
                ajax.done(callbacks.done);
            }
            if (callbacks.hasOwnProperty('fail')) {
                ajax.fail(callbacks.fail);
            }
            if (callbacks.hasOwnProperty('always')) {
                ajax.always(callbacks.always);
            }
        }

        return el;
    }

    /**
     * ...
     */
    function change(next) {
        // code...
    }

    /**
     * ...
     */
    function replace(previous, next) {
        // code...
    }

    /**
     * Public properties
     */
    context.root = root;
    context.init = init;
    context.request = request;
    context.loadTemplate = loadTemplate;
})(getNamespace('app.modal'));
