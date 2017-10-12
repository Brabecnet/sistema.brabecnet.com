/**
 * Controls login page
 *
 * @param object context app.login
 */
(function (context) {
    /**
     * Object initialization
     */
    function init() {
        aryelgois.utils.auto_focus.init(
            $('#form-login'),
            $('#form-login input[name=document]')
        );
    }

    /**
     * Initializes login
     */
    $(document).ready(init);
})(getNamespace('app.login'));
