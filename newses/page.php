<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package Newses
 */
get_header(); 
?>
<!--==================== Newses breadcrumb section ====================-->
<?php get_template_part('index','banner'); ?>
<!--==================== main content section ====================-->
<div id="content" class="page-class content">
    <div class="container">
      	<div class="row">
			<!-- Blog Area -->
			<?php get_template_part('template-parts/content', 'page'); ?>
		</div>
	</div>
</div>
<?php
get_footer();