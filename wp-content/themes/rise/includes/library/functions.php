<?php

function _WSH()
{
	return $GLOBALS['_sh_base'];
}

/** A function to fetch the categories from wordpress */
function sh_get_categories($arg = false, $by_slug = false, $show_all = true)
{
	global $wp_taxonomies;
	if( ! empty($arg['taxonomy']) && ! isset($wp_taxonomies[$arg['taxonomy']]))
	{
		//register_taxonomy( $arg['taxonomy'], 'sh_'.$arg['taxonomy']);
	}
	//printr($arg);
	
	$categories = get_terms(sh_set( $arg, 'taxonomy', 'category' ), $arg);
	$cats = array();

	if( $show_all ) $cats[] = __( 'All Categories', SH_NAME );
	
	if( !is_wp_error( $categories ) ) {
	foreach($categories as $category)
	{
		if( $by_slug ) $cats[$category->slug] = $category->name;
		else $cats[$category->term_id] = $category->name;
	}
	}
	return $cats;
}

if( !function_exists( 'sh_slug' ) )
{
	function sh_slug( $string )
	{
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
}



function sh_get_sidebars($multi = false)
{
	global $wp_registered_sidebars;

	$sidebars = !($wp_registered_sidebars) ? get_option('wp_registered_sidebars') : $wp_registered_sidebars;

	if( $multi ) $data[] = array('value'=>'', 'label' => 'No Sidebar');
	else $data = array('' => __('No Sidebar', SH_NAME));
	foreach( (array)$sidebars as $sidebar)
	{
		if( $multi ) $data[] = array( 'value'=> sh_set($sidebar, 'id'), 'label' => sh_set( $sidebar, 'name') );
		else $data[sh_set($sidebar, 'id')] = sh_set($sidebar, 'name');
	}

	return $data;
}

if ( ! function_exists('character_limiter'))
{
	function character_limiter($str, $n = 500, $end_char = '&#8230;', $allowed_tags = false)
	{
		if($allowed_tags) $str = strip_tags($str, $allowed_tags);
		if (strlen($str) < $n)	return $str;
		$str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

		if (strlen($str) <= $n) return $str;

		$out = "";
		foreach (explode(' ', trim($str)) as $val)
		{
			$out .= $val.' ';
			
			if (strlen($out) >= $n)
			{
				$out = trim($out);
				return ( strlen($out ) == strlen($str)) ? $out : $out.$end_char;
			}		
		}
	}
}


function sh_get_social_icons()
{

	$options = _WSH()->option('social_media');//printr($options);

	$output = '';
	
	if( sh_set( $options, 'social_media' ) && is_array( sh_set( $options, 'social_media' ) ) )
	{
		foreach( sh_set( $options, 'social_media' ) as $social_icon ){
			if( isset( $social_icon['tocopy' ] ) ) continue;
			$title = sh_set( $social_icon, 'title');
			$link = sh_set( $social_icon, 'social_link');
			$icon = sh_set( $social_icon, 'social_icon');
			$output .= '
			<span>
				<a data-toggle="tooltip" data-placement="bottom" title="'.esc_attr( $title ).'" href="'.esc_url( $link ).'"><i class="fa '.$icon.'"></i></a>
			</span>'."\n";
		}
	}
	
	return $output;
}


function sh_get_posts_array( $post_type = 'post', $flip = false )
{
	global $wpdb;

	$res = $wpdb->get_results( "SELECT `ID`, `post_title` FROM `" .$wpdb->prefix. "posts` WHERE `post_type` = '$post_type' AND `post_status` = 'publish' ", ARRAY_A );
	
	$return = array();
	foreach( $res as $k => $r) {
		if( $flip ) {
			if( isset( $return[sh_set($r, 'post_title')] ) ) $return[sh_set($r, 'post_title').$k] = sh_set($r, 'ID');
			else $return[sh_set($r, 'post_title')] = sh_set( $r, 'ID' );
		}
		else $return[sh_set($r, 'ID')] = sh_set($r, 'post_title');
	}

	return $return;
}




function get_the_breadcrumb()
{
	global $wp_query;
	$queried_object = get_queried_object();
	
	$breadcrumb = '';
	$delimiter = ' / ';
	$before = '<li>';
	$after = '</li>';

	if ( ! is_home())
	{
		$breadcrumb .= '<li><a href="'.home_url().'">'.__('Home', SH_NAME).'</a></li>';
		
		/** If category or single post */
		if(is_category())
		{
			$cat_obj = $wp_query->get_queried_object();
			$this_category = get_category( $cat_obj->term_id );
	
			if ( $this_category->parent != 0 ) {
				$parent_category = get_category( $this_category->parent );
				$breadcrumb .= get_category_parents($parent_category, TRUE, $delimiter );
			}
			
			$breadcrumb .= '<li><a href="'.get_category_link(get_query_var('cat')).'">'.single_cat_title('', FALSE).'</a></li>';
		}
		elseif(is_tax())
		{
			$breadcrumb .= '<li><a href="'.get_term_link($queried_object).'">'.$queried_object->name.'</a></li>';
		}
		elseif(is_page()) /** If WP pages */
		{
			global $post;
			if($post->post_parent)
			{
                $anc = get_post_ancestors($post->ID);
                foreach($anc as $ancestor)
				{
                    $breadcrumb .= '<li><a href="'.get_permalink($ancestor).'">'.get_the_title($ancestor).'</a><span class="divider">/</span></li>';
                }
				$breadcrumb .= '<li>'.get_the_title($post->ID).'</li>';
				
            }else $breadcrumb .= '<li>'.get_the_title().'</li>';
		}
		elseif (is_singular())
		{
			if($category = wp_get_object_terms(get_the_ID(), array('category', 'projects_category' , 'testimonials_category' ,'team_category' , 'gallery_category' , 'events_category' , 'causes_category' , 'donors_category'  )))
			{
				if( !is_wp_error($category) )
				{
					$breadcrumb .= '<li><a href="'.get_term_link(sh_set($category, '0')).'">'.sh_set( sh_set($category, '0'), 'name').'</a></li>';
					$breadcrumb .= '<li>'.get_the_title($queried_object).'</li>';
				}
			}else{
				$breadcrumb .= '<li>'.get_the_title($queried_object).'</li>';
			}
		}
		elseif(is_tag()) $breadcrumb .= '<li><a href="'.get_term_link($queried_object).'">'.single_tag_title('', FALSE).'</a></li>'; /**If tag template*/
		elseif(is_day()) $breadcrumb .= '<li><a href="">'.__('Archive for ', SH_NAME).get_the_time('F jS, Y').'</a></li>'; /** If daily Archives */
		elseif(is_month()) $breadcrumb .= '<li><a href="' .get_month_link(get_the_time('Y'), get_the_time('m')) .'">'.__('Archive for ', SH_NAME).get_the_time('F, Y').'</a></li>'; /** If montly Archives */
		elseif(is_year()) $breadcrumb .= '<li><a href="'.get_year_link(get_the_time('Y')).'">'.__('Archive for ', SH_NAME).get_the_time('Y').'</a></li>'; /** If year Archives */
		elseif(is_author()) $breadcrumb .= '<li><a href="'. esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) .'">'.__('Archive for ', SH_NAME).get_the_author().'</a></li>'; /** If author Archives */
		elseif(is_search()) $breadcrumb .= '<li>'.__('Search Results for ', SH_NAME).get_search_query().'</li>'; /** if search template */
		elseif(is_404()) $breadcrumb .= '<li>'.__('404 - Not Found', SH_NAME).'</li>'; /** if search template */
		elseif ( is_post_type_archive('product') ) 
		{
			
			$shop_page_id = woocommerce_get_page_id( 'shop' );
			if( get_option('page_on_front') !== $shop_page_id  )
			{
				$shop_page    = get_post( $shop_page_id );
				
				$_name = woocommerce_get_page_id( 'shop' ) ? get_the_title( woocommerce_get_page_id( 'shop' ) ) : '';
		
				if ( ! $_name ) {
					$product_post_type = get_post_type_object( 'product' );
					$_name = $product_post_type->labels->singular_name;
				}
		
				if ( is_search() ) {
		
					$breadcrumb .= $before . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $delimiter . __( 'Search results for &ldquo;', 'woocommerce' ) . get_search_query() . '&rdquo;' . $after;
		
				} elseif ( is_paged() ) {
		
					$breadcrumb .= $before . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $after;
		
				} else {
		
					$breadcrumb .= $before . $_name . $after;
		
				}
			}
	
		}
		else $breadcrumb .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>'; /** Default value */
	}

	return '<ul class="breadcrumb">'.$breadcrumb.'</ul>';
}



