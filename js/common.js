// ANCHOR LINK
var offset_PC = 0; /* offset header in PC (px) */
var offset_SP = 0; /* offset header in SP (px) */
function anchorLink(el) {
    /* trigger to open tab contain the Anchor, related to the function CHANGE TAB below. */
    var _parent = jQuery(el).parents('[data-tab-content]');
    if (_parent) {
        var _tab_ID = _parent.data('tab-content');
        var _group = _parent.data('tab-group');
        jQuery('[data-tab="' + _tab_ID + '"').each(function () {
            if (jQuery(this).data('tab-group') === _group) {
                jQuery(this).trigger('click');
            }
        });
    }

    /* position of element */
    var offset = jQuery(el).offset();
    if (jQuery(window).width() > 750) {
        jQuery('html,body').animate({ scrollTop: offset.top - offset_PC }, 400);
    } else {
        jQuery('html,body').animate({ scrollTop: offset.top - offset_SP }, 400);
    }
}
// =========== END - ANCHOR LINK ============


// WINDOW LOAD
jQuery(window).bind('load', function () {
    "use strict";

    /* ANCHOR FROM OTHER PAGE */
    var hash = location.hash;
    if (hash && jQuery(hash).length > 0) {
        anchorLink(hash);
    }

    /* ANCHOR IN PAGE */
    jQuery('a[href^="#"]').click(function () {
        var get_ID = jQuery(this).attr('href');
        if (get_ID != "#" && jQuery(get_ID).length) {
            anchorLink(get_ID);
            // close Menu (is opening) in SP
            if (jQuery('body').hasClass('open-nav')) {
                jQuery('#menu-toggle').trigger('click');
            }
            return false;
        }
    });

    // custom anchor for one page
    const urlOnePage = jQuery("");
    jQuery(urlOnePage).click(function () {
        jQuery("body").removeClass("open-nav");
        jQuery('#menu-toggle').removeClass('open');
        let arrHref = jQuery(this).attr("href").split("#");
        let hash = "#" + arrHref[arrHref.length - 1];

        if (jQuery(hash).length > 0) {
            anchorLink(hash);
        }
    });


    /* SCROLL TO MAIL FORM (MW WP FORM) */
    if (jQuery('.mw_wp_form_confirm').length) {
        sessionStorage.setItem("step_confirm", true);
    } else {
        if (sessionStorage.getItem("step_confirm")) {
            if (jQuery('.mw_wp_form').length) {
                var offset = jQuery('.mw_wp_form').offset();
                if (jQuery(window).width() > 750) {
                    jQuery('html,body').animate({ scrollTop: offset.top - offset_PC }, 400);
                } else {
                    jQuery('html,body').animate({ scrollTop: offset.top - offset_SP }, 400);
                }
            }
        }
        sessionStorage.removeItem("step_confirm");
    }


    // LAZY LOAD RESOURCE
    jQuery('[data-href]').each(function () {
        var _this = jQuery(this);
        var href = jQuery(this).data('href');
        setTimeout(function () {
            _this.attr('href', href);
        }, 3000);
    });
    jQuery('[data-src]').each(function () {
        var _this = jQuery(this);
        var src = jQuery(this).data('src');
        setTimeout(function () {
            _this.attr('src', src);
        }, 3000);
    });
    // =========== END - LAZY LOAD RESOURCE ============
});


// SCROLL TO MAIL FORM (FMAIL)
var formID = '#fmail-section';
if (jQuery(formID).length) {
    var mode = new URLSearchParams(window.location.search).get('mode');
    if (["confirm", "thanks", "error"].includes(mode)) {
        performance.navigation.type = 1;
        anchorLink(formID);
    }
    window.onpageshow = function (event) {
        jQuery('html,body').stop();
        if (performance.navigation.type != 2 && !["confirm", "thanks", "error"].includes(mode)) {
            window.onunload = function () { scrollTo(0, 0); };
        } else {
            anchorLink(formID);
        }
    };
}
// =========== END - SCROLL TO MAIL FORM (FMAIL) ============


// WINDOW LOAD/SCROLL
jQuery(window).bind('load scroll', function () {
    // var _scrollTop = jQuery(this).scrollTop();
    // // TO-TOP
    // if (_scrollTop >= 500) {
    //     jQuery('.to-top').addClass('show');
    // } else {
    //     jQuery('.to-top').removeClass('show');
    // }
    // =========== END - TO-TOP ============

    var pTop = jQuery(this).scrollTop();
    if (pTop > 0) {
        jQuery("body").addClass('fixed');
    } else {
        jQuery("body").removeClass('fixed');
    }
});

