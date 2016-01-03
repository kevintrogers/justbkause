<?php
// twitter
class TW_Twitter extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'TW_Twitter', /* Name */__('Rise Tweets',SH_NAME), array( 'description' => __('Grab the latest tweets from twitter', SH_NAME )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );?>
		
		<div class="col-md-3 col-sm-6 col-xs-12">
		
		<?php echo $before_widget;?>
		
        <div class="widget_twitter">
		
		<?php echo $before_title.$title.$after_title; ?>
		<?php $number = (sh_set($instance, 'number') ) ? esc_attr(sh_set($instance, 'number')) : 2; ?>

		<script type="text/javascript"> jQuery(document).ready(function($) {$('#twitter_update').tweets({screen_name: '<?php echo $instance['twitter_id']; ?>', number: <?php echo $number; ?>});});</script>
		<ul id="twitter_update" class="twitter_feed"></ul>
        </div>
		<?php
		
		echo $after_widget;?>
		</div>
<?php	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['twitter_id'] = $new_instance['twitter_id'];
		$instance['number'] = $new_instance['number'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : __('Recent Tweets', SH_NAME);
		$twitter_id = ($instance) ? esc_attr($instance['twitter_id']) : 'wordpress';
		$number = ( $instance ) ? esc_attr($instance['number']) : '';?>
        
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('twitter_id'); ?>"><?php _e('Twitter ID:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" type="text" value="<?php echo esc_attr($twitter_id); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of Tweets:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p>
        
                
		<?php 
	}
}


//Get In Touch
class SH_GetinTouch extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'SH_GetinTouch', /* Name */__('Genuine Get In Touch',SH_NAME), array( 'description' => __('Show the information about the company', SH_NAME )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo $before_widget;?>
      
            <?php echo $before_title.$title.$after_title; ?>

            <ul class="contact_details">
                
                <?php if( $instance['email'] ): ?>
                	<li><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo esc_mail($instance['email']); ?>"><?php echo esc_mail($instance['email']); ?></a></li>
                <?php endif; ?>
                
				<?php if( $instance['email11'] ): ?>
                	<li><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo esc_mail($instance['email1']); ?>"><?php echo esc_mail($instance['email1']); ?></a></li>
                <?php endif; ?>
                
				<?php if( $instance['phone'] ): ?>
                	<li><i class="fa fa-phone-square"></i> <?php echo $instance['phone']; ?></li>
                <?php endif; ?>
                
				<?php if( $instance['address'] ): ?>
                	<li><i class="fa fa-home"></i> <?php echo $instance['address']; ?></li>
                <?php endif; ?>
                
				<?php if( $instance['map'] ): ?>
                	<li><a target="_blank" href="<?php echo esc_url($instance['map']); ?>" rel="prettyPhoto"><i class="fa fa-map-marker"></i> <?php _e('View on Google Maps', SH_NAME); ?></a></li>
                <?php endif; ?>

            </ul>

		<?php
		
		echo $after_widget;
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['address'] = $new_instance['address'];
		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];
		$instance['email1'] = $new_instance['email1'];
		$instance['map'] = $new_instance['map'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : __('Get in Touch', SH_NAME);
		$address = ($instance) ? esc_attr($instance['address']) : '';
		$phone = ( $instance ) ? esc_attr($instance['phone']) : '';
		$email = ( $instance ) ? esc_attr($instance['email']) : '';
		$email1 = ( $instance ) ? esc_attr($instance['email1']) : '';
		$map = ( $instance ) ? esc_attr($instance['map']) : '';?>
        
        
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:', SH_NAME); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" ><?php echo $address; ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone Number:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email ID:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('email1'); ?>"><?php _e('Email ID 2:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('email1'); ?>" name="<?php echo $this->get_field_name('email1'); ?>" type="text" value="<?php echo $email1; ?>" />
        </p>
       
        <p>
            <label for="<?php echo $this->get_field_id('map'); ?>"><?php _e('Google Map Link:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('map'); ?>" name="<?php echo $this->get_field_name('map'); ?>" type="text" value="<?php echo $map; ?>" />
        </p>
        
                
		<?php 
	}
}