function sh_register_user( $data )
{
	//printr($data);
	$user_name = sh_set( $data, 'user_login' );
	$user_email = sh_set( $data, 'user_email' );
	$user_pass = sh_set( $data, 'user_password' );
	$policy = sh_set( $data, 'policy_agreed');
	
	$user_id = username_exists( $user_name );
	$message = '<div class="alert-error" style="margin-bottom:10px;padding:10px"><h5>'.__('You must agreed the policy', SH_NAME).'</h5></div>';;
	if( !$policy ) $message = '';
	if ( !$user_id && email_exists($user_email) == false ) {

		if( $policy ){

			$random_password = ( $user_pass ) ? $user_pass : wp_generate_password( $length=12, $include_standard_special_chars=false );
			$user_id = wp_create_user( $user_name, $random_password, $user_email );
			if ( is_wp_error($user_id) && is_array( $user_id->get_error_messages() ) ) 
			{
				foreach($user_id->get_error_messages() as $message)	$message .= '<div class="alert-error" style="margin-bottom:10px;padding:10px"><h5>'.$message.'</h5></div>';
			}
			else $message = '<div class="alert-success" style="margin-bottom:10px;padding:10px"><h5>'.__('Registration Successful - An email is sent', SH_NAME).'</h5></div>';
		}
		
	} else {
		$message .= '<div class="alert-error" style="margin-bottom:10px;padding:10px"><h5>'.__('Username or email already exists.  Password inherited.', SH_NAME).'</h5></div>';
	}

	return $message;
}




