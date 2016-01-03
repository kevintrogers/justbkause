<?php

/*
Plugin Name: Display Category Posts Via Shortcode Lite
Plugin URI: http://jultranet.com/wp/
Description: Easily display category posts
Author: Vojislav Kovacevic
Version: 1.0
Author http://jultranet.com/wp/
*/


require WP_CONTENT_DIR.'/plugins/display-category-posts-via-shortcode-lite/ospl.php';

if( ! is_admin()) {
wp_enqueue_style(
        'bootstrap',
         plugins_url( '/css/bootstrap.css', __FILE__ )
    );

    wp_enqueue_script(
      'dcplitejs',
       plugins_url( '/js/dcplite.js', __FILE__ ),
       array('jquery')
    );
}

add_shortcode('dcplite', 'dcplitef');

function dcplitef($atts) {

    ob_start();

    

    $atts = shortcode_atts( 
       array(
            'category' => '',
            'readmoretext' => 'Click here to read more'
       ), $atts);
    extract($atts);

    ?>

    <style type="text/css">
    .dcp-content form {
        padding-top: 3em;
    }
        .more-link {
            display: block;
        }
	

        .dcpholder.row {
            max-width: 100%;
        }

	.dcp-content p.first {
	display: none;
	}
		
        div.dcp img {
          height: auto;
          max-width: 16em;
        }
    .dcphc p {
        display:none;
    }
    .dcphc blockquote p{
        display:inline;
    }
    .dcphc {
    position: relative;
    clear: both;
    margin-left: 20em;
    margin-right: -30em;
    top: -14em;
    width:50em;

    }
    </style>

    <script type="text/javascript">

    jQuery(function () {

        jQuery('div.dcp-content p').each( function( index, element ) {
          if ( jQuery(this).find('span').length ) {
            var content = jQuery(element).html();
            jQuery(element).html( content.substring(0, content.indexOf('<span') ) );
          }
        });

        jQuery('div.dcp-content').each(function() {
            var p = jQuery(this).find('p');
            jQuery(this).find('div.dots').appendTo(.p);
            
            if ( jQuery('div.dcp-content div.rmdiv').length ) {
                jQuery(this).find('div.rmdiv').appendTo(.dcphc);
            }
        });

    });

    </script>

    <?php
    // The Query
    $args = array(
        'post_type' => 'post',
        'category_name' => $category,
        'posts_per_page'=> -1,
        'order' => 'desc'
    );
    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) : ?>


    <!-- <div class="container-fluid2"> -->
    <div class="dcpholder row <?= $class; ?>">

    <?php

    while($the_query->have_posts()) : $the_query->the_post();$count++;
      ?>
        <h2><?php the_title(); ?></h2>
      <div class="dcp col-xs-12 row">
          
            <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail();
            }
            ?>

        <div class="dcphc">



        <div class="dcp-content">
            <?php

                the_content();

            ?>
        
        </div>
       
        
        </div> <!-- end .dcphc -->
         <div class="rmdiv"><a href="<?php the_permalink() ?>" class="rm"><?= $readmoretext; ?></a></div>
        
        
    </div> <!-- end .dcp -->
    <br>

    <?php 
    if ( 0 == $count%2 ) {
        echo '<div class="clearfix visible-sm"></div>';
    }
    endwhile;
    ?>

    </div> <!-- end .dcpholder -->
    <!-- </div> end .container-fluid -->
    <div class="clear"></div>

    <?php
     
     $dcp = ob_get_clean();

     return $dcp;
    endif;

    wp_reset_postdata();

    add_filter('widget_text', 'do_shortcode');
}