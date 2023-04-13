<?php
/**
 * Template part for displaying a post or page.
 *
 * @package kadence
 */
namespace Kadence;
get_header();
do_action( 'kadence_hero_header' );

?>
<div id="primary" class="content-area">
	<div class="content-container site-container">
		<main id="main" class="site-main" role="main">
			<?php
			/**
			 * Hook for anything before main content
			 */
			do_action( 'kadence_before_main_content' );
			?>
			<div class="content-wrap">
				<?php
                $published_date = get_the_date();
				if ( is_404() ) {
					do_action( 'kadence_404_content' );
				} elseif ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
                        gt_set_post_view();
                        $post_id = get_the_id();
                        ?>
                        <div class="single_inner_content">
                        <?php if (has_post_thumbnail( $post_id ) ): ?>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                        <?php
                        if($post_id != 788){
                            ?>
                            <div id="custom-bg1">
                                <?php echo '<img class="custom_feature_img" src="'.$image[0].'" />' ?>
                            </div>
                            <h1 class="single_title_mobile"><?php echo get_the_title(); ?></h1>
                            <?php
                        }else{
                            ?>
                            <div id="custom-bg1">
                            <?php echo '<img class="custom_feature_img" src="'.$image[0].'" />' ?>
                            </div>
                            <!-- <h1 class="single_title_mobile">Altruistically Germane Not Defective or Feig<span class="last-letter-small">n</span></h1> -->
                            <h1 class="single_title_mobile">Altruistically Germane Not Defective or Feig<span class="last-letter-small">n</span></h1>
                            <?php
                        }
                        ?>
                        
                        <?php endif; ?>
                            <div class="single_content_divider">
                                <div class="single_sec_left">
                                    <div class="the_content">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                                <div class="single_sec_right">
                                    <div class="single_meta_info">
                                        <p class="post_views"><?php echo gt_get_post_view(); ?></p>
                                        
                                        <p class="published_date"><?php echo $published_date; ?></p>
                                        <?php
                                        if(has_category()){
                                            echo '<p class="tag_heading nipcensbold">Category</p><p class="post_tags">';
                                            echo $cats_list = get_the_category_list(', ');
                                            echo '</p>';
                                        }
                                        
                                        $random_col = array('#70D4B6', '#B0456F', '#AAC581','#D45928');
                                        $tags = get_the_tags();
                                        echo '<p class="tag_heading nipcensbold">Tags</p><p class="post_tags">';
                                        $count = 0;
                                        foreach($tags as $tag){
                                            $k = array_rand($random_col);
                                            if($count == sizeof($tags) - 1){
                                                echo '<span style="color:'.$random_col[$count].'">'.$tag->name.'</span>';
                                            }else{
                                                echo '<span style="color:'.$random_col[$count].'">'.$tag->name.', </span>';
                                            }
                                            $count++;
                                        }
                                        echo '</p>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

						// get_template_part( 'template-parts/content/single-entry', get_post_type() );
                        if ( kadence()->show_comments() ) {
                            comments_template();
                        }
					}
				} else {
					get_template_part( 'template-parts/content/error' );
				}
				?>
			</div>
			<?php			
			/**
			 * Hook for anything after main content
			 */
			do_action( 'kadence_after_main_content' );
			?>
		</main><!-- #main -->
		<?php
		get_sidebar();
		?>
	</div>
</div><!-- #primary -->

<?php
get_footer();
?>