/// recent posts
class TW_featured_posts extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'TW_featured_posts', /* Name */__('Rise Featured Post ',SH_NAME), array( 'description' => __('Show the featured posts with images', SH_NAME )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo $before_widget; ?>
		
		<div class="widget_featured_posts">
		<?php 
		
		echo $before_title.$title.$after_title; 
		
		$query_string = 'posts_per_page='.$instance['number'];
		if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
		query_posts( $query_string ); 
	
		$this->posts();
		
	?>


                </div>
		
		<?php wp_reset_query();  ?>
		<?php echo $after_widget;
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : __('Featured Posts', SH_NAME);
		$number = ( $instance ) ? esc_attr($instance['number']) : 2;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title: ', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('No. of Posts:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
        </p>
       
        <p>
            <label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Category', SH_NAME); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>__('All Categories', SH_NAME), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
        
		<?php 
	}
	
	function posts()
	{
		
		if( have_posts() ):?>        
            <ul>
                
                <?php while( have_posts() ): the_post(); ?>
                    <li>
					<div class="featured-box">

                                <figure class="image">
								<?php the_post_thumbnail('81x69'); ?>
								</figure>

                                <h6><?php the_title(); ?></h6>

                                <p><?php echo substr(strip_tags(get_the_content()) , 0 , 80); ?> </p>

                                <a class="btn btn-default btn-sm" href="<?php the_permalink(); ?>"><?php _e("Read More" , SH_NAME); ?></a>

                            </div>
                    </li>
                <?php endwhile; ?>
                
            </ul>
            
		<?php endif;
    }
}


// Flicker
class TW_Flickr extends WP_Widget
{
	function __construct()
	{
		parent::__construct( /* Base ID */'SH_Flickr', /* Name */__('Rise Flickr Feed',SH_NAME), array( 'description' => __('Fetch the latest feed from Flickr', SH_NAME )) );
	}
	
	function widget($args, $instance)
	{
		wp_enqueue_script( array('jflickrfeed.min') );
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		$flickr_id = $instance['flickr_id'];
		$number = $instance['number'];
		
		echo $before_widget;?>
		<div class=" widget_gallery">
		<?php

		echo $before_title.$title.$after_title;
		
		$limit = ( $number ) ? $number : 8;?>
		
		

		
               <ul class="flickr-images">
			   <script type="text/javascript">
					jQuery(document).ready(function($) {
						$('.flickr-images').jflickrfeed({
							limit: <?php echo $limit;?> ,
							qstrings: {id: '<?php echo $flickr_id ?>'},
							itemTemplate: '<li><a href="{{link}}" title="{{title}}" target="{{new}}"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
						});
					});
               </script>
               </ul>
			   </div>
           <?php
			
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['flickr_id'] = $new_instance['flickr_id'];
		$instance['number'] = $new_instance['number'];
		
		return $instance;
	}
	
	function form($instance)
	{
		wp_enqueue_script('flickrjs');
		$title = ($instance) ? esc_attr($instance['title']) : __('Flicker', SH_NAME);
		$flickr_id = ($instance) ? esc_attr($instance['flickr_id']) : '';
		$number = ( $instance ) ? esc_attr($instance['number']) : 8;?>
		  
        <p>
            <label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('flickr_id');?>"><?php _e('Flickr ID:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('flickr_id');?>" name="<?php echo $this->get_field_name('flickr_id');?>" type="text" value="<?php echo $flickr_id;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number');?>"><?php _e('Number of Images:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number');?>" name="<?php echo $this->get_field_name('number');?>" type="text" value="<?php echo $number;?>" />
        </p>
        <?php 
	}
}


/// Contact Info
class TW_Contact_info extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'TW_Contact_info', /* Name */__('Rise Footer Contact Info ',SH_NAME), array( 'description' => __('Show Contact Info Detail.', SH_NAME )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$address = apply_filters( 'widget_address', $instance['address'] );
		$phone = apply_filters( 'widget_phone', $instance['phone'] );
		$email = apply_filters( 'widget_email', $instance['email'] );
		$skype = apply_filters( 'widget_skype', $instance['skype'] );
	?>
		
		<?php echo $before_widget; ?>
		
		<div class="widget_contact">
		
		<?php 
		
		echo $before_title.$title.$after_title; 
	
		
		
	?>
	<ul>
		<li class="address"><?php echo $address ; ?></li>
		<li class="phone"><?php echo $phone ; ?></li>
		<li class="email"><a href="mailto:<?php echo $email ; ?>"><?php echo $email ; ?></a></li>
		<li class="skype"><?php echo $skype ; ?></li>
	</ul>
	</div>
		
		<?php echo $after_widget; 
	}
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['address'] = $new_instance['address'];
		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];
		$instance['skype'] = $new_instance['skype'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : __('Contact Info', SH_NAME); 
		$address = ( $instance ) ? esc_attr($instance['address']) : ''; 
		$phone = ( $instance ) ? esc_attr($instance['phone']) : ''; 
		$email = ( $instance ) ? esc_attr($instance['email']) : ''; 
		$skype = ( $instance ) ? esc_attr($instance['skype']) : ''; 
?>
			
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title: ', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address: ', SH_NAME); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>"><?php echo $address; ?></textarea>
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone: ', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email: ', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('skype'); ?>"><?php _e('Skype Name: ', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('skype'); ?>" name="<?php echo $this->get_field_name('skype'); ?>" type="text" value="<?php echo $skype; ?>" />
        </p>
        
		<?php 
	}
}

