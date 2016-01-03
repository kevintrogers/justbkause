<?php if( ! defined('ABSPATH')) exit('restricted access');

class SH_Backup_class
{
	var $refresh = false;
	private $_framework = array(), $path = '';
	
	function __construct()
	{
		$this->_framework = '';//$GLOBALS['sh_base'];

		$this->path = get_template_directory().'/includes/resource/backup';
		//$this->export();
	}
	
	function export()
	{

		$this->sidebar_export();
		$this->theme_options_export();
		if( function_exists('vc_map') ) $this->vc_template_export();
		$this->revslider_export();
	}
	
	function import()
	{

		$this->sidebar_import();
		$this->theme_options_import();
		if( function_exists('vc_map') ) $this->vc_template_import();
		$this->revslider_import();
		
	}

	
	function vc_template_export( $file = '' )
	{
		global $wpdb;

		$file = ($file) ? $file : 'default_settings';

		$data = array();

		$settings = get_option( 'wpb_js_templates' );

		$dir = $this->newdir($this->path.DIRECTORY_SEPARATOR.'vc_options');

		$fp = $this->file_open($dir.$file);

		$this->write_file($fp, $this->encrypt($settings));

		$this->file_close($fp);
	}

	

	function vc_template_import( $file = '' )
	{

		global $wpdb;

		$file = ($file) ? $file : 'default_settings';

		$settings = $this->read_file($this->newdir($this->path.DIRECTORY_SEPARATOR.'vc_options').$file);
		
		$old_settings = get_option( 'wpb_js_templates' );
		
		$new_settings = ( $old_settings ) ? array_merge( $settings, $old_settings ) : $settings;
		update_option( 'wpb_js_templates', $new_settings );

	}
	
