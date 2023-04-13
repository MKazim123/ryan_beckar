<?php
/**
 * Setup Child Theme Styles
 */
function kadence_child_enqueue_styles() {
	wp_enqueue_style( 'kadence_child-style', get_stylesheet_directory_uri() . '/style.css', false, time() );
	wp_enqueue_style( 'animation-css-style', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', false, time() );
	wp_enqueue_style( 'slick-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css' );
	wp_enqueue_style( 'slick-theme-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css' );
	wp_enqueue_style( 'slick-theme-min-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css' );

	// wp_enqueue_script('slickjs', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js', array('jquery'));
	wp_enqueue_script('slickthemejs', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js', array('jquery'));
	wp_enqueue_script('custom-script', get_stylesheet_directory_uri().'/custom-script.js', array('jquery'), time(), true);
	wp_localize_script(
		'custom-script',
		'opt',
		array('ajaxUrl' => admin_url('admin-ajax.php'),
		'home_url' => home_url(),
		'noResults' => esc_html__('No data found', 'textdomain'),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'kadence_child_enqueue_styles', 20 );


/**
 * Setup Child Theme Palettes
 *
 * @param string $palettes registered palette json.
 * @return string
 */
function kadence_child_change_palette_defaults( $palettes ) {
	$palettes = '{"palette":[{"color":"#3182CE","slug":"palette1","name":"Palette Color 1"},{"color":"#2B6CB0","slug":"palette2","name":"Palette Color 2"},{"color":"#1A202C","slug":"palette3","name":"Palette Color 3"},{"color":"#2D3748","slug":"palette4","name":"Palette Color 4"},{"color":"#4A5568","slug":"palette5","name":"Palette Color 5"},{"color":"#718096","slug":"palette6","name":"Palette Color 6"},{"color":"#EDF2F7","slug":"palette7","name":"Palette Color 7"},{"color":"#F7FAFC","slug":"palette8","name":"Palette Color 8"},{"color":"#ffffff","slug":"palette9","name":"Palette Color 9"}],"second-palette":[{"color":"#3182CE","slug":"palette1","name":"Palette Color 1"},{"color":"#2B6CB0","slug":"palette2","name":"Palette Color 2"},{"color":"#1A202C","slug":"palette3","name":"Palette Color 3"},{"color":"#2D3748","slug":"palette4","name":"Palette Color 4"},{"color":"#4A5568","slug":"palette5","name":"Palette Color 5"},{"color":"#718096","slug":"palette6","name":"Palette Color 6"},{"color":"#EDF2F7","slug":"palette7","name":"Palette Color 7"},{"color":"#F7FAFC","slug":"palette8","name":"Palette Color 8"},{"color":"#ffffff","slug":"palette9","name":"Palette Color 9"}],"third-palette":[{"color":"#3182CE","slug":"palette1","name":"Palette Color 1"},{"color":"#2B6CB0","slug":"palette2","name":"Palette Color 2"},{"color":"#1A202C","slug":"palette3","name":"Palette Color 3"},{"color":"#2D3748","slug":"palette4","name":"Palette Color 4"},{"color":"#4A5568","slug":"palette5","name":"Palette Color 5"},{"color":"#718096","slug":"palette6","name":"Palette Color 6"},{"color":"#EDF2F7","slug":"palette7","name":"Palette Color 7"},{"color":"#F7FAFC","slug":"palette8","name":"Palette Color 8"},{"color":"#ffffff","slug":"palette9","name":"Palette Color 9"}],"active":"palette"}';
	return $palettes;
}
add_filter( 'kadence_global_palette_defaults', 'kadence_child_change_palette_defaults', 20 );

/**
 * Setup Child Theme Defaults
 *
 * @param array $defaults registered option defaults with kadence theme.
 * @return array
 */
function kadence_child_change_option_defaults( $defaults ) {
	$new_defaults = '[]';
	$new_defaults = json_decode( $new_defaults, true );
	return wp_parse_args( $new_defaults, $defaults );
}
add_filter( 'kadence_theme_options_defaults', 'kadence_child_change_option_defaults', 20 );


add_action('wp_head', 'ryan_styles_in_header');
function ryan_styles_in_header(){
	?>
	<style>
		@font-face {
		font-family: 'PinkChicken';
		src: url(<?php echo home_url("/wp-content/themes/kadence_child/fonts/PinkChicken-Regular.ttf")?>);
		}
		@font-face {
		font-family: 'NipCensBold';
		src: url(<?php echo home_url("/wp-content/themes/kadence_child/fonts/NipCens-Handwriting-Bold.ttf")?>);
		}
		@font-face {
		font-family: 'NipCensCBold';
		src: url(<?php echo home_url("/wp-content/themes/kadence_child/fonts/NipCens-Handwriting-CondBd.ttf")?>);
		}
		@font-face {
		font-family: 'NipCensLight';
		src: url(<?php echo home_url("/wp-content/themes/kadence_child/fonts/NipCens-Handwriting-Light.ttf")?>);
		}
		@font-face {
		font-family: 'NipCensRegular';
		src: url(<?php echo home_url("/wp-content/themes/kadence_child/fonts/NipCens-Handwriting-Regular.ttf")?>);
		}
		@font-face {
		font-family: 'times';
		src: url(<?php echo home_url("/wp-content/themes/kadence_child/fonts/times.ttf")?>);
		}
		#main-header ul.menu li.menu-item.current-menu-item a::after{
			background-image: url(<?php echo home_url('/wp-content/uploads/2022/09/Ellipse-2.png') ?>);
		}
		#masthead #main-header .site-container .site-main-header-inner-wrap::after{
			background-image: url(<?php echo home_url('/wp-content/uploads/2022/09/Line-1.png') ?>);
		}
		.single-post #wrapper{
			background-image: url(<?php echo home_url('/wp-content/uploads/2022/09/Group-238031-1.png') ?>);
		}

		.blog-slider article.kt-blocks-post-grid-item .kt-blocks-date.kt-blocks-post-footer-section::before{
			background: url(<?php echo home_url('/wp-content/uploads/2022/09/image-4-Traced.png') ?>);
		}
		#sprite_org{
			background-image: url(<?php echo home_url('/wp-content/uploads/2022/09/spritesheet1.png') ?>);
		}
		#sprite_rotate{
			background-image: url(<?php echo home_url('/wp-content/uploads/2022/09/spritesheet1.png') ?>);
		}
		#bird_org{
			background-image: url(<?php echo home_url('/wp-content/uploads/2022/09/left-branches_bird-copy.png') ?>);
		}
		#bird_rotate{
			background-image: url(<?php echo home_url('/wp-content/uploads/2022/09/left-branches_bird-copy.png') ?>);
		}
		.review-heading::after{
			background-image: url(<?php echo home_url('/wp-content/uploads/2022/09/Decore.png') ?>);
		}
		form.wpd_comm_form.wpd-secondary-form-wrapper .wc_comm_submit {
			background: url(<?php echo home_url('/wp-content/uploads/2022/09/image-24-Traced.png') ?>) no-repeat 0 0 !important;
		}
		#contact_submit_wrap::after, .cf7-submit-div > span.submit-container::after{
			background: url(<?php echo home_url('/wp-content/uploads/2022/09/arrow-right.png') ?>)
		}
		#wpdcom form.wpd_comm_form.wpd_main_comm_form .wc-field-submit::after{
			background: url(<?php echo home_url('/wp-content/uploads/2022/09/arrow-right.png') ?>)
		}
		/* #wpdcom form.wpd_comm_form.wpd_main_comm_form wc-field-submit{
			background-image: url(<?php echo home_url('/wp-content/uploads/2022/09/arrow-right.png') ?>) no-repeat 0 0 !important;
		} */

		/* @media(max-width: 1024px){
			.testing-lottie-bg-front-section{
				background-image: url(<?php echo home_url('/wp-content/uploads/2022/09/Group-238031-1.png') ?>);
			}
		} */
	</style>
	<?php
}




