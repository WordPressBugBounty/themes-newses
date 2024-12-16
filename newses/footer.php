<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Newses
 */
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
<?php } ?>
<!--==================== FOOTER AREA ====================-->
<?php $newses_footer_widget_background = get_theme_mod('newses_footer_widget_background');
    $newses_footer_overlay_color = get_theme_mod('newses_footer_overlay_color'); 
    if(($newses_footer_widget_background != '') || ($newses_footer_overlay_color != '')) { ?>
    <footer class="footer back-img" style="background-image:url('<?php echo esc_url($newses_footer_widget_background);?>');">
        <div class="overlay" style="background-color: <?php echo esc_attr($newses_footer_overlay_color);?>;">
     <?php } else { ?>
    <footer class="footer"> 
        <div class="overlay">
    <?php } ?>
                <!--Start mg-footer-widget-area-->
                <?php if ( is_active_sidebar( 'footer_widget_area' ) ) { ?>
                <div class="mg-footer-widget-area">
                    <div class="container">
                        <div class="row">
                          <?php  dynamic_sidebar( 'footer_widget_area' ); ?>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/container-->
                </div>
                <?php } ?>
                <!--End mg-footer-widget-area-->
                <!--Start mg-footer-widget-area-->
                <div class="mg-footer-bottom-area">
                    <div class="container">
                        <?php if ( is_active_sidebar( 'footer_widget_area' ) ) { ?>
                        <div class="divide-line"></div>
                        <?php } ?>
                        <div class="row align-items-center">
                            <!--col-md-4-->
                            <div class="col-md-6">
                                <?php the_custom_logo(); 
                                if (display_header_text()) : ?>
                                <div class="site-branding-text">
                                    <p class="site-title-footer"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></p>
                                    <p class="site-description-footer"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
                                </div>
                                <?php endif; ?>
                            </div> 
                            <div class="col-md-6 text-right text-xs">    
                                <ul class="mg-social">
                                    <?php do_action('newses_action_footer_social_icon'); ?> 
                                </ul>
                           </div>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/container-->
                </div>
                <!--End mg-footer-widget-area-->

                <div class="mg-footer-copyright">
                    <div class="container">
                        <div class="row">
                        <?php $newses_enable_footer_menu = esc_attr(get_theme_mod('newses_enable_footer_menu','true'));
                            $copy_center = $newses_enable_footer_menu == true ? 'col-md-6 text-xs' : 'col-md-12 text-xs text-center'; ?>
                                <div class="<?php echo $copy_center ?>">
                                    <p>
                                        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'newses' ) ); ?>">
                                            <?php printf( esc_html__( 'Proudly powered by %s', 'newses' ), 'WordPress' ); ?>
                                        </a>
                                        <span class="sep"> | </span>
                                        <?php
                                        /* translators: placeholder replaced with string */
                                        printf( esc_html__( 'Theme: %1$s by %2$s.', 'newses' ), 'Newses', '<a href="' . esc_url( __( 'https://themeansar.com/', 'newses' ) ) . '" rel="designer">Themeansar</a>' );
                                        ?>
                                    </p>
                                </div>
                                <?php if($newses_enable_footer_menu == true){ ?>
                                    <div class="col-md-6 text-md-right footer-menu text-xs">
                                        <?php wp_nav_menu( array(
                                            'theme_location' => 'footer',
                                            'container'  => 'nav-collapse collapse navbar-inverse-collapse',
                                            'menu_class' => 'info-right',
                                            'fallback_cb' => 'newses_fallback_page_menu',
                                            'walker' => new newses_nav_walker()
                                        ) ); 
                                        ?>
                                    </div>
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--/overlay-->
        </footer>
        <!--/footer-->
    </div>
    <!--/wrapper-->
    <!--Scroll To Top-->
    <a href="#" class="ta_upscr bounceInup animated"><i class="fa-solid fa-angle-up"></i></a>
    <!--/Scroll To Top-->
<!-- /Scroll To Top -->
<?php wp_footer(); ?>
</body>
</html>