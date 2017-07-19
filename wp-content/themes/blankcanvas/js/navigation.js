// Danger Zone JS file
var $ = jQuery;

// fade in window on load
jQuery(document).ready(function() {
    jQuery('body').delay( 800 ).animate({'opacity':'1'},500);
});


/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */
( function() {
	var container, button, menu, links, subMenus;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );

	// Set menu items with submenus to aria-haspopup="true".
	for ( var i = 0, len = subMenus.length; i < len; i++ ) {
		subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}
} )();


//for disabling a link, use onclick="return disabledLink()"
disabledLink = function() {
         // Your code here
         return false;
    }




 // jQuery( document ).ready( function() {
    
 //    //caches a jQuery object containing the header element
 //    var header = jQuery("#masthead");

 //    jQuery(window).scroll(function() {
 //        var scroll = jQuery(window).scrollTop();
 //        if (scroll <= 100) {
 //            header.addClass("nav-text");
 //        } else {
 //            header.removeClass("nav-text")
 //        }
 //        if (scroll >= 100) {
 //            header.addClass("nav-color");
 //        } else {
 //            header.removeClass("nav-color")
 //        }
 //    });

   

//end jQuery ready function     
// });


// var js = {};
// !function($) {
//     $.fn.exists = function() {
//         return $(this).length > 0
//     }
//     ,
//     js.model = {
//         events: {},
//         extend: function(e) {
//             var t = $.extend({}, this, e);
//             return $.each(t.events, function(e, i) {
//                 t._add_event(e, i)
//             }),
//             t
//         },
//         _add_event: function(e, t) {
//             var i = this
//               , s = e
//               , a = ""
//               , o = document;
//             e.indexOf(" ") > 0 && (s = e.substr(0, e.indexOf(" ")),
//             a = e.substr(e.indexOf(" ") + 1)),
//             "resize" != s && "scroll" != s || (o = window),
//             $(o).on(s, a, function(e) {
//                 e.$el = $(this),
//                 "function" == typeof i.event && (e = i.event(e)),
//                 i[t].apply(i, [e])
//             })
//         }
//     },
//     js.global = js.model.extend({
//         events: {
//             ready: "ready"
//         },
//         ready: function() {
//             $("#content iframe").each(function() {
//                 $(this).wrap('<div class="embed-container post-content-embed"></div>')
//             })
//         }
//     }),
//     js.mobile = js.model.extend({
//         events: {
//             "click #mobile-nav-toggle": "toggle_mobile_nav"
//         },
//         toggle_mobile_nav: function(e) {
//             e.preventDefault(),
//             $("#masthead").toggleClass("-open")
//         }
//     }),
//     js.prism = js.model.extend({
//         events: {
//             ready: "ready",
//             "click .pre-title": "toggle"
//         },
//         toggle: function(e) {
//             $code = e.$el.parent(),
//             $code.hasClass("closed") ? $code.removeClass("closed") : $code.addClass("closed")
//         },
//         ready: function() {
//             $("pre code").each(function() {
//                 var e = "default"
//                   , t = $(this).html();
//                 t = t.trim(),
//                 $(this).html(t),
//                 t.indexOf("php") !== !1 && (e = "php"),
//                 $(this).addClass("language-" + e)
//             })
//         }
//     }),
//     js.header = js.model.extend({
//         $header: null ,
//         $sub_header: null ,
//         active: 0,
//         hover: 0,
//         show: 0,
//         y: 0,
//         opacity: 1,
//         direction: "down",
//         events: {
//             ready: "ready",
//             scroll: "scroll",
//             "mouseenter #masthead": "mouseenter",
//             "mouseleave #masthead": "mouseleave"
//         },
//         ready: function() {
//             this.$header = $("#masthead"),
//             this.$sub_header = $("#sub-header"),
//             this.active = 1
//         },
//         mouseenter: function() {
//             var e = $(window).scrollTop();
//             this.hover = 1,
//             this.opacity = 1,
//             this.show = e,
//             this.$header.stop().animate({
//                 opacity: 1
//             }, 250)
//         },
//         mouseleave: function() {
//             this.hover = 0
//         },
//         scroll: function() {
//             if (this.active) {
//                 var e = $(window).scrollTop()
//                   , t = e >= this.y ? "down" : "up"
//                   , i = t !== this.direction
//                   , s = e - this.y
//                   , a = this.$sub_header.outerHeight();
//                 clearTimeout(this.t),
//                 70 > e && this.$header.removeClass("-white"),
//                 i && (0 == this.opacity && "up" == t ? (this.show = e,
//                 a > e ? this.show = 0 : this.show -= 70) : 1 == this.opacity && "down" == t && (this.show = e),
//                 this.show = Math.max(0, this.show)),
//                 this.$header.hasClass("-open") && (this.show = e),
//                 this.hover && (this.show = e);
//                 var o = e - this.show;
//                 o = Math.max(0, o),
//                 o = Math.min(o, 70);
//                 var n = (70 - o) / 70;
//                 this.$header.css("opacity", n),
//                 e > a ? this.$header.addClass("-white") : 0 == n && this.$header.removeClass("-white"),
//                 this.y = e,
//                 this.direction = t,
//                 this.opacity = n
//             }
//         }
//     }),
//     js.tooltip = js.model.extend({
//         $el: null ,
//         events: {
//             "mouseenter [title]": "mouseenter",
//             "mouseleave [title]": "mouseleave"
//         },
//         mouseenter: function(e) {
//             var t = e.$el.attr("title");
//             t && (this.$el = $('<div class="tooltip">' + t + "</div>"),
//             $("body").append(this.$el),
//             this.$el.css({
//                 top: e.$el.offset().top - this.$el.outerHeight() - 6,
//                 left: e.$el.offset().left + e.$el.outerWidth() / 2 - this.$el.outerWidth() / 2
//             }),
//             e.$el.data("title", t),
//             e.$el.attr("title", ""))
//         },
//         mouseleave: function(e) {
//             this.$el && (e.$el.attr("title", e.$el.data("title")),
//             this.$el.remove())
//         }
//     }),
//     js.zoomable = js.model.extend({
//         $a: null ,
//         $img: null ,
//         active: !1,
//         busy: !1,
//         y: 0,
//         events: {
//             ready: "ready",
//             scroll: "scroll",
//             "click .zoomable": "_click"
//         },
//         ready: function() {
//             $('a[href$=".jpg"], a[href$=".png"], a[href$=".gif"]').addClass("zoomable")
//         },
//         scroll: function() {
//             if (this.active) {
//                 var e = $(window).scrollTop()
//                   , t = 100;
//                 (e > this.y + t || e < this.y - t) && this.close()
//             }
//         },
//         _click: function(e) {
//             if (e.preventDefault(),
//             !this.busy) {
//                 var t = this;
//                 this.$a = e.$el,
//                 this.$img = this.$a.children("img"),
//                 this.active ? this.close() : this.open(),
//                 this.busy = !0,
//                 setTimeout(function() {
//                     t.busy = !1
//                 }, 310)
//             }
//         },
//         open: function() {
//             var e = this.$a
//               , t = this.$img;
//             this.active = !0,
//             this.y = $(window).scrollTop(),
//             e.addClass("-calculate");
//             var i = t.width()
//               , s = t.height()
//               , a = s / i * 100;
//             e.removeClass("-calculate");
//             var o = $(window).height()
//               , n = $(window).width()
//               , r = (o - s) / 2 - (e.offset().top - this.y)
//               , h = (n - i) / 2 - e.offset().left;
//             e.append('<div class="placeholder" style="padding-bottom:' + a + '%"></div>'),
//             e.addClass("-active"),
//             t.css({
//                 top: 0,
//                 left: 0,
//                 width: e.width(),
//                 height: e.height()
//             }),
//             setTimeout(function() {
//                 e.addClass("-zoom"),
//                 t.css({
//                     top: r,
//                     left: h,
//                     width: i,
//                     height: s
//                 })
//             }, 10)
//         },
//         close: function() {
//             var e = this.$a
//               , t = this.$img;
//             this.active = !1,
//             e.removeClass("-zoom"),
//             t.css({
//                 top: 0,
//                 left: 0,
//                 width: e.width(),
//                 height: e.height()
//             }),
//             setTimeout(function() {
//                 e.removeClass("-active"),
//                 e.children(".placeholder").remove(),
//                 t.css({
//                     top: "auto",
//                     left: "auto",
//                     width: "auto",
//                     height: "auto"
//                 })
//             }, 310)
//         }
//     })
// }(jQuery),
// function($) {
//     js.site = js.model.extend({
//         o: {},
//         m: {},
//         events: {
//             ready: "ready"
//         },
//         ready: function() {
//             $("#on-this-page").each(function() {
//                 var e = $(this);
//                 $("#content h2").each(function() {
//                     var t = $(this).text()
//                       , i = t.toLowerCase().replace(" ", "-");
//                     $(this).attr("id", i),
//                     e.append('<li><a href="#' + i + '">' + t + "</a></li>")
//                 })
//             }),
//             $("#hero").each(function() {
//                 var e = 500;
//                 $("#hero-fields img").each(function(t) {
//                     var i = $(this);
//                     setTimeout(function() {
//                         i.addClass("active")
//                     }, e + 100 * t)
//                 })
//             })
//         }
//     }),
//     js.twitter = js.model.extend({
//         events: {
//             ready: "ready"
//         },
//         ready: function() {
//             var e = "http://opensharecount.com/count.json"
//               , t = "https://twitter.com/intent/tweet";
//             $(".twitter-count").each(function() {
//                 var i = $(this)
//                   , s = i.attr("data-url") || document.location.href
//                   , a = i.attr("data-text") || document.title
//                   , o = i.attr("data-via") || ""
//                   , n = i.attr("data-hashtags") || "";
//                 i.attr({
//                     href: t + "?original_referer=" + encodeURIComponent(document.location.href) + "&source=tweetbutton&text=" + encodeURIComponent(a) + "&url=" + encodeURIComponent(s),
//                     target: "_blank"
//                 }),
//                 i.on("click", function(e) {
//                     return window.open($(this).attr("href"), "newwindow", "width=500,height=400"),
//                     !1
//                 }),
//                 $.getJSON(e + "?url=" + s, function(e) {
//                     i.find(".secondary").html(e.count)
//                 })
//             })
//         }
//     }),
//     js.search = js.model.extend({
//         $form: null ,
//         $field: null ,
//         $input: null ,
//         $results: null ,
//         timeout: null ,
//         search: "",
//         xhr: null ,
//         events: {
//             ready: "ready",
//             "submit #sub-header-search": "submit",
//             'keyup #sub-header-search input[type="text"]': "keyup",
//             "click #sub-header-search .fa-times": "clear"
//         },
//         ready: function() {
//             var e = $("#sub-header-search");
//             e.exists() && (this.$form = e,
//             this.$field = $(".field", e),
//             this.$input = $('input[type="text"]', e),
//             this.$results = $('<div class="field-results"></div>'),
//             this.$field.append(this.$results))
//         },
//         submit: function(e) {
//             e.preventDefault()
//         },
//         clear: function(e) {
//             e.preventDefault(),
//             this.$form.find('input[type="text"]').val("").trigger("keyup")
//         },
//         keyup: function(e) {
//             var t = this
//               , i = this.$input.val();
//             if (i != this.search) {
//                 if (this.search = i,
//                 this.$form.removeClass("is-open is-loading"),
//                 !i || i.length < 3)
//                     return this.$results.html(""),
//                     void this.abort();
//                 this.abort(),
//                 this.$form.addClass("is-loading"),
//                 this.timeout = setTimeout(function() {
//                     t.fetch()
//                 }, 250)
//             }
//         },
//         abort: function() {
//             this.xhr && this.xhr.abort(),
//             clearTimeout(this.timeout)
//         },
//         fetch: function() {
//             var e = this;
//             this.xhr = $.ajax({
//                 url: this.$form.attr("action"),
//                 type: "get",
//                 dataType: "html",
//                 cache: !1,
//                 crossDomain: !0,
//                 data: this.$form.serialize(),
//                 success: function(t) {
//                     e.$form.addClass("is-open"),
//                     e.$results.html(t),
//                     e.sort_results()
//                 },
//                 complete: function() {
//                     e.$form.removeClass("is-loading")
//                 }
//             })
//         },
//         sort_results: function() {
//             var e = $("ul", this.$results)
//               , t = $("li", this.$results)
//               , i = this.$input.val().toLowerCase()
//               , s = i.length;
//             t.each(function() {
//                 var e = $(this)
//                   , t = $(".search-result-title", e).text().toLowerCase()
//                   , s = t.length;
//                 title_s_length = s - t.split(i).join("").length;
//                 var a = title_s_length / s * 100;
//                 e.attr("data-i", a)
//             }),
//             t.sort(function(e, t) {
//                 return t.getAttribute("data-i") - e.getAttribute("data-i")
//             }).appendTo(e)
//         }
//     }),
//     js.ninput = js.model.extend({
//         events: {
//             ready: "ready",
//             ajaxComplete: "ajaxComplete",
//             "focus .ninput": "_render",
//             "blur .ninput": "_render",
//             "keyup .ninput": "_render"
//         },
//         ready: function() {
//             var e = this;
//             $(".cart .coupon").each(function() {
//                 e.init($(this))
//             }),
//             $("#wrap").hasClass("my-account") || $(".form-row").each(function() {
//                 e.init($(this))
//             })
//         },
//         ajaxComplete: function(e, t, i) {
//             i && "/checkout/?wc-ajax=update_order_review" === i.url && this.ready()
//         },
//         init: function(e) {
//             if (!e.hasClass("ninput")) {
//                 var t = e.children("[name]")
//                   , i = e.children("label")
//                   , s = t.attr("type")
//                   , a = t.attr("placeholder");
//                 "checkbox" != s && "hidden" != s && "submit" != s && (a || (a = i.text(),
//                 t.attr("placeholder", a)),
//                 i.exists() || (i = $("<label></label>"),
//                 t.before(i)),
//                 i.text(a),
//                 e.addClass("ninput"),
//                 this.render(e))
//             }
//         },
//         render: function(e) {
//             var t = e.find("[name]")
//               , i = e.find("label");
//             e.removeClass("-f -v"),
//             t.is(":focus") && e.addClass("-f"),
//             t.val() && e.addClass("-v")
//         },
//         _render: function(e) {
//             this.render(e.$el)
//         }
//     })
// }(jQuery);


    
     jQuery( document ).ready( function() {


        //masthead padding addition
        var mast = jQuery('#masthead');
        var content = jQuery('#content');
       
        // get the height of #masthead
        var mastHeight = mast.height();
        mastHeight = mastHeight;
        // console.log(mastHeight);       
        // add that number to #content in padding
        // content.css('padding-top', mastHeight);



        // talk box
        var talkPop = jQuery('.talk-pop');
        var talkBtn = jQuery('.talk');   
        var talkExit = jQuery('.talk-exit');   
        talkBtn.on( "click", function() {
            talkPop.show();
            talkBtn.hide();
        });
        talkExit.on( "click", function() {
            talkPop.hide();
            talkBtn.show();
        });
     });


