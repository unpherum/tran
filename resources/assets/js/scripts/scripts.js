$(document).ready(function() {
	
	moment.locale("fr");
	
    $("#mmenu").mmenu({
		pageSelector: "#app",
		extensions: [
			"pagedim-black",
			"border-full"
		],
		navbar: {
			title: "BoxToShop"
		},
		onClick: {
			preventDefault: true
		},	        
		offCanvas: {
			zposition: "front"
		},
		onClick: false
	}, {
		clone: true
	});
	
	$(".mm-listview li a").removeClass("btn btn-info btn btn-raised");
	
	function init_headroom_header() {
	    $("header[role=header]").headroom({
		    offset: 140,
		    tolerance: {
		        up: 5,
		        down: 25
	    	},
	    	onPin: function() {
		    	$("html").addClass("header-pinned");
	    	},
	    	onUnpin: function() {
		    	$("html").removeClass("header-pinned");
	    	}
	    });		
	}
	init_headroom_header();
	
	if( $(".widget-send-parcel").length) {
	    $(".widget-send-parcel").headroom({
		    offset: 800,
		    tolerance : {
		        up : 0,
		        down : 5
	    	}
	    });		
	}
	if( $("#datetime").length) {	
		
		var todayDate = new Date().getDate();
		
        $("#datetime").datetimepicker({
	        format: "YYYY-MM-DD",
            locale: "fr",
            inline: true,
            defaultDate: false,
            useCurrent: false,
            daysOfWeekDisabled: [0, 6],
            minDate: new Date(new Date().setDate(todayDate + 1)),
            maxDate: new Date(new Date().setDate(todayDate + 14)),
            icons: {
                previous: "mdi mdi-chevron-left mdi-24px",
                next: "mdi mdi-chevron-right mdi-24px"
            }
        });	       
        
    }

	$(".btn-next").on("click", function(e) {
		e.preventDefault();
		alert($("#datetime").data("date"));
	});

    $(".owl-home").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 8000,
        nav: false,
        dots: true,
		responsiveClass: true,
        responsive: {
            0:{
                items:1,
		        mouseDrag: true,
		        touchDrag: true
            },
            992:{
                items:1,
		        mouseDrag: false,
		        touchDrag: false
		    }
        }
    });
    
    var args = $(".owl-arguments").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        nav: false,
        dots: false,
	    mouseDrag: false,
        touchDrag: false,
        items:1,
		animateOut: "fadeInUp",
		animateIn: "fadeOutUp"
    });    

    args.on("changed.owl.carousel", function(event) {
        $(".arguments li").removeClass("highlight");
        $(".arguments li").eq(event.item.index-2).addClass("highlight");
    })
    	
});