function sh_list_comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment; ?>
    <li>

    <div id="comment-<?php echo comment_ID(); ?>" data-delay="0" data-animation="fadeInLeft" class="comment-box animated fadeInLeft in comment">

        <figure>
			
           <?php echo get_avatar( $comment , 71 ); ?>

        </figure> 

        <div class="comment-tp">

            <strong><?php comment_author(); ?></strong>

            <p><?php echo get_comment_date("l, d M, Y"); ?></p>

        </div>

        <div class="comment-bt comment-text">

             <?php comment_text(); /** print our comment text */ ?> 

            <!--<a href="#" class="comment-reply-link">Reply</a>-->
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

        </div>

    </div>




	<?php
	//endif;
}



/**
 * returns the formatted form of the comments
 *
 * @param	array	$args		an array of arguments to be filtered
 * @param	int		$post_id	if form is called within the loop then post_id is optional
 *
 * @return	string	Return the comment form
 */
function sh_comment_form( $args = array(), $post_id = null, $review = false )
{
	if ( null === $post_id )
		$post_id = get_the_ID();
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$args = wp_parse_args( $args );
	if ( ! isset( $args['format'] ) )
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = 'html5' === $args['format'];
	$fields   =  array(
		'author' => '<li class="col-sm-4 animated fadeInLeft in" data-delay="0" data-animation="fadeInLeft"><input id="author" placeholder="'. __( 'Name', SH_NAME ).'" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></li>',
		'email'  => '<li class="col-sm-4 animated fadeInLeft in" data-delay="100" data-animation="fadeInLeft"><input id="email" placeholder="'. __( 'Email', SH_NAME ).'" class="form-control" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></li>',				
		'url'    => '<li class="col-sm-4 animated fadeInLeft in" data-delay="200" data-animation="fadeInLeft"><input id="subject" placeholder="'. __( 'Subject', SH_NAME ).'" class="form-control" name="subjetc" type="text" value="" size="30" /></li>',
	);

	$required_text = sprintf( ' ' . __('Required fields are marked %s', SH_NAME), '<span class="required">*</span>' );

	/**
	 * Filter the default comment form fields.
	 *
	 * @since 3.0.0
	 *
	 * @param array $fields The default comment fields.
	 */
	$fields = apply_filters( 'comment_form_default_fields', $fields );
	$defaults = array(
		'fields'               => $fields,
		'comment_field'        => '<li class="col-sm-12 animated fadeInLeft in" data-delay="300" data-animation="fadeInLeft"><textarea id="comment" placeholder="'. __( 'Comment', SH_NAME ).'" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea></li>',
		'must_log_in'          => '<li><p class="col-md-12 col-sm-12">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', SH_NAME ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p></li>',
		'logged_in_as'         => '<li><p class="col-md-12 col-sm-12">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', SH_NAME ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p></li>',
		'comment_notes_before' => '<li><p class="col-md-12 col-sm-12">' . __( 'Your email address will not be published.', SH_NAME ) . ( $req ? $required_text : '' ) . '</p></li>',
		'comment_notes_after'  => '<li><p class="col-md-12 col-sm-12">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', SH_NAME ), ' <code>' . allowed_tags() . '</code>' ) . '</p></li>',
		'id_form'              => 'comments_form',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Leave a Reply', SH_NAME ),
		'title_reply_to'       => __( 'Leave a Reply to %s', SH_NAME ),
		'cancel_reply_link'    => __( 'Cancel reply', SH_NAME ),
		'label_submit'         => __( 'Send Comment Now', SH_NAME ),
		'format'               => 'xhtml',
	);

	/**
	 * Filter the comment form default arguments.
	 *
	 * Use 'comment_form_default_fields' to filter the comment fields.
	 *
	 * @since 3.0.0
	 *
	 * @param array $defaults The default comment form arguments.
	 */
	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	?>
		<?php if ( comments_open( $post_id ) ) : ?>
			<?php
			/**
			 * Fires before the comment form.
			 *
			 * @since 3.0.0
			 */
			do_action( 'comment_form_before' );
			?>
			<div id="respond" class="comment-area">
				
					<h4 id="reply-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h4>
				
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php echo $args['must_log_in']; ?>
					<?php
					/**
					 * Fires after the HTML-formatted 'must log in after' message in the comment form.
					 *
					 * @since 3.0.0
					 */
					do_action( 'comment_form_must_log_in_after' );
					?>
				<?php else : ?>
					<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="reply-form"<?php echo $html5 ? ' novalidate' : ''; ?>>
                    <ul class="list-unstyled row">
						<?php
						/**
						 * Fires at the top of the comment form, inside the <form> tag.
						 *
						 * @since 3.0.0
						 */
						do_action( 'comment_form_top' );
						?>
						<?php if ( is_user_logged_in() ) : ?>
							<?php
							/**
							 * Filter the 'logged in' message for the comment form for display.
							 *
							 * @since 3.0.0
							 *
							 * @param string $args['logged_in_as'] The logged-in-as HTML-formatted message.
							 * @param array  $commenter            An array containing the comment author's username, email, and URL.
							 * @param string $user_identity        If the commenter is a registered user, the display name, blank otherwise.
							 */
							echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );
							?>
							<?php
							/**
							 * Fires after the is_user_logged_in() check in the comment form.
							 *
							 * @since 3.0.0
							 *
							 * @param array  $commenter     An array containing the comment author's username, email, and URL.
							 * @param string $user_identity If the commenter is a registered user, the display name, blank otherwise.
							 */
							do_action( 'comment_form_logged_in_after', $commenter, $user_identity );
							?>
						<?php else : ?>
							<?php echo $args['comment_notes_before']; ?>
							<?php
							/**
							 * Fires before the comment fields in the comment form.
							 *
							 * @since 3.0.0
							 */
							do_action( 'comment_form_before_fields' );
							foreach ( (array) $args['fields'] as $name => $field ) {
								/**
								 * Filter a comment form field for display.
								 *
								 * The dynamic portion of the filter hook, $name, refers to the name
								 * of the comment form field. Such as 'author', 'email', or 'url'.
								 *
								 * @since 3.0.0
								 *
								 * @param string $field The HTML-formatted output of the comment form field.
								 */
								echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
							}
							/**
							 * Fires after the comment fields in the comment form.
							 *
							 * @since 3.0.0
							 */
							do_action( 'comment_form_after_fields' );
							?>
						<?php endif; ?>
						<?php
						/**
						 * Filter the content of the comment textarea field for display.
						 *
						 * @since 3.0.0
						 *
						 * @param string $args['comment_field'] The content of the comment textarea field.
						 */
						echo apply_filters( 'comment_form_field_comment', $args['comment_field'] );
						?>
						<?php echo $args['comment_notes_after']; ?>
						<li class="col-sm-12 animated fadeInLeft in" data-delay="300" data-animation="fadeInLeft">
							<input name="submit" type="submit" class="btn btn-primary" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
							<?php comment_id_fields( $post_id ); ?>
						</li>
						<?php
						/**
						 * Fires at the bottom of the comment form, inside the closing </form> tag.
						 *
						 * @since 1.5.2
						 *
						 * @param int $post_id The post ID.
						 */
						do_action( 'comment_form', $post_id );
						?>
                         </ul>
					</form>
                   
				<?php endif; ?>
			</div><!-- #respond -->
			<?php
			/**
			 * Fires after the comment form.
			 *
			 * @since 3.0.0
			 */
			do_action( 'comment_form_after' );
		else :
			/**
			 * Fires after the comment form if comments are closed.
			 *
			 * @since 3.0.0
			 */
			do_action( 'comment_form_comments_closed' );
		endif;
}





