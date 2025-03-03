<?php 
if (!function_exists('newses_footer_missed_section')) :
/**
 *  Footer
 *
 * @since Newses
 *
 */
function newses_footer_missed_section(){
    $you_missed_enable = esc_attr(get_theme_mod('you_missed_enable','true'));
    if($you_missed_enable == true){ ?>
        <div class="container mg-posts-sec-inner mg-padding">
            <div class="missed-inner wd-back">
                <div class="small-list-post row">
                    <?php $you_missed_title = get_theme_mod('you_missed_title', esc_html('You missed','newses'));
                    if($you_missed_title) { ?>
                    <div class="col-md-12">
                        <div class="mg-sec-title st3">
                            <!-- mg-sec-title -->
                            <h4><span class="bg"><?php echo esc_html($you_missed_title); ?></span></h4>
                        </div>
                    </div>
                    <?php } 
                    $newses_you_missed_loop = new WP_Query(array( 'post_type' => 'post', 'posts_per_page' => 4, 'order' => 'DESC',  'ignore_sticky_posts' => true));
                    global $post;
                    if ( $newses_you_missed_loop->have_posts() ) :
                    while ( $newses_you_missed_loop->have_posts() ) : $newses_you_missed_loop->the_post(); ?>
                        <!--col-md-3-->
                        <div class="col-lg-3 col-md-6 pulse animated">
                            <div class="mg-blog-post-box sm mb-lg-0">
                            <?php $url = newses_get_freatured_image_url($post->ID, 'full'); ?>
                                <div class="mg-blog-thumb md back-img" style="background-image: url('<?php echo esc_url($url); ?>');">
                                <a href="<?php the_permalink(); ?>" class="link-div"></a>
                                <?php newses_post_categories();
                                    echo newses_post_format_type($post); ?>
                            </div>
                                <article class="small px-0 mt-2">
                                <h4 class="title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array('before' => 'Permalink to: ','after'  => '') ); ?>"> <?php the_title(); ?></a> </h4>
                                <?php newses_post_meta(); ?>
                                </article>
                            </div>
                        </div>
                        <!--/col-md-3-->
                    <?php endwhile; endif; wp_reset_postdata(); ?> 
                </div>
            </div>
        </div>
    <?php }
}
endif;
add_action('newses_action_footer_missed_section','newses_footer_missed_section');