// For Post Views
function gt_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    return "<span>Post Views: </span>".$count;
}
function gt_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function gt_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
function gt_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo gt_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'gt_posts_column_views' );
add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );



// GET Events Shortcode
function get_past_event_func(){
	$data_to_return = '<div class="get_past_events">';
	$args = array(  
        'post_type' => 'event',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'orderby' => 'title', 
        'order' => 'ASC', 
		'meta_query' => array(
			array(
			   'key' => 'event_date',
			   'value' => date("Y-m-d"),
			   'compare' => '<',
			   'type' => 'DATE'// you can change it to datetime also
		   )
		)
    );

    $loop = new WP_Query( $args ); 
    $i = 1;   
    while ( $loop->have_posts() ) : $loop->the_post(); 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-event-thumbnail' );
		$event_date = get_field('event_date');
		$date_formatted = date("l F j, Y", strtotime($event_date));
        if($i % 2 == 0){
			$data_to_return .= '
			<div class="past_event" style="flex-direction: row-reverse;justify-content: flex-end;">
				<div class="sec_left">
					<h2 class"event_title">'.get_the_title().'</h2>
					<p  class="event_date">'.$date_formatted.'</p>
					<p class="start_end_time">'.get_field('start_time', get_the_ID()).' - '.get_field('end_time', get_the_ID()).'</p>
					<p class="event_loc">Location: <span>'.get_field('event_location', get_the_ID()).'</span></p>
				</div>
				<div class="sec_right"><img style="border-radius: 12px;" src="'.$image[0].'"></div>
			</div>
			';
		}else{
			$data_to_return .= '
			<div class="past_event"  style="flex-direction: row;justify-content: space-between;">
				<div class="sec_left">
					<h2 class"event_title">'.get_the_title().'</h2>
					<p  class="event_date">'.$date_formatted.'</p>
					<p class="start_end_time">'.get_field('start_time', get_the_ID()).' - '.get_field('end_time', get_the_ID()).'</p>
					<p class="event_loc">Location: <span>'.get_field('event_location', get_the_ID()).'</span></p>
				</div>
				<div class="sec_right"><img style="border-radius: 12px;" src="'.$image[0].'"></div>
			</div>
		';
		}
		$i++;
    endwhile;

    wp_reset_postdata(); 

	$data_to_return .= '</div>';

	return $data_to_return;
}
add_shortcode( 'Get_Past_Events', 'get_past_event_func' );


