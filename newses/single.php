<!-- =========================
     Page Breadcrumb   
============================== -->
<?php get_header(); ?>
<!--==================== Newses breadcrumb section ====================-->
<!-- =========================
     Page Content Section      
============================== -->
<main id="content" class="single-class content">
    <!--container-->
    <div class="container">
      <!--row-->
      <div class="row">
        <div class="col-md-12">
          <div class="mg-header mb-30">
            <?php do_action('newses_action_single_top_content') ?>
          </div>
        </div>
        <!--col-md-->
        <?php 
        $newses_single_page_layout = get_theme_mod('newses_single_page_layout','single-align-content-right');
        if($newses_single_page_layout == "single-align-content-left")
        { ?>
        <aside class="col-lg-3 col-md-4">
          <?php get_sidebar();?>
        </aside>
        <?php } ?>
          <?php if($newses_single_page_layout == "single-align-content-right" || $newses_single_page_layout == "single-align-content-left"){ ?>
          <div class="col-lg-9 col-md-8">
          <?php } elseif($newses_single_page_layout == "single-full-width-content") { ?>
            <div class="col-md-12">
          <?php }
		    do_action('newses_action_single_main_content'); ?>

      </div>
      <?php if($newses_single_page_layout == "single-align-content-right") { ?>
      <!--sidebar-->
          <!--col-md-3-->
            <aside class="col-lg-3 col-md-4">
                  <?php get_sidebar();?>
            </aside>
          <!--/col-md-3-->
      <!--/sidebar-->
      <?php } ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>