/// Footer Contact Form
class TW_Contact_form extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'TW_Contact_form', /* Name */__('Rise Footer Contact Form ',SH_NAME), array( 'description' => __('Show Contact Form In Footer.', SH_NAME )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
	?>
		
		<div class="col-md-6 col-sm-12 col-xs-12"><div class="widget">
		
		<div class="widget_contact_form">
		
		<?php 
		
		echo $before_title.$title.$after_title; 
	
		
		
	?>
	<div class="row">
<form class="contact-form" method="post" action="<?php echo admin_url('admin-ajax.php?action=_sh_ajax_callback&amp;subaction=sh_contact_form_submit'); ?>" id="rise_contact_form">
		<div class="col-sm-6">
		
			
			
			<div class="msgs"></div>

			<input type="text" placeholder="<?php _e("Enter Name" , SH_NAME); ?>" class="form-control"  name="contact_name">

			<input type="text" placeholder="<?php _e("Your Email" , SH_NAME); ?>" class="form-control" name="contact_email">

			<input type="text" placeholder="<?php _e("Subject" , SH_NAME); ?>" class="form-control" name="contact_subject">

		</div>

		<div class="col-sm-6">

			<textarea placeholder="<?php _e("Message" , SH_NAME); ?>" class="form-control" name="contact_message"></textarea>

			<input type="submit" value="<?php _e("Send Message" , SH_NAME); ?>" class="btn btn-primary btn-sm pull-right">
			
			
			
			<script>
			jQuery(document).ready(function($) {
				$('#rise_contact_form').live('submit', function(e){
				
					e.preventDefault();
					var thisform = this;
					var fields = $(this).serialize();
					var url= $(this).attr('action');
					//alert(url);
					$.ajax({
						url: url,
						type: 'POST',
						data: fields,
						success:function(res){
							//salert(res);
							$('.msgs', thisform).html(res);
						}
					});
				});
				
			
			});
			</script>

		</div>
		</form>

	</div>
	
	</div>
	
	</div>
	
	</div>
	<?php
	}
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : __('Any Questions? Drop us a Note', SH_NAME); ?>
			
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title: ', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        
		<?php 
	}
}

/// Rise Info
class TW_Rise_info extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'TW_Rise_info', /* Name */__('Rise Info ',SH_NAME), array( 'description' => __('Show Rise Detail.', SH_NAME )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$rise_detail = apply_filters( 'widget_address', $instance['rise_detail'] );
	?>
		
		<?php echo $before_widget; ?>
		
		<div class="widget_normal">
		
		<?php 
		
		echo $before_title.$title.$after_title; 
	
		
		
	?>

			<p><?php echo $rise_detail ; ?></p>

		</div>
		
		<?php echo $after_widget;
	}
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['rise_detail'] = $new_instance['rise_detail'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : __('Contact Info', SH_NAME); 
		$rise_detail = ( $instance ) ? esc_attr($instance['rise_detail']) : __('We are a non-profit organization bringing clean, safe drinking water to people in developing countries. 100% of all public donations directly fund water projects, and we prove coordinates on a map.', SH_NAME); 
?>
			
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title: ', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('rise_detail'); ?>"><?php _e('Rise Detail: ', SH_NAME); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('rise_detail'); ?>" name="<?php echo $this->get_field_name('rise_detail'); ?>"><?php echo $rise_detail; ?></textarea>
        </p>
        
		<?php 
	}
}