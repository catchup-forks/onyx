(function(){
    function resizeSideNav(){
        $('#side-nav').css('height', $(window).height()-56+'px');
    }

    $(document).ready(resizeSideNav);
    $(window).load(resizeSideNav);
})();