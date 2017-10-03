/**
 * Controls Website aside menu
 *
 * @param object context app.aside_menu
 */
(function (context) {
    /**
     * Points to aside element
     */
    var root = $('body > aside');

    /**
     * List of nav elements
     */
    var stack = [];

    /**
     * Object initialization
     */
    function init() {
        root.click(asideBackgroundClick);
        $('span[data-action=aside-nav-pop]').click(navPop);
        $('span[data-action=aside-nav-push]').click(navPush);
        $('span[data-action=aside-toggle]').click(asideToggleVisible);
    }

    /**
     * On small screen, hides aside menu when user clicks outside nav elements
     *
     * @param object event jQuery event
     */
    function asideBackgroundClick(event) {
        if (event.target == this && $(window).width() < 640) {
            asideToggleVisible();
        }
    }

    /**
     * On small screen, toggles aside menu
     */
    function asideToggleVisible() {
        root.toggleClass('visible');
        $(window).resize();
    }

    /**
     * Pushes the current nav to the stack and opens a new nav
     */
    function navPush() {
        var current = root.children('.current').filter(':first'),
            next = root.children('[data-name=' + $(this).data('nav') + ']');
        if (!next.length || next.is(current) || root.is('.slide-lock')) {
            return;
        }

        stack.push(current);

        root.addClass('slide-lock');
        next.css('z-index', 1).show(0, function () {
            next.addClass('current');
            setTimeout(function () {
                current.removeClass('current');
                next.css({display: '', 'z-index': ''});
                root.removeClass('slide-lock');
            }, 500);
        });
    }

    /**
     * Pops a previous nav from stack and closes the current nav
     */
    function navPop() {
        if (!stack.length || root.is('.slide-lock')) {
            return;
        }
        var current = root.children('.current').filter(':first'),
            previous = stack.pop();

        root.addClass('slide-lock');
        current.css('display', 'block');
        previous.css('z-index', -1).addClass('current').show(0, function () {
            current.removeClass('current');
            setTimeout(function () {
                current.css('display', '');
                previous.css({display: '', 'z-index': ''});
                root.removeClass('slide-lock');
            }, 500);
        });
    }

    /**
     * Public properties
     */
    context.root = root;
    context.init = init;
})(getNamespace('app.aside_menu'));