function sh_blog_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'sh_blog_excerpt_more');



function _the_pagination($args = array(), $echo = 1)
{
	
	global $wp_query;
	
	$default =  array(
					'base' 		=> str_replace( 99999, '%#%', esc_url( get_pagenum_link( 99999 ) ) ), 
					'format' 	=> '?paged=%#%', 
					'current'	=> max( 1, get_query_var('paged') ),
					'total' 	=> $wp_query->max_num_pages, 
					'next_text' => '&rsaquo;', 
					'prev_text' => '&lsaquo;', 
					'type'		=>'list'
				);
	
	$args = wp_parse_args($args, $default);	
	
	$paginat = paginate_links($args);
	
	$pagination = str_replace("ul class='page-numbers" , "ul class='pagination animated fadeInUp in" , $paginat);
	
	if(paginate_links(array_merge(array('type'=>'array'),$args)))
	{
		if($echo) echo $pagination;
		return $pagination;
	}
}

function sh_get_post_format_output($settings = array())
{
	global $post;
	
	if( ! $settings ) return;
	
	$format = get_post_format();
	
	$output = '';
	
	switch( $format )
	{
		case 'standard':
		case 'image':
			$output = get_the_post_thumbnail(get_the_id(), '1750x1143');
		break;
		case 'gallery':
			
			$attachments = get_posts( 'post_type=attachment&post_parent='.get_the_id() );
			if( $attachments ){
				$output = '<div id="myCarousel" class="carousel slide">
                           		<div class="carousel-inner">';
				foreach( $attachments as $k=>$att ){
					$active = ( $k == 0 ) ? ' active' : '';
					$output .= '
                        <div class="item'.$active.'">
                          '.wp_get_attachment_image( $att->ID, 'full').'
                        </div>';
				}
				$output .= '</div>
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="icon-prev"></span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="icon-next"></span>  
					</a>
				</div>';
			}
		break;
		case 'video':
			$output = '<div class="js-video [vimeo, widescreen]">'.sh_set( $settings, 'video').'</div>';
		break;
		case 'audio':
			$output = '<div class="js-video [vimeo, widescreen]">'.sh_set( $settings, 'audio').'</div>';
		break;
		case 'quoted':
		case 'link':
			
		break;
		default:
			$output = get_the_post_thumbnail(get_the_id(), '1750x1143');
		break;
	}
	
	return $output;
}