// Get all Interviews
function get_interviews_func(){
	$data_to_return = '<div class="get_interviews">';
	$args = array(  
        'post_type' => 'interviews',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'orderby' => 'title', 
        'order' => 'ASC',
    );

    $loop = new WP_Query( $args );   
    while ( $loop->have_posts() ) : $loop->the_post(); 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-interview-thumbnail' );
		$interview_date = get_field('interview_date');
		$date_formatted = date("F j, Y", strtotime($interview_date));
		$data_to_return .= '
		<div class="interview">
			<div class="sec_left">
				<h2 class"interview_title">'.get_the_title().'</h2>
				<div class="interview_meta">
					<p class="interview_with">With: <span>'.get_field('interview_with', get_the_ID()).'</span></p>
					<p  class="interview_date">'.$date_formatted.'</p>
				</div>
				<span class="rb_separator"></span>
				<p class="interview_excerpt">'.get_the_excerpt().'</p>
			</div>
			<div class="sec_right"><img src="'.$image[0].'"></div>
		</div>
		';
    endwhile;

    wp_reset_postdata(); 

	$data_to_return .= '</div>';

	return $data_to_return;
}
add_shortcode( 'Get_interviews', 'get_interviews_func' );




// News Slider
function news_slider_func(){
	$data_to_return = '<div class="news-slider">';
	$args = array(  
        'post_type' => 'all_news',
        'post_status' => 'publish',
        'posts_per_page' => 20, 
        'orderby' => 'title', 
        'order' => 'ASC',
    );

    $loop = new WP_Query( $args );   
    while ( $loop->have_posts() ) : $loop->the_post(); 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-interview-thumbnail' );
		$interview_date = get_field('interview_date');
		$date_formatted = date("F j, Y", strtotime($interview_date));
		$data_to_return .= '
		<div class="news-content-main-wrapper">
			<div>
				<img src="'.$image[0].'" class="news-content-img"/>
				<div class="news-content-wrapper">
					<div>
					<h3 class="news-content-heading">
						'.get_the_title().'
					</h3>
					<p class="news-content-date">'.get_the_date().'</p>
					</div>
					<p class="news-content-para">
					'.substr(get_the_excerpt(), 0, 200).'
					</p>
				</div>
			</div>
		</div>
		';
    endwhile;

	wp_reset_postdata(); 

	$data_to_return .= '</div>';

	return $data_to_return;
}
add_shortcode( 'News_slider', 'news_slider_func' );


