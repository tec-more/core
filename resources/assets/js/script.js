$(document).ready(function(){
    /**
     * Detect IE
     */
    Tuke.isIE(function(){
        /**
         * Callback
         */
    });

    /**
     * Add csrf token to ajax request
     */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    /**
     * Handle select media box
     */
    Tuke.handleSelectMediaBox();

    Tuke.tabChangeUrl();

    /**
     * Init layout
     */
    Tuke.initAjax();

    Tuke.fixedTopFormActions();
});

$(window).load(function () {
    Tuke.hideLoading();
});
