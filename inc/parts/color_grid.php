<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php 
global $post;
?>  
<?php
$taxonomy = rh_get_taxonomy_of_post( $post );
$categories = get_the_terms( $post->ID, $taxonomy );
if( !empty($categories)){
    $category = $categories[0];
    $catname = $category->name;
}


$image_id = get_post_thumbnail_id(get_the_ID());
$image_url = wp_get_attachment_image_src($image_id,'full');
$image_url = $image_url[0];
if (function_exists('_nelioefi_url')){
    $image_nelio_url = get_post_meta( $post->ID, _nelioefi_url(), true );
    if (!empty($image_nelio_url)){
        $image_url = esc_url($image_nelio_url);
    }
}



switch ($post_count) {
    case 0:
        $post_class = 'main';
        break;
    case 1:
        $post_class = 'two';
        break;
    case 2:
        $post_class = 'tree';
        break;
    case 3:
        $post_class = 'six';
        break;
    case 4:
        $post_class = 'four';
        break;
    case 5:
        $post_class = 'five';
        break;
}


?>


<?php if ($post_count < 6 && $paged == 1) :?>

   
    <div class="<?php echo $post_class; ?>"  style="background-image: url('<?php echo esc_url($image_url) ;?>');">
		<div class="post-desc">
        <span class="post-date">
            <p><?php the_date(); ?></p>
        </span>
        <a href="<?php the_permalink();?>" class="post-title"><h2><?php the_title();?></h2></a>
        <span class="exerpt">
            <p><?php kama_excerpt('maxchar=90'); ?> </p>
        </span>
         <a href="<?php the_permalink();?>"><span class="omega-post-layout-image-mask"></span></a>
		 </div>
    </div>
     
    <?php $post_count++ ;?>
<?php else: ;?>

        </div>
        </div>
        </div>

    <div class="col_item whitebg rh-shadow3 rehub-sec-smooth rh-hover-up rh-main-bg-hover csstransall position-relative rh-hovered-wrap" style="background-image: url('<?php echo esc_url($image_url) ;?>') ; z-index: 1;">
        <a class="abdfullwidth" href="<?php the_permalink();?>"></a>
        <div class="rh-borderinside rh-hovered-scale pointernone"></div>
        <div class="padd20">
            <div class="pt10 pr20 pl20 pb10">
                <div class="mt0 mb10 font70 upper-text-trans rehub-main-color whitehovered catforcgrid"><?php echo ''.$catname;?></div>
                <h3 class="mb30 mt0 font120 lineheight20 whitehovered"><?php the_title();?></h3>
                <div class="mb15 greycolor font90 whitehovered excerptforcgrid">
                    <?php kama_excerpt('maxchar=90'); ?>
                </div>
                <a href="<?php the_permalink();?>"><i class="fal <?php echo (is_rtl()) ? 'fa-arrow-left' : 'fa-arrow-right';?> rehub-main-color font130 whitehovered csstranstrans rh-hovered-rotate position-relative"></i></a>

            </div>
        </div>
    </div>

    <?php $post_count++ ;?>
<?php endif ;?>



