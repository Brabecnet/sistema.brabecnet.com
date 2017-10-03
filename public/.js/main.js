/**
 * Website core object
 *
 * @param object context app.main
 */
(function (context) {
    /**
     * Handles aside menu events
     */
    var aside_menu = window.app.aside_menu;

    /**
     * Basic code on app initialization
     */
    function init() {
        $(window).resize(bodyCanScroll);

        aside_menu.init();
    }

    function bodyCanScroll() {
        var result = $(window).width() < 640 && aside_menu.root.is('.visible');
        $('body').toggleClass('noscroll', result);
    }

    $(document).ready(init);
})(getNamespace('app.main'));
