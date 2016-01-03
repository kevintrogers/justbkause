<?php 
	$theme_options = _WSH()->option();
	$footer_social_section = sh_set(sh_set($theme_options , 'footer_social_media') , 'footer_social_media');
?>
<?php if(sh_set($theme_options , 'colored_map')): ?>
<div class="map-section">
	<div id="location-map"></div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script>

    function initialize() {

      var location = new google.maps.LatLng(<?php echo sh_set($theme_options , 'map_latitude'); ?>,<?php echo sh_set($theme_options , 'map_longitude'); ?>);

      var mapOptions = {

        center: location,

        zoom: 14,

        /* colorize different sections of map */

        styles: [	

            {		featureType:'water',		stylers:[{color:'<?php echo sh_set($theme_options , 'map_color_scheme'); ?>'},{visibility:'on'}]	},

            {		featureType:'landscape',		stylers:[{color:'#f2f2f2'}]	},

            {		featureType:'road',		stylers:[{saturation:-100},{lightness:25}]	},

            {		featureType:'road.highway',		stylers:[{visibility:'simplified'}]	},

            {		featureType:'road.arterial',		elementType:'labels.icon',		stylers:[{visibility:'off'}]	},

            {		featureType:'administrative',		elementType:'labels.text.fill',		stylers:[{color:'#444444'}]	},

            {		featureType:'transit',		stylers:[{visibility:'off'}]	},

            {		featureType:'poi',		stylers:[{visibility:'off'}]	}]				

        

      };

      var mapElement = document.getElementById('location-map');

      var map = new google.maps.Map(mapElement, mapOptions);

    }



    google.maps.event.addDomListener(window, 'load', initialize);



</script>
<?php endif; ?>
<footer class="footer">
	<div class="container">
		<div class="row">
		   <?php dynamic_sidebar('footer-sidebar'); ?>
		</div>
	</div>
</footer>

<div class="site-bottom">
	<div class="container">
		<p><?php echo sh_set($theme_options , 'copyright_text'); ?></p>
		<a href="#" class="scroll-up"></a>
		<?php if(is_array($footer_social_section)): ?>
		<ul class="social-links">
		<?php 
			foreach($footer_social_section as $social): 
			$icon = str_replace('fa' , 'icon' , sh_set($social , 'social_icon')) ;
			$s_icon = str_replace('iconcebook' , 'facebook' , $icon) ;
			if( isset( $rep['tocopy'] ) ) continue;
		?>
			<li><a href="<?php echo sh_set($social , 'social_link'); ?>" class="<?php echo str_replace("icon-","fa fa-",$s_icon); ?>" data-placement="top" data-toggle="tooltip" title="<?php echo sh_set($social , 'title'); ?>"></a></li>
			
		<?php endforeach; ?>
		</ul>
		<?php endif; ?>
	</div>
</div>
</div>

<?php wp_footer(); ?>
</body>
</html>