function sh_theme_color_scheme()
{
	$dir = get_template_directory();
	include_once($dir.'/includes/thirdparty/lessc.inc.php');
	$styles = _WSH()->option();
	
	$colors = sh_set( $styles, 'color_selection', 'default' );
	$custom = sh_set( $styles, 'custom_color_scheme' );
	$default = sh_set( $styles, 'default_color_scheme', 'yellow' );
	//echo $colors.'<br>'.$custom.'<br>'. $default;exit;
	if( $colors === 'default' ) {
		$url = file_exists( get_stylesheet_directory_uri().'/css/'.$default.'.css' ) ? get_stylesheet_directory_uri().'/css/'.$default.'.css' : get_template_directory_uri().'/css/'.$default.'.css' ;
		echo '<link rel="stylesheet" type="text/css" href="'.$url.'" />';
		return;
	}
	
	$transient = get_transient( '_sh_color_scheme' );
	

	$update = ( $custom != $transient ) ? true : false;
	
	$url = file_exists( get_stylesheet_directory().'/css/color.css' ) ? get_stylesheet_directory_uri().'/css/color.css' : get_template_directory_uri().'/css/color.css' ;
	echo '<link rel="stylesheet" type="text/css" href="'.$url.'" />';
	
	//if( !$update ) return;

	set_transient( '_sh_color_scheme', $custom, DAY_IN_SECONDS );
	
	$less = new lessc;

	$less->setVariables(array(
	  "sh_color" => $custom,
	));
	$lessss = file_exists( get_stylesheet_directory().'/css/color.less' ) ? get_stylesheet_directory().'/css/color.less' : get_template_directory().'/css/color.less' ;
	// create a new cache object, and compile
	$cache = $less->cachedCompile($lessss);
	$url = file_exists( get_stylesheet_directory().'/css/color.css' ) ? get_stylesheet_directory().'/css/color.css' : get_template_directory().'/css/color.css' ;
	file_put_contents($url, $cache["compiled"]);
	
}