	function revslider_export( $file = '' )
	{
		global $wpdb;
		$file = ($file) ? $file : 'default_settings';
		
		$data = array();
		
		$sliders = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."revslider_sliders", ARRAY_A);
		$slides = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."revslider_slides", ARRAY_A);
		foreach( $sliders as $k=>$s )
		{
			$slider_id = sh_set( $s, 'id' );
			if( isset( $s['id'] ) ) unset( $s['id']);
			$data['slider'][$k] = $s;
			foreach( $slides as $ss )
			{
				if( isset( $ss['id'] ) ) unset( $ss['id']);
				
				if( $slider_id == sh_set( $ss, 'slider_id' ) )
				$data['slider'][$k]['slides'][] = $ss ;
			}
		}
		
		//return $data;
		
		$dir = $this->newdir($this->path.DIRECTORY_SEPARATOR.'revslider_options');
		$fp = $this->file_open($dir.$file);
		$this->write_file($fp, $this->encrypt($data));
		$this->file_close($fp);
	}
	
	function revslider_import( $file = '' )
	{
		global $wpdb;
		
		$file = ($file) ? $file : 'default_settings';
		
		$settings = $this->read_file($this->newdir($this->path.DIRECTORY_SEPARATOR.'revslider_options').$file);
		
		foreach( (array)$settings['slider'] as $v )
		{
			$slider_id = '';
			
			$res = $wpdb->get_results( "SELECT * FROM `".$wpdb->prefix."revslider_sliders` WHERE `title` LIKE '%".$v['title']."%'");
			
			if( $res ) continue;
			
			$slides = sh_set( $v, 'slides' );
			if( $slides ) unset( $v['slides'] );
			
			$wpdb->insert( $wpdb->prefix."revslider_sliders", $v );
			$slider_id = $wpdb->insert_id;
			
			if( $slider_id ) {
				foreach( $slides as $key => $val )
				{
					if( $val ){
						$val['slider_id'] = $slider_id;
						$wpdb->insert( $wpdb->prefix."revslider_slides", $val );
					}
				}
			}
			
		}
	}
	
	
	
	function theme_options_import($file = '')
	{
		global $wpdb;
		$file = ($file) ? $file : 'default_settings';
		
		$data = $this->read_file($this->newdir($this->path.DIRECTORY_SEPARATOR.'theme_options').$file);


		foreach($data as $k=>$v)
		{
			$data[$k] = $this->replace_pseudo($v);
			//$prefix = THEME_PREFIX.$k;
			
			//update_option($prefix, $v);
		}
		
		update_option( SH_NAME.'_theme_options', $data );
		
		/** Update the front page */
		$front_page = get_page_by_title('Home');
		$blog_page = get_page_by_title('Blog Single Column');
		if($front_page){
			if(get_option('show_on_front') != 'page' && !get_option('page_on_front')) 
			{
				update_option('show_on_front', 'page');
				update_option('page_on_front', $front_page->ID);
				update_option('page_for_posts', $blog_page->ID);
			}
		}
		update_option('posts_per_page', 6);
		
		$res = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."terms WHERE ".$wpdb->prefix."terms.slug = 'header-menu' OR ".$wpdb->prefix."terms.slug = 'footer-menu'");

		if($res){
			$nav_menu = array('');

			$nav_menu['nav_menu_locations']['main_menu'] = $res[0]->term_id;
			//$nav_menu['nav_menu_locations']['footer_menu'] = $res[0]->term_id;

			update_option('theme_mods_'.basename(get_template_directory()), $nav_menu);

		}
		
	}
	
	function theme_options_export($file = '')
	{
		$file = ($file) ? $file : 'default_settings';
		
		$data = array();
		
		$options = get_option(SH_NAME.'_theme_options');
		
		foreach( $options as $k => $v )
		$data[$k] = $this->pseudo($v);

		
		$dir = $this->newdir($this->path.DIRECTORY_SEPARATOR.'theme_options');
		$fp = $this->file_open($dir.$file);
		$this->write_file($fp, $this->encrypt($data));
		$this->file_close($fp);
	}
	
	
	function sidebar_import($file = '')
	{
		$file = ($file) ? $file : 'default_settings';
		
		$data = $this->read_file($this->newdir($this->path.DIRECTORY_SEPARATOR.'widgets').$file);

		if( ! isset($data['settings']) || ! isset($data['sidebars'])) return;
		
		foreach($data['settings'] as $k=>$v)
		{
			update_option('widget_'.$k, $this->replace_pseudo($v));
		}
		
		/** Now update sidebars settings */
		update_option('sidebars_widgets', $data['sidebars']);
	}
	
	function sidebar_export($file = '')
	{
		$file = ($file) ? $file : 'default_settings';
		
		$settings = array();
		$sidebars = wp_get_sidebars_widgets();
		
		if(isset($sidebars['wp_inactive_widgets'])) unset($sidebars['wp_inactive_widgets']);
		
		foreach($sidebars as $name=>$widgets)
		{
			if( ! count($widgets) || $name == 'orphaned_widgets') continue;
			
			foreach($widgets as $widget)
			{
				if(preg_match('#(.*?)-(\d+)$#', $widget, $matches))
				{
					$type = $matches[1];
					$id = $matches[2];
					
					if($widget_settings = get_option('widget_'.$type))
					{
						$settings[$type][$id] = $this->pseudo($widget_settings[$id]);
					}
				}
			}
		}
		
		$dir = $this->newdir($this->path.DIRECTORY_SEPARATOR.'widgets');
		$fp = $this->file_open($dir.$file);
		$this->write_file($fp, $this->encrypt(array('settings'=>$settings, 'sidebars'=>$sidebars)));
		$this->file_close($fp);
	}
	
	function encrypt($data)
	{
		if(is_array($data)) return base64_encode(serialize($data));
		else return $data;
	}
	
	function decrypt($data)
	{
		$data = base64_decode($data);
		
		if(is_serialized($data)) return unserialize($data);
		else return $data;
	}
	
	function newdir($path, $mode = '0777', $recursive = false)
	{
		if(is_dir($path)) return $path.DIRECTORY_SEPARATOR;
		elseif( ! mkdir($path, $mode, $recursive)) wp_die( sprintf( __('System is not able to create backup directory, please create a directory named "backup" in "%s" manually and give it 0777 write permission.', SH_NAME), $path));
		
		return $path.DIRECTORY_SEPARATOR;
	}
	
	function filename($prefix = '', $suffix = '')
	{
		return $prefix.md5(time().get_option('admin_email')).$suffix;
	}
	
	function read_file($file)
	{
		if ( ! file_exists($file)) return FALSE;

		if(function_exists('file_get_contents')) return $this->decrypt(file_get_contents($file));

		if ( ! $fp = @fopen($file, 'rb')) return FALSE;

		flock($fp, LOCK_SH);

		$data = '';
		if(filesize($file) > 0)
		{
			$data =& fread($fp, filesize($file));
		}
		
		flock($fp, LOCK_UN);
		fclose($fp);

		return $this->decrypt($data);
	}
	
	function file_open($path, $mode = 'wb+')
	{
		if ( ! $fp = @fopen($path, $mode)) return FALSE;
		flock($fp, LOCK_EX);
		
		return $fp;
	}
	
	function write_file($fp, $data)
	{
		fwrite($fp, $this->encrypt($data));
	}
	
	function file_close($fp)
	{
		flock($fp, LOCK_UN);
		fclose($fp);
	}
		
	function pseudo($options = array())
	{
		if( is_array( $options ) )
		{
			foreach($options as $k=>$v)
			{
				if(is_array($v)) $options[$k] = $this->pseudo($v);
				elseif(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $v))
				{
					$options[$k] = '{ADMIN_EMAIL}';
				}
				else
				{
					$options[$k] = str_replace(array(SH_URL, home_url(), get_option('admin_email')),array('{SH_URL}', '{HOME_URL}', '{ADMIN_EMAIL}'),$v);
				}
			}
		}else{
			
			if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $options))
			{
				$options = '{ADMIN_EMAIL}';
			}
			else
			{
				$options = str_replace(array(SH_URL, home_url(), get_option('admin_email')),array('{SH_URL}', '{HOME_URL}', '{ADMIN_EMAIL}'),$options);
			}			
		}
	
		return $options;
	}
	
	
	function replace_pseudo($options = array())
	{
		if( is_array( $options ) )
		{
			foreach((array)$options as $k=>$v)
			{
				if(is_array($v)) $options[$k] = $this->replace_pseudo($v);
				else
				{
					$options[$k] = str_replace(array('{SH_URL}', '{HOME_URL}', '{ADMIN_EMAIL}'), array(SH_URL, home_url(), get_option('admin_email')), $v);
				}
			}
		}else{
			$options = str_replace(array('{SH_URL}', '{HOME_URL}', '{ADMIN_EMAIL}'), array(SH_URL, home_url(), get_option('admin_email')), $options);
		}
	
		return $options;
	}
}