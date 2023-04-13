function myFunction1024(x) {
    if (x.matches) { // If media query matches
        // jQuery('.single-post .single_inner_content #custom-bg').css('height', jQuery(window).width() / 2);
    } 
      else {
        // jQuery('.single-post .single_inner_content #custom-bg').css('height', '668px');
    }
  }

var x = window.matchMedia("(max-width: 1024px)")
myFunction1024(x) // Call listener function at run time
x.addListener(myFunction1024) // Attach listener function on state changes


jQuery(document).ready(function(){




  // search event request
  jQuery(document).on('click', '#search_up_event', function(e){
      e.preventDefault();
      let formdata = new FormData();
      let s_query = jQuery("#search_query").val();
      formdata.append('s_query', s_query);
      formdata.append('action','search_upcoming_event_action');
      jQuery.ajax({
          type: "post",
          data : formdata,
          url: opt.ajaxUrl,
          success: function(msg){
            jQuery(".container-event-listings").html(msg);
            // alert(msg);
            // console.log(msg);
          },
          cache: false,
          contentType: false,
          processData: false
      });
  });










	var offset = jQuery(".animate_author").offset();
// 	console.log(offset.left);
  jQuery(document).scroll(function(){
    if(jQuery(this).scrollTop() >= jQuery('.animation-start').offset().top - 500) {
        jQuery(".animate_ryan").addClass("animate__bounceInUp");
        jQuery(".animate_ryan").removeClass("animate__bounceOutDown");

		var st = jQuery('.animation-start').offset().top - jQuery(this).scrollTop();
// 		console.log("st = "+st+" | offset = "+offset);
  		if(st > 100){
			jQuery(".animate_author").css("left", st);
			jQuery(".animate_poet").css("right", st);
		}
//         jQuery(".animate_author").addClass("animate__bounceInRight");
//         jQuery(".animate_author").removeClass("animate__bounceOutRight");


//         jQuery(".animate_poet").addClass("animate__bounceInLeft");
//         jQuery(".animate_poet").removeClass("animate__bounceOutLeft");
	
	} 
    else {
      jQuery(".animate_ryan").addClass("animate__bounceOutDown");
      jQuery(".animate_ryan").removeClass("animate__bounceInUp");


//       jQuery(".animate_author").addClass("animate__bounceOutRight");
//       jQuery(".animate_author").removeClass("animate__bounceInRight");


//       jQuery(".animate_poet").addClass("animate__bounceOutLeft");
//       jQuery(".animate_poet").removeClass("animate__bounceInLeft");
    }
  });	
	


   // news slick slider
   jQuery(".news-slider").slick({
    infinite: false,
    // slidesToShow: 5,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    autoPlay: true,
    variableWidth: true,
    responsive: [
      {
        breakpoint: 600,
        settings: {
          variableWidth: false,
          slidesToShow: 1,
        },
      },
    ],
  });

  jQuery(".slider-for").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: ".slider-nav",
  });
  jQuery(".slider-nav").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".slider-for",
    prevArrow: jQuery(".prev-arrow"),
    nextArrow: jQuery(".next-arrow"),
    responsive: [
      {
        breakpoint: 1279,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 981,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          fade: true,
          centerMode: true,
        },
      },
    ],
  });
  jQuery(document).on('click', '.prev-arrow.slick-arrow', function(){
    jQuery('.books-count-wrap .total-count span').html(parseInt(jQuery('.slick-slide.slick-current.slick-active').attr('data-slick-index'))+1);
  });
  jQuery(document).on('click', '.next-arrow.slick-arrow', function(){
    jQuery('.books-count-wrap .total-count span').html(parseInt(jQuery('.slick-slide.slick-current.slick-active').attr('data-slick-index'))+1);
  });

  jQuery(document).on('mouseover', '.prev-arrow.slick-arrow', function(){
    jQuery(this).css('transform','rotate(180deg)');
    jQuery(this).attr("src", opt.home_url+"/wp-content/uploads/2022/09/image-18-Traced-2-1.png");

  });
  jQuery(document).on('mouseout', '.prev-arrow.slick-arrow', function(){
    jQuery(this).css('transform','rotate(0deg)');
    jQuery(this).attr("src", opt.home_url+"/wp-content/uploads/2022/09/prev-slick-arrow.png");
  });

  jQuery(document).on('mouseover', '.next-arrow.slick-arrow', function(){
    jQuery(this).css('transform','rotate(0deg)');
    jQuery(this).attr("src", opt.home_url+"/wp-content/uploads/2022/09/image-18-Traced-2-1.png");
    jQuery(this).css('transform','rotate(0deg)');
  });
  jQuery(document).on('mouseout', '.next-arrow.slick-arrow', function(){
    jQuery(this).css('transform','rotate(180deg)');
    jQuery(this).attr("src", opt.home_url+"/wp-content/uploads/2022/09/prev-slick-arrow.png");
  });
	






  var arrow_right = `
  <svg width="34" height="29" viewBox="0 0 34 29" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
  <rect width="34" height="29" fill="url(#pattern0)"/>
  <defs>
  <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
  <use xlink:href="#image0_77_707" transform="translate(-0.0118622 -0.206897) scale(0.00568736 0.00666794)"/>
  </pattern>
  <image id="image0_77_707" width="180" height="181" xlink:href="data:image/png;base64,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"/>
  </defs>
  </svg>`;

  let dropdown_svg = `
    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M3.73909 5.25H10.2608C10.3761 5.25048 10.4888 5.28517 10.5844 5.34966C10.6801 5.41416 10.7545 5.50557 10.7982 5.61234C10.8419 5.71911 10.8529 5.83644 10.83 5.94949C10.807 6.06255 10.751 6.16626 10.6691 6.2475L7.41409 9.5025C7.35986 9.55718 7.29535 9.60057 7.22426 9.63019C7.15318 9.6598 7.07693 9.67505 6.99992 9.67505C6.92292 9.67505 6.84667 9.6598 6.77559 9.63019C6.7045 9.60057 6.63999 9.55718 6.58576 9.5025L3.33076 6.2475C3.24884 6.16626 3.19286 6.06255 3.16989 5.94949C3.14691 5.83644 3.15798 5.71911 3.20168 5.61234C3.24539 5.50557 3.31978 5.41416 3.41543 5.34966C3.51109 5.28517 3.62372 5.25048 3.73909 5.25Z" fill="white"/>
    </svg>

  `;

  let arrow_svg = `
  <svg width="25" height="17" viewBox="0 0 25 17" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M4.19432 4.09094C0.580148 7.616 0 8.22583 0 8.5C0 8.77417 0.580148 9.384 4.19432 12.9091C8.20033 16.8162 8.4072 17 8.79949 17C9.11085 17 9.26592 16.9309 9.44055 16.7147C9.92121 16.1195 9.91032 16.105 6.39174 12.6706C4.58816 10.9102 3.1125 9.43435 3.1125 9.39093C3.1125 9.34762 7.93599 9.3121 13.8314 9.3121H24.5504L24.7807 9.02678C25.0731 8.6648 25.0731 8.3352 24.7807 7.97322L24.5504 7.6879H13.8314C7.93599 7.6879 3.1125 7.65238 3.1125 7.60907C3.1125 7.56565 4.58816 6.08979 6.39174 4.32937C9.91032 0.895045 9.92121 0.880535 9.44055 0.285318C9.26592 0.0690826 9.11085 0 8.79949 0C8.4072 0 8.20033 0.183751 4.19432 4.09094Z" fill="white"/>
</svg>
  `;

  jQuery('#main-header span.kadence-svg-iconset.svg-baseline').html(dropdown_svg);
  jQuery(".kt-btn-svg-icon").html(arrow_right);
  jQuery(".blog-slider article.kt-blocks-post-grid-item .entry-content .kt-blocks-post-readmore").append(arrow_right);
  jQuery('a.prev.page-numbers').html(arrow_svg);
  jQuery('a.next.page-numbers').html(arrow_svg);
  jQuery('.light-image-search').attr('src', opt.home_url+'/wp-content/uploads/2022/09/lightning.png');




  jQuery(".flip-link-front").on("click",function(){
    if(jQuery(".flip-box").css("transform") != 'none') {
      jQuery(".flip-box").css("transform","");
      jQuery(".flip-box img").attr("src",opt.home_url+"/wp-content/uploads/2022/09/Euphoric_Wonderland_hi_res_cover_for_eBook-scaled-1.png");
      jQuery(".flip-link-front").css({"background": "#BD291D","color": "#fff", "border-color": "#BD291D"});
      jQuery(".flip-link-back").css({"background": "rgba(255, 255, 255, 0.4)","color": "#000", "border-color": "rgba(255, 255, 255, 0.4)"});
    }
  });
  jQuery(".flip-link-back").on("click",function(){
    
    if(jQuery(".flip-box").css("transform") == 'none') {
      jQuery(".flip-box").css("transform","rotateY(180deg)");
      jQuery(".flip-box img").attr("src",opt.home_url+"/wp-content/uploads/2022/10/image_backcover_flipped.png");
      jQuery(".flip-box img").removeAttr('srcset');
      jQuery(".flip-link-back").css({"background": "#BD291D","color": "#fff"});
      jQuery(".flip-link-front").css({"background": "rgba(255, 255, 255, 0.4)","color": "#000", "border-color": "rgba(255, 255, 255, 0.4)"});
    }
  });


  jQuery("#wpdcom .wpd-form-head").html("Leave a Reply");
  jQuery("#wpdcom input#wpd-field-submit-0_0").val("Submit ");

  jQuery(document).on('click', ".wpd-reply-button", function(){
    jQuery("#wc-textarea-2_0").attr("placeholder", "Write Reply");
  });

  
  jQuery("#wc-textarea-0_0").attr("placeholder", "Type Here..");

  let comment_count = jQuery('.wpd-thread-info').attr("data-comments-count");
  comment_count = comment_count.trim();
  if(comment_count > 1){
    jQuery('.wpd-thread-info').html('<span>'+comment_count+' Responses</span>');
  }else{
    jQuery('.wpd-thread-info').html('<span>'+comment_count+' Response</span>');
  }


  jQuery(".postid-788 .single_inner_content .single_title").addClass("last-word-small");


 

});