// WINDOW LOAD/SCROLL
jQuery(window).bind('load scroll', function () {

    const mvsHeight = jQuery('.sec-mvs').height();

    // TO-TOP
    if (jQuery(this).scrollTop() > mvsHeight) {
        jQuery('#home .to-top').addClass('show');
    } else {
        jQuery('#home .to-top').removeClass('show');
    }

    if (jQuery(this).scrollTop() > 400) {
        jQuery('.under .to-top').addClass('show');
    } else {
        jQuery('.under .to-top').removeClass('show');
    }
    // =========== END - TO-TOP ============

    // STICKY-FOOTER
    var screenWidth = jQuery(window).width();
    if (screenWidth <= 750) {
        if (jQuery(this).scrollTop() >= mvsHeight) {
            jQuery('#home .stick-ft').addClass('show');
        } else {
            jQuery('#home .stick-ft').removeClass('show');
        }

        if (jQuery(this).scrollTop() >= 400) {
            jQuery('.under .stick-ft').addClass('show');
        } else {
            jQuery('.under .stick-ft').removeClass('show');
        }
    }
    // =========== END - STICKY-FOOTER ============

});



// DOCUMENT READY
jQuery(document).ready(function () {
    "use strict";

    // TOGGLE MENU IN SP
    jQuery('#menu-toggle').click(function () {
        jQuery(this).toggleClass('open');
        jQuery('body').toggleClass('open-nav');
        // if (jQuery('body').hasClass('open-nav')) {
        //     jQuery("#menu-toggle .status").text("CLOSE");
        // } else {
        //     jQuery("#menu-toggle .status").text("MENU");
        // }
    });
    jQuery(document).on('mousedown touchstart', function (e) {
        if (jQuery(e.target).closest(".menu-hd, #menu-toggle").length === 0) {
            if (jQuery('body').hasClass('open-nav')) {
                jQuery('#menu-toggle').trigger('click');
            }
        }
    });
    // =========== END - TOGGLE MENU IN SP ============

    // TOGGLE SLIDE FOR SUB-MENU IN SP
    jQuery('.menu-hd-list .has-sub .label_sub').click(function () {
        var screenWidth = jQuery(window).width();
        if (screenWidth <= 750) {
            jQuery(this).toggleClass('open');
            jQuery(this).next().stop().slideToggle(200);
        }
    });
    // =========== END - TOGGLE SLIDE FOR SUB-MENU IN SP ============



    // CHANGE TAB
    jQuery('[data-tab]').click(function () {
        var group = jQuery(this).data('tab-group');
        var index = jQuery(this).data('tab');
        jQuery('[data-tab][data-tab-group="' + group + '"].active').removeClass('active');
        jQuery(this).addClass('active');

        jQuery('[data-tab-content][data-tab-group="' + group + '"].active').removeClass('active');
        jQuery('[data-tab-content="' + index + '"][data-tab-group="' + group + '"]').addClass('active');
    });
    // =========== END - CHANGE TAB ============



    // ACCORDION
    jQuery(".accordion-button").click(function (e) {
        e.preventDefault();
        jQuery(this).toggleClass("open");
        var accordion_ID = jQuery(this).attr('id');
        var accordion_content = jQuery('[data-accordion-for="' + accordion_ID + '"]');
        accordion_content.stop().slideToggle(200);
    });
    // =========== END - ACCORDION ============

});

function Marquee(selector, speed, gap = 50) {
	const parent = document.querySelector(selector);
	const originalContent = parent.innerHTML;
	parent.innerHTML = '';
  
	// Tạo một cụm chứa nội dung với khoảng cách
	function createGroup() {
	  const group = document.createElement('div');
	  group.style.display = 'inline-block';
	  group.style.marginRight = `${gap}px`;
	  group.innerHTML = originalContent;
	  return group;
	}
  
	const sampleGroup = createGroup();
	parent.appendChild(sampleGroup);
  
	const contentWidth = sampleGroup.offsetWidth + gap;
	const screenWidth = window.innerWidth;
  
	const repeatCount = Math.ceil(screenWidth / contentWidth) + 2;
	for (let i = 0; i < repeatCount; i++) {
	  parent.appendChild(createGroup());
	}
  
	let position = 0;
	let animationFrame;
  
	function animate() {
	  position += speed;
	  if (position >= contentWidth) {
		position = 0;
	  }
	  parent.scrollLeft = position;
	  animationFrame = requestAnimationFrame(animate);
	}
  
	function startMarquee() {
	  cancelAnimationFrame(animationFrame);
	  animationFrame = requestAnimationFrame(animate);
	}
  
	function stopMarquee() {
	  cancelAnimationFrame(animationFrame);
	}
  
	parent.addEventListener('mouseenter', stopMarquee);
	parent.addEventListener('mouseleave', startMarquee);
  
	parent.style.whiteSpace = 'nowrap';
	parent.style.overflow = 'hidden';
	parent.style.display = 'block';
  
	startMarquee();
  }
  
  window.addEventListener('load', () => Marquee('.marquee', 0.5, 60)); // 60px gap
  