function flash_news_func(){
	$data_to_return = '';
	$args = array(  
        'post_type' => 'all_news',
        'post_status' => 'publish',
        'posts_per_page' => 1, 
        'orderby' => 'rand', 
        'order' => 'ASC',
    );

    $loop = new WP_Query( $args );   
	
    while ( $loop->have_posts() ) : $loop->the_post(); 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-interview-thumbnail' );
		$interview_date = get_field('interview_date');
		$date_formatted = date("F j, Y", strtotime($interview_date));
		$data_to_return .= '
		<div class="flash-news-wrapper">
			<p class="flash-news">Flash News</p>
	
			<marquee width="100%" direction="left">
			'.get_the_excerpt().'
			</marquee>
		</div>
		';
    endwhile;

	wp_reset_postdata(); 

	// $data_to_return .= '</div>';

	return $data_to_return;
}
add_shortcode( 'Flash_News', 'flash_news_func' );


function single_news_func(){
	$data_to_return = '<div class="news-long-content-section">';
	$args = array(  
        'post_type' => 'all_news',
        'post_status' => 'publish',
        'posts_per_page' => 1, 
        'orderby' => 'rand', 
        'order' => 'ASC',
    );

    $loop = new WP_Query( $args );   
	
    while ( $loop->have_posts() ) : $loop->the_post(); 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-interview-thumbnail' );
		$interview_date = get_field('interview_date');
		$date_formatted = date("F j, Y", strtotime($interview_date));
		$data_to_return .= '
		<div class="news-long-content-container">
			<div class="news-long-content-main-wrapper">
			<img src="'.$image[0].'" class="news-long-content-img" />
			<div class="news-long-content-wrapper">
				<h3 class="news-long-content-heading">'.get_the_title().'</h3>
				<p class="news-long-content-date">'.get_the_date().'</p>
				<p class="news-long-content-para">
					'.get_the_content().'
				</p>
			</div>
			</div>
		</div>
		';
    endwhile;

	wp_reset_postdata(); 

 // for short news
	$data_to_return .= '
	<div class="sidebar-news-main-wrapper">
        <div class="sidebar-news-wrapper">
          <h1 class="sidebar-news-heading">News Exercite Lamco Laboris</h1>
          <p class="sidebar-news-para">
	';
	$args2 = array(  
        'post_type' => 'all_news',
        'post_status' => 'publish',
        'posts_per_page' => 10, 
        'orderby' => 'rand', 
        'order' => 'ASC',
    );

    $loop2 = new WP_Query( $args2 );   
	
    while ( $loop2->have_posts() ) : $loop2->the_post(); 
		$data_to_return .= substr(get_the_excerpt(), 0, 100).'
		<br /><br />
		';
    endwhile;


	$data_to_return .= '
	
				</p>
    		</div>
    	</div>
	</div>
	';

	return $data_to_return;
}
add_shortcode( 'Single_News', 'single_news_func' );



