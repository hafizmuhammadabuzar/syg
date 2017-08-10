jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	}
});

/* ==============================================
Map
=============================================== */

function initMap() {

//    if( $('body').hasClass('project-page') ) {
 //       return false;
  //  }

    var scrollElement = $('html,body'),
        $map = $('#map'),
        $mapHolder = $('#map-holder'),
        $mapclose = $('.map-close'),
        mapActiveClass = 'map-active',
        mapStartingHeight = $('#map').height(),
        mapHeight = 650,
        mapAnimationTime = 800,
        mapEasing = 'easeInOutExpo',
        mapOptions = {
            center: new google.maps.LatLng(25.1246,55.3810),
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel: false
        },
        map,
        mapMarkerTitle = 'Nervaq';


    $mapHolder.on('click', function() {

        var $this = $('#map-holder');

        if( !$this.parent().hasClass(mapActiveClass) ) {

            scrollElement.stop().animate({scrollTop: ($this.offset().top - 65) + 'px'}, mapAnimationTime, mapEasing);
            $this.parent().addClass(mapActiveClass);
            $this.stop().animate({'height': mapHeight + 'px'}, mapAnimationTime, function() {
                map = new google.maps.Map(document.getElementById("map-holder"),mapOptions);
                var marker = new google.maps.Marker({
                    position: mapOptions.center,
                    title: mapMarkerTitle
                });
                marker.setMap(map);
                $this.stop().animate({'opacity': 1}, mapAnimationTime);
                $mapclose.fadeIn();
            }); 
        }    
    });

    $mapclose.on('click', function(e) {

        e.preventDefault();

        if( $('#map').hasClass(mapActiveClass) ) {
            $('#map').removeClass(mapActiveClass);
            $('#map-holder').stop().animate({'height': mapStartingHeight, 'opacity': 0}, mapAnimationTime, function() {
                $('#map-holder').empty().removeAttr('style');
                $mapclose.fadeOut();
            });
        }

    });
}

$(document).ready(function() {
    initMap();
});
