/**
 * Website core object
 *
 * @param object context aryelgois.utils.keyboard
 */
(function (context) {
    /**
     * Basic code on app initialization
     */
    function init() {
        $(document).ready(function () {
            $('.aside-switch').click(headerMenuButton);
        });
    }

    function headerMenuButton() {
        $('body > aside').toggleClass('visible');
    }

    init();
})(getNamespace('app.main'));