function get_upcoming_event_func(){

	$args1  = array(  
        'post_type' => 'event',
        'post_status' => 'publish',
		'meta_query' => array(
			array(
			   'key' => 'event_date',
			   'value' => date("Y-m-d"),
			   'compare' => '>',
			   'type' => 'DATE'
		   )
		)
    );

	$total_up_events = new WP_Query( $args1 );
	$total_up_events = $total_up_events->found_posts;   // total number of upcoming events;
	$number = 3;
	// $paged = get_query_var('paged');

	$data_to_return = '<div class="container-event-listings"><section class="events-listing">';
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;  
	// $args = array(  
    //     'post_type' => 'event',
    //     'post_status' => 'publish',
    //     'posts_per_page' => 10, 
	// 	'paged' => $paged, 
    //     'order' => 'ASC', 
	// 	'meta_query' => array(
	// 		array(
	// 		   'key' => 'event_date',
	// 		   'value' => date("Y-m-d"),
	// 		   'compare' => '>',
	// 		   'type' => 'DATE'
	// 	   )
	// 	)
    // );
	$args = array(  
        'post_type' => 'event',
        'post_status' => 'publish',
        'count_totals' => true,
		'posts_per_page' => 3,
		'offset' => $paged ? $number * ($paged - 1):0,
		'number' => $number,    
        'order' => 'ASC', 
		'meta_query' => array(
			array(
			   'key' => 'event_date',
			   'value' => date("Y-m-d"),
			   'compare' => '>',
			   'type' => 'DATE'
		   )
		)
    );

    $loop = new WP_Query( $args ); 
    while ( $loop->have_posts() ) : $loop->the_post(); 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-event-thumbnail' );
		$event_date = get_field('event_date');
		$date_formatted = date("l F j, Y", strtotime($event_date));
		$data_to_return .= '
			<div class="single-event-box">
				<div class="img-wrap">
					<img src="'.$image[0].'" />
				</div>
				<div class="event-title-wrap">
					<span class="event-name">'.get_the_title().'</span>
					<span class="author">Author: '.get_the_author().'</span>
					<span class="rb_separator" style="margin: 10px 0 5px 0;"></span>
				</div>
				<div class="event-desc-wrap">
					<p>
						'.substr(get_the_excerpt(), 0, 200).'
					</p>
				</div>

				<div class="event-meta">
					<div class="event-date">
						<img src="'.home_url('/wp-content/uploads/2022/09/calendar.png').'" alt="calendar" /><span
						>'.$date_formatted.'</span
						>
					</div>
					<div class="event-time">
						<img src="'.home_url('/wp-content/uploads/2022/09/clock.png').'" alt="time" /><span>'.get_field('start_time').'</span>
					</div>
				</div>

				<div class="event-location">
				<img src="'.home_url('/wp-content/uploads/2022/09/location.png').'" alt="location" /><span
					>'.get_field('event_location').'</span
				>
				</div>
          </div>
		';
    endwhile;

	$data_to_return .= '
	</section>';
	if($total_up_events > $number){

		$pl_args = array(
		   'base'     => @add_query_arg('paged','%#%'),
		   'format'   => '',
		   'total'    => ceil($total_up_events / $number),
		   'current'  => max(1, $paged),
		   'prev_next' => True,
			'prev_text' => __( '<' ),
			'next_text' => __( '>' )
		);
	  
		// for ".../page/n"
		if($GLOBALS['wp_rewrite']->using_permalinks())
		  $pl_args['base'] = user_trailingslashit(trailingslashit(get_pagenum_link(1)).'page/%#%/', 'paged');
	  
		$data_to_return .= '<div class="mt-5 pagination-wrap">'.paginate_links($pl_args)."</div>";
	}

    wp_reset_postdata(); 

	$data_to_return .= '
	</div>';
	// <nav class="up_event_pagination">
	// 	<ul class="pagination-wrap">
	// 		<li>'.get_previous_posts_link( "P", $loop->max_num_pages).'</li> 
	// 		<li>'.get_next_posts_link( "N", $loop->max_num_pages).'</li>
	// 	</ul>
	// </nav>';

	return $data_to_return;
}
add_shortcode( 'Get_Upcoming_Events', 'get_upcoming_event_func' );



// ajax search filter
add_action( 'wp_ajax_search_upcoming_event_action', 'search_upcoming_event_funt' );
add_action( 'wp_ajax_nopriv_search_upcoming_event_action', 'search_upcoming_event_funt' );
function search_upcoming_event_funt(){
    global $wpdb;
	$data_to_return .= '<section class="events-listing">';
    $s_query = $_POST['s_query'] ? $_POST['s_query'] : "";
	$args = array(
		"post_type" => "event",
		'posts_per_page' => -1, 
		"s" => $s_query,
		'order' => "ASC",
		'meta_query' => array(
			array(
			   'key' => 'event_date',
			   'value' => date("Y-m-d"),
			   'compare' => '>',
			   'type' => 'DATE'
		   )
		)
	);
	$query = get_posts( $args );
	foreach($query as $qr){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $qr->ID ), 'single-event-thumbnail' );
		$event_date = get_field('event_date', $qr->ID);
		$date_formatted = date("l F j, Y", strtotime($event_date));
		$data_to_return .= '
			<div class="single-event-box">
				<div class="img-wrap">
					<img src="'.$image[0].'" />
				</div>
				<div class="event-title-wrap">
					<span class="event-name">'.$qr->post_title.'</span>
					<span class="author">Author: '.get_the_author_meta( 'user_nicename' , $qr->post_author ).'</span>
					<span class="rb_separator" style="margin: 10px 0 5px 0;"></span>
				</div>
				<div class="event-desc-wrap">
					<p>
						'.substr($qr->post_excerpt, 0, 200).'
					</p>
				</div>

				<div class="event-meta">
					<div class="event-date">
						<img src="'.home_url('/wp-content/uploads/2022/09/calendar.png').'" alt="calendar" /><span
						>'.$date_formatted.'</span
						>
					</div>
					<div class="event-time">
						<img src="'.home_url('/wp-content/uploads/2022/09/clock.png').'" alt="time" /><span>'.get_field('start_time', $qr->ID).'</span>
					</div>
				</div>

				<div class="event-location">
				<img src="'.home_url('/wp-content/uploads/2022/09/location.png').'" alt="location" /><span
					>'.get_field('event_location', $qr->ID).'</span
				>
				</div>
          	</div>
		';
	}
	$data_to_return .= '</section>';
    // print_r($query);
	echo $data_to_return;

    die();
}