jQuery

// BEGIN PARALLAX
jQuery(document).ready(function(){
 
    function draw() {
        requestAnimationFrame(draw);
        // Drawing code goes here
        scrollEvent();
    }
    draw();
 
});
 
function scrollEvent(){
 
    if(!is_touch_device()){
        viewportTop = jQuery(window).scrollTop();
        windowHeight = jQuery(window).height();
        viewportBottom = windowHeight+viewportTop;
 
        if(jQuery(window).width())
 
        jQuery('[data-parallax="true"]').each(function(){
            distance = viewportTop * jQuery(this).attr('data-speed');
            if(jQuery(this).attr('data-direction') === 'up'){ sym = '-'; } else { sym = ''; }
            jQuery(this).css('transform','translate3d(0, ' + sym + distance +'px,0)');
        });
 
    }
}   
 
function is_touch_device() {
  return 'ontouchstart' in window // works on most browsers 
      || 'onmsgesturechange' in window; // works on ie10
}
// END PARALLAX






// fade in on scroll
jQuery(document).ready(function() {
    
    /* Every time the window is scrolled ... */
    jQuery(window).on("load resize scroll",function(e){
    
        /* Check the location of each desired element */
        jQuery('.fadeInScroll').each( function(i){
            
            // var bottom_of_object = jQuery(this).offset().top + jQuery(this).outerHeight();
            var bottom_of_object = jQuery(this).offset().top + 100;
            var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                jQuery(this).animate({'opacity':'1'},500);
                    
            }
            
        }); 
    
    });
    
});




