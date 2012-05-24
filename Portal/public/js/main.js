jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("left", (($(window).width() - this.outerWidth()) / 2) + 
        $(window).scrollLeft() + "px");
    return this;
}



$(document).ready(function() {
    $('div#site').center();
    $('table#example').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers"
    });
    
    $(".fancybox-effects-d").fancybox({
        padding: 0,

        openEffect : 'elastic',
        openSpeed  : 150,

        closeEffect : 'elastic',
        closeSpeed  : 150,

        closeClick : true,

        helpers : {
            overlay : {
                css : {
                    'background-color' : '#000'
                }
            }
        }
    });
   
});


