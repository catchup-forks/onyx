(function(){
    function resizeSideNav(){
        $('#side-nav, #side-nav-sticky-wrapper').css('height', $(window).height()-56+'px');
    }

    $(document).ready(resizeSideNav);
    $(window).load(resizeSideNav).resize(resizeSideNav);

    window.initMenu = function(url){
        $('#side-nav').find('.nav-link[href="'+url+'"]').addClass('text-white').parent('.nav-item')
            .addClass('bg-blue-grey-3').closest('.navbar-collapse').addClass('show');
    };

    $('#side-nav').sticky({ wrapperClassName: 'sticky-wrapper col-md-2', topSpacing: 56 });
    $('#side-nav-sticky-wrapper').addClass('collapse width show');
})();