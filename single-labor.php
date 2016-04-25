<?php defined('ABSPATH') or die();
/**
 * The template for single view category labor
 * 
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
  <?php if (class_exists('MultiPostThumbnails')) : 
    $src = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image', $post->ID, 'full'); 
  endif; ?>

 <?php if(empty($src)){ ?>
    <header class="post-beton-img"><div class="container"><h1><?php the_title(); ?></h1></div></header>
  <?php }
    else{ ?>
  <header class="post-second-img" style="background:url(<?php echo $src; ?>);"><div class="container"><h1><?php the_title(); ?></h1></div></header>
  <?php } ?>

<div class="container">        
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <section class="post-content">
        <?php echo the_content();?>
          </section>
        </div>
    </div>
  </div>
</article>