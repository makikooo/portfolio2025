<?php
/**
Template Name: single$menu
***/
?>

<?php get_header();?>
<main class="main">
  <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        the_content();
      }
    }
  ?>
<?php get_footer(); ?>