<?php
/*
	Plugin name: Gallery
	Plugin URI: http://total-soft.pe.hu/gallery-video
	Description: VidVideo Gallery created for those who really appreciate the beauty and taste. You can display your videos in high quality and best design.
	Version: 1.3.6
	Author: Total-Soft
	Author URI: http://total-soft.pe.hu
	License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/
 	require_once(dirname(__FILE__) . '/Includes/Total-Soft-Gallery-Video-Widget.php');
 	require_once(dirname(__FILE__) . '/Includes/Total-Soft-Gallery-Video-Ajax.php');

 	add_action('wp_enqueue_scripts', 'TotalSoft_VGallery_Widget_Style');

 	function TotalSoft_VGallery_Widget_Style(){
 		wp_enqueue_script('cwp-main', plugins_url('/JS/modernizr.custom.js', __FILE__), array('jquery', 'jquery-ui-core'));
		wp_enqueue_script( 'Total_Soft_Gallery_Video' );

 		wp_register_style('Total_Soft_Gallery_Video', plugins_url('/CSS/Total-Soft-Gallery-Video-Widget.css',__FILE__ ));
		wp_enqueue_style('Total_Soft_Gallery_Video');	
		wp_register_script('Total_Soft_Gallery_Video',plugins_url('/JS/Total-Soft-Gallery-Video-Widget.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Total_Soft_Gallery_Video', 'object', array('ajaxurl' => admin_url('admin-ajax.php')));
		wp_enqueue_script('Total_Soft_Gallery_Video');
		wp_enqueue_script("jquery");

		wp_register_style('fontawesome-css', plugins_url('/CSS/totalsoft.css', __FILE__)); 
  		wp_enqueue_style('fontawesome-css');
 	}

 	add_action('widgets_init', 'TotalSoft_VGallery_Widget_Reg');

 	function TotalSoft_VGallery_Widget_Reg() {
 		register_widget('Total_Soft_Gallery_Video');
 	}

	add_action("admin_menu", 'TotalSoft_VGallery_Admin_Menu');

	function TotalSoft_VGallery_Admin_Menu(){
		$complete_url = wp_nonce_url( '', 'edit-menu_', 'TS_VGallery_Nonce' );
		add_menu_page('Admin Menu','Gallery Video', 'manage_options','Total_Soft_Gallery_Video' . $complete_url, 'Add_New_Gallery_Video', plugins_url('/Images/admin.png',__FILE__));
 		add_submenu_page('Total_Soft_Gallery_Video' . $complete_url, 'Admin Menu', 'Video Manager', 'manage_options', 'Total_Soft_Gallery_Video' . $complete_url, 'Add_New_Gallery_Video');
 		add_submenu_page('Total_Soft_Gallery_Video' . $complete_url, 'Admin Menu', 'General Options', 'manage_options', 'Total_Soft_Gallery_Video_General' . $complete_url, 'Gallery_Video_Options');
 		add_submenu_page('Total_Soft_Gallery_Video' . $complete_url, 'Admin Menu', '<span id="TS_GV_Sup">Support Forum</span>', 'manage_options', 'Total_Soft_Gallery_Video_Support', 'Gallery_Video_Support');
 		add_submenu_page('Total_Soft_Gallery_Video' . $complete_url, 'Admin Menu', 'Total Products', 'manage_options', 'Total_Soft_Products' . $complete_url, 'Total_Soft_Product_GV');
	}

	add_action('admin_init', 'TotalSoft_VGallery_Admin_Style');

	function TotalSoft_VGallery_Admin_Style() {
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');

		wp_register_style('Total_Soft_Gallery_Video', plugins_url('/CSS/Total-Soft-Gallery-Video-Admin.css',__FILE__));
		wp_enqueue_style('Total_Soft_Gallery_Video' );	
		wp_register_script('Total_Soft_Gallery_Video', plugins_url('/JS/Total-Soft-Gallery-Video-Admin.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Total_Soft_Gallery_Video','object', array('ajaxurl'=>admin_url('admin-ajax.php')));
		wp_enqueue_script('Total_Soft_Gallery_Video');

		wp_register_style('fontawesome-css', plugins_url('/CSS/totalsoft.css', __FILE__)); 
  		wp_enqueue_style('fontawesome-css');	
	}

	add_action ('wp_loaded', 'TS_GV_Support');

	function TS_GV_Support()
	{
		if( $_GET['page'] != 'Total_Soft_Gallery_Video_Support' ){
			return;
		}
		$url = 'https://wordpress.org/support/plugin/gallery-videos';
		wp_redirect($url);
		exit;
	}

	add_action( 'admin_footer', 'TS_GV_Support_Blank' );
	function TS_GV_Support_Blank()
	{
		?>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('#TS_GV_Sup').parent().attr('target','_blank');
			});
		</script>
		<?php
	}

	function Add_New_Gallery_Video()
	{
		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Gallery-Video-New.php');
	}
	function Gallery_Video_Options()
	{
		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Gallery-Video-Settings.php');
	}
	function Gallery_Video_Support() { }
	function Total_Soft_Product_GV()
	{
 		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Products.php');
	}
	function TotalSoftGalleryVideoInstall()
	{
		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Gallery-Video-Install.php');
	}
	register_activation_hook(__FILE__,'TotalSoftGalleryVideoInstall');

	function Total_SoftGalleryVideo_Short_ID($atts, $content = null)
	{
		$atts=shortcode_atts(
			array(
				"id"=>"1"
			),$atts
		);
		return Total_Soft_Draw_Gallery_Video($atts['id']);
	}
	add_shortcode('Total_Soft_Gallery_Video', 'Total_SoftGalleryVideo_Short_ID');
	function Total_Soft_Draw_Gallery_Video($GalleryVideo)
	{
		ob_start();	
			$args = shortcode_atts(array('name' => 'Widget Area','id'=>'','description'=>'','class'=>'','before_widget'=>'','after_widget'=>'','before_title'=>'','AFTER_TITLE'=>'','widget_id'=>'','widget_name'=>'Total Soft Gallery Video'), $GalleryVideo, 'Total_Soft_Gallery_Video' );
			$Total_Soft_Gallery_Video=new Total_Soft_Gallery_Video;

			$instance=array('Gallery_Video'=>$GalleryVideo);
			$Total_Soft_Gallery_Video->widget($args,$instance);	
			$cont[]= ob_get_contents();
		ob_end_clean();	
		return $cont[0];		
	}
	function TotalSoft_VGallery_Color() 
	{
		wp_enqueue_script(
			'alpha-color-picker',
			plugins_url('/JS/alpha-color-picker.js', __FILE__),
			array( 'jquery', 'wp-color-picker' ), // You must include these here.
			null,
			true
		);
		wp_enqueue_style(
			'alpha-color-picker',
			plugins_url('/CSS/alpha-color-picker.css', __FILE__),
			array( 'wp-color-picker' ) // You must include these here.
		);
	}
	add_action( 'admin_enqueue_scripts', 'TotalSoft_VGallery_Color' );

	function Total_Soft_VGallery_settings_link($links)
	{
		$forum_link   = '<a target="_blank" href="https://wordpress.org/support/plugin/gallery-videos"> Support </a>';
		$premium_link = '<a target="_blank" href="http://total-soft.pe.hu/gallery-video/"> Pro Version </a>';
		array_push($links, $forum_link);
		array_push($links, $premium_link);
		return $links; 
	}

	$plugin = plugin_basename(__FILE__);
	add_filter("plugin_action_links_$plugin", 'Total_Soft_VGallery_settings_link' );
?>