// book page slider
function book_slider_func(){

	$args1  = array(  
        'post_type' => 'book',
        'post_status' => 'publish',
    );

	$total_books = new WP_Query( $args1 );
	$total_books = $total_books->found_posts;

	$i = 1;

	$data_to_return = '
	<section class="books-sec">
		<div class="book-info-box slider-for">
	';
	$args = array(  
        'post_type' => 'book',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'order' => 'ASC',
    );

    $loop = new WP_Query( $args );   
	
    while ( $loop->have_posts() ) : $loop->the_post(); 
	$tags = get_the_tags();
	$tags_html = "";
	$tags_links = array(
		
		
		"https://www.amazon.com/Euphoric-Wonderland-Collection-Psychedelic-Stimulate-ebook/dp/B09W8X69HS/ref=tmm_kin_swatch_0?_encoding=UTF8&qid=1664056477&sr=8-1",
		"https://www.goodreads.com/book/show/60676407-euphoric-wonderland",
		"https://www.amazon.com/Euphoric-Wonderland-Collection-Psychedelic-Stimulate/dp/B09WL7QW3J/ref=tmm_hrd_swatch_0?_encoding=UTF8&qid=1664056477&sr=8-1",
		"https://www.amazon.com/Euphoric-Wonderland-Collection-Psychedelic-Stimulate/dp/B09WHG11FP/ref=tmm_pap_swatch_0?_encoding=UTF8&qid=1664056477&sr=8-1"
		
	);
	$j = 0;
	foreach($tags as $tag){
		$tags_html .= '<span><a style="text-decoration:none;color: #FFFFFF;" href="'.$tags_links[$j].'">'.$tag->name.'</a></span>';
		$j++;
	}
	$discount_wrap = "";
	if(!empty(get_field('discount_code'))){
		$discount_wrap = '
		<div class="discount-text-wrap">
			<span
			>Special edition Trippy-Ass discount code:
			<span class="special-text">'.get_field('discount_code').'</span>
			</span>
		</div>
		';
	}

	$data_to_return .= '
		<div class="book-info-one">
            <span class="book-quote">'.get_field('main_heading').'</span>
            <span class="book-desc">'.get_the_content().'</span>
            <div class="book-tags">
              '.$tags_html.'
            </div>

            '.$discount_wrap.'

            <div class="action-btn-wrap">
              <a style="text-decoration:none;" href="'.get_field('special_edition_url').'" class="special"><span>Special Edition</span><img src="'.home_url("/wp-content/uploads/2022/09/arrow-right.png").'" alt="thumbs-up" /></a>
              <a style="text-decoration:none;" href="'.get_field('toadvine_url').'" class="toadvine"><span>Toadvine Books</span></a>
            </div>
        </div>
		';
    endwhile;

	$data_to_return .= '
	</div>
		<div class="books-slider-wrap">
          <div class="books-count-wrap">
            <span class="total-count"><span>1</span>/'.$total_books.'</span>
            <div class="book-slider-arrows">
              <img src="'.home_url("/wp-content/uploads/2022/09/prev-slick-arrow.png").'" class="prev-arrow" />
              <img src="'.home_url("/wp-content/uploads/2022/09/prev-slick-arrow.png").'" class="next-arrow" />
            </div>
          </div>

          <div class="plank-img-wrap">
            <img src="'.home_url("/wp-content/uploads/2022/09/purple-plank.png").'" alt="plank" />
          </div>
		  <div class="book-sliders-cont slider-nav">
	';

	while ( $loop->have_posts() ) : $loop->the_post(); 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-interview-thumbnail' );
		$data_to_return .= '
		<div class="single-book">
			<img src="'.$image[0].'" alt="book-one" />
		</div>
		';
    endwhile;


	wp_reset_postdata(); 

	$data_to_return .= '
			</div>
		</div>
	</section>
	';

	return $data_to_return;
}
add_shortcode( 'Get_Book_Slider', 'book_slider_func' );