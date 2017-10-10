/**
 * Controls login page
 *
 * @param object context app.login
 */
(function (context) {
    /**
     * First input field in the login form
     */
    var document_field = $('#form-login input[name=document]');

    /**
     * Object initialization
     */
    function init() {
        $(document).on('keydown', inputHandler);
        $('input, textarea, select').on('focus', unbindHandler);
    }

    /**
     * Sets focus to document field
     */
    function inputHandler() {
        document_field.focus();
        unbindHandler();
    }

    /**
     * Unbinds the input handler
     */
    function unbindHandler() {
        $(document).off('keydown', inputHandler);
    }

    /**
     * Initializes login
     */
    $(document).ready(init);
})(getNamespace('app.login'));