// sticky-bar 

var stickyHeaders = (function() {

  var $window = jQuery(window),
      $stickies;

  var load = function(stickies) {

    if (typeof stickies === "object" && stickies instanceof jQuery && stickies.length > 0) {

      $stickies = stickies.each(function() {

        var $thisSticky = jQuery(this).wrap('<div class="followWrap" />');
  
        $thisSticky
            .data('originalPosition', $thisSticky.offset().top)
            .data('originalHeight', $thisSticky.outerHeight())
              .parent()
              .height($thisSticky.outerHeight()); 			  
      });

      $window.off("scroll.stickies").on("scroll.stickies", function() {
		  _whenScrolling();		
      });
    }
  };

  var _whenScrolling = function() {

    $stickies.each(function(i) {			

      var $thisSticky = jQuery(this),
          $stickyPosition = $thisSticky.data('originalPosition');

      if ($stickyPosition <= $window.scrollTop()) {        
        
        var $nextSticky = $stickies.eq(i + 1),
            $nextStickyPosition = $nextSticky.data('originalPosition') - $thisSticky.data('originalHeight');

        $thisSticky.addClass("SBfixed");

        if ($nextSticky.length > 0 && $thisSticky.offset().top >= $nextStickyPosition) {

          $thisSticky.addClass("SBabsolute").css("top", $nextStickyPosition);
        }

      } else {
        
        var $prevSticky = $stickies.eq(i - 1);

        $thisSticky.removeClass("SBfixed");

        if ($prevSticky.length > 0 && $window.scrollTop() <= $thisSticky.data('originalPosition') - $thisSticky.data('originalHeight')) {

          $prevSticky.removeClass("SBabsolute").removeAttr("style");
        }
      }
    });
  };

  return {
    load: load
  };
})();

jQuery(function() {
  stickyHeaders.load(jQuery(".sticky-bar"));
});




// smooth scroll to link on page
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});