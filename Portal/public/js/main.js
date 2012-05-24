jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("left", (($(window).width() - this.outerWidth()) / 2) + 
                                                $(window).scrollLeft() + "px");
    return this;
}

$(document).ready(function() {
  $('#menu-item a').css('line-height', $('#menu-item').css('height'));
  $('div.view').center();
});


