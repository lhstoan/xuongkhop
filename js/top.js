// DOCUMENT READY
jQuery(document).ready(function () {
    "use strict";

    // if (jQuery('.sec-point .list-point .desc-ipoint p').length > 0) {
    //     jQuery('.sec-point .list-point .desc-ipoint p').matchHeight();
    // }
});


// WINDOW LOAD
jQuery(window).bind('load', function () {
    "use strict";

    // SLIDER
    // if (jQuery('#visual').length > 0) {
    //     jQuery('#visual').slick({
    //         dots: false,
    //         infinite: true,
    //         speed: 1000,
    //         slidesToShow: 1,
    //         slidesToScroll: 1,
    //         autoplay: true,
    //         autoplaySpeed: 5000,
    //         arrows: false,
    //         centerMode: false,
    //         centerPadding: 0,
    //         pauseOnHover: false,
    //         fade: false,
    //         variableWidth: false,
    //         responsive: [{
    //             breakpoint: 750,
    //             settings: {
    //                 slidesToShow: 2,
    //             }
    //         },
    //         {
    //             breakpoint: 525,
    //             settings: {
    //                 slidesToShow: 1
    //             }
    //         }
    //         ]
    //     });

    // jQuery('#visual').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    //     /* proceed before the slider changes slide */
    // });
    // jQuery('#visual').on('afterChange', function (event, slick, currentSlide) {
    //     /* proceed after the slider changes slide */
    // });

    // }

    /*============== END - SLIDER ================*/

    // SLIDER
    // if( jQuery('#slider-id').length > 0 ) {
    //     var _length_items = jQuery('#slider-id .slider-item').length;
    //     jQuery('#slider-id').slick({
    //         dots: false,
    //         infinite: true,
    //         speed: 1000,
    //         slidesToShow: 1,
    //         slidesToScroll: 1,
    //         autoplay: true,
    //         autoplaySpeed: 5000,
    //         arrows: false,
    //         centerMode: false,
    //         centerPadding: 0,
    //         pauseOnHover: false,
    //         fade: false,
    //         variableWidth: false,
    //     });
    //     jQuery('#slider-id').on('beforeChange', function(event, slick, currentSlide, nextSlide){
    //         if(currentSlide === (_length_items - 1)) {
    //             jQuery('#slider-id .slick-current + .slick-slide').addClass('cloned-active');
    //         }
    //         if(currentSlide === 0) {
    //             jQuery('#slider-id [data-slick-index="-1"]').addClass('cloned-active');
    //         }
    //     });
    //     jQuery('#slider-id').on('afterChange', function(event, slick, currentSlide){
    //         jQuery('#slider-id .cloned-active').removeClass('cloned-active');
    //     });
    // }
    /*============== END - SLIDER ================*/

    // CONTENT LOAD ANIMATION
    // AOS.init({
    //     duration: 600,
    //     disable: 'mobile',
    //     once: true
    // });

    // new WOW().init();
    /*============== END - CONTENT LOAD ANIMATION ================*/

    // if(jQuery('.iNews-list').length){
    //     jQuery('.iNews-list').mCustomScrollbar()
    // }

    // jQuery.ajax({
    //     url: "information/_custom/?limit=4",
    //     dataType: "jsonp",
    //     success: function (json) {
    //         jQuery.each(json.data, function (i, val) {
    //             var date = val.date.replace("/", ".").replace("/", ".");
    //             // var title = (val.title.length > 20 && jQuery(window).width() > 750) ? val.title.substring(0, 20) + '...' : val.title;
    //             var items = 
    //             '<li class="post-news">'
    //             +'<div class="news-wr">'
    //             +'<p class="date-news">' + val.date + '</p>'
    //             +'<p class="cat-news">' + val.category_name + '</p>'
    //             +'</div>'
    //             +'<p class="tit-news">'
    //             +'<a href="./information/' + val.url + '"><span>' + val.title + '</span></a>'
    //             +'</p>'
    //             +'</li>';
    //             jQuery(".list-news").append(items);
    //         });
    //     },
    // });

    // jQuery.ajax({
    // 	url: 'news/_custom/?limit=3',
    // 	dataType: 'jsonp',
    // 	success: function (json) {
    // 		jQuery.each(json.data,function (i,val) {
    // 			var date=val.date.replace("/",".").replace("/",".");
    // 			// var title = (val.title.length > 20 && jQuery(window).width() > 750) ? val.title.substring(0, 20) + '...' : val.title;
    // 			var items=
    // 				'<div class="post-news">'+
    // 				'<p class="cat-post cate'+val.category_id+'">'+val.category_name+'</p>'+
    // 				'<div class="post-news-wr">'+
    // 				'<p class="date-post">'+val.date+'</p>'+
    // 				'<p class="title-post">'+
    // 				'<a href="./news/'+val.url+'">'+val.title+'</a>'+
    // 				'</p>'+
    // 				'</div>'+
    // 				'</div>';


    // 			jQuery(".list-post-news").append(items);
    // 		});
    // 		if (jQuery('.list-post-news').length>0) {
    // 			jQuery('.list-post-news').slick({
    // 				infinite: true,
    // 				speed: 1000,
    // 				slidesToShow: 1,
    // 				slidesToScroll: 1,
    // 				autoplay: true,
    // 				autoplaySpeed: 5000,
    // 				arrows: false,
    // 				centerMode: false,
    // 				centerPadding: 0,
    // 				pauseOnHover: false,
    // 				rows: 0,
    // 				variableWidth: false,
    // 			});
    // 		}
    // 	}
    // });

    // jQuery.ajax({
    //     url: 'case/_custom/?limit=6',
    //     dataType: 'jsonp',
    //     success: function (json) {
    //         jQuery.each(json.data, function (i, val) {
    //             var arrImg = ["img01", "img02", "img03"];
    //             var loading = "";
    //             for (let i = 0; i < arrImg.length; i++) {
    //                 var get_img = val[arrImg[i]];
    //                 if (get_img) {
    //                     loading = jQuery(get_img).attr("src");
    //                     break;
    //                 }
    //             }
    //             if (loading == "") {
    //                 loading = "./images/sample-img01.jpg";
    //             }
    //             var getText = jQuery(val.text01).text();
    //             // var checkDesc = getText ? '<p class="sub-tit-case">' + getText + '</p>' : '';
    //             var checkDesc = '<p class="sub-tit-case">' + getText + '</p>';
    //             var items =
    //                 '<div class="it-case">' +
    //                 '<a href="./case/' + val.url + '"></a>' +
    //                 '<p class="tit-case">' + val.title + '</p>' +
    //                 checkDesc +
    //                 '<p class="img-case">' +
    //                 '<img src="' + loading + '" alt="' + val.title + '" width="320" height="200" loading="lazy">' +
    //                 '</p>' +
    //                 '</div>'
    //             jQuery('.list-case').append(items);
    //         });
    //         if (jQuery('.list-case').length > 0) {
    //             jQuery('.list-case').slick({
    //                 dots: false,
    //                 infinite: true,
    //                 speed: 1000,
    //                 slidesToShow: 3,
    //                 slidesToScroll: 1,
    //                 autoplay: true,
    //                 autoplaySpeed: 5000,
    //                 centerMode: false,
    //                 arrow: true,
    //                 nextArrow: '<div class="arr-sl-r"></div>',
    //                 prevArrow: '<div class="arr-sl-l"></div>',
    //                 centerPadding: 0,
    //                 pauseOnHover: false,
    //                 fade: false,
    //                 variableWidth: false,
    //                 responsive: [{
    //                     breakpoint: 750,
    //                     settings: {
    //                         slidesToShow: 2,
    //                     }
    //                 },
    //                 {
    //                     breakpoint: 525,
    //                     settings: {
    //                         slidesToShow: 1,
    //                     }
    //                 }
    //                 ]
    //             });
    //         }
    //         var place = jQuery('.wr-list-case');
    //         jQuery('.arr-sl-l').appendTo(place);
    //         jQuery('.arr-sl-r').appendTo(place);
    //     }
    // });

    // jQuery.ajax({
    //     url: "https://www.inoueshouji.com/case/_custom/?cat=3&limit=99999",
    //     dataType: "jsonp",
    //     success: function (json) {
    //         var posts_length = json.data.length;
    //         var countPages = Math.ceil(posts_length / 20);
    //         for (var n = 1; n <= countPages; n++) {
    //             var tables = '<table class="table-postl"><thead><tr><th class="date-postl">売却時期</th><th class="tit-postl">物件所在地</th><th class="cat-postl">物件種目</th></tr></thead><tbody></tbody></table>';
    //             jQuery(".wrap-table-postl").append(tables);
    //         }

    //         jQuery.each(json.data, function (i, val) {
    //             var date = val.date.replace("/", ".").replace("/", ".");
    //             var countItems = i + 1;
    //             var countPages = Math.ceil(countItems / 20);

    //             var items = '<tr><td>' + val.txt03 + '</td><td>' + val.txt02 + '</td><td>' + val.txt01 + '</td></tr>';
    //             jQuery(".wrap-table-postl table:nth-child(" + countPages + ")").append(items);

    //         });
    // if (jQuery('.wrap-table-postl').length > 0) {
    //     jQuery('.wrap-table-postl').slick({
    //         dots: false,
    //         infinite: true,
    //         speed: 1000,
    //         slidesToShow: 1,
    //         slidesToScroll: 1,
    //         autoplay: false,
    //         // autoplaySpeed: 5000,
    //         nextArrow: '<div class="next-postl">',
    //         prevArrow: '<div class="prev-postl">',
    //         // prevArrow: jQuery(".iProperty-btn__arrow .iSlide-prev"),
    //         // nextArrow: jQuery(".iProperty-btn__arrow .iSlide-next"),
    //         // prevArrow: jQuery('.iProperty-btn__arrow .iSlide-prev'),
    //         // nextArrow: jQuery('.iProperty-btn__arrow .iSlide-next'),
    //         centerMode: false,
    //         centerPadding: 0,
    //         pauseOnHover: false,
    //         fade: true,
    //         variableWidth: false,
    //         dots: true,
    //         dotsClass: 'grpdot-postl',
    //     });
    // }
    //         var place = jQuery('.dot-arrow-postl');
    //         jQuery('.prev-postl').prependTo(place);
    //         jQuery('.grpdot-postl').appendTo(place);
    //         jQuery('.next-postl').appendTo(place);
    //     },
    // });

});