function sh_get_font_settings( $FontSettings = array(), $StyleBefore = '', $StyleAfter = '' )
{
	$i = 1;
	$settings = _WSH()->option();
	$Style = '';
	foreach( $FontSettings as $k => $v )
	{
		if( $i == 1 || $i == 5 )
		{
			$Style .= ( sh_set( $settings, $k )  ) ? $v.':'.sh_set( $settings, $k ).'px;': '';
		}
		else
		{
			$Style .= ( sh_set( $settings, $k  )  ) ? $v.':'.sh_set( $settings, $k ).';': '';
		}
		$i++;
	}
	return ( !empty( $Style ) ) ? $StyleBefore.$Style.$StyleAfter: '';
}



function sh_register_dynamic_sidebar()
{
	$theme_options = get_option( SH_NAME.'_theme_options');
	$sidebars = sh_set( sh_set( $theme_options, 'dynamic_sidebar' ), 'dynamic_sidebar' );

	if( $sidebars && is_array( $sidebars ) )
	{
		foreach( $sidebars as $sidebar ){
			
			if( isset( $sidebar['tocopy'] ) ) continue;
			
			register_sidebar( array(
				'name' => $sidebar['sidebar_name'],
				'id' => sh_slug( $sidebar['sidebar_name'] ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => "</div>",
				'before_title' => '<h4 class="title"><span>',
				'after_title' => '</span></h4>',
			) );
		}
	}
}

function get_gravatar_url( $email, $width = 80 ) {

    $hash = md5( strtolower( trim ( $email ) ) );
    return 'http://gravatar.com/avatar/' . $hash.'&s='.$width;
}


function _sh_star_rating( $dis = false )
{
	$ip = $_SERVER['REMOTE_ADDR'];
	
	$meta = get_post_meta( get_the_id(), '_download_rating', true );
	
	$count = count( $meta ) ? count( $meta ) : 1;
	
	$titles = array( __('Poor', SH_NAME), __('Satisfactory', SH_NAME), __('Good', SH_NAME), __('Better', SH_NAME), __('Awesome', SH_NAME) );
	
	$evg = array_sum((array)$meta) / $count;
	
	if( $dis )
	{
		foreach( array_reverse( range( 0, 4 ) ) as $rang )
		{
			$checked = ( ( $rang + 1 ) <= round( $evg ) ) ? 'fa-star' : 'fa-star-o';
			echo '<i class="fa '.$checked.'" title="'.$titles[$rang].'" data-post-id="'.get_the_ID().'"/></i>'."\n";
		}
	}
	else
	{
		$disabled = isset( $meta[$ip] ) ? ' disabled="disabled"' : '';
		echo '<div class="clearfix center">'."\n";
		foreach( range( 0, 4 ) as $rang )
		{
			$checked = ( ( $rang + 1 ) == round( $evg ) ) ? ' checked="checked"' : '';
			echo '<input class="download-star" type="radio" name="download-2-rating-1"'.$disabled.$checked.' value="'.( $rang + 1 ).'" title="'.$titles[$rang].'" data-post-id="'.get_the_ID().'"/>'."\n";
		}
		echo '</div>'."\n";
		printf(__('Average Rating %s', SH_NAME), $evg );
	}
}



function _sh_trim( $text, $len )
{

	$text = strip_shortcodes( $text );
	
	$text = apply_filters( 'the_content', $text );
	$text = str_replace(']]>', ']]&gt;', $text);
	
	$excerpt_length = apply_filters( 'excerpt_length', $len );
	
	$excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
	
	$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	
	return $text;
	
}


function _sh_get_page_by_template( $tmpl, $index = 0 )
{
	$pages = get_posts(array(
        'post_type' => 'page',
		'meta_key' => '_wp_page_template',
		'meta_value' => $tmpl
	));
	
	if( $pages ){
		return $pages[$index];
	}
	
	return false;
}

function sh_get_attachment_id_by_url( $url ) {
	// Split the $url into two parts with the wp-content directory as the separator
	$parsed_url = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );
	 
	// Get the host of the current site and the host of the $url, ignoring www
	$this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
	$file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );
	 
	// Return nothing if there aren't any $url parts or if the current host and $url host do not match
	if ( ! isset( $parsed_url[1] ) || empty( $parsed_url[1] ) || ( $this_host != $file_host ) ) {
	return;
	}
	 
	// Now we're going to quickly search the DB for any attachment GUID with a partial path match
	// Example: /uploads/2013/05/test-image.jpg
	global $wpdb;
	 
	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE guid RLIKE %s;", $parsed_url[1] ) );
	 
	// Returns null if no attachment is found
	return $attachment[0];
}


