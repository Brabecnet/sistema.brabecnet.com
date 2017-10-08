/**
 * Website core object
 *
 * @param object context app.main
 */
(function (context) {
    /**
     * Handles aside menu events
     */
    var aside_menu;

    /**
     * Handles modal pages
     */
    var modal;

    /**
     * Object initialization
     */
    function init() {
        /*
         * Load dependencies
         */
        aside_menu = window.app.aside_menu;
        modal = window.app.modal;

        $(window).resize(bodyCanScroll);

        aside_menu.init();
        modal.init();
    }

    /**
     * Decides if body is scrollable (small screen)
     */
    function bodyCanScroll() {
        var result = $(window).width() < 640 && aside_menu.root.is('.visible');
        $('body').toggleClass('noscroll', result);
    }

    /**
     * Initializes app
     */
    $(document).ready(init);
})(getNamespace('app.main'));
