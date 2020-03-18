<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<!-- CONTENT -->
<div class="rh-container"> 
    <div class="rh-content-wrap clearfix">
        <!-- Title area -->
        <div class="rh_post_layout_inner_image">
            <?php           
                $image_id = get_post_thumbnail_id(get_the_ID());  
                $image_url = wp_get_attachment_image_src($image_id,'full');
                $image_url = $image_url[0];
                if (function_exists('_nelioefi_url')){
                    $image_nelio_url = get_post_meta( $post->ID, _nelioefi_url(), true );
                    if (!empty($image_nelio_url)){
                        $image_url = esc_url($image_nelio_url);
                    }           
                } 
            ?>  
            <style scoped>#rh_post_layout_inimage{background-image: url(<?php echo ''.$image_url;?>);}</style>
            <div id="rh_post_layout_inimage">
                <?php echo re_badge_create('ribbon'); ?>
                <div class="rh_post_breadcrumb_holder">
                    <?php 
                        $crumb = '';
                        if( function_exists( 'yoast_breadcrumb' ) ) {
                            $crumb = yoast_breadcrumb('<div class="breadcrumb">','</div>', false);
                        }
                        if( ! is_string( $crumb ) || $crumb === '' ) {
                            if(rehub_option('rehub_disable_breadcrumbs') == '1' || vp_metabox('rehub_post_side.disable_parts') == '1') {echo '';}
                            elseif (function_exists('dimox_breadcrumbs')) {
                                dimox_breadcrumbs(); 
                            }
                        }
                        echo ''.$crumb;  
                    ?>
                </div>
                <div class="rh_post_header_holder">
                    <div class="title_single_area"> 
                        <?php rh_post_header_cat('post');?>                           
                        <h1><?php the_title(); ?></h1>                                
                        <div class="meta post-meta">
                            <?php rh_post_header_meta(true, true, true, true, false);?> 
                        </div>                           
                    </div>                     
                </div>
                <span class="rh-post-layout-image-mask"></span>
            </div>
        </div>    
	    <!-- Main Side -->
        <div class="main-side single<?php if(get_post_meta($post->ID, 'post_size', true) == 'full_post' || rehub_option('disable_post_sidebar')) : ?> full_width<?php endif; ?> clearfix"> 
            <div class="rh-post-wrapper">           
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php $postclasses = array('post-inner', 'post');?>
                    <article <?php post_class($postclasses); ?> id="post-<?php the_ID(); ?>">
                        <?php if(rehub_option('rehub_disable_share_top') =='1' || vp_metabox('rehub_post_side.disable_parts') == '1')  : ?>
                        <?php else :?>
                            <div class="top_share">
                                <?php include(rh_locate_template('inc/parts/post_share.php')); ?>
                            </div>
                            <div class="clearfix"></div> 
                        <?php endif; ?>
                        <?php $no_featured_image_layout = 1;?>
                        <?php include(rh_locate_template('inc/parts/top_image.php')); ?>                                       

                        <?php if(rehub_option('rehub_single_before_post') && vp_metabox('rehub_post_side.show_banner_ads') != '1') : ?><div class="mediad mediad_before_content"><?php echo do_shortcode(rehub_option('rehub_single_before_post')); ?></div><?php endif; ?>

                        <?php the_content(); ?>

                    </article>
                    <div class="clearfix"></div>
                    <?php include(rh_locate_template('inc/post_layout/single-common-footer.php')); ?>                    
                <?php endwhile; endif; ?>
                <?php comments_template(); ?>
            </div>
		</div>
		<div class="omega-postNavigation-1 prevPostBox-1">
		   <div class="postNavigation-1 prevPostBox-1">
        <?php $prev_post = get_previous_post('12'); if (!empty( $prev_post )): ?>
            <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
                <div class="inner-prevnext-1">
                <div class="thumbnail-1">
                    <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail($prev_post->ID))  ) : ?>
                        <?php echo get_the_post_thumbnail( $prev_post->ID, array(150,150) ); ?>
                    <?php else :?>
                        <?php  $nothumb = get_template_directory_uri() . '/images/default/noimage_70_70.png';?> 
                        <img src="<?php echo ''.$nothumb; ?>" alt="<?php the_title_attribute(); ?>" width="70" height="70" />                   
                    <?php endif; ?>
                </div>
                <div class="headline-1"><span><?php esc_html_e('Previous', 'rehub-theme'); ?></span><h4><?php echo ''.$prev_post->post_title; ?></h4></div>
                </div>
            </a>                          
        <?php endif; ?>
    </div>
    <div class="postNavigation-1 nextPostBox-1">
        <?php $next_post = get_next_post('12'); if (!empty( $next_post )): ?>
            <a href="<?php echo get_permalink( $next_post->ID ); ?>">
                <div class="inner-prevnext-1">
                    
                <div class="headline-1"><span><?php esc_html_e('Next', 'rehub-theme'); ?></span><h4><?php echo ''.$next_post->post_title; ?></h4>
                </div>    
                <div class="thumbnail-1">
                    <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail($next_post->ID))  ) : ?>
                        <?php echo get_the_post_thumbnail( $next_post->ID, array(150,150) ); ?>
                    <?php else :?>
                        <?php  $nothumb = get_template_directory_uri() . '/images/default/noimage_70_70.png';?> 
                        <img src="<?php echo ''.$nothumb; ?>" alt="<?php the_title_attribute(); ?>" width="70" height="70" />                   
                    <?php endif; ?>
                </div>

                </div>
            </a>                          
        <?php endif; ?>
    </div>                
</div> 	
		
		
        <!-- /Main Side -->  
        <!-- Sidebar -->
        <?php if(get_post_meta($post->ID, 'post_size', true) == 'full_post' || rehub_option('disable_post_sidebar')) : ?><?php else : ?><?php get_sidebar(); ?><?php endif; ?>
        <!-- /Sidebar -->
    </div>
</div>
<!-- /CONTENT -->     