function sh_font_awesome( $code = false )
{
	$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
	$subject = @file_get_contents(get_template_directory().'/includes/vafpress/public/css/vendor/font-awesome.css');

	if( !$subject ) return array();
	
	preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

	$icons = array();

	foreach($matches as $match){
		$value = str_replace( 'icon-', '', $match[1] );
		$newcode = $match[1];//str_replace('fa-', '', $match[1]);
		
		if( $code ) $icons[$match[1]] = stripslashes($match[2]);
		else $icons[$newcode] = ucwords(str_replace('fa-', ' ', $newcode));//$match[2];
	}
	
	return $icons;
}

function sh_blogposts( $posttype = 'post' , $col , $size )
{
	
	$output = '' ;
	ob_start();	
	$grid_class = ( $col ) ? 'grid-'.$col : 'grid-1' ;
	?>	
	<div class="blog-archive <?php echo $grid_class; ?>">
			<ul style="list-style:none">
			<?php 
				if(have_posts()):  while(have_posts()): the_post(); 
				global $post ;
				
				$img_src = sh_set(wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'full') , 0);
				$img_src = ( $img_src ) ? $img_src : 'http://placehold.it/1142x470';
				
				?>
				<li id="post-<?php the_ID(); ?>" <?php post_class('animated');?> data-animation="fadeInLeft" data-delay="0">
					<div class="blog-box">
						<?php //if(has_post_thumbnail()): ?>
						<figure class="image-appear">
							<?php if( has_post_thumbnail() ) the_post_thumbnail($size);
							else echo '<img alt="" src="http://placehold.it/1142x470" />'; ?>
							<figcaption>
								<a title="<?php echo get_the_title(); ?>" data-rel="prettyPhoto" href="<?php echo $img_src ; ?>" class="image-zoom">
									<i class="glyphicon glyphicon-zoom-in"></i>
								</a>
								<a href="<?php the_permalink(); ?>" class="image-anchor">
									<i class="glyphicon glyphicon-link"></i>
								</a>
							</figcaption>
						</figure>
						<?php //endif; ?>
						
						<ul class="options">
							<li class="sp"><a href="<?php the_permalink(); ?>" class="fa fa-picture-o"></a></li>
							<li><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i>&nbsp;<?php echo get_the_author(); ?></a></li>
							<li><i class="fa fa-clock-o"></i>&nbsp;<?php echo get_the_date(); ?></li>
							
								<li><i class="fa fa-folder-open"></i>&nbsp;
							<?php 
								$categories = get_the_category();
								$i = 0;
								if(is_array($categories)){
								foreach($categories as $cat) {
									if ($i == 0):
										echo '<a href="'.get_category_link($cat->cat_ID).'"> ' . $cat->cat_name . '</a>';
										break;
									endif;
									$i++;
								} 
								}
							?>
								</li>
								
							<li><i class="fa fa-comments"></i>&nbsp;<?php echo get_comments_number(); ?></li>
							
						</ul>
						<h4><a href="<?php echo the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="btn btn-default"><?php _e("Read More" , SH_NAME); ?></a>
					</div>
				</li>
				<?php 
					endwhile ; endif ;
				?>
			</ul>
		</div>
	<?php 
	$output = ob_get_contents(); 
	ob_end_clean(); 
	return $output ; 
}


function sh_share_buttons()
{
	$output = '' ;
?>	
	<ul>

		<li>
			<a class="twitter-share-button" href="https://twitter.com/share" data-via="twitterdev"></a>
		</li>

		<li><div class="g-plusone"></div></li>

		<li>
			<b:if cond='data:blog.pageType != &quot;static_page&quot;'>
				<a expr:share_url='data:post.url' href='http://www.facebook.com/sharer.php' name='fb_share' type='button_count'>Share</a>
			</b:if>
		</li>

	</ul>
	<script src="https://apis.google.com/js/platform.js" async defer></script>


	<script type="text/javascript">
	window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
	</script>
	
	<script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share' type='text/javascript'></script>
	<?php  
	return $output ;
}