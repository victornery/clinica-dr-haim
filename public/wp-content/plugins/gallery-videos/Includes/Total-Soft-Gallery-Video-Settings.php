<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;

	require_once('Total-Soft-Gallery-Video-Install.php');
	require_once(dirname(__FILE__) . '/Total-Soft-Pricing.php');

	$table_name4 = $wpdb->prefix . "totalsoft_galleryv_dbt";
	$table_name4_1 = $wpdb->prefix . "totalsoft_galleryv_dbt_1";
	$table_name4_2 = $wpdb->prefix . "totalsoft_galleryv_dbt_2";

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(check_admin_referer( 'edit-menu_', 'TS_VGallery_Nonce' ))
		{
			$TotalSoftGalleryV_SetName = sanitize_text_field($_POST['TotalSoftGalleryV_SetName']); $TotalSoftGalleryV_SetType = sanitize_text_field($_POST['TotalSoftGalleryV_SetType']);
			//Grid Video Gallery
			$TotalSoft_GV_GG_01 = sanitize_text_field($_POST['TotalSoft_GV_GG_01']); $TotalSoft_GV_GG_02 = sanitize_text_field($_POST['TotalSoft_GV_GG_02']); $TotalSoft_GV_GG_03 = sanitize_text_field($_POST['TotalSoft_GV_GG_03']); $TotalSoft_GV_GG_04 = sanitize_text_field($_POST['TotalSoft_GV_GG_04']); $TotalSoft_GV_GG_05 = sanitize_text_field($_POST['TotalSoft_GV_GG_05']); $TotalSoft_GV_GG_06 = sanitize_text_field($_POST['TotalSoft_GV_GG_06']); $TotalSoft_GV_GG_07 = sanitize_text_field($_POST['TotalSoft_GV_GG_07'])/100; $TotalSoft_GV_GG_08 = sanitize_text_field($_POST['TotalSoft_GV_GG_08']); $TotalSoft_GV_GG_11 = sanitize_text_field($_POST['TotalSoft_GV_GG_11']); $TotalSoft_GV_GG_19 = sanitize_text_field($_POST['TotalSoft_GV_GG_19']); $TotalSoft_GV_GG_22 = sanitize_text_field($_POST['TotalSoft_GV_GG_22']); $TotalSoft_GV_GG_24 = sanitize_text_field($_POST['TotalSoft_GV_GG_24']); $TotalSoft_GV_GG_35 = sanitize_text_field($_POST['TotalSoft_GV_GG_35']); $TotalSoft_GV_GG_39 = sanitize_text_field($_POST['TotalSoft_GV_GG_39']); $TotalSoft_GV_GG_44 = sanitize_text_field($_POST['TotalSoft_GV_GG_44']); $TotalSoft_GV_GG_47 = sanitize_text_field($_POST['TotalSoft_GV_GG_47']); $TotalSoft_GV_GG_51 = sanitize_text_field($_POST['TotalSoft_GV_GG_51']); $TotalSoft_GV_GG_52 = sanitize_text_field($_POST['TotalSoft_GV_GG_52']); $TotalSoft_GV_GG_55 = sanitize_text_field($_POST['TotalSoft_GV_GG_55']); $TotalSoft_GV_GG_65 = sanitize_text_field($_POST['TotalSoft_GV_GG_65']);
			//LightBox Video Gallery
			$TotalSoft_GV_LG_01 = sanitize_text_field($_POST['TotalSoft_GV_LG_01']); $TotalSoft_GV_LG_02 = sanitize_text_field($_POST['TotalSoft_GV_LG_02']); $TotalSoft_GV_LG_03 = sanitize_text_field($_POST['TotalSoft_GV_LG_03']); $TotalSoft_GV_LG_04 = sanitize_text_field($_POST['TotalSoft_GV_LG_04']); $TotalSoft_GV_LG_05 = sanitize_text_field($_POST['TotalSoft_GV_LG_05']); $TotalSoft_GV_LG_06 = sanitize_text_field($_POST['TotalSoft_GV_LG_06']); $TotalSoft_GV_LG_07 = sanitize_text_field($_POST['TotalSoft_GV_LG_07']); $TotalSoft_GV_LG_08 = sanitize_text_field($_POST['TotalSoft_GV_LG_08']); $TotalSoft_GV_LG_13 = sanitize_text_field($_POST['TotalSoft_GV_LG_13']); $TotalSoft_GV_LG_16 = sanitize_text_field($_POST['TotalSoft_GV_LG_16']); $TotalSoft_GV_LG_22 = sanitize_text_field($_POST['TotalSoft_GV_LG_22']); $TotalSoft_GV_LG_26 = sanitize_text_field($_POST['TotalSoft_GV_LG_26']); $TotalSoft_GV_LG_28 = sanitize_text_field($_POST['TotalSoft_GV_LG_28']); $TotalSoft_GV_LG_33 = sanitize_text_field($_POST['TotalSoft_GV_LG_33']); $TotalSoft_GV_LG_35 = sanitize_text_field($_POST['TotalSoft_GV_LG_35']); $TotalSoft_GV_LG_37 = sanitize_text_field($_POST['TotalSoft_GV_LG_37']); $TotalSoft_GV_LG_38 = sanitize_text_field($_POST['TotalSoft_GV_LG_38']); $TotalSoft_GV_LG_41 = sanitize_text_field($_POST['TotalSoft_GV_LG_41']); $TotalSoft_GV_LG_49 = sanitize_text_field($_POST['TotalSoft_GV_LG_49']); $TotalSoft_GV_LG_50 = sanitize_text_field($_POST['TotalSoft_GV_LG_50']); $TotalSoft_GV_LG_55 = sanitize_text_field($_POST['TotalSoft_GV_LG_55']); $TotalSoft_GV_LG_66 = sanitize_text_field($_POST['TotalSoft_GV_LG_66']); $TotalSoft_GV_LG_71 = sanitize_text_field($_POST['TotalSoft_GV_LG_71']); $TotalSoft_GV_LG_74 = sanitize_text_field($_POST['TotalSoft_GV_LG_74']);
			//Thumbnails Video
			$TotalSoft_GV_TV_01 = sanitize_text_field($_POST['TotalSoft_GV_TV_01']); $TotalSoft_GV_TV_02 = sanitize_text_field($_POST['TotalSoft_GV_TV_02']); $TotalSoft_GV_TV_03 = sanitize_text_field($_POST['TotalSoft_GV_TV_03']); $TotalSoft_GV_TV_04 = sanitize_text_field($_POST['TotalSoft_GV_TV_04']); $TotalSoft_GV_TV_05 = sanitize_text_field($_POST['TotalSoft_GV_TV_05']); $TotalSoft_GV_TV_06 = sanitize_text_field($_POST['TotalSoft_GV_TV_06']); $TotalSoft_GV_TV_07 = sanitize_text_field($_POST['TotalSoft_GV_TV_07']); $TotalSoft_GV_TV_08 = sanitize_text_field($_POST['TotalSoft_GV_TV_08']); $TotalSoft_GV_TV_09 = sanitize_text_field($_POST['TotalSoft_GV_TV_09']); $TotalSoft_GV_TV_10 = sanitize_text_field($_POST['TotalSoft_GV_TV_10']); $TotalSoft_GV_TV_22 = sanitize_text_field($_POST['TotalSoft_GV_TV_22']); $TotalSoft_GV_TV_26 = sanitize_text_field($_POST['TotalSoft_GV_TV_26']); $TotalSoft_GV_TV_31 = sanitize_text_field($_POST['TotalSoft_GV_TV_31']); $TotalSoft_GV_TV_34 = sanitize_text_field($_POST['TotalSoft_GV_TV_34']); $TotalSoft_GV_TV_37 = sanitize_text_field($_POST['TotalSoft_GV_TV_37']); $TotalSoft_GV_TV_38 = sanitize_text_field($_POST['TotalSoft_GV_TV_38']); $TotalSoft_GV_TV_39 = sanitize_text_field($_POST['TotalSoft_GV_TV_39']); $TotalSoft_GV_TV_42 = sanitize_text_field($_POST['TotalSoft_GV_TV_42']); $TotalSoft_GV_TV_51 = sanitize_text_field($_POST['TotalSoft_GV_TV_51']); $TotalSoft_GV_TV_54 = sanitize_text_field($_POST['TotalSoft_GV_TV_54']);
			//Content Popup
			$TotalSoft_GV_CP_01 = sanitize_text_field($_POST['TotalSoft_GV_CP_01']); $TotalSoft_GV_CP_02 = sanitize_text_field($_POST['TotalSoft_GV_CP_02']); $TotalSoft_GV_CP_03 = sanitize_text_field($_POST['TotalSoft_GV_CP_03']); $TotalSoft_GV_CP_04 = sanitize_text_field($_POST['TotalSoft_GV_CP_04']); $TotalSoft_GV_CP_05 = sanitize_text_field($_POST['TotalSoft_GV_CP_05']); $TotalSoft_GV_CP_06 = sanitize_text_field($_POST['TotalSoft_GV_CP_06']); $TotalSoft_GV_CP_07 = sanitize_text_field($_POST['TotalSoft_GV_CP_07']); $TotalSoft_GV_CP_08 = sanitize_text_field($_POST['TotalSoft_GV_CP_08']); $TotalSoft_GV_CP_13 = sanitize_text_field($_POST['TotalSoft_GV_CP_13']); $TotalSoft_GV_CP_19 = sanitize_text_field($_POST['TotalSoft_GV_CP_19']); $TotalSoft_GV_CP_25 = sanitize_text_field($_POST['TotalSoft_GV_CP_25']); $TotalSoft_GV_CP_29 = sanitize_text_field($_POST['TotalSoft_GV_CP_29']); $TotalSoft_GV_CP_30 = sanitize_text_field($_POST['TotalSoft_GV_CP_30']); $TotalSoft_GV_CP_33 = sanitize_text_field($_POST['TotalSoft_GV_CP_33']); $TotalSoft_GV_CP_45 = sanitize_text_field($_POST['TotalSoft_GV_CP_45']); $TotalSoft_GV_CP_50 = sanitize_text_field($_POST['TotalSoft_GV_CP_50']); $TotalSoft_GV_CP_57 = sanitize_text_field($_POST['TotalSoft_GV_CP_57']); $TotalSoft_GV_CP_62 = sanitize_text_field($_POST['TotalSoft_GV_CP_62']); $TotalSoft_GV_CP_66 = sanitize_text_field($_POST['TotalSoft_GV_CP_66']); $TotalSoft_GV_CP_72 = sanitize_text_field($_POST['TotalSoft_GV_CP_72']); $TotalSoft_GV_CP_73 = sanitize_text_field($_POST['TotalSoft_GV_CP_73']);
			//Elastic Gallery
			$TotalSoft_GV_EG_01 = sanitize_text_field($_POST['TotalSoft_GV_EG_01']); $TotalSoft_GV_EG_02 = sanitize_text_field($_POST['TotalSoft_GV_EG_02']); $TotalSoft_GV_EG_03 = sanitize_text_field($_POST['TotalSoft_GV_EG_03']); $TotalSoft_GV_EG_04 = sanitize_text_field($_POST['TotalSoft_GV_EG_04']); $TotalSoft_GV_EG_05 = sanitize_text_field($_POST['TotalSoft_GV_EG_05']); $TotalSoft_GV_EG_06 = sanitize_text_field($_POST['TotalSoft_GV_EG_06']); $TotalSoft_GV_EG_07 = sanitize_text_field($_POST['TotalSoft_GV_EG_07']); $TotalSoft_GV_EG_08 = sanitize_text_field($_POST['TotalSoft_GV_EG_08']); $TotalSoft_GV_EG_09 = sanitize_text_field($_POST['TotalSoft_GV_EG_09']); $TotalSoft_GV_EG_10 = sanitize_text_field($_POST['TotalSoft_GV_EG_10']); $TotalSoft_GV_EG_17 = sanitize_text_field($_POST['TotalSoft_GV_EG_17']); $TotalSoft_GV_EG_31 = sanitize_text_field($_POST['TotalSoft_GV_EG_31']); $TotalSoft_GV_EG_33 = sanitize_text_field($_POST['TotalSoft_GV_EG_33']); $TotalSoft_GV_EG_44 = sanitize_text_field($_POST['TotalSoft_GV_EG_44']); $TotalSoft_GV_EG_45 = sanitize_text_field($_POST['TotalSoft_GV_EG_45']); $TotalSoft_GV_EG_48 = sanitize_text_field($_POST['TotalSoft_GV_EG_48']); $TotalSoft_GV_EG_56 = sanitize_text_field($_POST['TotalSoft_GV_EG_56']);
			//Fancy Gallery
			$TotalSoft_GV_FG_01 = sanitize_text_field($_POST['TotalSoft_GV_FG_01']); $TotalSoft_GV_FG_02 = sanitize_text_field($_POST['TotalSoft_GV_FG_02']); $TotalSoft_GV_FG_03 = sanitize_text_field($_POST['TotalSoft_GV_FG_03']); $TotalSoft_GV_FG_04 = sanitize_text_field($_POST['TotalSoft_GV_FG_04']); $TotalSoft_GV_FG_05 = sanitize_text_field($_POST['TotalSoft_GV_FG_05']); $TotalSoft_GV_FG_06 = sanitize_text_field($_POST['TotalSoft_GV_FG_06']); $TotalSoft_GV_FG_07 = sanitize_text_field($_POST['TotalSoft_GV_FG_07']); $TotalSoft_GV_FG_08 = sanitize_text_field($_POST['TotalSoft_GV_FG_08']); $TotalSoft_GV_FG_09 = sanitize_text_field($_POST['TotalSoft_GV_FG_09']); $TotalSoft_GV_FG_17 = sanitize_text_field($_POST['TotalSoft_GV_FG_17']); $TotalSoft_GV_FG_39 = sanitize_text_field($_POST['TotalSoft_GV_FG_39']); $TotalSoft_GV_FG_43 = sanitize_text_field($_POST['TotalSoft_GV_FG_43']); $TotalSoft_GV_FG_46 = sanitize_text_field($_POST['TotalSoft_GV_FG_46']); $TotalSoft_GV_FG_52 = sanitize_text_field($_POST['TotalSoft_GV_FG_52']); $TotalSoft_GV_FG_53 = sanitize_text_field($_POST['TotalSoft_GV_FG_53']); $TotalSoft_GV_FG_56 = sanitize_text_field($_POST['TotalSoft_GV_FG_56']); $TotalSoft_GV_FG_64 = sanitize_text_field($_POST['TotalSoft_GV_FG_64']); $TotalSoft_GV_FG_65 = sanitize_text_field($_POST['TotalSoft_GV_FG_65']);
			//Parallax Engine
			$TotalSoft_GV_PE_01 = sanitize_text_field($_POST['TotalSoft_GV_PE_01']); $TotalSoft_GV_PE_02 = sanitize_text_field($_POST['TotalSoft_GV_PE_02']); $TotalSoft_GV_PE_03 = sanitize_text_field($_POST['TotalSoft_GV_PE_03']); $TotalSoft_GV_PE_04 = sanitize_text_field($_POST['TotalSoft_GV_PE_04']); $TotalSoft_GV_PE_05 = sanitize_text_field($_POST['TotalSoft_GV_PE_05']); $TotalSoft_GV_PE_06 = sanitize_text_field($_POST['TotalSoft_GV_PE_06']); $TotalSoft_GV_PE_07 = sanitize_text_field($_POST['TotalSoft_GV_PE_07']); $TotalSoft_GV_PE_08 = sanitize_text_field($_POST['TotalSoft_GV_PE_08']); $TotalSoft_GV_PE_09 = sanitize_text_field($_POST['TotalSoft_GV_PE_09']); $TotalSoft_GV_PE_17 = sanitize_text_field($_POST['TotalSoft_GV_PE_17']); $TotalSoft_GV_PE_37 = sanitize_text_field($_POST['TotalSoft_GV_PE_37']); $TotalSoft_GV_PE_40 = sanitize_text_field($_POST['TotalSoft_GV_PE_40']); $TotalSoft_GV_PE_45 = sanitize_text_field($_POST['TotalSoft_GV_PE_45']); $TotalSoft_GV_PE_46 = sanitize_text_field($_POST['TotalSoft_GV_PE_46']); $TotalSoft_GV_PE_49 = sanitize_text_field($_POST['TotalSoft_GV_PE_49']); $TotalSoft_GV_PE_57 = sanitize_text_field($_POST['TotalSoft_GV_PE_57']);
			//Classic Gallery
			$TotalSoft_GV_CG_01 = sanitize_text_field($_POST['TotalSoft_GV_CG_01']); $TotalSoft_GV_CG_07 = sanitize_text_field($_POST['TotalSoft_GV_CG_07']); $TotalSoft_GV_CG_09 = sanitize_text_field($_POST['TotalSoft_GV_CG_09']); $TotalSoft_GV_CG_14 = sanitize_text_field($_POST['TotalSoft_GV_CG_14']); $TotalSoft_GV_CG_17 = sanitize_text_field($_POST['TotalSoft_GV_CG_17']); $TotalSoft_GV_CG_18 = sanitize_text_field($_POST['TotalSoft_GV_CG_18']); $TotalSoft_GV_CG_20 = sanitize_text_field($_POST['TotalSoft_GV_CG_20']); $TotalSoft_GV_CG_31 = sanitize_text_field($_POST['TotalSoft_GV_CG_31']); $TotalSoft_GV_CG_35 = sanitize_text_field($_POST['TotalSoft_GV_CG_35']); $TotalSoft_GV_CG_38 = sanitize_text_field($_POST['TotalSoft_GV_CG_38']); $TotalSoft_GV_CG_43 = sanitize_text_field($_POST['TotalSoft_GV_CG_43']); $TotalSoft_GV_CG_48 = sanitize_text_field($_POST['TotalSoft_GV_CG_48']); $TotalSoft_GV_CG_58 = sanitize_text_field($_POST['TotalSoft_GV_CG_58']);
			//Space Gallery
			$TotalSoft_GV_SG_01 = sanitize_text_field($_POST['TotalSoft_GV_SG_01']); $TotalSoft_GV_SG_02 = sanitize_text_field($_POST['TotalSoft_GV_SG_02']); $TotalSoft_GV_SG_03 = sanitize_text_field($_POST['TotalSoft_GV_SG_03']); $TotalSoft_GV_SG_04 = sanitize_text_field($_POST['TotalSoft_GV_SG_04']); $TotalSoft_GV_SG_05 = sanitize_text_field($_POST['TotalSoft_GV_SG_05']); $TotalSoft_GV_SG_06 = sanitize_text_field($_POST['TotalSoft_GV_SG_06']); $TotalSoft_GV_SG_14 = sanitize_text_field($_POST['TotalSoft_GV_SG_14']); $TotalSoft_GV_SG_17 = sanitize_text_field($_POST['TotalSoft_GV_SG_17']); $TotalSoft_GV_SG_18 = sanitize_text_field($_POST['TotalSoft_GV_SG_18']); $TotalSoft_GV_SG_23 = sanitize_text_field($_POST['TotalSoft_GV_SG_23']); $TotalSoft_GV_SG_24 = sanitize_text_field($_POST['TotalSoft_GV_SG_24']); $TotalSoft_GV_SG_25 = sanitize_text_field($_POST['TotalSoft_GV_SG_25']); $TotalSoft_GV_SG_28 = sanitize_text_field($_POST['TotalSoft_GV_SG_28']); $TotalSoft_GV_SG_29 = sanitize_text_field($_POST['TotalSoft_GV_SG_29']); $TotalSoft_GV_SG_31 = sanitize_text_field($_POST['TotalSoft_GV_SG_31']); $TotalSoft_GV_SG_32 = sanitize_text_field($_POST['TotalSoft_GV_SG_32']); $TotalSoft_GV_SG_40 = sanitize_text_field($_POST['TotalSoft_GV_SG_40']); $TotalSoft_GV_SG_41 = sanitize_text_field($_POST['TotalSoft_GV_SG_41']); $TotalSoft_GV_SG_43 = sanitize_text_field($_POST['TotalSoft_GV_SG_43']); $TotalSoft_GV_SG_44 = sanitize_text_field($_POST['TotalSoft_GV_SG_44']); $TotalSoft_GV_SG_47 = sanitize_text_field($_POST['TotalSoft_GV_SG_47']); $TotalSoft_GV_SG_48 = sanitize_text_field($_POST['TotalSoft_GV_SG_48']); $TotalSoft_GV_SG_49 = sanitize_text_field($_POST['TotalSoft_GV_SG_49']); $TotalSoft_GV_SG_50 = sanitize_text_field($_POST['TotalSoft_GV_SG_50']); $TotalSoft_GV_SG_54 = sanitize_text_field($_POST['TotalSoft_GV_SG_54']); $TotalSoft_GV_SG_57 = sanitize_text_field($_POST['TotalSoft_GV_SG_57']); $TotalSoft_GV_SG_59 = sanitize_text_field($_POST['TotalSoft_GV_SG_59']); $TotalSoft_GV_SG_62 = sanitize_text_field($_POST['TotalSoft_GV_SG_62']);

			if( $TotalSoft_GV_GG_01 == 'on' ){ $TotalSoft_GV_GG_01 = 'true'; }else{ $TotalSoft_GV_GG_01 = 'false'; }
			if( $TotalSoft_GV_GG_02 == 'on' ){ $TotalSoft_GV_GG_02 = 'true'; }else{ $TotalSoft_GV_GG_02 = 'false'; }
			if( $TotalSoft_GV_GG_03 == '2' ){ $TotalSoft_GV_GG_03 = '2.04'; }
			if( $TotalSoft_GV_CP_06 == 'on' ){ $TotalSoft_GV_CP_06 = 'true'; }else{ $TotalSoft_GV_CP_06 = 'false'; }

			if(isset($_POST['Total_Soft_Gallery_Video_Update_Option']))
			{
				$Total_SoftGallery_Video_Update = sanitize_text_field($_POST['Total_SoftGallery_Video_Update']);

				$wpdb->query($wpdb->prepare("UPDATE $table_name4 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s WHERE id = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $Total_SoftGallery_Video_Update));

				if($TotalSoftGalleryV_SetType == 'Grid Video Gallery')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_1 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_1_01 = %s, TotalSoft_GV_1_02 = %s, TotalSoft_GV_1_03 = %s, TotalSoft_GV_1_04 = %s, TotalSoft_GV_1_05 = %s, TotalSoft_GV_1_06 = %s, TotalSoft_GV_1_07 = %s, TotalSoft_GV_1_08 = %s, TotalSoft_GV_1_11 = %s, TotalSoft_GV_1_19 = %s, TotalSoft_GV_1_22 = %s, TotalSoft_GV_1_24 = %s, TotalSoft_GV_1_35 = %s, TotalSoft_GV_1_39 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_GG_01, $TotalSoft_GV_GG_02, $TotalSoft_GV_GG_03, $TotalSoft_GV_GG_04, $TotalSoft_GV_GG_05, $TotalSoft_GV_GG_06, $TotalSoft_GV_GG_07, $TotalSoft_GV_GG_08, $TotalSoft_GV_GG_11, $TotalSoft_GV_GG_19, $TotalSoft_GV_GG_22, $TotalSoft_GV_GG_24, $TotalSoft_GV_GG_35, $TotalSoft_GV_GG_39, $Total_SoftGallery_Video_Update));
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_2 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_2_05 = %s, TotalSoft_GV_2_08 = %s, TotalSoft_GV_2_12 = %s, TotalSoft_GV_2_13 = %s, TotalSoft_GV_2_16 = %s, TotalSoft_GV_2_26 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_GG_44, $TotalSoft_GV_GG_47, $TotalSoft_GV_GG_51, $TotalSoft_GV_GG_52, $TotalSoft_GV_GG_55, $TotalSoft_GV_GG_65, $Total_SoftGallery_Video_Update));
				}
				else if($TotalSoftGalleryV_SetType=='LightBox Video Gallery')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_1 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_1_01 = %s, TotalSoft_GV_1_02 = %s, TotalSoft_GV_1_03 = %s, TotalSoft_GV_1_04 = %s, TotalSoft_GV_1_05 = %s, TotalSoft_GV_1_06 = %s, TotalSoft_GV_1_07 = %s, TotalSoft_GV_1_08 = %s, TotalSoft_GV_1_13 = %s, TotalSoft_GV_1_16 = %s, TotalSoft_GV_1_22 = %s, TotalSoft_GV_1_26 = %s, TotalSoft_GV_1_28 = %s, TotalSoft_GV_1_33 = %s, TotalSoft_GV_1_35 = %s, TotalSoft_GV_1_37 = %s, TotalSoft_GV_1_38 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_LG_01, $TotalSoft_GV_LG_02, $TotalSoft_GV_LG_03, $TotalSoft_GV_LG_04, $TotalSoft_GV_LG_05, $TotalSoft_GV_LG_06, $TotalSoft_GV_LG_07, $TotalSoft_GV_LG_08, $TotalSoft_GV_LG_13, $TotalSoft_GV_LG_16, $TotalSoft_GV_LG_22, $TotalSoft_GV_LG_26, $TotalSoft_GV_LG_28, $TotalSoft_GV_LG_33, $TotalSoft_GV_LG_35, $TotalSoft_GV_LG_37, $TotalSoft_GV_LG_38, $Total_SoftGallery_Video_Update));
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_2 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_2_02 = %s, TotalSoft_GV_2_10 = %s, TotalSoft_GV_2_11 = %s, TotalSoft_GV_2_16 = %s, TotalSoft_GV_2_27 = %s, TotalSoft_GV_2_32 = %s, TotalSoft_GV_2_35 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_LG_41, $TotalSoft_GV_LG_49, $TotalSoft_GV_LG_50, $TotalSoft_GV_LG_55, $TotalSoft_GV_LG_66, $TotalSoft_GV_LG_71, $TotalSoft_GV_LG_74, $Total_SoftGallery_Video_Update));
				}
				else if($TotalSoftGalleryV_SetType=='Thumbnails Video')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_1 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_1_01 = %s, TotalSoft_GV_1_02 = %s, TotalSoft_GV_1_03 = %s, TotalSoft_GV_1_04 = %s, TotalSoft_GV_1_05 = %s, TotalSoft_GV_1_06 = %s, TotalSoft_GV_1_07 = %s, TotalSoft_GV_1_08 = %s, TotalSoft_GV_1_09 = %s, TotalSoft_GV_1_10 = %s, TotalSoft_GV_1_22 = %s, TotalSoft_GV_1_26 = %s, TotalSoft_GV_1_31 = %s, TotalSoft_GV_1_34 = %s, TotalSoft_GV_1_37 = %s, TotalSoft_GV_1_38 = %s, TotalSoft_GV_1_39 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_TV_01, $TotalSoft_GV_TV_02, $TotalSoft_GV_TV_03, $TotalSoft_GV_TV_04, $TotalSoft_GV_TV_05, $TotalSoft_GV_TV_06, $TotalSoft_GV_TV_07, $TotalSoft_GV_TV_08, $TotalSoft_GV_TV_09, $TotalSoft_GV_TV_10, $TotalSoft_GV_TV_22, $TotalSoft_GV_TV_26, $TotalSoft_GV_TV_31, $TotalSoft_GV_TV_34, $TotalSoft_GV_TV_37, $TotalSoft_GV_TV_38, $TotalSoft_GV_TV_39, $Total_SoftGallery_Video_Update));
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_2 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_2_03 = %s, TotalSoft_GV_2_12 = %s, TotalSoft_GV_2_15 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_TV_42, $TotalSoft_GV_TV_51, $TotalSoft_GV_TV_54, $Total_SoftGallery_Video_Update));
				}
				else if($TotalSoftGalleryV_SetType=='Content Popup')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_1 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_1_01 = %s, TotalSoft_GV_1_02 = %s, TotalSoft_GV_1_03 = %s, TotalSoft_GV_1_04 = %s, TotalSoft_GV_1_05 = %s, TotalSoft_GV_1_06 = %s, TotalSoft_GV_1_07 = %s, TotalSoft_GV_1_08 = %s, TotalSoft_GV_1_13 = %s, TotalSoft_GV_1_19 = %s, TotalSoft_GV_1_25 = %s, TotalSoft_GV_1_29 = %s, TotalSoft_GV_1_30 = %s, TotalSoft_GV_1_33 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_CP_01, $TotalSoft_GV_CP_02, $TotalSoft_GV_CP_03, $TotalSoft_GV_CP_04, $TotalSoft_GV_CP_05, $TotalSoft_GV_CP_06, $TotalSoft_GV_CP_07, $TotalSoft_GV_CP_08, $TotalSoft_GV_CP_13, $TotalSoft_GV_CP_19, $TotalSoft_GV_CP_25, $TotalSoft_GV_CP_29, $TotalSoft_GV_CP_30, $TotalSoft_GV_CP_33, $Total_SoftGallery_Video_Update));
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_2 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_2_06 = %s, TotalSoft_GV_2_11 = %s, TotalSoft_GV_2_18 = %s, TotalSoft_GV_2_23 = %s, TotalSoft_GV_2_27 = %s, TotalSoft_GV_2_33 = %s, TotalSoft_GV_2_34 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_CP_45, $TotalSoft_GV_CP_50, $TotalSoft_GV_CP_57, $TotalSoft_GV_CP_62, $TotalSoft_GV_CP_66, $TotalSoft_GV_CP_72, $TotalSoft_GV_CP_73, $Total_SoftGallery_Video_Update));
				}
				else if($TotalSoftGalleryV_SetType=='Elastic Gallery')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_1 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_1_01 = %s, TotalSoft_GV_1_02 = %s, TotalSoft_GV_1_03 = %s, TotalSoft_GV_1_04 = %s, TotalSoft_GV_1_05 = %s, TotalSoft_GV_1_06 = %s, TotalSoft_GV_1_07 = %s, TotalSoft_GV_1_08 = %s, TotalSoft_GV_1_09 = %s, TotalSoft_GV_1_10 = %s, TotalSoft_GV_1_17 = %s, TotalSoft_GV_1_31 = %s, TotalSoft_GV_1_33 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_EG_01, $TotalSoft_GV_EG_02, $TotalSoft_GV_EG_03, $TotalSoft_GV_EG_04, $TotalSoft_GV_EG_05, $TotalSoft_GV_EG_06, $TotalSoft_GV_EG_07, $TotalSoft_GV_EG_08, $TotalSoft_GV_EG_09, $TotalSoft_GV_EG_10, $TotalSoft_GV_EG_17, $TotalSoft_GV_EG_31, $TotalSoft_GV_EG_33, $Total_SoftGallery_Video_Update));
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_2 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_2_05 = %s, TotalSoft_GV_2_06 = %s, TotalSoft_GV_2_09 = %s, TotalSoft_GV_2_17 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_EG_44, $TotalSoft_GV_EG_45, $TotalSoft_GV_EG_48, $TotalSoft_GV_EG_56, $Total_SoftGallery_Video_Update));
				}
				else if($TotalSoftGalleryV_SetType=='Fancy Gallery')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_1 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_1_01 = %s, TotalSoft_GV_1_02 = %s, TotalSoft_GV_1_03 = %s, TotalSoft_GV_1_04 = %s, TotalSoft_GV_1_05 = %s, TotalSoft_GV_1_06 = %s, TotalSoft_GV_1_07 = %s, TotalSoft_GV_1_08 = %s, TotalSoft_GV_1_09 = %s, TotalSoft_GV_1_17 = %s, TotalSoft_GV_1_39 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_FG_01, $TotalSoft_GV_FG_02, $TotalSoft_GV_FG_03, $TotalSoft_GV_FG_04, $TotalSoft_GV_FG_05, $TotalSoft_GV_FG_06, $TotalSoft_GV_FG_07, $TotalSoft_GV_FG_08, $TotalSoft_GV_FG_09, $TotalSoft_GV_FG_17, $TotalSoft_GV_FG_39, $Total_SoftGallery_Video_Update));
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_2 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_2_04 = %s, TotalSoft_GV_2_07 = %s, TotalSoft_GV_2_13 = %s, TotalSoft_GV_2_14 = %s, TotalSoft_GV_2_17 = %s, TotalSoft_GV_2_25 = %s, TotalSoft_GV_2_26 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_FG_43, $TotalSoft_GV_FG_46, $TotalSoft_GV_FG_52, $TotalSoft_GV_FG_53, $TotalSoft_GV_FG_56, $TotalSoft_GV_FG_64, $TotalSoft_GV_FG_65, $Total_SoftGallery_Video_Update));
				}
				else if($TotalSoftGalleryV_SetType=='Parallax Engine')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_1 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_1_01 = %s, TotalSoft_GV_1_02 = %s, TotalSoft_GV_1_03 = %s, TotalSoft_GV_1_04 = %s, TotalSoft_GV_1_05 = %s, TotalSoft_GV_1_06 = %s, TotalSoft_GV_1_07 = %s, TotalSoft_GV_1_08 = %s, TotalSoft_GV_1_09 = %s, TotalSoft_GV_1_17 = %s, TotalSoft_GV_1_37 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_PE_01, $TotalSoft_GV_PE_02, $TotalSoft_GV_PE_03, $TotalSoft_GV_PE_04, $TotalSoft_GV_PE_05, $TotalSoft_GV_PE_06, $TotalSoft_GV_PE_07, $TotalSoft_GV_PE_08, $TotalSoft_GV_PE_09, $TotalSoft_GV_PE_17, $TotalSoft_GV_PE_37, $Total_SoftGallery_Video_Update));
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_2 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_2_01 = %s, TotalSoft_GV_2_06 = %s, TotalSoft_GV_2_07 = %s, TotalSoft_GV_2_10 = %s, TotalSoft_GV_2_18 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_PE_40, $TotalSoft_GV_PE_45, $TotalSoft_GV_PE_46, $TotalSoft_GV_PE_49, $TotalSoft_GV_PE_57, $Total_SoftGallery_Video_Update));
				}
				else if($TotalSoftGalleryV_SetType=='Classic Gallery')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_1 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_1_01 = %s, TotalSoft_GV_1_07 = %s, TotalSoft_GV_1_09 = %s, TotalSoft_GV_1_14 = %s, TotalSoft_GV_1_17 = %s, TotalSoft_GV_1_18 = %s, TotalSoft_GV_1_20 = %s, TotalSoft_GV_1_31 = %s, TotalSoft_GV_1_35 = %s, TotalSoft_GV_1_38 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_CG_01, $TotalSoft_GV_CG_07, $TotalSoft_GV_CG_09, $TotalSoft_GV_CG_14, $TotalSoft_GV_CG_17, $TotalSoft_GV_CG_18, $TotalSoft_GV_CG_20, $TotalSoft_GV_CG_31, $TotalSoft_GV_CG_35, $TotalSoft_GV_CG_38, $Total_SoftGallery_Video_Update));
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_2 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_2_04 = %s, TotalSoft_GV_2_09 = %s, TotalSoft_GV_2_19 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_CG_43, $TotalSoft_GV_CG_48, $TotalSoft_GV_CG_58, $Total_SoftGallery_Video_Update));
				}
				else if($TotalSoftGalleryV_SetType=='Space Gallery')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_1 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_1_01 = %s, TotalSoft_GV_1_02 = %s, TotalSoft_GV_1_03 = %s, TotalSoft_GV_1_04 = %s, TotalSoft_GV_1_05 = %s, TotalSoft_GV_1_06 = %s, TotalSoft_GV_1_14 = %s, TotalSoft_GV_1_17 = %s, TotalSoft_GV_1_18 = %s, TotalSoft_GV_1_23 = %s, TotalSoft_GV_1_24 = %s, TotalSoft_GV_1_25 = %s, TotalSoft_GV_1_28 = %s, TotalSoft_GV_1_29 = %s, TotalSoft_GV_1_31 = %s, TotalSoft_GV_1_32 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_SG_01, $TotalSoft_GV_SG_02, $TotalSoft_GV_SG_03, $TotalSoft_GV_SG_04, $TotalSoft_GV_SG_05, $TotalSoft_GV_SG_06, $TotalSoft_GV_SG_14, $TotalSoft_GV_SG_17, $TotalSoft_GV_SG_18, $TotalSoft_GV_SG_23, $TotalSoft_GV_SG_24, $TotalSoft_GV_SG_25, $TotalSoft_GV_SG_28, $TotalSoft_GV_SG_29, $TotalSoft_GV_SG_31, $TotalSoft_GV_SG_32, $Total_SoftGallery_Video_Update));
					$wpdb->query($wpdb->prepare("UPDATE $table_name4_2 set TotalSoftGalleryV_SetName = %s, TotalSoftGalleryV_SetType = %s, TotalSoft_GV_2_01 = %s, TotalSoft_GV_2_02 = %s, TotalSoft_GV_2_04 = %s, TotalSoft_GV_2_05 = %s, TotalSoft_GV_2_08 = %s, TotalSoft_GV_2_09 = %s, TotalSoft_GV_2_10 = %s, TotalSoft_GV_2_11 = %s, TotalSoft_GV_2_15 = %s, TotalSoft_GV_2_18 = %s, TotalSoft_GV_2_20 = %s, TotalSoft_GV_2_23 = %s WHERE TotalSoftGalleryV_SetID = %d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $TotalSoft_GV_SG_40, $TotalSoft_GV_SG_41, $TotalSoft_GV_SG_43, $TotalSoft_GV_SG_44, $TotalSoft_GV_SG_47, $TotalSoft_GV_SG_48, $TotalSoft_GV_SG_49, $TotalSoft_GV_SG_50, $TotalSoft_GV_SG_54, $TotalSoft_GV_SG_57, $TotalSoft_GV_SG_59, $TotalSoft_GV_SG_62, $Total_SoftGallery_Video_Update));
				}
			}
		}
		else
		{
			wp_die('Security check fail'); 
		}
	}

	$TotalSoftFontCount = array("Abadi MT Condensed Light", "ABeeZee", "Abel", "Abhaya Libre", "Abril Fatface", "Aclonica", "Acme", "Actor", "Adamina", "Advent Pro", "Aguafina Script", "Aharoni", "Akronim", "Aladin", "Aldhabi", "Aldrich", "Alef", "Alegreya", "Alegreya Sans", "Alegreya Sans SC", "Alegreya SC", "Alex Brush", "Alfa Slab One", "Alice", "Alike", "Alike Angular", "Allan", "Allerta", "Allerta Stencil", "Allura", "Almendra", "Almendra Display", "Almendra SC", "Amarante", "Amaranth", "Amatic SC", "Amethysta", "Amiko", "Amiri", "Amita", "Anaheim", "Andada", "Andalus", "Andika", "Angkor", "Angsana New", "AngsanaUPC", "Annie Use Your Telescope", "Anonymous Pro", "Antic", "Antic Didone", "Antic Slab", "Anton", "Aparajita", "Arabic Typesetting", "Arapey", "Arbutus", "Arbutus Slab", "Architects Daughter", "Archivo", "Archivo Black", "Archivo Narrow", "Aref Ruqaa", "Arial", "Arial Black", "Arimo", "Arima Madurai", "Arizonia", "Armata", "Arsenal", "Artifika", "Arvo", "Arya", "Asap", "Asap Condensed", "Asar", "Asset", "Assistant", "Astloch", "Asul", "Athiti", "Atma", "Atomic Age", "Aubrey", "Audiowide", "Autour One", "Average", "Average Sans", "Averia Gruesa Libre", "Averia Libre", "Averia Sans Libre", "Averia Serif Libre", "Bad Script", "Bahiana", "Baloo", "Balthazar", "Bangers", "Barlow", "Barlow Condensed", "Barlow Semi Condensed", "Barrio", "Basic", "Batang", "BatangChe", "Battambang", "Baumans", "Bayon", "Belgrano", "Bellefair", "Belleza", "BenchNine", "Bentham", "Berkshire Swash", "Bevan", "Bigelow Rules", "Bigshot One", "Bilbo", "Bilbo Swash Caps", "BioRhyme", "BioRhyme Expanded", "Biryani", "Bitter", "Black And White Picture", "Black Han Sans", "Black Ops One", "Bokor", "Bonbon", "Boogaloo", "Bowlby One", "Bowlby One SC", "Brawler", "Bree Serif", "Browallia New", "BrowalliaUPC", "Bubbler One", "Bubblegum Sans", "Buda", "Buenard", "Bungee", "Bungee Hairline", "Bungee Inline", "Bungee Outline", "Bungee Shade", "Butcherman", "Butterfly Kids", "Cabin", "Cabin Condensed", "Cabin Sketch", "Caesar Dressing", "Cagliostro", "Cairo", "Calibri", "Calibri Light", "Calisto MT", "Calligraffitti", "Cambay", "Cambo", "Cambria", "Candal", "Candara", "Cantarell", "Cantata One", "Cantora One", "Capriola", "Cardo", "Carme", "Carrois Gothic", "Carrois Gothic SC", "Carter One", "Catamaran", "Caudex", "Caveat", "Caveat Brush", "Cedarville Cursive", "Century Gothic", "Ceviche One", "Changa", "Changa One", "Chango", "Chathura", "Chau Philomene One", "Chela One", "Chelsea Market", "Chenla", "Cherry Cream Soda", "Cherry Swash", "Chewy", "Chicle", "Chivo", "Chonburi", "Cinzel", "Cinzel Decorative", "Clicker Script", "Coda", "Coda Caption", "Codystar", "Coiny", "Combo", "Comic Sans MS", "Coming Soon", "Comfortaa", "Concert One", "Condiment", "Consolas", "Constantia", "Content", "Contrail One", "Convergence", "Cookie", "Copperplate Gothic", "Copperplate Gothic Light", "Copse", "Corbel", "Corben", "Cordia New", "CordiaUPC", "Cormorant", "Cormorant Garamond", "Cormorant Infant", "Cormorant SC", "Cormorant Unicase", "Cormorant Upright", "Courgette", "Courier New", "Cousine", "Coustard", "Covered By Your Grace", "Crafty Girls", "Creepster", "Crete Round", "Crimson Text", "Croissant One", "Crushed", "Cuprum", "Cute Font", "Cutive", "Cutive Mono", "Damion", "Dancing Script", "Dangrek", "DaunPenh", "David", "David Libre", "Dawning of a New Day", "Days One", "Delius", "Delius Swash Caps", "Delius Unicase", "Della Respira", "Denk One", "Devonshire", "DFKai-SB", "Dhurjati", "Didact Gothic", "DilleniaUPC", "Diplomata", "Diplomata SC", "Do Hyeon", "DokChampa", "Dokdo", "Domine", "Donegal One", "Doppio One", "Dorsa", "Dosis", "Dotum", "DotumChe", "Dr Sugiyama", "Duru Sans", "Dynalight", "Eagle Lake", "East Sea Dokdo", "Eater", "EB Garamond", "Ebrima", "Economica", "Eczar", "El Messiri", "Electrolize", "Elsie", "Elsie Swash Caps", "Emblema One", "Emilys Candy", "Encode Sans", "Encode Sans Condensed", "Encode Sans Expanded", "Encode Sans Semi Condensed", "Encode Sans Semi Expanded", "Engagement", "Englebert", "Enriqueta", "Erica One", "Esteban", "Estrangelo Edessa", "EucrosiaUPC", "Euphemia", "Euphoria Script", "Ewert", "Exo", "Expletus Sans", "FangSong", "Fanwood Text", "Farsan", "Fascinate", "Fascinate Inline", "Faster One", "Fasthand", "Fauna One", "Faustina", "Federant", "Federo", "Felipa", "Fenix", "Finger Paint", "Fira Mono", "Fira Sans", "Fira Sans Condensed", "Fira Sans Extra Condensed", "Fjalla One", "Fjord One", "Flamenco", "Flavors", "Fondamento", "Fontdiner Swanky", "Forum", "Francois One", "Frank Ruhl Libre", "Franklin Gothic Medium", "FrankRuehl", "Freckle Face", "Fredericka the Great", "Fredoka One", "Freehand", "FreesiaUPC", "Fresca", "Frijole", "Fruktur", "Fugaz One", "Gabriela", "Gabriola", "Gadugi", "Gaegu", "Gafata", "Galada", "Galdeano", "Galindo", "Gamja Flower", "Gautami", "Gentium Basic", "Gentium Book Basic", "Geo", "Georgia", "Geostar", "Geostar Fill", "Germania One", "GFS Didot", "GFS Neohellenic", "Gidugu", "Gilda Display", "Gisha", "Give You Glory", "Glass Antiqua", "Glegoo", "Gloria Hallelujah", "Goblin One", "Gochi Hand", "Gorditas", "Gothic A1", "Graduate", "Grand Hotel", "Gravitas One", "Great Vibes", "Griffy", "Gruppo", "Gudea", "Gugi", "Gulim", "GulimChe", "Gungsuh", "GungsuhChe", "Gurajada", "Habibi", "Halant", "Hammersmith One", "Hanalei", "Hanalei Fill", "Handlee", "Hanuman", "Happy Monkey", "Harmattan", "Headland One", "Heebo", "Henny Penny", "Herr Von Muellerhoff", "Hi Melody", "Hind", "Holtwood One SC", "Homemade Apple", "Homenaje", "IBM Plex Mono", "IBM Plex Sans", "IBM Plex Sans Condensed", "IBM Plex Serif", "Iceberg", "Iceland", "IM Fell Double Pica", "IM Fell Double Pica SC", "IM Fell DW Pica", "IM Fell DW Pica SC", "IM Fell English", "IM Fell English SC", "IM Fell French Canon", "IM Fell French Canon SC", "IM Fell Great Primer", "IM Fell Great Primer SC", "Impact", "Imprima", "Inconsolata", "Inder", "Indie Flower", "Inika", "Irish Grover", "IrisUPC", "Istok Web", "Iskoola Pota", "Italiana", "Italianno", "Itim", "Jacques Francois", "Jacques Francois Shadow", "Jaldi", "JasmineUPC", "Jim Nightshade", "Jockey One", "Jolly Lodger", "Jomhuria", "Josefin Sans", "Josefin Slab", "Joti One", "Jua", "Judson", "Julee", "Julius Sans One", "Junge", "Jura", "Just Another Hand", "Just Me Again Down Here", "Kadwa", "KaiTi", "Kalam", "Kalinga", "Kameron", "Kanit", "Kantumruy", "Karla", "Karma", "Kartika", "Katibeh", "Kaushan Script", "Kavivanar", "Kavoon", "Kdam Thmor", "Keania One", "Kelly Slab", "Kenia", "Khand", "Khmer", "Khmer UI", "Khula", "Kirang Haerang", "Kite One", "Knewave", "KodchiangUPC", "Kokila", "Kotta One", "Koulen", "Kranky", "Kreon", "Kristi", "Krona One", "Kurale", "La Belle Aurore", "Laila", "Lakki Reddy", "Lalezar", "Lancelot", "Lao UI", "Lateef", "Latha", "Lato", "League Script", "Leckerli One", "Ledger", "Leelawadee", "Lekton", "Lemon", "Lemonada", "Levenim MT", "Libre Baskerville", "Libre Franklin", "Life Savers", "Lilita One", "Lily Script One", "LilyUPC", "Limelight", "Linden Hill", "Lobster", "Lobster Two", "Londrina Outline", "Londrina Shadow", "Londrina Sketch", "Londrina Solid", "Lora", "Love Ya Like A Sister", "Loved by the King", "Lovers Quarrel", "Lucida Console", "Lucida Handwriting Italic", "Lucida Sans Unicode", "Luckiest Guy", "Lusitana", "Lustria", "Macondo", "Macondo Swash Caps", "Mada", "Magra", "Maiden Orange", "Maitree", "Mako", "Malgun Gothic", "Mallanna", "Mandali", "Mangal", "Manny ITC", "Manuale", "Marcellus", "Marcellus SC", "Marck Script", "Margarine", "Marko One", "Marlett", "Marmelad", "Martel", "Martel Sans", "Marvel", "Mate", "Mate SC", "Maven Pro", "McLaren", "Meddon", "MedievalSharp", "Medula One", "Meera Inimai", "Megrim", "Meie Script", "Meiryo", "Meiryo UI", "Merienda", "Merienda One", "Merriweather", "Merriweather Sans", "Metal", "Metal Mania", "Metamorphous", "Metrophobic", "Michroma", "Microsoft Himalaya", "Microsoft JhengHei", "Microsoft JhengHei UI", "Microsoft New Tai Lue", "Microsoft PhagsPa", "Microsoft Sans Serif", "Microsoft Tai Le", "Microsoft Uighur", "Microsoft YaHei", "Microsoft YaHei UI", "Microsoft Yi Baiti", "Milonga", "Miltonian", "Miltonian Tattoo", "Mina", "MingLiU_HKSCS", "MingLiU_HKSCS-ExtB", "Miniver", "Miriam", "Miriam Libre", "Mirza", "Miss Fajardose", "Mitr", "Modak", "Modern Antiqua", "Mogra", "Molengo", "Molle", "Monda", "Mongolian Baiti", "Monofett", "Monoton", "Monsieur La Doulaise", "Montaga", "Montez", "Montserrat", "Montserrat Alternates", "Montserrat Subrayada", "MoolBoran", "Moul", "Moulpali", "Mountains of Christmas", "Mouse Memoirs", "Mr Bedfort", "Mr Dafoe", "Mr De Haviland", "Mrs Saint Delafield", "Mrs Sheppards", "MS UI Gothic", "Mukta", "Muli", "MV Boli", "Myanmar Text", "Mystery Quest", "Nanum Brush Script", "Nanum Gothic", "Nanum Gothic Coding", "Nanum Myeongjo", "Nanum Pen Script", "Narkisim", "Neucha", "Neuton", "New Rocker", "News Cycle", "News Gothic MT", "Niconne", "Nirmala UI", "Nixie One", "Nobile", "Nokora", "Norican", "Nosifer", "Nothing You Could Do", "Noticia Text", "Noto Sans", "Noto Serif", "Nova Cut", "Nova Flat", "Nova Mono", "Nova Oval", "Nova Round", "Nova Script", "Nova Slim", "Nova Square", "NSimSun", "NTR", "Numans", "Nunito", "Nunito Sans", "Nyala", "Odor Mean Chey", "Offside", "Old Standard TT", "Oldenburg", "Oleo Script", "Oleo Script Swash Caps", "Open Sans", "Open Sans Condensed", "Oranienbaum", "Orbitron", "Oregano", "Orienta", "Original Surfer", "Oswald", "Over the Rainbow", "Overlock", "Overlock SC", "Overpass", "Overpass Mono", "Ovo", "Oxygen", "Oxygen Mono", "Pacifico", "Padauk", "Palanquin", "Palanquin Dark", "Palatino Linotype", "Pangolin", "Paprika", "Parisienne", "Passero One", "Passion One", "Pathway Gothic One", "Patrick Hand", "Patrick Hand SC", "Pattaya", "Patua One", "Pavanam", "Paytone One", "Peddana", "Peralta", "Permanent Marker", "Petit Formal Script", "Petrona", "Philosopher", "Piedra", "Pinyon Script", "Pirata One", "Plantagenet Cherokee", "Plaster", "Play", "Playball", "Playfair Display", "Playfair Display SC", "Podkova", "Poiret One", "Poller One", "Poly", "Pompiere", "Pontano Sans", "Poor Story", "Poppins", "Port Lligat Sans", "Port Lligat Slab", "Pragati Narrow", "Prata", "Preahvihear", "Pridi", "Princess Sofia", "Prociono", "Prompt", "Prosto One", "Proza Libre", "PT Mono", "PT Sans", "PT Sans Caption", "PT Sans Narrow", "PT Serif", "PT Serif Caption", "Puritan", "Purple Purse", "Quando", "Quantico", "Quattrocento", "Quattrocento Sans", "Questrial", "Quicksand", "Quintessential", "Qwigley", "Raavi", "Racing Sans One", "Radley", "Rajdhani", "Rakkas", "Raleway", "Raleway Dots", "Ramabhadra", "Ramaraja", "Rambla", "Rammetto One", "Ranchers", "Rancho", "Ranga", "Rasa", "Rationale", "Ravi Prakash", "Redressed", "Reem Kufi", "Reenie Beanie", "Revalia", "Rhodium Libre", "Ribeye", "Ribeye Marrow", "Righteous", "Risque", "Roboto", "Roboto Condensed", "Roboto Mono", "Roboto Slab", "Rochester", "Rock Salt", "Rod", "Rokkitt", "Romanesco", "Ropa Sans", "Rosario", "Rosarivo", "Rouge Script", "Rozha One", "Rubik", "Rubik Mono One", "Ruda", "Rufina", "Ruge Boogie", "Ruluko", "Rum Raisin", "Ruslan Display", "Russo One", "Ruthie", "Rye", "Sacramento", "Sahitya", "Sail", "Saira", "Saira Condensed", "Saira Extra Condensed", "Saira Semi Condensed", "Sakkal Majalla", "Salsa", "Sanchez", "Sancreek", "Sansita", "Sarala", "Sarina", "Sarpanch", "Satisfy", "Scada", "Scheherazade", "Schoolbell", "Scope One", "Seaweed Script", "Secular One", "Sedgwick Ave", "Sedgwick Ave Display", "Segoe Print", "Segoe Script", "Segoe UI Symbol", "Sevillana", "Seymour One", "Shadows Into Light", "Shadows Into Light Two", "Shanti", "Share", "Share Tech", "Share Tech Mono", "Shojumaru", "Shonar Bangla", "Short Stack", "Shrikhand", "Shruti", "Siemreap", "Sigmar One", "Signika", "Signika Negative", "SimHei", "SimKai", "Simonetta", "Simplified Arabic", "SimSun", "SimSun-ExtB", "Sintony", "Sirin Stencil", "Six Caps", "Skranji", "Slackey", "Smokum", "Smythe", "Sniglet", "Snippet", "Snowburst One", "Sofadi One", "Sofia", "Song Myung", "Sonsie One", "Sorts Mill Goudy", "Source Code Pro", "Source Sans Pro", "Source Serif Pro", "Space Mono", "Special Elite", "Spectral", "Spectral SC", "Spicy Rice", "Spinnaker", "Spirax", "Squada One", "Sree Krushnadevaraya", "Sriracha", "Stalemate", "Stalinist One", "Stardos Stencil", "Stint Ultra Condensed", "Stint Ultra Expanded", "Stoke", "Strait", "Stylish", "Sue Ellen Francisco", "Suez One", "Sumana", "Sunflower", "Sunshiney", "Supermercado One", "Sura", "Suranna", "Suravaram", "Suwannaphum", "Swanky and Moo Moo", "Sylfaen", "Syncopate", "Tahoma", "Tajawal", "Tangerine", "Taprom", "Tauri", "Taviraj", "Teko", "Telex", "Tenali Ramakrishna", "Tenor Sans", "Text Me One", "The Girl Next Door", "Tienne", "Tillana", "Times New Roman", "Timmana", "Tinos", "Titan One", "Titillium Web", "Trade Winds", "Traditional Arabic", "Trebuchet MS", "Trirong", "Trocchi", "Trochut", "Trykker", "Tulpen One", "Tunga", "Ubuntu", "Ubuntu Condensed", "Ubuntu Mono", "Ultra", "Uncial Antiqua", "Underdog", "Unica One", "UnifrakturCook", "UnifrakturMaguntia", "Unkempt", "Unlock", "Unna", "Utsaah", "Vampiro One", "Vani", "Varela", "Varela Round", "Vast Shadow", "Vesper Libre", "Vibur", "Vidaloka", "Viga", "Vijaya", "Voces", "Volkhov", "Vollkorn", "Vollkorn SC", "Voltaire", "VT323", "Waiting for the Sunrise", "Wallpoet", "Walter Turncoat", "Warnes", "Wellfleet", "Wendy One", "Wire One", "Work Sans", "Yanone Kaffeesatz", "Yantramanav", "Yatra One", "Yellowtail", "Yeon Sung", "Yeseva One", "Yesteryear", "Yrsa", "Zeyada", "Zilla Slab", "Zilla Slab Highlight");
	$TotalSoftFontGCount = array("Abadi MT Condensed Light", "ABeeZee, sans-serif", "Abel, sans-serif", "Abhaya Libre, serif", "Abril Fatface, cursive", "Aclonica, sans-serif", "Acme, sans-serif", "Actor, sans-serif", "Adamina, serif", "Advent Pro, sans-serif", "Aguafina Script, cursive", "Aharoni", "Akronim, cursive", "Aladin, cursive", "Aldhabi", "Aldrich, sans-serif", "Alef, sans-serif", "Alegreya, serif", "Alegreya Sans, sans-serif", "Alegreya Sans SC, sans-serif", "Alegreya SC, serif", "Alex Brush, cursive", "Alfa Slab One, cursive", "Alice, serif", "Alike, serif", "Alike Angular, serif", "Allan, cursive", "Allerta, sans-serif", "Allerta Stencil, sans-serif", "Allura, cursive", "Almendra, serif", "Almendra Display, cursive", "Almendra SC, serif", "Amarante, cursive", "Amaranth, sans-serif", "Amatic SC, cursive", "Amethysta, serif", "Amiko, sans-serif", "Amiri, serif", "Amita, cursive", "Anaheim, sans-serif", "Andada, serif", "Andalus", "Andika, sans-serif", "Angkor, cursive", "Angsana New", "AngsanaUPC", "Annie Use Your Telescope, cursive", "Anonymous Pro, monospace", "Antic, sans-serif", "Antic Didone, serif", "Antic Slab, serif", "Anton, sans-serif", "Aparajita", "Arabic Typesetting", "Arapey, serif", "Arbutus, cursive", "Arbutus Slab, serif", "Architects Daughter, cursive", "Archivo, sans-serif", "Archivo Black, sans-serif", "Archivo Narrow, sans-serif", "Aref Ruqaa, serif", "Arial", "Arial Black", "Arimo, sans-serif", "Arima Madurai, cursive", "Arizonia, cursive", "Armata, sans-serif", "Arsenal, sans-serif", "Artifika, serif", "Arvo, serif", "Arya, sans-serif", "Asap, sans-serif", "Asap Condensed, sans-serif", "Asar, serif", "Asset, cursive", "Assistant, sans-serif", "Astloch, cursive", "Asul, sans-serif", "Athiti, sans-serif", "Atma, cursive", "Atomic Age, cursive", "Aubrey, cursive", "Audiowide, cursive", "Autour One, cursive", "Average, serif", "Average Sans, sans-serif", "Averia Gruesa Libre, cursive", "Averia Libre, cursive", "Averia Sans Libre, cursive", "Averia Serif Libre, cursive", "Bad Script, cursive", "Bahiana, cursive", "Baloo, cursive", "Balthazar, serif", "Bangers, cursive", "Barlow, sans-serif", "Barlow Condensed, sans-serif", "Barlow Semi Condensed, sans-serif", "Barrio, cursive", "Basic, sans-serif", "Batang", "BatangChe", "Battambang, cursive", "Baumans, cursive", "Bayon, cursive", "Belgrano, serif", "Bellefair, serif", "Belleza, sans-serif", "BenchNine, sans-serif", "Bentham, serif", "Berkshire Swash, cursive", "Bevan, cursive", "Bigelow Rules, cursive", "Bigshot One, cursive", "Bilbo, cursive", "Bilbo Swash Caps, cursive", "BioRhyme, serif", "BioRhyme Expanded, serif", "Biryani, sans-serif", "Bitter, serif", "Black And White Picture, sans-serif", "Black Han Sans, sans-serif", "Black Ops One, cursive", "Bokor, cursive", "Bonbon, cursive", "Boogaloo, cursive", "Bowlby One, cursive", "Bowlby One SC, cursive", "Brawler, serif", "Bree Serif, serif", "Browallia New", "BrowalliaUPC", "Bubbler One, sans-serif", "Bubblegum Sans, cursive", "Buda, cursive", "Buenard, serif", "Bungee, cursive", "Bungee Hairline, cursive", "Bungee Inline, cursive", "Bungee Outline, cursive", "Bungee Shade, cursive", "Butcherman, cursive", "Butterfly Kids, cursive", "Cabin, sans-serif", "Cabin Condensed, sans-serif", "Cabin Sketch, cursive", "Caesar Dressing, cursive", "Cagliostro, sans-serif", "Cairo, sans-serif", "Calibri", "Calibri Light", "Calisto MT", "Calligraffitti, cursive", "Cambay, sans-serif", "Cambo, serif", "Cambria", "Candal, sans-serif", "Candara", "Cantarell, sans-serif", "Cantata One, serif", "Cantora One, sans-serif", "Capriola, sans-serif", "Cardo, serif", "Carme, sans-serif", "Carrois Gothic, sans-serif", "Carrois Gothic SC, sans-serif", "Carter One, cursive", "Catamaran, sans-serif", "Caudex, serif", "Caveat, cursive", "Caveat Brush, cursive", "Cedarville Cursive, cursive", "Century Gothic", "Ceviche One, cursive", "Changa, sans-serif", "Changa One, cursive", "Chango, cursive", "Chathura, sans-serif", "Chau Philomene One, sans-serif", "Chela One, cursive", "Chelsea Market, cursive", "Chenla, cursive", "Cherry Cream Soda, cursive", "Cherry Swash, cursive", "Chewy, cursive", "Chicle, cursive", "Chivo, sans-serif", "Chonburi, cursive", "Cinzel, serif", "Cinzel Decorative, cursive", "Clicker Script, cursive", "Coda, cursive", "Coda Caption, sans-serif", "Codystar, cursive", "Coiny, cursive", "Combo, cursive", "Comic Sans MS", "Coming Soon, cursive", "Comfortaa, cursive", "Concert One, cursive", "Condiment, cursive", "Consolas", "Constantia", "Content, cursive", "Contrail One, cursive", "Convergence, sans-serif", "Cookie, cursive", "Copperplate Gothic", "Copperplate Gothic Light", "Copse, serif", "Corbel", "Corben, cursive", "Cordia New", "CordiaUPC", "Cormorant, serif", "Cormorant Garamond, serif", "Cormorant Infant, serif", "Cormorant SC, serif", "Cormorant Unicase, serif", "Cormorant Upright, serif", "Courgette, cursive", "Courier New", "Cousine, monospace", "Coustard, serif", "Covered By Your Grace, cursive", "Crafty Girls, cursive", "Creepster, cursive", "Crete Round, serif", "Crimson Text, serif", "Croissant One, cursive", "Crushed, cursive", "Cuprum, sans-serif", "Cute Font, cursive", "Cutive, serif", "Cutive Mono, monospace", "Damion, cursive", "Dancing Script, cursive", "Dangrek, cursive", "DaunPenh", "David", "David Libre, serif", "Dawning of a New Day, cursive", "Days One, sans-serif", "Delius, cursive", "Delius Swash Caps, cursive", "Delius Unicase, cursive", "Della Respira, serif", "Denk One, sans-serif", "Devonshire, cursive", "DFKai-SB", "Dhurjati, sans-serif", "Didact Gothic, sans-serif", "DilleniaUPC", "Diplomata, cursive", "Diplomata SC, cursive", "Do Hyeon, sans-serif", "DokChampa", "Dokdo, cursive", "Domine, serif", "Donegal One, serif", "Doppio One, sans-serif", "Dorsa, sans-serif", "Dosis, sans-serif", "Dotum", "DotumChe", "Dr Sugiyama, cursive", "Duru Sans, sans-serif", "Dynalight, cursive", "Eagle Lake, cursive", "East Sea Dokdo, cursive", "Eater, cursive", "EB Garamond, serif", "Ebrima", "Economica, sans-serif", "Eczar, serif", "El Messiri, sans-serif", "Electrolize, sans-serif", "Elsie, cursive", "Elsie Swash Caps, cursive", "Emblema One, cursive", "Emilys Candy, cursive", "Encode Sans, sans-serif", "Encode Sans Condensed, sans-serif", "Encode Sans Expanded, sans-serif", "Encode Sans Semi Condensed, sans-serif", "Encode Sans Semi Expanded, sans-serif", "Engagement, cursive", "Englebert, sans-serif", "Enriqueta, serif", "Erica One, cursive", "Esteban, serif", "Estrangelo Edessa", "EucrosiaUPC", "Euphemia", "Euphoria Script, cursive", "Ewert, cursive", "Exo, sans-serif", "Expletus Sans, cursive", "FangSong", "Fanwood Text, serif", "Farsan, cursive", "Fascinate, cursive", "Fascinate Inline, cursive", "Faster One, cursive", "Fasthand, serif", "Fauna One, serif", "Faustina, serif", "Federant, cursive", "Federo, sans-serif", "Felipa, cursive", "Fenix, serif", "Finger Paint, cursive", "Fira Mono, monospace", "Fira Sans, sans-serif", "Fira Sans Condensed, sans-serif", "Fira Sans Extra Condensed, sans-serif", "Fjalla One, sans-serif", "Fjord One, serif", "Flamenco, cursive", "Flavors, cursive", "Fondamento, cursive", "Fontdiner Swanky, cursive", "Forum, cursive", "Francois One, sans-serif", "Frank Ruhl Libre, serif", "Franklin Gothic Medium", "FrankRuehl", "Freckle Face, cursive", "Fredericka the Great, cursive", "Fredoka One, cursive", "Freehand, cursive", "FreesiaUPC", "Fresca, sans-serif", "Frijole, cursive", "Fruktur, cursive", "Fugaz One, cursive", "Gabriela, serif", "Gabriola", "Gadugi", "Gaegu, cursive", "Gafata, sans-serif", "Galada, cursive", "Galdeano, sans-serif", "Galindo, cursive", "Gamja Flower, cursive", "Gautami", "Gentium Basic, serif", "Gentium Book Basic, serif", "Geo, sans-serif", "Georgia", "Geostar, cursive", "Geostar Fill, cursive", "Germania One, cursive", "GFS Didot, serif", "GFS Neohellenic, sans-serif", "Gidugu, sans-serif", "Gilda Display, serif", "Gisha", "Give You Glory, cursive", "Glass Antiqua, cursive", "Glegoo, serif", "Gloria Hallelujah, cursive", "Goblin One, cursive", "Gochi Hand, cursive", "Gorditas, cursive", "Gothic A1, sans-serif", "Graduate, cursive", "Grand Hotel, cursive", "Gravitas One, cursive", "Great Vibes, cursive", "Griffy, cursive", "Gruppo, cursive", "Gudea, sans-serif", "Gugi, cursive", "Gulim", "GulimChe", "Gungsuh", "GungsuhChe", "Gurajada, serif", "Habibi, serif", "Halant, serif", "Hammersmith One, sans-serif", "Hanalei, cursive", "Hanalei Fill, cursive", "Handlee, cursive", "Hanuman, serif", "Happy Monkey, cursive", "Harmattan, sans-serif", "Headland One, serif", "Heebo, sans-serif", "Henny Penny, cursive", "Herr Von Muellerhoff, cursive", "Hi Melody, cursive", "Hind, sans-serif", "Holtwood One SC, serif", "Homemade Apple, cursive", "Homenaje, sans-serif", "IBM Plex Mono, monospace", "IBM Plex Sans, sans-serif", "IBM Plex Sans Condensed, sans-serif", "IBM Plex Serif, serif", "Iceberg, cursive", "Iceland, cursive", "IM Fell Double Pica, serif", "IM Fell Double Pica SC, serif", "IM Fell DW Pica, serif", "IM Fell DW Pica SC, serif", "IM Fell English, serif", "IM Fell English SC, serif", "IM Fell French Canon, serif", "IM Fell French Canon SC, serif", "IM Fell Great Primer, serif", "IM Fell Great Primer SC, serif", "Impact", "Imprima, sans-serif", "Inconsolata, monospace", "Inder, sans-serif", "Indie Flower, cursive", "Inika, serif", "Irish Grover, cursive", "IrisUPC", "Istok Web, sans-serif", "Iskoola Pota", "Italiana, serif", "Italianno, cursive", "Itim, cursive", "Jacques Francois, serif", "Jacques Francois Shadow, cursive", "Jaldi, sans-serif", "JasmineUPC", "Jim Nightshade, cursive", "Jockey One, sans-serif", "Jolly Lodger, cursive", "Jomhuria, cursive", "Josefin Sans, sans-serif", "Josefin Slab, serif", "Joti One, cursive", "Jua, sans-serif", "Judson, serif", "Julee, cursive", "Julius Sans One, sans-serif", "Junge, serif", "Jura, sans-serif", "Just Another Hand, cursive", "Just Me Again Down Here, cursive", "Kadwa, serif", "KaiTi", "Kalam, cursive", "Kalinga", "Kameron, serif", "Kanit, sans-serif", "Kantumruy, sans-serif", "Karla, sans-serif", "Karma, serif", "Kartika", "Katibeh, cursive", "Kaushan Script, cursive", "Kavivanar, cursive", "Kavoon, cursive", "Kdam Thmor, cursive", "Keania One, cursive", "Kelly Slab, cursive", "Kenia, cursive", "Khand, sans-serif", "Khmer, cursive", "Khmer UI", "Khula, sans-serif", "Kirang Haerang, cursive", "Kite One, sans-serif", "Knewave, cursive", "KodchiangUPC", "Kokila", "Kotta One, serif", "Koulen, cursive", "Kranky, cursive", "Kreon, serif", "Kristi, cursive", "Krona One, sans-serif", "Kurale, serif", "La Belle Aurore, cursive", "Laila, serif", "Lakki Reddy, cursive", "Lalezar, cursive", "Lancelot, cursive", "Lao UI", "Lateef, cursive", "Latha", "Lato, sans-serif", "League Script, cursive", "Leckerli One, cursive", "Ledger, serif", "Leelawadee", "Lekton, sans-serif", "Lemon, cursive", "Lemonada, cursive", "Levenim MT", "Libre Baskerville, serif", "Libre Franklin, sans-serif", "Life Savers, cursive", "Lilita One, cursive", "Lily Script One, cursive", "LilyUPC", "Limelight, cursive", "Linden Hill, serif", "Lobster, cursive", "Lobster Two, cursive", "Londrina Outline, cursive", "Londrina Shadow, cursive", "Londrina Sketch, cursive", "Londrina Solid, cursive", "Lora, serif", "Love Ya Like A Sister, cursive", "Loved by the King, cursive", "Lovers Quarrel, cursive", "Lucida Console", "Lucida Handwriting Italic", "Lucida Sans Unicode", "Luckiest Guy, cursive", "Lusitana, serif", "Lustria, serif", "Macondo, cursive", "Macondo Swash Caps, cursive", "Mada, sans-serif", "Magra, sans-serif", "Maiden Orange, cursive", "Maitree, serif", "Mako, sans-serif", "Malgun Gothic", "Mallanna, sans-serif", "Mandali, sans-serif", "Mangal", "Manny ITC", "Manuale, serif", "Marcellus, serif", "Marcellus SC, serif", "Marck Script, cursive", "Margarine, cursive", "Marko One, serif", "Marlett", "Marmelad, sans-serif", "Martel, serif", "Martel Sans, sans-serif", "Marvel, sans-serif", "Mate, serif", "Mate SC, serif", "Maven Pro, sans-serif", "McLaren, cursive", "Meddon, cursive", "MedievalSharp, cursive", "Medula One, cursive", "Meera Inimai, sans-serif", "Megrim, cursive", "Meie Script, cursive", "Meiryo", "Meiryo UI", "Merienda, cursive", "Merienda One, cursive", "Merriweather, serif", "Merriweather Sans, sans-serif", "Metal, cursive", "Metal Mania, cursive", "Metamorphous, cursive", "Metrophobic, sans-serif", "Michroma, sans-serif", "Microsoft Himalaya", "Microsoft JhengHei", "Microsoft JhengHei UI", "Microsoft New Tai Lue", "Microsoft PhagsPa", "Microsoft Sans Serif", "Microsoft Tai Le", "Microsoft Uighur", "Microsoft YaHei", "Microsoft YaHei UI", "Microsoft Yi Baiti", "Milonga, cursive", "Miltonian, cursive", "Miltonian Tattoo, cursive", "Mina, sans-serif", "MingLiU_HKSCS", "MingLiU_HKSCS-ExtB", "Miniver, cursive", "Miriam", "Miriam Libre, sans-serif", "Mirza, cursive", "Miss Fajardose, cursive", "Mitr, sans-serif", "Modak, cursive", "Modern Antiqua, cursive", "Mogra, cursive", "Molengo, sans-serif", "Molle, cursive", "Monda, sans-serif", "Mongolian Baiti", "Monofett, cursive", "Monoton, cursive", "Monsieur La Doulaise, cursive", "Montaga, serif", "Montez, cursive", "Montserrat, sans-serif", "Montserrat Alternates, sans-serif", "Montserrat Subrayada, sans-serif", "MoolBoran", "Moul, cursive", "Moulpali, cursive", "Mountains of Christmas, cursive", "Mouse Memoirs, sans-serif", "Mr Bedfort, cursive", "Mr Dafoe, cursive", "Mr De Haviland, cursive", "Mrs Saint Delafield, cursive", "Mrs Sheppards, cursive", "MS UI Gothic", "Mukta, sans-serif", "Muli, sans-serif", "MV Boli", "Myanmar Text", "Mystery Quest, cursive", "Nanum Brush Script, cursive", "Nanum Gothic, sans-serif", "Nanum Gothic Coding, monospace", "Nanum Myeongjo, serif", "Nanum Pen Script, cursive", "Narkisim", "Neucha, cursive", "Neuton, serif", "New Rocker, cursive", "News Cycle, sans-serif", "News Gothic MT", "Niconne, cursive", "Nirmala UI", "Nixie One, cursive", "Nobile, sans-serif", "Nokora, serif", "Norican, cursive", "Nosifer, cursive", "Nothing You Could Do, cursive", "Noticia Text, serif", "Noto Sans, sans-serif", "Noto Serif, serif", "Nova Cut, cursive", "Nova Flat, cursive", "Nova Mono, monospace", "Nova Oval, cursive", "Nova Round, cursive", "Nova Script, cursive", "Nova Slim, cursive", "Nova Square, cursive", "NSimSun", "NTR, sans-serif", "Numans, sans-serif", "Nunito, sans-serif", "Nunito Sans, sans-serif", "Nyala", "Odor Mean Chey, cursive", "Offside, cursive", "Old Standard TT, serif", "Oldenburg, cursive", "Oleo Script, cursive", "Oleo Script Swash Caps, cursive", "Open Sans, sans-serif", "Open Sans Condensed, sans-serif", "Oranienbaum, serif", "Orbitron, sans-serif", "Oregano, cursive", "Orienta, sans-serif", "Original Surfer, cursive", "Oswald, sans-serif", "Over the Rainbow, cursive", "Overlock, cursive", "Overlock SC, cursive", "Overpass, sans-serif", "Overpass Mono, monospace", "Ovo, serif", "Oxygen, sans-serif", "Oxygen Mono, monospace", "Pacifico, cursive", "Padauk, sans-serif", "Palanquin, sans-serif", "Palanquin Dark, sans-serif", "Palatino Linotype", "Pangolin, cursive", "Paprika, cursive", "Parisienne, cursive", "Passero One, cursive", "Passion One, cursive", "Pathway Gothic One, sans-serif", "Patrick Hand, cursive", "Patrick Hand SC, cursive", "Pattaya, sans-serif", "Patua One, cursive", "Pavanam, sans-serif", "Paytone One, sans-serif", "Peddana, serif", "Peralta, cursive", "Permanent Marker, cursive", "Petit Formal Script, cursive", "Petrona, serif", "Philosopher, sans-serif", "Piedra, cursive", "Pinyon Script, cursive", "Pirata One, cursive", "Plantagenet Cherokee", "Plaster, cursive", "Play, sans-serif", "Playball, cursive", "Playfair Display, serif", "Playfair Display SC, serif", "Podkova, serif", "Poiret One, cursive", "Poller One, cursive", "Poly, serif", "Pompiere, cursive", "Pontano Sans, sans-serif", "Poor Story, cursive", "Poppins, sans-serif", "Port Lligat Sans, sans-serif", "Port Lligat Slab, serif", "Pragati Narrow, sans-serif", "Prata, serif", "Preahvihear, cursive", "Pridi, serif", "Princess Sofia, cursive", "Prociono, serif", "Prompt, sans-serif", "Prosto One, cursive", "Proza Libre, sans-serif", "PT Mono, monospace", "PT Sans, sans-serif", "PT Sans Caption, sans-serif", "PT Sans Narrow, sans-serif", "PT Serif, serif", "PT Serif Caption, serif", "Puritan, sans-serif", "Purple Purse, cursive", "Quando, serif", "Quantico, sans-serif", "Quattrocento, serif", "Quattrocento Sans, sans-serif", "Questrial, sans-serif", "Quicksand, sans-serif", "Quintessential, cursive", "Qwigley, cursive", "Raavi", "Racing Sans One, cursive", "Radley, serif", "Rajdhani, sans-serif", "Rakkas, cursive", "Raleway, sans-serif", "Raleway Dots, cursive", "Ramabhadra, sans-serif", "Ramaraja, serif", "Rambla, sans-serif", "Rammetto One, cursive", "Ranchers, cursive", "Rancho, cursive", "Ranga, cursive", "Rasa, serif", "Rationale, sans-serif", "Ravi Prakash, cursive", "Redressed, cursive", "Reem Kufi, sans-serif", "Reenie Beanie, cursive", "Revalia, cursive", "Rhodium Libre, serif", "Ribeye, cursive", "Ribeye Marrow, cursive", "Righteous, cursive", "Risque, cursive", "Roboto, sans-serif", "Roboto Condensed, sans-serif", "Roboto Mono, monospace", "Roboto Slab, serif", "Rochester, cursive", "Rock Salt, cursive", "Rod", "Rokkitt, serif", "Romanesco, cursive", "Ropa Sans, sans-serif", "Rosario, sans-serif", "Rosarivo, serif", "Rouge Script, cursive", "Rozha One, serif", "Rubik, sans-serif", "Rubik Mono One, sans-serif", "Ruda, sans-serif", "Rufina, serif", "Ruge Boogie, cursive", "Ruluko, sans-serif", "Rum Raisin, sans-serif", "Ruslan Display, cursive", "Russo One, sans-serif", "Ruthie, cursive", "Rye, cursive", "Sacramento, cursive", "Sahitya, serif", "Sail, cursive", "Saira, sans-serif", "Saira Condensed, sans-serif", "Saira Extra Condensed, sans-serif", "Saira Semi Condensed, sans-serif", "Sakkal Majalla", "Salsa, cursive", "Sanchez, serif", "Sancreek, cursive", "Sansita, sans-serif", "Sarala, sans-serif", "Sarina, cursive", "Sarpanch, sans-serif", "Satisfy, cursive", "Scada, sans-serif", "Scheherazade, serif", "Schoolbell, cursive", "Scope One, serif", "Seaweed Script, cursive", "Secular One, sans-serif", "Sedgwick Ave, cursive", "Sedgwick Ave Display, cursive", "Segoe Print", "Segoe Script", "Segoe UI Symbol", "Sevillana, cursive", "Seymour One, sans-serif", "Shadows Into Light, cursive", "Shadows Into Light Two, cursive", "Shanti, sans-serif", "Share, cursive", "Share Tech, sans-serif", "Share Tech Mono, monospace", "Shojumaru, cursive", "Shonar Bangla", "Short Stack, cursive", "Shrikhand, cursive", "Shruti", "Siemreap, cursive", "Sigmar One, cursive", "Signika, sans-serif", "Signika Negative, sans-serif", "SimHei", "SimKai", "Simonetta, cursive", "Simplified Arabic", "SimSun", "SimSun-ExtB", "Sintony, sans-serif", "Sirin Stencil, cursive", "Six Caps, sans-serif", "Skranji, cursive", "Slackey, cursive", "Smokum, cursive", "Smythe, cursive", "Sniglet, cursive", "Snippet, sans-serif", "Snowburst One, cursive", "Sofadi One, cursive", "Sofia, cursive", "Song Myung, serif", "Sonsie One, cursive", "Sorts Mill Goudy, serif", "Source Code Pro, monospace", "Source Sans Pro, sans-serif", "Source Serif Pro, serif", "Space Mono, monospace", "Special Elite, cursive", "Spectral, serif", "Spectral SC, serif", "Spicy Rice, cursive", "Spinnaker, sans-serif", "Spirax, cursive", "Squada One, cursive", "Sree Krushnadevaraya, serif", "Sriracha, cursive", "Stalemate, cursive", "Stalinist One, cursive", "Stardos Stencil, cursive", "Stint Ultra Condensed, cursive", "Stint Ultra Expanded, cursive", "Stoke, serif", "Strait, sans-serif", "Stylish, sans-serif", "Sue Ellen Francisco, cursive", "Suez One, serif", "Sumana, serif", "Sunflower, sans-serif", "Sunshiney, cursive", "Supermercado One, cursive", "Sura, serif", "Suranna, serif", "Suravaram, serif", "Suwannaphum, cursive", "Swanky and Moo Moo, cursive", "Sylfaen", "Syncopate, sans-serif", "Tahoma", "Tajawal, sans-serif", "Tangerine, cursive", "Taprom, cursive", "Tauri, sans-serif", "Taviraj, serif", "Teko, sans-serif", "Telex, sans-serif", "Tenali Ramakrishna, sans-serif", "Tenor Sans, sans-serif", "Text Me One, sans-serif", "The Girl Next Door, cursive", "Tienne, serif", "Tillana, cursive", "Times New Roman", "Timmana, sans-serif", "Tinos, serif", "Titan One, cursive", "Titillium Web, sans-serif", "Trade Winds, cursive", "Traditional Arabic", "Trebuchet MS", "Trirong, serif", "Trocchi, serif", "Trochut, cursive", "Trykker, serif", "Tulpen One, cursive", "Tunga", "Ubuntu, sans-serif", "Ubuntu Condensed, sans-serif", "Ubuntu Mono, monospace", "Ultra, serif", "Uncial Antiqua, cursive", "Underdog, cursive", "Unica One, cursive", "UnifrakturCook, cursive", "UnifrakturMaguntia, cursive", "Unkempt, cursive", "Unlock, cursive", "Unna, serif", "Utsaah", "Vampiro One, cursive", "Vani", "Varela, sans-serif", "Varela Round, sans-serif", "Vast Shadow, cursive", "Vesper Libre, serif", "Vibur, cursive", "Vidaloka, serif", "Viga, sans-serif", "Vijaya", "Voces, cursive", "Volkhov, serif", "Vollkorn, serif", "Vollkorn SC, serif", "Voltaire, sans-serif", "VT323, monospace", "Waiting for the Sunrise, cursive", "Wallpoet, cursive", "Walter Turncoat, cursive", "Warnes, cursive", "Wellfleet, cursive", "Wendy One, sans-serif", "Wire One, sans-serif", "Work Sans, sans-serif", "Yanone Kaffeesatz, sans-serif", "Yantramanav, sans-serif", "Yatra One, cursive", "Yellowtail, cursive", "Yeon Sung, cursive", "Yeseva One, cursive", "Yesteryear, cursive", "Yrsa, serif", "Zeyada, cursive", "Zilla Slab, serif", "Zilla Slab Highlight, cursive");

	$TotalSoftGalleryVOptions = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id > %d", 0));
?>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/totalsoft.css',__FILE__);?>">
<link href="https://fonts.googleapis.com/css?family=ABeeZee|Abel|Abhaya+Libre|Abril+Fatface|Aclonica|Acme|Actor|Adamina|Advent+Pro|Aguafina+Script|Akronim|Aladin|Aldrich|Alef|Alegreya|Alegreya+SC|Alegreya+Sans|Alegreya+Sans+SC|Alex+Brush|Alfa+Slab+One|Alice|Alike|Alike+Angular|Allan|Allerta|Allerta+Stencil|Allura|Almendra|Almendra+Display|Almendra+SC|Amarante|Amaranth|Amatic+SC|Amethysta|Amiko|Amiri|Amita|Anaheim|Andada|Andika|Angkor|Annie+Use+Your+Telescope|Anonymous+Pro|Antic|Antic+Didone|Antic+Slab|Anton|Arapey|Arbutus|Arbutus+Slab|Architects+Daughter|Archivo|Archivo+Black|Archivo+Narrow|Aref+Ruqaa|Arima+Madurai|Arimo|Arizonia|Armata|Arsenal|Artifika|Arvo|Arya|Asap|Asap+Condensed|Asar|Asset|Assistant|Astloch|Asul|Athiti|Atma|Atomic+Age|Aubrey|Audiowide|Autour+One|Average|Average+Sans|Averia+Gruesa+Libre|Averia+Libre|Averia+Sans+Libre|Averia+Serif+Libre|Bad+Script|Bahiana|Baloo|Baloo+Bhai|Baloo+Bhaijaan|Baloo+Bhaina|Baloo+Chettan|Baloo+Da|Baloo+Paaji|Baloo+Tamma|Baloo+Tammudu|Baloo+Thambi|Balthazar|Bangers|Barlow|Barlow+Condensed|Barlow+Semi+Condensed|Barrio|Basic|Battambang|Baumans|Bayon|Belgrano|Bellefair|Belleza|BenchNine|Bentham|Berkshire+Swash|Bevan|Bigelow+Rules|Bigshot+One|Bilbo|Bilbo+Swash+Caps|BioRhyme|BioRhyme+Expanded|Biryani|Bitter|Black+And+White+Picture|Black+Han+Sans|Black+Ops+One|Bokor|Bonbon|Boogaloo|Bowlby+One|Bowlby+One+SC|Brawler|Bree+Serif|Bubblegum+Sans|Bubbler+One|Buda:300|Buenard|Bungee|Bungee+Hairline|Bungee+Inline|Bungee+Outline|Bungee+Shade|Butcherman|Butterfly+Kids|Cabin|Cabin+Condensed|Cabin+Sketch|Caesar+Dressing|Cagliostro|Cairo|Calligraffitti|Cambay|Cambo|Candal|Cantarell|Cantata+One|Cantora+One|Capriola|Cardo|Carme|Carrois+Gothic|Carrois+Gothic+SC|Carter+One|Catamaran|Caudex|Caveat|Caveat+Brush|Cedarville+Cursive|Ceviche+One|Changa|Changa+One|Chango|Chathura|Chau+Philomene+One|Chela+One|Chelsea+Market|Chenla|Cherry+Cream+Soda|Cherry+Swash|Chewy|Chicle|Chivo|Chonburi|Cinzel|Cinzel+Decorative|Clicker+Script|Coda|Coda+Caption:800|Codystar|Coiny|Combo|Comfortaa|Coming+Soon|Concert+One|Condiment|Content|Contrail+One|Convergence|Cookie|Copse|Corben|Cormorant|Cormorant+Garamond|Cormorant+Infant|Cormorant+SC|Cormorant+Unicase|Cormorant+Upright|Courgette|Cousine|Coustard|Covered+By+Your+Grace|Crafty+Girls|Creepster|Crete+Round|Crimson+Text|Croissant+One|Crushed|Cuprum|Cute+Font|Cutive|Cutive+Mono|Damion|Dancing+Script|Dangrek|David+Libre|Dawning+of+a+New+Day|Days+One|Dekko|Delius|Delius+Swash+Caps|Delius+Unicase|Della+Respira|Denk+One|Devonshire|Dhurjati|Didact+Gothic|Diplomata|Diplomata+SC|Do+Hyeon|Dokdo|Domine|Donegal+One|Doppio+One|Dorsa|Dosis|Dr+Sugiyama|Duru+Sans|Dynalight|EB+Garamond|Eagle+Lake|East+Sea+Dokdo|Eater|Economica|Eczar|El+Messiri|Electrolize|Elsie|Elsie+Swash+Caps|Emblema+One|Emilys+Candy|Encode+Sans|Encode+Sans+Condensed|Encode+Sans+Expanded|Encode+Sans+Semi+Condensed|Encode+Sans+Semi+Expanded|Engagement|Englebert|Enriqueta|Erica+One|Esteban|Euphoria+Script|Ewert|Exo|Exo+2|Expletus+Sans|Fanwood+Text|Farsan|Fascinate|Fascinate+Inline|Faster+One|Fasthand|Fauna+One|Faustina|Federant|Federo|Felipa|Fenix|Finger+Paint|Fira+Mono|Fira+Sans|Fira+Sans+Condensed|Fira+Sans+Extra+Condensed|Fjalla+One|Fjord+One|Flamenco|Flavors|Fondamento|Fontdiner+Swanky|Forum|Francois+One|Frank+Ruhl+Libre|Freckle+Face|Fredericka+the+Great|Fredoka+One|Freehand|Fresca|Frijole|Fruktur|Fugaz+One|GFS+Didot|GFS+Neohellenic|Gabriela|Gaegu|Gafata|Galada|Galdeano|Galindo|Gamja+Flower|Gentium+Basic|Gentium+Book+Basic|Geo|Geostar|Geostar+Fill|Germania+One|Gidugu|Gilda+Display|Give+You+Glory|Glass+Antiqua|Glegoo|Gloria+Hallelujah|Goblin+One|Gochi+Hand|Gorditas|Gothic+A1|Goudy+Bookletter+1911|Graduate|Grand+Hotel|Gravitas+One|Great+Vibes|Griffy|Gruppo|Gudea|Gugi|Gurajada|Habibi|Halant|Hammersmith+One|Hanalei|Hanalei+Fill|Handlee|Hanuman|Happy+Monkey|Harmattan|Headland+One|Heebo|Henny+Penny|Herr+Von+Muellerhoff|Hi+Melody|Hind|Hind+Guntur|Hind+Madurai|Hind+Siliguri|Hind+Vadodara|Holtwood+One+SC|Homemade+Apple|Homenaje|IBM+Plex+Mono|IBM+Plex+Sans|IBM+Plex+Sans+Condensed|IBM+Plex+Serif|IM+Fell+DW+Pica|IM+Fell+DW+Pica+SC|IM+Fell+Double+Pica|IM+Fell+Double+Pica+SC|IM+Fell+English|IM+Fell+English+SC|IM+Fell+French+Canon|IM+Fell+French+Canon+SC|IM+Fell+Great+Primer|IM+Fell+Great+Primer+SC|Iceberg|Iceland|Imprima|Inconsolata|Inder|Indie+Flower|Inika|Inknut+Antiqua|Irish+Grover|Istok+Web|Italiana|Italianno|Itim|Jacques+Francois|Jacques+Francois+Shadow|Jaldi|Jim+Nightshade|Jockey+One|Jolly+Lodger|Jomhuria|Josefin+Sans|Josefin+Slab|Joti+One|Jua|Judson|Julee|Julius+Sans+One|Junge|Jura|Just+Another+Hand|Just+Me+Again+Down+Here|Kadwa|Kalam|Kameron|Kanit|Kantumruy|Karla|Karma|Katibeh|Kaushan+Script|Kavivanar|Kavoon|Kdam+Thmor|Keania+One|Kelly+Slab|Kenia|Khand|Khmer|Khula|Kirang+Haerang|Kite+One|Knewave|Kotta+One|Koulen|Kranky|Kreon|Kristi|Krona+One|Kurale|La+Belle+Aurore|Laila|Lakki+Reddy|Lalezar|Lancelot|Lateef|Lato|League+Script|Leckerli+One|Ledger|Lekton|Lemon|Lemonada|Libre+Barcode+128|Libre+Barcode+128+Text|Libre+Barcode+39|Libre+Barcode+39+Extended|Libre+Barcode+39+Extended+Text|Libre+Barcode+39+Text|Libre+Baskerville|Libre+Franklin|Life+Savers|Lilita+One|Lily+Script+One|Limelight|Linden+Hill|Lobster|Lobster+Two|Londrina+Outline|Londrina+Shadow|Londrina+Sketch|Londrina+Solid|Lora|Love+Ya+Like+A+Sister|Loved+by+the+King|Lovers+Quarrel|Luckiest+Guy|Lusitana|Lustria|Macondo|Macondo+Swash+Caps|Mada|Magra|Maiden+Orange|Maitree|Mako|Mallanna|Mandali|Manuale|Marcellus|Marcellus+SC|Marck+Script|Margarine|Marko+One|Marmelad|Martel|Martel+Sans|Marvel|Mate|Mate+SC|Maven+Pro|McLaren|Meddon|MedievalSharp|Medula+One|Meera+Inimai|Megrim|Meie+Script|Merienda|Merienda+One|Merriweather|Merriweather+Sans|Metal|Metal+Mania|Metamorphous|Metrophobic|Michroma|Milonga|Miltonian|Miltonian+Tattoo|Mina|Miniver|Miriam+Libre|Mirza|Miss+Fajardose|Mitr|Modak|Modern+Antiqua|Mogra|Molengo|Molle:400i|Monda|Monofett|Monoton|Monsieur+La+Doulaise|Montaga|Montez|Montserrat|Montserrat+Alternates|Montserrat+Subrayada|Moul|Moulpali|Mountains+of+Christmas|Mouse+Memoirs|Mr+Bedfort|Mr+Dafoe|Mr+De+Haviland|Mrs+Saint+Delafield|Mrs+Sheppards|Mukta|Mukta+Mahee|Mukta+Malar|Mukta+Vaani|Muli|Mystery+Quest|NTR|Nanum+Brush+Script|Nanum+Gothic|Nanum+Gothic+Coding|Nanum+Myeongjo|Nanum+Pen+Script|Neucha|Neuton|New+Rocker|News+Cycle|Niconne|Nixie+One|Nobile|Nokora|Norican|Nosifer|Nothing+You+Could+Do|Noticia+Text|Noto+Sans|Noto+Serif|Nova+Cut|Nova+Flat|Nova+Mono|Nova+Oval|Nova+Round|Nova+Script|Nova+Slim|Nova+Square|Numans|Nunito|Nunito+Sans|Odor+Mean+Chey|Offside|Old+Standard+TT|Oldenburg|Oleo+Script|Oleo+Script+Swash+Caps|Open+Sans|Open+Sans+Condensed:300|Oranienbaum|Orbitron|Oregano|Orienta|Original+Surfer|Oswald|Over+the+Rainbow|Overlock|Overlock+SC|Overpass|Overpass+Mono|Ovo|Oxygen|Oxygen+Mono|PT+Mono|PT+Sans|PT+Sans+Caption|PT+Sans+Narrow|PT+Serif|PT+Serif+Caption|Pacifico|Padauk|Palanquin|Palanquin+Dark|Pangolin|Paprika|Parisienne|Passero+One|Passion+One|Pathway+Gothic+One|Patrick+Hand|Patrick+Hand+SC|Pattaya|Patua+One|Pavanam|Paytone+One|Peddana|Peralta|Permanent+Marker|Petit+Formal+Script|Petrona|Philosopher|Piedra|Pinyon+Script|Pirata+One|Plaster|Play|Playball|Playfair+Display|Playfair+Display+SC|Podkova|Poiret+One|Poller+One|Poly|Pompiere|Pontano+Sans|Poor+Story|Poppins|Port+Lligat+Sans|Port+Lligat+Slab|Pragati+Narrow|Prata|Preahvihear|Press+Start+2P|Pridi|Princess+Sofia|Prociono|Prompt|Prosto+One|Proza+Libre|Puritan|Purple+Purse|Quando|Quantico|Quattrocento|Quattrocento+Sans|Questrial|Quicksand|Quintessential|Qwigley|Racing+Sans+One|Radley|Rajdhani|Rakkas|Raleway|Raleway+Dots|Ramabhadra|Ramaraja|Rambla|Rammetto+One|Ranchers|Rancho|Ranga|Rasa|Rationale|Ravi+Prakash|Redressed|Reem+Kufi|Reenie+Beanie|Revalia|Rhodium+Libre|Ribeye|Ribeye+Marrow|Righteous|Risque|Roboto|Roboto+Condensed|Roboto+Mono|Roboto+Slab|Rochester|Rock+Salt|Rokkitt|Romanesco|Ropa+Sans|Rosario|Rosarivo|Rouge+Script|Rozha+One|Rubik|Rubik+Mono+One|Ruda|Rufina|Ruge+Boogie|Ruluko|Rum+Raisin|Ruslan+Display|Russo+One|Ruthie|Rye|Sacramento|Sahitya|Sail|Saira|Saira+Condensed|Saira+Extra+Condensed|Saira+Semi+Condensed|Salsa|Sanchez|Sancreek|Sansita|Sarala|Sarina|Sarpanch|Satisfy|Scada|Scheherazade|Schoolbell|Scope+One|Seaweed+Script|Secular+One|Sedgwick+Ave|Sedgwick+Ave+Display|Sevillana|Seymour+One|Shadows+Into+Light|Shadows+Into+Light+Two|Shanti|Share|Share+Tech|Share+Tech+Mono|Shojumaru|Short+Stack|Shrikhand|Siemreap|Sigmar+One|Signika|Signika+Negative|Simonetta|Sintony|Sirin+Stencil|Six+Caps|Skranji|Slabo+13px|Slabo+27px|Slackey|Smokum|Smythe|Sniglet|Snippet|Snowburst+One|Sofadi+One|Sofia|Song+Myung|Sonsie+One|Sorts+Mill+Goudy|Source+Code+Pro|Source+Sans+Pro|Source+Serif+Pro|Space+Mono|Special+Elite|Spectral|Spectral+SC|Spicy+Rice|Spinnaker|Spirax|Squada+One|Sree+Krushnadevaraya|Sriracha|Stalemate|Stalinist+One|Stardos+Stencil|Stint+Ultra+Condensed|Stint+Ultra+Expanded|Stoke|Strait|Stylish|Sue+Ellen+Francisco|Suez+One|Sumana|Sunflower:300|Sunshiney|Supermercado+One|Sura|Suranna|Suravaram|Suwannaphum|Swanky+and+Moo+Moo|Syncopate|Tajawal|Tangerine|Taprom|Tauri|Taviraj|Teko|Telex|Tenali+Ramakrishna|Tenor+Sans|Text+Me+One|The+Girl+Next+Door|Tienne|Tillana|Timmana|Tinos|Titan+One|Titillium+Web|Trade+Winds|Trirong|Trocchi|Trochut|Trykker|Tulpen+One|Ubuntu|Ubuntu+Condensed|Ubuntu+Mono|Ultra|Uncial+Antiqua|Underdog|Unica+One|UnifrakturCook:700|UnifrakturMaguntia|Unkempt|Unlock|Unna|VT323|Vampiro+One|Varela|Varela+Round|Vast+Shadow|Vesper+Libre|Vibur|Vidaloka|Viga|Voces|Volkhov|Vollkorn|Vollkorn+SC|Voltaire|Waiting+for+the+Sunrise|Wallpoet|Walter+Turncoat|Warnes|Wellfleet|Wendy+One|Wire+One|Work+Sans|Yanone+Kaffeesatz|Yantramanav|Yatra+One|Yellowtail|Yeon+Sung|Yeseva+One|Yesteryear|Yrsa|Zeyada|Zilla+Slab|Zilla+Slab+Highlight" rel="stylesheet">
<form method="POST" oninput="TotalSoft_VGallery_Out()">
	<?php wp_nonce_field( 'edit-menu_', 'TS_VGallery_Nonce' );?>
	<div class="Total_Soft_Gallery_Video_AMD">
		<a href="http://total-soft.pe.hu/gallery-video/" target="_blank" title="Click to Buy">
			<div class="Full_Version"><i class="totalsoft totalsoft-cart-arrow-down"></i> Get The Full Version</div>
		</a>
		<div class="Full_Version_Span">
			This is the free version of the plugin.
		</div>
		<div class="Support_Span">
			<a href="https://wordpress.org/support/plugin/gallery-videos/" target="_blank" title="Click Here to Ask">
				<i class="totalsoft totalsoft-comments-o"></i><span style="margin-left:5px;">If you have any questions click here to ask it to our support.</span>
			</a>
		</div>
		<div class="Total_Soft_Gallery_Video_AMD1"></div>
		<div class="Total_Soft_Gallery_Video_AMD2">
			<i class="Total_Soft_Help totalsoft totalsoft-question-circle-o" title="Click for Creating New Gallery Video Setting"></i>
			<input type="button" name="" value="New Option (Pro)" class="Total_Soft_Gallery_Video_AMD2_But" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
		</div>
		<div class="Total_Soft_Gallery_Video_AMD3">
			<i class="Total_Soft_Help totalsoft totalsoft-question-circle-o" title="Click for Canceling"></i>
			<input type="button" value="Cancel" class="Total_Soft_Gallery_Video_AMD2_But" onclick='TotalSoft_Reload()'>
			<i class="Total_Soft_Gallery_Video_Update_Option Total_Soft_Help totalsoft totalsoft-question-circle-o" title="Click for Updating Settings"></i>
			<input type="submit" name="Total_Soft_Gallery_Video_Update_Option" value="Update" class="Total_Soft_Gallery_Video_Update_Option Total_Soft_Gallery_Video_AMD2_But">
			<input type="text" style="display:none" name="Total_SoftGallery_Video_Update" id="Total_SoftGallery_Video_Update">
		</div>
	</div>

	<table class="Total_Soft_AMMTable">
		<tr class="Total_Soft_AMMTableFR">
			<td>No</td>
			<td>Setting Title</td>
			<td>Gallery Type</td>
			<td>Copy</td>
			<td>Edit</td>
			<td>Delete</td>
		</tr>
	</table>

	<table class="Total_Soft_AMOTable">
		<?php for($i=0; $i<count($TotalSoftGalleryVOptions); $i++){ ?> 
			<tr id="Total_Soft_AMOTable_tr_<?php echo $TotalSoftGalleryVOptions[$i]->id;?>">
				<td><?php echo $i+1;?></td>
				<td><?php echo $TotalSoftGalleryVOptions[$i]->TotalSoftGalleryV_SetName;?></td>
				<td><?php echo $TotalSoftGalleryVOptions[$i]->TotalSoftGalleryV_SetType;?></td>
				<td><i class="Total_Soft_icon totalsoft totalsoft-file-text" onclick="TotalSoftGalleryV_Clone_Option(<?php echo $TotalSoftGalleryVOptions[$i]->id;?>)"></i></td>
				<td><i class="Total_Soft_icon totalsoft totalsoft-pencil" onclick="TotalSoftGalleryV_Edit_Option(<?php echo $TotalSoftGalleryVOptions[$i]->id;?>)"></i></td>
				<td>
					<i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftGalleryV_Del_Option(<?php echo $TotalSoftGalleryVOptions[$i]->id;?>)"></i>
					<span class="Total_Soft_GVideo_Del_Span">
						<i class="Total_Soft_GVideo_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></i>
						<i class="Total_Soft_GVideo_Del_Span_No totalsoft totalsoft-times" onclick="TotalSoftGalleryV_Del_Option_No(<?php echo $TotalSoftGalleryVOptions[$i]->id;?>)"></i>
					</span>
				</td>
			</tr>
		<?php }?>
		<tr>
			<td><?php echo $i+1;?></td>
			<td>Effective Gallery 1</td>
			<td>Effective Gallery</td>
			<td></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">Premium</td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">Version</td>
		</tr>
		<tr>
			<td><?php echo $i+2;?></td>
			<td>Effective Gallery 2</td>
			<td>Effective Gallery</td>
			<td></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">Premium</td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">Version</td>
		</tr>
		<tr>
			<td><?php echo $i+3;?></td>
			<td>Gallery Album 1</td>
			<td>Gallery Album</td>
			<td></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">Premium</td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">Version</td>
		</tr>
		<tr>
			<td><?php echo $i+4;?></td>
			<td>Gallery Album 2</td>
			<td>Gallery Album</td>
			<td></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">Premium</td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">Version</td>
		</tr>
	</table>
	<table class="Total_Soft_AMSet_Table">
		<tr>
			<td>Setting Title <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can give name to gallery which will be saved with effects created by yourself."></i></td>
			<td><input type="text" name="TotalSoftGalleryV_SetName" id="TotalSoftGalleryV_SetName" class="Total_Soft_Select" required placeholder=" * Required"></td>
			<td>Gallery Type <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose that version which you want to see."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftGalleryV_SetType" id="TotalSoftGalleryV_SetType">
					<option value="Grid Video Gallery">     Grid Video Gallery     </option>
					<option value="LightBox Video Gallery"> LightBox Video Gallery </option>
					<option value="Thumbnails Video">       Thumbnails Video       </option>
					<option value="Content Popup">          Content Popup          </option>
					<option value="Elastic Gallery">        Elastic Gallery        </option>
					<option value="Fancy Gallery">          Fancy Gallery          </option>
					<option value="Parallax Engine">        Parallax Engine        </option>
					<option value="Classic Gallery">        Classic Gallery        </option>
					<option value="Space Gallery">          Space Gallery          </option>
					<option value="Effective Gallery">      Effective Gallery      </option>
					<option value="Gallery Album">          Gallery Album          </option>
				</select>
			</td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_1">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>
		</tr>
		<tr>
			<td>Show Title <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select show the name or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_GG_01" name="TotalSoft_GV_GG_01">
					<label for="TotalSoft_GV_GG_01" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Show Description <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select show the description or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_GG_02" name="TotalSoft_GV_GG_02">
					<label for="TotalSoft_GV_GG_02" data-on="Yes" data-off="No"></label>
				</div>
			</td>
		</tr>
		<tr>
			<td>Image Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the video and it is all responsive in gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_GG_03" id="TotalSoft_GV_GG_03" min="100" max="500" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_03_Output" for="TotalSoft_GV_GG_03"></output>
			</td>
			<td>Place Between <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the distance between the videos."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_GG_04" id="TotalSoft_GV_GG_04" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_04_Output" for="TotalSoft_GV_GG_04"></output>
			</td>
		</tr>
		<tr>
			<td>Video Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the radius of video in general Gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_GG_05" id="TotalSoft_GV_GG_05" min="0" max="150" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_05_Output" for="TotalSoft_GV_GG_05"></output>
			</td>
			<td>Hover Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Keeping the mouse on the image select the Hover Effects which you will see."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_GG_06" id="TotalSoft_GV_GG_06" onchange="TotalSoft_VG_GVG_HEffect()">
					<option value="none">                None                </option>
					<option value="blur">                Blur                </option>
					<option value="brightness">          Brightness          </option>
					<option value="contrast">            Contrast            </option>
					<option value="grayscale">           Grayscale           </option>
					<option value="hue-rotate">          Hue-rotate          </option>
					<option value="invert">              Invert              </option>
					<option value="drop-shadow">         Drop-shadow         </option>
					<option value="opacity">             Opacity             </option>
					<option value="saturate">            Saturate            </option>
					<option value="sepia">               Sepia               </option>
					<option value="contrast-brightness"> Contrast-Brightness </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Opacity <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the opacity of hover effect."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangeper" name="TotalSoft_GV_GG_07" id="TotalSoft_GV_GG_07" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_07_Output" for="TotalSoft_GV_GG_07"></output>
			</td>
			<td>Drop Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow color."></i></td>
			<td class="DropShadow">
				<input type="text" name="TotalSoft_GV_GG_08" id="TotalSoft_GV_GG_08" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td class="DropShadow1"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title & Description Area</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a background color for the title and description. They are on the same area."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_09" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Margin Top <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the distance between the video and the title. For galleries you can choose according to your taste."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_GG_10" min="0" max="25" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_10_Output" for="TotalSoft_GV_GG_10"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title Options</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="This function is for the main title. You can select font size. The size of the title in responsive gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_GG_11" id="TotalSoft_GV_GG_11" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_11_Output" for="TotalSoft_GV_GG_11"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the font family that you want to show."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_GG_12">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the main title."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_13" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Text Align <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the position where you want to put the headline. The gallery will be show all what you have chosen."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_GG_14">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Line After Title</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the line width. Line is located between title and description."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_GG_15" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_15_Output" for="TotalSoft_GV_GG_15"></output>
			</td>
			<td>Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the style of the dividing line: None, Solid, Dashed or Dotted."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_GG_16">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation between the title and description."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_17" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Options</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose background color for the description, title and video in a popup window."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_18" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the popup container."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_GG_19" id="TotalSoft_GV_GG_19" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_19_Output" for="TotalSoft_GV_GG_19"></output>
			</td>
		</tr>
		<tr>
			<td>Border Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the style for the border of the popup."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_GG_20">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color which is in the lightbox gallery."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_21" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It is possible to give a border radius in the popup window. You can specify the radius by the pixels. In gallery it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_GG_22" id="TotalSoft_GV_GG_22" min="0" max="150" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_22_Output" for="TotalSoft_GV_GG_22"></output>
			</td>
			<td>Padding <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose border width for popup."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_GG_23" min="0" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_23_Output" for="TotalSoft_GV_GG_23"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Title Options</td>
		</tr>
		<tr>
			<td>Show Title <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In gallery you have opportunity to choose in the popup show the title or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_GG_61">
					<label for="TotalSoft_GV_GG_61" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="This function is for the popup window. You can select font size for headers. For each screen or mobile version will be its own size for responsiveness."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_GG_24" id="TotalSoft_GV_GG_24" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_24_Output" for="TotalSoft_GV_GG_24"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the title in popup."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_GG_25">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In gallery it is necessary to choose the color for video titles which is in the popup window."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_26" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Text Align <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine alignment for the title which is in the popup window and provides information about your video."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_GG_27">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Description Options</td>
		</tr>
		<tr>
			<td>Show Description <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the description should appear or no in popup gallery."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_GG_62">
					<label for="TotalSoft_GV_GG_62" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Line After Title in Popup</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the width for the line in a popup. The line is between the title and description."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_GG_28" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_28_Output" for="TotalSoft_GV_GG_28"></output>
			</td>
			<td>Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the style of the dividing line: None , Solid , Dashed or Dotted."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_GG_29">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation between the title and description in a popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_30" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Arrows Option</td>
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the left and right icons for the gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_GG_31">
					<option value="1">  Type 1  </option>
					<option value="2">  Type 2  </option>
					<option value="3">  Type 3  </option>
					<option value="4">  Type 4  </option>
					<option value="5">  Type 5  </option>
					<option value="6">  Type 6  </option>
					<option value="7">  Type 7  </option>
					<option value="8">  Type 8  </option>
					<option value="9">  Type 9  </option>
					<option value="10"> Type 10 </option>
					<option value="11"> Type 11 </option>
				</select>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change the video."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_34" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container. The Gallery Video plugin allows to get most suitable navigation arrows that are most appropriate for your site."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_GG_35" id="TotalSoft_GV_GG_35" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_35_Output" for="TotalSoft_GV_GG_35"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Close Icon Option</td>
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety beautifully designed sets in the gallery to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_GG_36">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
					<option value="3"> Type 3 </option>
				</select>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the icon to close the window. When you close the window with it closes and the video."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_38" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the size of the icon that is to close the popup window. The icon is in the right corner."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_GG_39" id="TotalSoft_GV_GG_39" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_39_Output" for="TotalSoft_GV_GG_39"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link Option</td>
		</tr>
		<tr>
			<td>Border Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border width for link."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_GG_40" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_40_Output" for="TotalSoft_GV_GG_40"></output>
			</td>
			<td>Border Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border style for link."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_GG_41">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color which is in the lightbox gallery."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_42" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Border Radius <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Install the border radius for Gallery link."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_GG_43" min="0" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_43_Output" for="TotalSoft_GV_GG_43"></output>
			</td>
		</tr>
		<tr>
			<td>Link Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in link button. When you have created a gallery in each box has URL. If you wrote something in your popup window, now you can see it."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_GG_44" id="TotalSoft_GV_GG_44" class="Total_Soft_Select" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define a background color which is intended for the link button."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_45" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the text for the button which you will see in a popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_46" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for gallery popup."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_GG_47" id="TotalSoft_GV_GG_47" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_47_Output" for="TotalSoft_GV_GG_47"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select that font family that will make your gallery more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_GG_48">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover background color for link in the gallery."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_49" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover color for link in the gallery."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_50" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Pagination & Load More</td>
		</tr>
		<tr>
			<td>Next Button Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can write the text that you want to see on this button. This NEXT button to change the page. But it all in the gallery. You choose how many videos to show in a page."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_GG_51" id="TotalSoft_GV_GG_51" maxlength="10" class="Total_Soft_Select" value="">
			</td>
			<td>Prev Button Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for the button that changes the page backward. But in one picture. You choose how many videos to show."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_GG_52" id="TotalSoft_GV_GG_52" maxlength="10" class="Total_Soft_Select" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select your preferred color for pagination. The text and font will be on a same color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_53" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the text and number buttons."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_54" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the number of paging ' pagination '. The same color for the text and number."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_GG_55" id="TotalSoft_GV_GG_55" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_GG_55_Output" for="TotalSoft_GV_GG_55"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the pagination used from the video in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_GG_56">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Current Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current background color of the gallery pagination that all the pages are displayed in the main pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_57" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Current Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current color of the pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_58" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_59" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the text color for hover."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_60" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_GG_63">
					<option value="none">  None  </option>
					<option value="solid"> Solid </option>
				</select>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_GG_64" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Animation Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select effect for showing content."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_GG_65" id="TotalSoft_GV_GG_65">
					<option value="">                None             </option>
					<option value="fadeIn">          Fade In          </option>
					<option value="moveUp">          Move Up          </option>
					<option value="scaleUp">         Scale Up         </option>
					<option value="fallPerspective"> Fall Perspective </option>
					<option value="fly">             Fly              </option>
					<option value="flip">            Flip             </option>
					<option value="helix">           Helix            </option>
					<option value="popUp">           Pop Up           </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_2">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Option</td>
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the video and it is all responsive in gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_LG_01" id="TotalSoft_GV_LG_01" min="100" max="500" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_01_Output" for="TotalSoft_GV_LG_01"></output>
			</td>
			<td>Place Between <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the distance between each image. Here the image from your Youtube and Vimeo videos."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_LG_02" id="TotalSoft_GV_LG_02" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_02_Output" for="TotalSoft_GV_LG_02"></output>
			</td>
		</tr>
		<tr>
			<td>Box Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value for the image window."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_LG_03" id="TotalSoft_GV_LG_03" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_03_Output" for="TotalSoft_GV_LG_03"></output>
			</td>
			<td>Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow of the image."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_LG_04" id="TotalSoft_GV_LG_04" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the preferred width of the border for video."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_LG_05" id="TotalSoft_GV_LG_05" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_05_Output" for="TotalSoft_GV_LG_05"></output>
			</td>
			<td>Border Style <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Identify the basic style of the image border and you can change it at any time."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_LG_06" id="TotalSoft_GV_LG_06">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the image border color which is in the gallery."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_LG_07" id="TotalSoft_GV_LG_07" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the border radius in your lightbox gallery video."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_LG_08" id="TotalSoft_GV_LG_08" min="0" max="200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_08_Output" for="TotalSoft_GV_LG_08"></output>
			</td>
		</tr>
		<tr>
			<td>Zoom Type <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the type of scaling of different and beautifully designed sets from the image."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_LG_49" id="TotalSoft_GV_LG_49">
					<option value="lImgZoom1"> Effect 1 </option>
					<option value="lImgZoom2"> Effect 2 </option>
					<option value="lImgZoom3"> Effect 3 </option>
					<option value="lImgZoom4"> Effect 4 </option>
					<option value="lImgZoom5"> Effect 5 </option>
					<option value="lImgZoom6"> Effect 6 </option>
					<option value="lImgZoom7"> Effect 7 </option>
				</select>
			</td>
			<td>Zoom Time <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the time to increase the effect on the gallery. When you hover the mouse over the video you can see the zoom effect."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangesec" name="TotalSoft_GV_LG_50" id="TotalSoft_GV_LG_50" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_50_Output" for="TotalSoft_GV_LG_50"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Overlay Option</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the overlay on the video as you keep the mouse arrow on it. The effects are very beautiful and they are very suitable in the gallery."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_51" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Effect Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the hover effect type. There are 13 effects type in lightbox gallery. They are all different from each other."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_52">
					<option value="hovLayTVG1">  Effect 1  </option>
					<option value="hovLayTVG2">  Effect 2  </option>
					<option value="hovLayTVG3">  Effect 3  </option>
					<option value="hovLayTVG4">  Effect 4  </option>
					<option value="hovLayTVG5">  Effect 5  </option>
					<option value="hovLayTVG6">  Effect 6  </option>
					<option value="hovLayTVG7">  Effect 7  </option>
					<option value="hovLayTVG8">  Effect 8  </option>
					<option value="hovLayTVG9">  Effect 9  </option>
					<option value="hovLayTVG10"> Effect 10 </option>
					<option value="hovLayTVG11"> Effect 11 </option>
					<option value="hovLayTVG12"> Effect 12 </option>
					<option value="hovLayTVG13"> Effect 13 </option>
				</select> 
			</td>
		</tr>
		<tr>
			<td>Effect Time <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover effect for gallery video."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangesec" id="TotalSoft_GV_LG_53" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_53_Output" for="TotalSoft_GV_LG_53"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title Option</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background color for the text container."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_54" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font size for the video title."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_LG_55" id="TotalSoft_GV_LG_55" min="10" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_55_Output" for="TotalSoft_GV_LG_55"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for your title which will be seen in gallery."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_56" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Hover Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine preferable type of your hover effects."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_59">
					<option value="hovTit1">  Effect 1  </option>
					<option value="hovTit2">  Effect 2  </option>
					<option value="hovTit3">  Effect 3  </option>
					<option value="hovTit4">  Effect 4  </option>
					<option value="hovTit5">  Effect 5  </option>
					<option value="hovTit6">  Effect 6  </option>
					<option value="hovTit7">  Effect 7  </option>
					<option value="hovTit8">  Effect 8  </option>
					<option value="hovTit9">  Effect 9  </option>
					<option value="hovTit10"> Effect 10 </option>
					<option value="hovTit11"> Effect 11 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Hover Time <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover effect for gallery video."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangesec" id="TotalSoft_GV_LG_60" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_60_Output" for="TotalSoft_GV_LG_60"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the preferred font family for the title. Gallery has a basic Google fonts."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_57">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Line Option</td>
		</tr>
		<tr>
			<td>Line Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the line width."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_LG_61" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_61_Output" for="TotalSoft_GV_LG_61"></output>
			</td>
			<td>Line Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the style to be applied to the line."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_62">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Line Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_63" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Effect Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="There are 7 different line effect types."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_64">
					<option value="hovLine1"> Effect 1 </option>
					<option value="hovLine2"> Effect 2 </option>
					<option value="hovLine3"> Effect 3 </option>
					<option value="hovLine4"> Effect 4 </option>
					<option value="hovLine5"> Effect 5 </option>
					<option value="hovLine6"> Effect 6 </option>
					<option value="hovLine7"> Effect 7 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Effect Time <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select effect time for hover line effect."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangesec" id="TotalSoft_GV_LG_65" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_65_Output" for="TotalSoft_GV_LG_65"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link Option</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font size for the link button."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_LG_66" id="TotalSoft_GV_LG_66" min="10" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_66_Output" for="TotalSoft_GV_LG_66"></output>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the button which you will see in image."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_67" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color which is in the image container."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_68" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Border Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border width which is in the image container."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_LG_69" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_69_Output" for="TotalSoft_GV_LG_69"></output>
			</td>
		</tr>
		<tr>
			<td>Border Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border style."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_70">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Link Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in link button. When you have created a gallery in each box has URL."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_LG_71" id="TotalSoft_GV_LG_71"  value="">
			</td>
		</tr>
		<tr>
			<td>Hover Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine preferable link type of your hover effects."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_72">
					<option value="hovLink1"> Effect 1 </option>
					<option value="hovLink2"> Effect 2 </option>
					<option value="hovLink3"> Effect 3 </option>
					<option value="hovLink4"> Effect 4 </option>
					<option value="hovLink5"> Effect 5 </option>
					<option value="hovLink6"> Effect 6 </option>
					<option value="hovLink7"> Effect 7 </option>
					<option value="hovLink8"> Effect 8 </option>
					<option value="hovLink9"> Effect 9 </option>
				</select>
			</td>
			<td>Hover Time <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time for hover effect."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangesec" id="TotalSoft_GV_LG_73" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_73_Output" for="TotalSoft_GV_LG_73"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the preferred font family for the link button. Plugin has a basic Google font."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_58">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Option</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Open the gallery edit and choose your preferable background color for popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_09" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Border Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the container in a popup window."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_LG_10" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_10_Output" for="TotalSoft_GV_LG_10"></output>
			</td>
		</tr>
		<tr>
			<td>Border Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the style for the border of the popup."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_11">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color which is in the popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_12" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the popup window it is possible to give a border radius. You can specify the radius by pixels. In plugin it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_LG_13" id="TotalSoft_GV_LG_13" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_13_Output" for="TotalSoft_GV_LG_13"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title in Popup Option</td>
		</tr>
		<tr>
			<td>Show <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the title or no in popup."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_LG_14">
					<label for="TotalSoft_GV_LG_14" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Text Align <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose text to align for title (left, center or right)."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_15">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the image title."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_LG_16" id="TotalSoft_GV_LG_16" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_16_Output" for="TotalSoft_GV_LG_16"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the font family for the image title."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_17">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery set the color for the image title."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_18" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Play Icon Option</td>
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_19">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
					<option value="3"> Type 3 </option>
				</select>
			</td>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the size of the play icon."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_LG_22" id="TotalSoft_GV_LG_22" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_22_Output" for="TotalSoft_GV_LG_22"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color of the play icon."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_23" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Close Icon Option</td>
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can choose icons from different beautifully designed sets in video to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_24">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
					<option value="3"> Type 3 </option>
				</select>
			</td>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose in the gallery for the close box which size is approriate."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_LG_26" id="TotalSoft_GV_LG_26" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_26_Output" for="TotalSoft_GV_LG_26"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for close the popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_27" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in close button."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_LG_28" id="TotalSoft_GV_LG_28" maxlength="10" class="Total_Soft_Select" value="">
			</td>
		</tr>
		<tr>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferable font family for close button."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_29">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Arrows Option</td>
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the right and the left icons for popup which are for change the images by sequence."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_30">
					<option value="1">  Type 1  </option>
					<option value="2">  Type 2  </option>
					<option value="3">  Type 3  </option>
					<option value="4">  Type 4  </option>
					<option value="5">  Type 5  </option>
					<option value="6">  Type 6  </option>
					<option value="7">  Type 7  </option>
					<option value="8">  Type 8  </option>
					<option value="9">  Type 9  </option>
					<option value="10"> Type 10 </option>
					<option value="11"> Type 11 </option>
				</select>
			</td>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container. This plugin allows to get most suitable navigation arrows that are most appropriate for your site."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_LG_33" id="TotalSoft_GV_LG_33" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_33_Output" for="TotalSoft_GV_LG_33"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change the image."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_34" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Numbers Option</td>
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Note the size of the numbers. It is fully responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_LG_35" id="TotalSoft_GV_LG_35" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_35_Output" for="TotalSoft_GV_LG_35"></output>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the numbers."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_36" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Pagination & Load More</td>
		</tr>
		<tr>
			<td>Next Button Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can write the text that you want to see on this button. This next button to change the page. You choose how many videos to show in a page."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_LG_37" id="TotalSoft_GV_LG_37" maxlength="10" class="Total_Soft_Select" value="">
			</td>
			<td>Prev Button Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for the button that changes the page backward. But in one picture. You choose how many videos to show."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_LG_38" id="TotalSoft_GV_LG_38" maxlength="10" class="Total_Soft_Select" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select your preferred color for pagination. The text and font will be on a same color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_39" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the text and number buttons."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_40" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=" Define the font size for the number of paging ' pagination '. The same color for the text and number."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_LG_41" id="TotalSoft_GV_LG_41" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_LG_41_Output" for="TotalSoft_GV_LG_41"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the pagination used from the video in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_42">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Current Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current background color of the pagination that all the pages are displayed in the main pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_43" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Current Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current color of the pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_44" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_45" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the text color for hover."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_46" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_LG_48" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Border Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery select the border style for the pagination."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_LG_47">
					<option value="none">  None  </option>
					<option value="solid"> Solid </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Animation Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select effect for showing content."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_LG_74" id="TotalSoft_GV_LG_74">
					<option value="">                None             </option>
					<option value="fadeIn">          Fade In          </option>
					<option value="moveUp">          Move Up          </option>
					<option value="scaleUp">         Scale Up         </option>
					<option value="fallPerspective"> Fall Perspective </option>
					<option value="fly">             Fly              </option>
					<option value="flip">            Flip             </option>
					<option value="helix">           Helix            </option>
					<option value="popUp">           Pop Up           </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_3">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>
		</tr>
		<tr>
			<td>Start Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the effect for start which should be applied by images to changing albums."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_TV_01" id="TotalSoft_GV_TV_01">
					<option value="normal">      Normal      </option>
					<option value="transparent"> Transparent </option>
					<option value="overlay">     Overlay     </option>
				</select>
			</td>
			<td>Hover Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Keeping the mouse on the image select the Hover Effects which you will see."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_TV_02" id="TotalSoft_GV_TV_02">
					<option value="normal">             Normal                </option>
					<option value="popout">             Popout                </option>
					<option value="sliceDown">          Slice Down            </option>
					<option value="sliceDownLeft">      Slice Down Left       </option>
					<option value="sliceUp">            Slice Up              </option>
					<option value="sliceUpLeft">        Slice Up Left         </option>
					<option value="sliceUpRandom">      Slice Up Random       </option>
					<option value="sliceDownRandom">    Slice Down Random     </option>
					<option value="sliceUpDown">        Slice Up Down         </option>
					<option value="sliceUpDownLeft">    Slice Up Down Left    </option>
					<option value="fold">               Fold                  </option>
					<option value="foldLeft">           Fold Left             </option>
					<option value="boxRandom">          Box Random            </option>
					<option value="boxRain">            Box Rain              </option>
					<option value="boxRainReverse">     Box Rain Reverse      </option>
					<option value="boxRainGrow">        Box Rain Grow         </option>
					<option value="boxRainGrowReverse"> Box Rain Grow Reverse </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Animation Speed <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="The animation time function specifies the speed of an animation."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangemsec" name="TotalSoft_GV_TV_03" id="TotalSoft_GV_TV_03" min="100" max="1000" step="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_TV_03_Output" for="TotalSoft_GV_TV_03"></output>
			</td>
			<td>Fill Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="The fill property in CSS is for filling in the color of a shape."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_TV_04" id="TotalSoft_GV_TV_04" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Slices <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="The slice effect creates a beautiful look in a slideshow and has become quite popular."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range" name="TotalSoft_GV_TV_05" id="TotalSoft_GV_TV_05" min="1" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_TV_05_Output" for="TotalSoft_GV_TV_05"></output>
			</td>
			<td>Box Cols <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the number of box cols which will be shown."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range" name="TotalSoft_GV_TV_06" id="TotalSoft_GV_TV_06" min="1" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_TV_06_Output" for="TotalSoft_GV_TV_06"></output>
			</td>
		</tr>
		<tr>
			<td>Box Rows <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the number of box rows which will be shown."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range" name="TotalSoft_GV_TV_07" id="TotalSoft_GV_TV_07" min="1" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_TV_07_Output" for="TotalSoft_GV_TV_07"></output>
			</td>
			<td>PopOut Margin <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select image zoom size in Popout hover effect."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_TV_08" id="TotalSoft_GV_TV_08" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_TV_08_Output" for="TotalSoft_GV_TV_08"></output>
			</td>
		</tr>
		<tr>
			<td>PopOut Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select size which allows to show the shadow of the image in Popout hover effect."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_TV_09" id="TotalSoft_GV_TV_09" min="0" max="40" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_TV_09_Output" for="TotalSoft_GV_TV_09"></output>
			</td>
			<td>Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow of the image in Popout hover effect."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_TV_10" id="TotalSoft_GV_TV_10" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Video Options</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define video width for the gallery browser view option."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_TV_11" min="150" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_TV_11_Output" for="TotalSoft_GV_TV_11"></output>
			</td>
			<td>Height <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify video height for the browser view option."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_TV_12" min="150" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_TV_12_Output" for="TotalSoft_GV_TV_12"></output>
			</td>
		</tr>
		<tr>
			<td>Place Between Videos <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set place between item container images."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_TV_50" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_TV_50_Output" for="TotalSoft_GV_TV_50"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Video Icon Options</td>
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Alter the size of the icon regardless of the container."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_TV_51" id="TotalSoft_GV_TV_51" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_TV_51_Output" for="TotalSoft_GV_TV_51"></output>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_52" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the slide."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_TV_53">
					<option value="totalsoft totalsoft-play">          Type 1 </option>
					<option value="totalsoft totalsoft-play-circle">   Type 2 </option>
					<option value="totalsoft totalsoft-play-circle-o"> Type 3 </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Options</td>
		</tr>
		<tr>
			<td>Overlay Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the overlay."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_19" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Background <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the background or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_TV_20">
					<label for="TotalSoft_GV_TV_20" data-on="Yes" data-off="No"></label>
				</div>
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_21" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border radius."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_TV_22" id="TotalSoft_GV_TV_22" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_TV_22_Output" for="TotalSoft_GV_TV_22"></output>
			</td>
		</tr>
		<tr>
			<td>Box Shadow Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the color for box shadow."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_23" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title in Popup</td>
		</tr>
		<tr>
			<td>Background <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the background for title or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_TV_24">
					<label for="TotalSoft_GV_TV_24" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for title."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_25" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the title."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_TV_26" id="TotalSoft_GV_TV_26" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_TV_26_Output" for="TotalSoft_GV_TV_26"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font family for the title."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_TV_27">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Clicking on the image opens a popup select your preferable title color for popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_28" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Text Align <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose text align for title (left, center or right)."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_TV_29">
					<option value="left">   Left   </option>
					<option value="center"> Center </option>
					<option value="right">  Right  </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Numbers Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the numbers."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_30" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Numbers Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Note the size of the numbers. It is fully responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_TV_31" id="TotalSoft_GV_TV_31" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_TV_31_Output" for="TotalSoft_GV_TV_31"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Arrow Options</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferable background color of the icons."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_32" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color of the icon."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_33" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the radius for your icon in gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangeper" name="TotalSoft_GV_TV_34" id="TotalSoft_GV_TV_34" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_TV_34_Output" for="TotalSoft_GV_TV_34"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Close Icon Options</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the close icon background color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_35" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for closing popup in the gallery."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_36" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the radius for your icon in gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangeper" name="TotalSoft_GV_TV_37" id="TotalSoft_GV_TV_37" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_TV_37_Output" for="TotalSoft_GV_TV_37"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Pagination & Load More</td>
		</tr>
		<tr>
			<td>Next Button Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can write the text that you want to see on this button. This next button to change the page. You choose how many videos to show in a page."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_TV_38" id="TotalSoft_GV_TV_38" maxlength="10" class="Total_Soft_Select" value="">
			</td>
			<td>Prev Button Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for the button that changes the page backward. But in one picture. You choose how many videos to show."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_TV_39" id="TotalSoft_GV_TV_39" maxlength="10" class="Total_Soft_Select" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select your preferred color for pagination. The text and font will be on a same color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_40" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the text and number buttons."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_41" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the number of paging ' pagination '. The same color for the text and number."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_TV_42" id="TotalSoft_GV_TV_42" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_TV_42_Output" for="TotalSoft_GV_TV_42"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the pagination used from the video in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_TV_43">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Current Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current background color of the pagination that all the pages are displayed in the main pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_44" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Current Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current color of the pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_45" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_46" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the text color for hover."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_47" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery select the border style for the pagination."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_TV_48">
					<option value="none">  None  </option>
					<option value="solid"> Solid </option>
				</select>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_TV_49" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Animation Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select effect for showing content."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_TV_54" id="TotalSoft_GV_TV_54">
					<option value="">                None             </option>
					<option value="fadeIn">          Fade In          </option>
					<option value="moveUp">          Move Up          </option>
					<option value="scaleUp">         Scale Up         </option>
					<option value="fallPerspective"> Fall Perspective </option>
					<option value="fly">             Fly              </option>
					<option value="flip">            Flip             </option>
					<option value="helix">           Helix            </option>
					<option value="popUp">           Pop Up           </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_4">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the image and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CP_01" id="TotalSoft_GV_CP_01" min="150" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_01_Output" for="TotalSoft_GV_CP_01"></output>
			</td>
			<td>Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred height of the image and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CP_02" id="TotalSoft_GV_CP_02" min="150" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_02_Output" for="TotalSoft_GV_CP_02"></output>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the borders of individual images."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CP_03" id="TotalSoft_GV_CP_03" min="0" max="15" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_03_Output" for="TotalSoft_GV_CP_03"></output>
			</td>
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the frame border color for image."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_CP_04" id="TotalSoft_GV_CP_04" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Place Between <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Between each element you may configure padding size."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CP_05" id="TotalSoft_GV_CP_05" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_05_Output" for="TotalSoft_GV_CP_05"></output>
			</td>
			<td>Box Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the shadow or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_CP_06" name="TotalSoft_GV_CP_06">
					<label for="TotalSoft_GV_CP_06" data-on="Yes" data-off="No"></label>
				</div>
			</td>
		</tr>
		<tr>
			<td>Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value by the pixels."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CP_07" id="TotalSoft_GV_CP_07" min="0" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_07_Output" for="TotalSoft_GV_CP_07"></output>
			</td>
			<td>Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow of the image."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_CP_08" id="TotalSoft_GV_CP_08" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Options</td>
		</tr>
		<tr>
			<td>Effect <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the hover effect type. There are 10 effect types. They are all different from each other."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CP_09">
					<option value="1">  Effect 1  </option>
					<option value="2">  Effect 2  </option>
					<option value="3">  Effect 3  </option>
					<option value="4">  Effect 4  </option>
					<option value="5">  Effect 5  </option>
					<option value="6">  Effect 6  </option>
					<option value="7">  Effect 7  </option>
					<option value="8">  Effect 8  </option>
					<option value="9">  Effect 9  </option>
					<option value="10"> Effect 10 </option>
				</select>
			</td>
			<td>Overlay Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the overlay as you keep the mouse arrow on it. The effects are very beautiful and they are very suitable."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_10" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title Options</td>
		</tr>
		<tr>
			<td>Show <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the title or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_CP_11">
					<label for="TotalSoft_GV_CP_11" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Configure the preferable color of the font."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_12" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the preferable size of the letters of the title."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CP_13" id="TotalSoft_GV_CP_13" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_13_Output" for="TotalSoft_GV_CP_13"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the font family for the title."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CP_14">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the background color for the title."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_15" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Description Options</td>
		</tr>
		<tr>
			<td>Show <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose whether to see the description text or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_CP_16">
					<label for="TotalSoft_GV_CP_16" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Line After Title</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose Width for separation line the after title."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_CP_17" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_17_Output" for="TotalSoft_GV_CP_17"></output>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose color for separation line the after title."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_18" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link Option</td>
		</tr>
		<tr>
			<td>Show <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select whether to see the link or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_CP_71">
					<label for="TotalSoft_GV_CP_71" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in link button. When you have created a gallery in each box has URL."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_CP_19" id="TotalSoft_GV_CP_19" maxlength="15" class="Total_Soft_Select" value="">
			</td>
		</tr>
		<tr>
			<td>Border Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border width which is in the container."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_CP_20" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_20_Output" for="TotalSoft_GV_CP_20"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color which is in the container."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_21" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can specify the radius by the pixels."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_CP_22" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_22_Output" for="TotalSoft_GV_CP_22"></output>
			</td>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the color for link background."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_23" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the button which you will see in image."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_24" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font size for the link button."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CP_25" id="TotalSoft_GV_CP_25" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_25_Output" for="TotalSoft_GV_CP_25"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font family for the link button."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CP_26">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the color for the link background while hovering by mouse."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_27" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the color for the font while hovering by mouse."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_28" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Pagination & Load More</td>
		</tr>
		<tr>
			<td>Next Button Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can write the text that you want to see on this button. This next button to change the page. You choose how many videos to show in a page."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_CP_29" id="TotalSoft_GV_CP_29" maxlength="10" class="Total_Soft_Select" value="">
			</td>
			<td>Prev Button Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for the button that changes the page backward. But in one picture. You choose how many videos to show."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_CP_30" id="TotalSoft_GV_CP_30" maxlength="10" class="Total_Soft_Select" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select your preferred color for pagination. The text and font will be on a same color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_31" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the text and number buttons."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_32" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the number of paging ' pagination '. The same color for the text and number."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CP_33" id="TotalSoft_GV_CP_33" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_33_Output" for="TotalSoft_GV_CP_33"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the pagination used from the video in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CP_34">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Current Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current background color of the pagination that all the pages are displayed in the main pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_35" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Current Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current color of the pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_36" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_37" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the text color for hover."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_38" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery select the border style for the pagination."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CP_39">
					<option value="none">  None  </option>
					<option value="solid"> Solid </option>
				</select>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_40" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Animation Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select effect for showing content."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_CP_72" id="TotalSoft_GV_CP_72">
					<option value="">                None             </option>
					<option value="fadeIn">          Fade In          </option>
					<option value="moveUp">          Move Up          </option>
					<option value="scaleUp">         Scale Up         </option>
					<option value="fallPerspective"> Fall Perspective </option>
					<option value="fly">             Fly              </option>
					<option value="flip">            Flip             </option>
					<option value="helix">           Helix            </option>
					<option value="popUp">           Pop Up           </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Options</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose background color for the description, title and video in a popup window."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_41" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Border Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the container in a content popup."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_CP_42" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_42_Output" for="TotalSoft_GV_CP_42"></output>
			</td>
		</tr>
		<tr>
			<td>Border Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the style for the border of the content popup."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CP_43">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color which is in the content popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_44" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Popup Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose popup style."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_CP_73" id="TotalSoft_GV_CP_73">
					<option value="">       Default </option>
					<option value="mode01"> Mode 1  </option>
					<option value="mode02"> Mode 2  </option>
					<option value="mode03"> Mode 3  </option>
					<option value="mode04"> Mode 4  </option>
					<option value="mode05"> Mode 5  </option>
					<option value="mode06"> Mode 6  </option>
					<option value="mode07"> Mode 7  </option>
					<option value="mode08"> Mode 8  </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title in Popup</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the title in content popup."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CP_45" id="TotalSoft_GV_CP_45" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_45_Output" for="TotalSoft_GV_CP_45"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font family for the title in content popup."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CP_46">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Clicking on the image opens a popup select your preferable title color for popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_47" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for title."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_48" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Text Align <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose text align for title (left, center or right)."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CP_49">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link in Popup</td>
		</tr>
		<tr>
			<td>Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in link button."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_CP_50" id="TotalSoft_GV_CP_50" maxlength="15" class="Total_Soft_Select" value="">
			</td>
			<td>Border Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border width which is in the popup container."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_CP_51" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_51_Output" for="TotalSoft_GV_CP_51"></output>
			</td>
		</tr>
		<tr>
			<td>Border Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the border style for the link button in the content popup."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CP_52">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color which is in the popup container."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_53" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can specify the radius for link by the pixels."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_CP_54" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_54_Output" for="TotalSoft_GV_CP_54"></output>
			</td>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the color for link background in the popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_55" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the button which you will see in container."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_56" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font size for the link button."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CP_57" id="TotalSoft_GV_CP_57" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_57_Output" for="TotalSoft_GV_CP_57"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the link text."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CP_58">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the color for the link background while hovering by mouse."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_59" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the color for the font while hovering by mouse."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_60" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Icons in Popup</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferable background color of the icons."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_61" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Close Icon Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose for the close box which size is approriate."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CP_62" id="TotalSoft_GV_CP_62" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_62_Output" for="TotalSoft_GV_CP_62"></output>
			</td>
		</tr>
		<tr>
			<td>Close Icon Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the close icon color for the popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_63" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Close Icon Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=" You can choose icons from different beautifully designed sets to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CP_64">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
					<option value="3"> Type 3 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Arrows Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container. Plugin allows to get most suitable navigation arrows that are most appropriate for your site."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CP_66" id="TotalSoft_GV_CP_66" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CP_66_Output" for="TotalSoft_GV_CP_66"></output>
			</td>
			<td>Arrows Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change the video."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CP_67" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Arrows Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the right and the left icons for popup which are for change the videos by sequence."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CP_68">
					<option value="1">  Type 1  </option>
					<option value="2">  Type 2  </option>
					<option value="3">  Type 3  </option>
					<option value="4">  Type 4  </option>
					<option value="5">  Type 5  </option>
					<option value="6">  Type 6  </option>
					<option value="7">  Type 7  </option>
					<option value="8">  Type 8  </option>
					<option value="9">  Type 9  </option>
					<option value="10"> Type 10 </option>
					<option value="11"> Type 11 </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_5">
		<tr class="Total_Soft_Titles">
			<td colspan="4">Video Image Options</td>
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width and it is all responsive in gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_EG_01" id="TotalSoft_GV_EG_01" min="100" max="400" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_EG_01_Output" for="TotalSoft_GV_EG_01"></output>
			</td>
			<td>Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred height and it is all responsive in gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_EG_02" id="TotalSoft_GV_EG_02" min="100" max="400" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_EG_02_Output" for="TotalSoft_GV_EG_02"></output>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the image container."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_EG_03" id="TotalSoft_GV_EG_03" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_EG_03_Output" for="TotalSoft_GV_EG_03"></output>
			</td>
			<td>Border Style <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the style for the border."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_EG_04" id="TotalSoft_GV_EG_04">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color which is in the elastic gallery."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_EG_05" id="TotalSoft_GV_EG_05" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Box Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value by the pixels."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_EG_06" id="TotalSoft_GV_EG_06" min="0" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_EG_06_Output" for="TotalSoft_GV_EG_06"></output>
			</td>
		</tr>
		<tr>
			<td>Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow of the image."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_EG_07" id="TotalSoft_GV_EG_07" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Zoom Type <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the type of scaling of different and beautifully designed sets from the image."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_EG_08" id="TotalSoft_GV_EG_08">
					<option value="zEff9"> None   </option>
					<option value="zEff1"> Type 1 </option>
					<option value="zEff2"> Type 2 </option>
					<option value="zEff3"> Type 3 </option>
					<option value="zEff4"> Type 4 </option>
					<option value="zEff5"> Type 5 </option>
					<option value="zEff6"> Type 6 </option>
					<option value="zEff7"> Type 7 </option>
					<option value="zEff8"> Type 8 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Effect Time <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover effect."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangesec" name="TotalSoft_GV_EG_09" id="TotalSoft_GV_EG_09" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_EG_09_Output" for="TotalSoft_GV_EG_09"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Video Title Options</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font size for the title."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_EG_10" id="TotalSoft_GV_EG_10" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_EG_10_Output" for="TotalSoft_GV_EG_10"></output>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for your title which will be seen in elastic type."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_11" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the preferred font family for the title. Plugin has a basic Google font."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_EG_12">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background color for the text container."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_13" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine preferable type of your hover effects."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_EG_14">
					<option value="zTitfHov1"> Type 1 </option>
					<option value="zTitfHov2"> Type 2 </option>
					<option value="zTitfHov3"> Type 3 </option>
					<option value="zTitfHov4"> Type 4 </option>
				</select>
			</td>
			<td>Effect Time <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover effect."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangesec" id="TotalSoft_GV_EG_15" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_EG_15_Output" for="TotalSoft_GV_EG_15"></output>
			</td>
		</tr>
		<tr>
			<td>Show Title <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You have opportunity to choose in the elastic type show the title or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_EG_16">
					<label for="TotalSoft_GV_EG_16" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Icon Options</td>
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Alter the size of the icon."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_EG_17" id="TotalSoft_GV_EG_17" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_EG_17_Output" for="TotalSoft_GV_EG_17"></output>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color of the icon."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_18" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Icon Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icons for image popup."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_EG_19">
					<option value="totalsoft totalsoft-file-video-o"> Type 1 </option>
					<option value="totalsoft totalsoft-video-camera"> Type 2 </option>
					<option value="totalsoft totalsoft-camera-retro"> Type 3 </option>
					<option value="totalsoft totalsoft-eye">          Type 4 </option>
					<option value="totalsoft totalsoft-film">         Type 5 </option>
					<option value="totalsoft totalsoft-youtube-play"> Type 6 </option>
				</select>
			</td>
			<td>Border Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border width for popup icon."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_EG_20" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_EG_20_Output" for="TotalSoft_GV_EG_20"></output>
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the border color for icon in the gallery popup container."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_21" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Border Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the style for the border."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_EG_22">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferable background color of the icons."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_23" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link Icon Options</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the icon for the button which you will see in a popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_24" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_25" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define a background color which is intended for the link button."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_26" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Icon Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the icon type of different and beautifully designed sets."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_EG_27">
					<option value="totalsoft totalsoft-external-link">        Type 1 </option>
					<option value="totalsoft totalsoft-external-link-square"> Type 2 </option>
					<option value="totalsoft totalsoft-link">                 Type 3 </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Options</td>
		</tr>
		<tr>
			<td>Overlay Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a background color for the overlay."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_28" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Slider Effect Time <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the time interval between the slideshow videos in seconds when autoplay is enabled. Otherwise videos will be changed when clicking on navigation buttons."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangesec" id="TotalSoft_GV_EG_29" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_EG_29_Output" for="TotalSoft_GV_EG_29"></output>
			</td>
		</tr>
		<tr>
			<td>Close Icon Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose close icon color in the gallery."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_30" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Close Icon Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Possibility choose a size for close icon which has intended to return to the gallery from the lightbox."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_EG_31" id="TotalSoft_GV_EG_31" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_EG_31_Output" for="TotalSoft_GV_EG_31"></output>
			</td>
		</tr>
		<tr>
			<td>Close Icon Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can choose icons from different beautifully designed sets to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_EG_32">
					<option value="totalsoft totalsoft-times">          Type 1 </option>
					<option value="totalsoft totalsoft-times-circle-o"> Type 2 </option>
					<option value="totalsoft totalsoft-times-circle">   Type 3 </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Slider Options</td>
		</tr>
		<tr>
			<td>Icon Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Change the slider icon size regardless of the container. The plugin allows to get most suitable navigation arrows that are most appropriate for your site."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_EG_33" id="TotalSoft_GV_EG_33" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_EG_33_Output" for="TotalSoft_GV_EG_33"></output>
			</td>
			<td>Icon Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for slideshow in the popup slider."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_34" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Icon Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon background color for slideshow in the popup slider."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_35" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Icon Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the left and right icons for the slideshow in which the videos should be placed for slide."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_EG_36">
					<option value="1">  Type 1  </option>
					<option value="2">  Type 2  </option>
					<option value="3">  Type 3  </option>
					<option value="4">  Type 4  </option>
					<option value="5">  Type 5  </option>
					<option value="6">  Type 6  </option>
					<option value="7">  Type 7  </option>
					<option value="8">  Type 8  </option>
					<option value="9">  Type 9  </option>
					<option value="10"> Type 10 </option>
					<option value="11"> Type 11 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Show Autoplay <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="If this parameter is not specified autoplay for slideshow will be disabled."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_EG_37">
					<label for="TotalSoft_GV_EG_37" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Loop <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="When the videos are finished to begins again with the same video or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_EG_38">
					<label for="TotalSoft_GV_EG_38" data-on="Yes" data-off="No"></label>
				</div>
			</td>
		</tr>
		<tr>
			<td>Border Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the container in a popup window."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_EG_39" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_EG_39_Output" for="TotalSoft_GV_EG_39"></output>
			</td>
			<td>Border Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the style for the border of the popup slider."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_EG_40">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color which is in the popup slider."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_41" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Shadow <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value by the pixel."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_EG_42" min="0" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_EG_42_Output" for="TotalSoft_GV_EG_42"></output>
			</td>
		</tr>
		<tr>
			<td>Shadow Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_43" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Pagination & Load More Options</td>
		</tr>
		<tr>
			<td>Next Button Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can write the text that you want to see on this button. This next button to change the page. You choose how many videos to show in a page."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_EG_44" id="TotalSoft_GV_EG_44" value="">
			</td>
			<td>Prev Button Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for the button that changes the page backward. But in one picture. You choose how many videos to show."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_EG_45" id="TotalSoft_GV_EG_45" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select your preferred color for pagination. The text and font will be on a same color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_46" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the text and number buttons."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_47" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the number of paging ' pagination '. The same color for the text and number."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_EG_48" id="TotalSoft_GV_EG_48" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_EG_48_Output" for="TotalSoft_GV_EG_48"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the pagination used from the video in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_EG_49">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Current Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current background color of the pagination that all the pages are displayed in the main pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_50" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Current Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current color of the pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_51" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_52" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the text color for hover."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_53" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery select the border style for the pagination."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_EG_54">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_EG_55" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Animation Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select effect for showing content."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_EG_56" id="TotalSoft_GV_EG_56">
					<option value="">                None             </option>
					<option value="fadeIn">          Fade In          </option>
					<option value="moveUp">          Move Up          </option>
					<option value="scaleUp">         Scale Up         </option>
					<option value="fallPerspective"> Fall Perspective </option>
					<option value="fly">             Fly              </option>
					<option value="flip">            Flip             </option>
					<option value="helix">           Helix            </option>
					<option value="popUp">           Pop Up           </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_6">
		<tr class="Total_Soft_Titles">
			<td colspan="4">Video Image Options</td>
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_FG_01" id="TotalSoft_GV_FG_01" min="100" max="400" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_01_Output" for="TotalSoft_GV_FG_01"></output>
			</td>
			<td>Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred height and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_FG_02" id="TotalSoft_GV_FG_02" min="100" max="400" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_02_Output" for="TotalSoft_GV_FG_02"></output>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the image container."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_FG_03" id="TotalSoft_GV_FG_03" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_03_Output" for="TotalSoft_GV_FG_03"></output>
			</td>
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color which is in the fancy gallery."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_FG_04" id="TotalSoft_GV_FG_04" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Box Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_FG_05" id="TotalSoft_GV_FG_05" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_05_Output" for="TotalSoft_GV_FG_05"></output>
			</td>
			<td>Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_FG_06" id="TotalSoft_GV_FG_06" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border radius for image."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangeper" name="TotalSoft_GV_FG_07" id="TotalSoft_GV_FG_07" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_07_Output" for="TotalSoft_GV_FG_07"></output>
			</td>
			<td>Place Between Videos <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the distance between each image. Here is the image from your Youtube and Vimeo videos."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_FG_08" id="TotalSoft_GV_FG_08" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_08_Output" for="TotalSoft_GV_FG_08"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title Options</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="This function is for the main title. You can select font size. For each screen or mobile version will be its own size for responsiveness."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_FG_09" id="TotalSoft_GV_FG_09" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_09_Output" for="TotalSoft_GV_FG_09"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the font family that you want to show."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_FG_10">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the main title."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_11" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Bottom Border Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the border width for the bottom line."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_FG_12" min="0" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_12_Output" for="TotalSoft_GV_FG_12"></output>
			</td>
		</tr>
		<tr>
			<td>Bottom Border Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the border style for the bottom line."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_FG_13">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Bottom Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the border color for the bottom line."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_14" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Top Border Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the border width for the top line."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_FG_15" min="0" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_15_Output" for="TotalSoft_GV_FG_15"></output>
			</td>
			<td>Top Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the border color for the top line."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_16" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link Options</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for link."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_FG_17" id="TotalSoft_GV_FG_17" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_17_Output" for="TotalSoft_GV_FG_17"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select font family that will make your gallery more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_FG_18">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the text for the link button."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_19" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Position <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions: left, center, right."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_FG_20">
					<option value="left">   Left   </option>
					<option value="center"> Center </option>
					<option value="right">  Right  </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border width for link."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_FG_21" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_21_Output" for="TotalSoft_GV_FG_21"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color which is in the image container."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_22" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Install the border radius for link."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_FG_23" min="0" max="25" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_23_Output" for="TotalSoft_GV_FG_23"></output>
			</td>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define a background color which is intended for the link button."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_24" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover color for link."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_25" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Hover Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select hover border color for link button."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_26" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select hover background color for link button."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_27" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in link button. When you have created a gallery in each box has URL. If you wrote something in your popup window now you can see it."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_FG_64" id="TotalSoft_GV_FG_64" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Overlay Options</td>
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose type of overlay."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_FG_28">
					<option value="Default"> Default </option>
					<option value="Inverse"> Inverse </option>
				</select>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a color for the overlay."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_29" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Options</td>
		</tr>
		<tr>
			<td>Overlay Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the preferred background color of the content popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_30" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Video Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose background color for the title and video in a popup window."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_32" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Video Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the video for popup and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_FG_33" min="300" max="1000" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_33_Output" for="TotalSoft_GV_FG_33"></output>
			</td>
			<td>Video Height <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred height of the video for popup and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_FG_34" min="200" max="800" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_34_Output" for="TotalSoft_GV_FG_34"></output>
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Thumbnail Options</td>
		</tr>
		<tr>
			<td>Hover Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the hover color of the borders around the thumbnails."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_35" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Border Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the border width for thumbnail photos."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_FG_36" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_36_Output" for="TotalSoft_GV_FG_36"></output>
			</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the thumbnails for popup and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_FG_37" min="50" max="150" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_37_Output" for="TotalSoft_GV_FG_37"></output>
			</td>
			<td>Height <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred height of the thumbnails for popup and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_FG_38" min="50" max="150" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_38_Output" for="TotalSoft_GV_FG_38"></output>
			</td>
		</tr>
		<tr>
			<td>Carusel Icon Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for carousel in the popup thumbnails."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_31" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Title Options</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="This function is for the popup window. You can select font size for headers. For each screen or mobile version will be its size for responsiveness."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_FG_39" id="TotalSoft_GV_FG_39" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_39_Output" for="TotalSoft_GV_FG_39"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the title used in a popup."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_FG_40">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It is necessary to choose the color for video titles which is in the popup window."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_41" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Slider Icons Options</td>
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the left and right icons for the slideshow in which the videos should be placed for slide."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_FG_42">
					<option value="1">  Type 1  </option>
					<option value="2">  Type 2  </option>
					<option value="3">  Type 3  </option>
					<option value="4">  Type 4  </option>
					<option value="5">  Type 5  </option>
					<option value="6">  Type 6  </option>
					<option value="7">  Type 7  </option>
					<option value="8">  Type 8  </option>
					<option value="9">  Type 9  </option>
					<option value="10"> Type 10 </option>
					<option value="11"> Type 11 </option>
				</select>
			</td>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Change the slider icon size regardless of the container. The plugin allows to get most suitable navigation arrows that are most appropriate for your site."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_FG_43" id="TotalSoft_GV_FG_43" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_43_Output" for="TotalSoft_GV_FG_43"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for slideshow in the popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_44" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Close Icon Options</td>
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety beautifully designed sets to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_FG_45">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
					<option value="3"> Type 3 </option>
				</select>
			</td>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=" Select the size of the icon that is to close the popup window. The icon is in the right corner."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_FG_46" id="TotalSoft_GV_FG_46" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_46_Output" for="TotalSoft_GV_FG_46"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the icon to close the popup. When you close the window with it closes and the video."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_47" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Slider General Options</td>
		</tr>
		<tr>
			<td>Video Autoplay <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="If this parameter is not specified autoplay for video will be disabled."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_FG_48">
					<label for="TotalSoft_GV_FG_48" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Show Navigation <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the navigation or no in popup."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_FG_49">
					<label for="TotalSoft_GV_FG_49" data-on="Yes" data-off="No"></label>
				</div>
			</td>
		</tr>
		<tr>
			<td>Show Video Title <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="If this parameter is not specified title for popup will be disabled."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_FG_50">
					<label for="TotalSoft_GV_FG_50" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Show Play Icon <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="If this parameter is not specified play icon for popup will be disabled."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_FG_51">
					<label for="TotalSoft_GV_FG_51" data-on="Yes" data-off="No"></label>
				</div>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Pagination & Load More Options</td>
		</tr>
		<tr>
			<td>Next Button Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can write the text that you want to see on this button. This next button to change the page. You choose how many videos to show in a page."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_FG_52" id="TotalSoft_GV_FG_52" value="">
			</td>
			<td>Prev Button Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for the button that changes the page backward. But in one picture. You choose how many videos to show."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_FG_53" id="TotalSoft_GV_FG_53" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select your preferred color for pagination. The text and font will be on a same color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_54" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the text and number buttons."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_55" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the number of paging ' pagination '. The same color for the text and number."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_FG_56" id="TotalSoft_GV_FG_56" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_FG_56_Output" for="TotalSoft_GV_FG_56"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the pagination used from the video in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_FG_57">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Current Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current background color of the pagination that all the pages are displayed in the main pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_58" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Current Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current color of the pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_59" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_60" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the text color for hover."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_61" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery select the border style for the pagination."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_FG_62">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_FG_63" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Animation Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select effect for showing content."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_FG_65" id="TotalSoft_GV_FG_65">
					<option value="">                None             </option>
					<option value="fadeIn">          Fade In          </option>
					<option value="moveUp">          Move Up          </option>
					<option value="scaleUp">         Scale Up         </option>
					<option value="fallPerspective"> Fall Perspective </option>
					<option value="fly">             Fly              </option>
					<option value="flip">            Flip             </option>
					<option value="helix">           Helix            </option>
					<option value="popUp">           Pop Up           </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_7">
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Video Image Options</td>
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the image and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_PE_02" id="TotalSoft_GV_PE_02" min="100" max="500" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_PE_02_Output" for="TotalSoft_GV_PE_02"></output>
			</td>
			<td>Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred height of the image and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_PE_01" id="TotalSoft_GV_PE_01" min="100" max="500" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_PE_01_Output" for="TotalSoft_GV_PE_01"></output>
			</td>
		</tr>
		<tr>
			<td>Box Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value by the pixels."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_PE_04" id="TotalSoft_GV_PE_04" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_PE_04_Output" for="TotalSoft_GV_PE_04"></output>
			</td>
			<td>Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow of the photos."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_PE_05" id="TotalSoft_GV_PE_05" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Shadow Type <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose from these two shadow types."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_PE_06" name="TotalSoft_GV_PE_06">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
				</select>
			</td>
			<td>Effect Type <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select type of hover effect."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_PE_07" name="TotalSoft_GV_PE_07">
					<option value="TotalSoft_H_Ef1"> Rotate    </option>
					<option value="TotalSoft_H_Ef2"> Translate </option>
					<option value="TotalSoft_H_Ef3"> None      </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Place Between Video Images <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the distance between each image. Here is the image from your Youtube and Vimeo videos."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_PE_08" id="TotalSoft_GV_PE_08" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_PE_08_Output" for="TotalSoft_GV_PE_08"></output>
			</td>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the radius for the border."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_PE_03" id="TotalSoft_GV_PE_03" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_PE_03_Output" for="TotalSoft_GV_PE_03"></output>
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Title Options</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select font size for title. For each screen or mobile version will be its own size for responsiveness."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_PE_09" id="TotalSoft_GV_PE_09" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_PE_09_Output" for="TotalSoft_GV_PE_09"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the title."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_PE_10">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It is necessary to choose the color for photo titles."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_11" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Text Shadow <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the shadow color for the photo title."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_PE_12" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_PE_12_Output" for="TotalSoft_GV_PE_12"></output>
			</td>
		</tr>
		<tr>
			<td>Shadow Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow of the titles."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_13" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Effect Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the type of scaling of different and beautifully designed sets."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_PE_14">
					<option value="TotalSoft_Title_Ef1"> Translate </option>
					<option value="TotalSoft_Title_Ef2"> Scale     </option>
					<option value="TotalSoft_Title_Ef3"> None      </option>
					<option value="TotalSoft_Title_Ef4"> Rotate    </option>
				</select>
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Icon Options</td>
		</tr>
		<tr>
			<td>Show Icon <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the icon or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_PE_15">
					<label for="TotalSoft_GV_PE_15" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icons for popup."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_PE_16">
					<option value="totalsoft totalsoft-play-circle">  Type 1 </option>
					<option value="totalsoft totalsoft-play">         Type 2 </option>
					<option value="totalsoft totalsoft-youtube-play"> Type 3 </option>
					<option value="totalsoft totalsoft-file-video-o"> Type 4 </option>
					<option value="totalsoft totalsoft-video-camera"> Type 5 </option>
					<option value="totalsoft totalsoft-search">       Type 6 </option>
					<option value="totalsoft totalsoft-eye">          Type 7 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Alter the size of the icon."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_PE_17" id="TotalSoft_GV_PE_17" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_PE_17_Output" for="TotalSoft_GV_PE_17"></output>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for icon in the gallery popup container."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_18" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Hover Line Options</td>
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="There are 13 different line effect types."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_PE_19">
					<option value="TotalSoft_HovLine1">  Type 1  </option>
					<option value="TotalSoft_HovLine2">  Type 2  </option>
					<option value="TotalSoft_HovLine3">  Type 3  </option>
					<option value="TotalSoft_HovLine4">  Type 4  </option>
					<option value="TotalSoft_HovLine5">  Type 5  </option>
					<option value="TotalSoft_HovLine6">  Type 6  </option>
					<option value="TotalSoft_HovLine7">  Type 7  </option>
					<option value="TotalSoft_HovLine8">  Type 8  </option>
					<option value="TotalSoft_HovLine9">  Type 9  </option>
					<option value="TotalSoft_HovLine10"> Type 10 </option>
					<option value="TotalSoft_HovLine11"> Type 11 </option>
					<option value="TotalSoft_HovLine12"> Type 12 </option>
					<option value="TotalSoft_HovLine13"> Type 13 </option>
				</select>
			</td>
			<td>Show Line <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the separation line or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_PE_20">
					<label for="TotalSoft_GV_PE_20" data-on="Yes" data-off="No"></label>
				</div>
			</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the line width for separation."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_PE_21" min="0" max="15" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_PE_21_Output" for="TotalSoft_GV_PE_21"></output>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_22" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Box Shadow <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value by the pixels."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_PE_23" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_PE_23_Output" for="TotalSoft_GV_PE_23"></output>
			</td>
			<td>Shadow Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow for seperation line."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_24" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Hover Overlay Options</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the overlay on the video as you keep the mouse arrow on it. The effects are very beautiful and they are very suitable in the gallery."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_25" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the hover effect type. There are 5 effects type in lightbox. They are all different from each other."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_PE_26">
					<option value="TotalSoft_Hov_Overlay1"> Type 1 </option>
					<option value="TotalSoft_Hov_Overlay2"> Type 2 </option>
					<option value="TotalSoft_Hov_Overlay3"> Type 3 </option>
					<option value="TotalSoft_Hov_Overlay4"> Type 4 </option>
					<option value="TotalSoft_Hov_Overlay5"> Type 5 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Show Overlay <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the overlay or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_PE_27">
					<label for="TotalSoft_GV_PE_27" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Options</td>
		</tr>
		<tr>
			<td>Overlay Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a background color for overlay."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_28" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Effect Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the hover effect type. There are 2 effects type in lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_PE_29">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
				</select>
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Slider Options</td>
		</tr>
		<tr>
			<td>Popup 2 Slider Effect Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the slide effect type. There are 2 effects type in lightbox. They are all different from each other."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_PE_30">
					<option value="elastic"> Elastic </option>
					<option value="fade">    Fade    </option>
				</select>
			</td>
			<td>Popup 2 Slider Video Title Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the background color for title in the popup slider."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_31" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the container in a popup window."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_PE_32" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_PE_32_Output" for="TotalSoft_GV_PE_32"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color which is in the popup slider."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_33" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Box Shadow <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value by the pixels."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_PE_34" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_PE_34_Output" for="TotalSoft_GV_PE_34"></output>
			</td>
			<td>Shadow Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_35" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Video Title Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select font size for title. For each screen or mobile version will be its own size for responsiveness."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_PE_37" id="TotalSoft_GV_PE_37" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_PE_37_Output" for="TotalSoft_GV_PE_37"></output>
			</td>
			<td>Video Title Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the title."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_PE_38">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Video Title Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It is necessary to choose the color for titles."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_39" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Options Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the background color for the popup slider."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_36" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Slider Icons Options</td>
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Change the slider icon size regardless of the container. The plugin allows to get most suitable navigation arrows that are most appropriate for your site."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_PE_40" id="TotalSoft_GV_PE_40" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_PE_40_Output" for="TotalSoft_GV_PE_40"></output>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for slideshow in the popup slider."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_41" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the left and right icons for the slideshow. In which the videos should be placed for slide."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_PE_42">
					<option value="1">  Type 1  </option>
					<option value="2">  Type 2  </option>
					<option value="3">  Type 3  </option>
					<option value="4">  Type 4  </option>
					<option value="5">  Type 5  </option>
					<option value="6">  Type 6  </option>
					<option value="7">  Type 7  </option>
					<option value="8">  Type 8  </option>
					<option value="9">  Type 9  </option>
					<option value="10"> Type 10 </option>
					<option value="11"> Type 11 </option>
				</select>
			</td>
			<td>Close Icon Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can choose icons from different beautifully designed sets to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_PE_43">
					<option value="totalsoft totalsoft-times">          Type 1 </option>
					<option value="totalsoft totalsoft-times-circle">   Type 2 </option>
					<option value="totalsoft totalsoft-times-circle-o"> Type 3 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Loading Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can choose icons for loading."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_PE_44">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
					<option value="3"> Type 3 </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Pagination & Load More Options</td>
		</tr>
		<tr>
			<td>Next Button Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can write the text that you want to see on this button. This next button to change the page. You choose how many videos to show in a page."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_PE_45" id="TotalSoft_GV_PE_45" value="">
			</td>
			<td>Prev Button Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for the button that changes the page backward. But in one picture. You choose how many videos to show."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_PE_46" id="TotalSoft_GV_PE_46" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=" You can select your preferred color for pagination. The text and font will be on a same color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_47" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the text and number buttons."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_48" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the number of paging ' pagination '. The same color for the text and number."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_PE_49" id="TotalSoft_GV_PE_49" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_PE_49_Output" for="TotalSoft_GV_PE_49"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the pagination used from the video in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_PE_50">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Current Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current background color of the pagination that all the pages are displayed in the main pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_51" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Current Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current color of the pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_52" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the pagination."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_53" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the text color for hover."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_54" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery select the border style for the pagination."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_PE_55">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_PE_56" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Animation Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select effect for showing content."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_PE_57" id="TotalSoft_GV_PE_57">
					<option value="">                None             </option>
					<option value="fadeIn">          Fade In          </option>
					<option value="moveUp">          Move Up          </option>
					<option value="scaleUp">         Scale Up         </option>
					<option value="fallPerspective"> Fall Perspective </option>
					<option value="fly">             Fly              </option>
					<option value="flip">            Flip             </option>
					<option value="helix">           Helix            </option>
					<option value="popUp">           Pop Up           </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_8">
		<tr class='Total_Soft_Titles'>
			<td colspan="4">General Options</td>
		</tr>
		<tr>
			<td>Column Count <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select how many videos you want to be in one row."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range" name="TotalSoft_GV_CG_01" id="TotalSoft_GV_CG_01" min="1" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CG_01_Output" for="TotalSoft_GV_CG_01"></output>
			</td>
			<td>Hover Effect <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select type of hover effect for videos."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CG_02">
					<option value="none">     None      </option>
					<option value="effect01"> Effect 1  </option>
					<option value="effect02"> Effect 2  </option>
					<option value="effect03"> Effect 3  </option>
					<option value="effect04"> Effect 4  </option>
					<option value="effect05"> Effect 5  </option>
					<option value="effect06"> Effect 6  </option>
					<option value="effect07"> Effect 7  </option>
					<option value="effect08"> Effect 8  </option>
					<option value="effect09"> Effect 9  </option>
					<option value="effect10"> Effect 10 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Hover Color 1 <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for hover effects."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_03" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Hover Color 2 <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select second color for hover effects."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_04" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Box Shadow Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select shadow type for the videos container."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CG_05">
					<option value="none">     None    </option>
					<option value="effect01"> Effect 1 </option>
					<option value="effect02"> Effect 2 </option>
					<option value="effect03"> Effect 3 </option>
					<option value="effect04"> Effect 4 </option>
					<option value="effect05"> Effect 5 </option>
					<option value="effect06"> Effect 6 </option>
					<option value="effect07"> Effect 7 </option>
					<option value="effect08"> Effect 8 </option>
					<option value="effect09"> Effect 9 </option>
				</select>
			</td>
			<td>Box Shadow Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_06" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the videos container."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CG_07" id="TotalSoft_GV_CG_07" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CG_07_Output" for="TotalSoft_GV_CG_07"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color for the videos container."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_08" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Title Options</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font size for the video title."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CG_09" id="TotalSoft_GV_CG_09" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CG_09_Output" for="TotalSoft_GV_CG_09"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the preferred font family for the title. Gallery has a basic Google fonts."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CG_10">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for your title which will be seen in gallery."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_11" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Play Icon Options</td>
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for playing video in lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CG_12">
					<option value="file-video-o">  File Video O  </option>
					<option value="video-camera">  Video Camera  </option>
					<option value="camera-retro">  Camera Retro  </option>
					<option value="eye">           Eye           </option>
					<option value="film">          Film          </option>
					<option value="youtube-play">  YouTube Play  </option>
					<option value="play">          Play          </option>
					<option value="play-circle">   Play Circle   </option>
					<option value="play-circle-o"> Play Circle O </option>
				</select>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color of the play icon."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_13" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the size of the play icon."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CG_14" id="TotalSoft_GV_CG_14" min="16" max="72" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CG_14_Output" for="TotalSoft_GV_CG_14"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Options</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select background color for the popup window."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_15" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_16" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for popup window."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CG_17" id="TotalSoft_GV_CG_17" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CG_17_Output" for="TotalSoft_GV_CG_17"></output>
			</td>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine tha radius of teh border for popup window."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CG_18" id="TotalSoft_GV_CG_18" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CG_18_Output" for="TotalSoft_GV_CG_18"></output>
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Title</td>
		</tr>
		<tr>
			<td>Show <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the title in popup window or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_CG_19">
					<label for="TotalSoft_GV_CG_19" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the size of the title in popup."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CG_20" id="TotalSoft_GV_CG_20" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CG_20_Output" for="TotalSoft_GV_CG_20"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the preferred font family for title in popup."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CG_21">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the color of the title text in popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_22" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Text Align <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose text align for title (left, center or right)."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CG_23">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Description</td>
		</tr>
		<tr>
			<td>Show <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the description in popup window or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_GV_CG_24">
					<label for="TotalSoft_GV_CG_24" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Line After Title</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the line width. Line is located after title in popup window."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangeper" id="TotalSoft_GV_CG_25" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CG_25_Output" for="TotalSoft_GV_CG_25"></output>
			</td>
			<td>Height <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the line height. Line is located after title in popup window."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_CG_26" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CG_26_Output" for="TotalSoft_GV_CG_26"></output>
			</td>
		</tr>
		<tr>
			<td>Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the style of the dividing line: None, Solid, Dashed or Dotted."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CG_27">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation between the title and description."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_28" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Close Icon</td>
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety beautifully designed sets in the gallery to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CG_29">
					<option value="none">           None           </option>
					<option value="times">          Times          </option>
					<option value="times-circle">   Times Circle   </option>
					<option value="times-circle-o"> Times Circle O </option>
					<option value="home">           Home           </option>
					<option value="reply">          Reply          </option>
					<option value="reply-all">      Reply All      </option>
					<option value="refresh">        Refresh        </option>
				</select>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the icon to close the popup window."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_30" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the size of the icon for closing the popup."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CG_31" id="TotalSoft_GV_CG_31" min="16" max="72" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CG_31_Output" for="TotalSoft_GV_CG_31"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Link Options</td>
		</tr>
		<tr>
			<td>Border Width <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border width for link."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_CG_32" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CG_32_Output" for="TotalSoft_GV_CG_32"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color which is in the popup window."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_33" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Install the border radius for link."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" id="TotalSoft_GV_CG_34" min="0" max="15" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CG_34_Output" for="TotalSoft_GV_CG_34"></output>
			</td>
			<td>Link Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in link button. When you have created a gallery in each box has URL. If you wrote something in your popup window now you can see it."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_CG_35" id="TotalSoft_GV_CG_35" class="Total_Soft_Select" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define a background color which is intended for the link button."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_36" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the text for the link button."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_37" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for link."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CG_38" id="TotalSoft_GV_CG_38" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CG_38_Output" for="TotalSoft_GV_CG_38"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select font family that will make your gallery more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CG_39">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select hover background color for link button."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_40" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover color for link."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_41" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Icon Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon type for the link button."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CG_42">
					<option value="none">                 None                 </option>
					<option value="external-link">        External Link        </option>
					<option value="external-link-square"> External Link Square </option>
					<option value="location-arrow">       Location Arrow       </option>
					<option value="heart-o">              Heart O              </option>
					<option value="heart">                Heart                </option>
					<option value="heartbeat">            Heartbeat            </option>
					<option value="link">                 Link                 </option>
				</select>
			</td>
			<td>Icon Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the icon size for the icon."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CG_43" id="TotalSoft_GV_CG_43" min="8" max="72" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CG_43_Output" for="TotalSoft_GV_CG_43"></output>
			</td>
		</tr>
		<tr>
			<td>Icon Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color for the link button."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_44" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Icon Position <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the position of icon in link button: After text or Before Text."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CG_45">
					<option value="After">  After Text  </option>
					<option value="Before"> Before Text </option>
				</select>
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Pagination & Load More</td>
		</tr>
		<tr>
			<td>Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the style for pagination from this list."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CG_53">
					<option value="style01"> Style 1 </option>
					<option value="style02"> Style 2 </option>
					<option value="style03"> Style 3 </option>
					<option value="style04"> Style 4 </option>
					<option value="style05"> Style 5 </option>
					<option value="style06"> Style 6 </option>
				</select>
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Install the font size for the pagination or load more text."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_CG_48" id="TotalSoft_GV_CG_48" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_CG_48_Output" for="TotalSoft_GV_CG_48"></output>
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background color for the container of pagination or load more."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_46" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select text color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_47" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Current Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for the selected page number."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_49" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Current Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the text color for the selected page number."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_50" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set hover background color for pagination or load more container."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_51" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select text hover color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_52" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Install the border color bor the items in pagination or load more container."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_CG_54" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Pagination Icon Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select arrows icon types for pagination."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CG_55">
					<option value="none">           None           </option>
					<option value="angle-double">   Angle Double   </option>
					<option value="angle">          Angle          </option>
					<option value="arrow-circle">   Arrow Circle   </option>
					<option value="arrow-circle-o"> Arrow Circle O </option>
					<option value="arrow">          Arrow          </option>
					<option value="caret">          Caret          </option>
					<option value="caret-square-o"> Caret Square O </option>
					<option value="chevron-circle"> Chevron Circle </option>
					<option value="chevron">        Chevron        </option>
					<option value="hand-o">         Hand O         </option>
					<option value="long-arrow">     Long Arrow     </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Load More Icon Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select icon for load more option."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CG_56">
					<option value="none">              None              </option>
					<option value="long-arrow-down">   Long Arrow Down   </option>
					<option value="arrow-circle-down"> Arrow Circle Down </option>
					<option value="caret-down">        Caret Down        </option>
					<option value="angle-down">        Angle Down        </option>
					<option value="hand-o-down">       Hand O Down       </option>
					<option value="spinner">           Spinner           </option>
					<option value="sort-desc">         Sort Desc         </option>
				</select>
			</td>
			<td>Load More Icon Position <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the position of the icon in load more container."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_CG_57">
					<option value="After">  After Text  </option>
					<option value="Before"> Before Text </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Animation Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select effect for showing content."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_CG_58" id="TotalSoft_GV_CG_58">
					<option value="none">            None             </option>
					<option value="">                Animate Height   </option>
					<option value="fadeIn">          Fade In          </option>
					<option value="moveUp">          Move Up          </option>
					<option value="scaleUp">         Scale Up         </option>
					<option value="fallPerspective"> Fall Perspective </option>
					<option value="fly">             Fly              </option>
					<option value="flip">            Flip             </option>
					<option value="helix">           Helix            </option>
					<option value="popUp">           Pop Up           </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_9">
		<tr class='Total_Soft_Titles'>
			<td colspan="4">General Options</td>
		</tr>
		<tr>
			<td>Show Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the effect for showing the gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_SG_01" id="TotalSoft_GV_SG_01">
					<option value="animno">          None             </option>
					<option value="animsc">          Scale            </option>
					<option value="animtr">          Move             </option>					
					<option value="fadeIn">          Fade In          </option>
					<option value="moveUp">          Move Up          </option>
					<option value="scaleUp">         Scale Up         </option>
					<option value="fallPerspective"> Fall Perspective </option>
					<option value="fly">             Fly              </option>
					<option value="flip">            Flip             </option>
					<option value="helix">           Helix            </option>
					<option value="popUp">           Pop Up           </option>
				</select>
			</td>
			<td>Column Count <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select how many videos you want to be in one row."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range" name="TotalSoft_GV_SG_02" id="TotalSoft_GV_SG_02" min="1" max="8" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_SG_02_Output" for="TotalSoft_GV_SG_02"></output>
			</td>
		</tr>
		<tr>
			<td>Place Between <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the distance between the videos."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_SG_03" id="TotalSoft_GV_SG_03" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_SG_03_Output" for="TotalSoft_GV_SG_03"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Title Options</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="This function is for the main title. You can select font size."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_SG_04" id="TotalSoft_GV_SG_04" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_SG_04_Output" for="TotalSoft_GV_SG_04"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select that font family that will make your gallery more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_SG_05" id="TotalSoft_GV_SG_05">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Text Align <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose text to align for title (left, center or right)."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_SG_06" id="TotalSoft_GV_SG_06">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the color for title."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_07" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Background Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select background type for title."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_SG_08">
					<option value='transparent'> Transparent </option>
					<option value='color'>       Color       </option>
					<option value='gradient1'>   Gradient 1  </option>
					<option value='gradient2'>   Gradient 2  </option>
					<option value='gradient3'>   Gradient 3  </option>
					<option value='gradient4'>   Gradient 4  </option>
					<option value='gradient5'>   Gradient 5  </option>
					<option value='gradient6'>   Gradient 6  </option>
					<option value='gradient7'>   Gradient 7  </option>
					<option value='gradient8'>   Gradient 8  </option>
					<option value='gradient9'>   Gradient 9  </option>
					<option value='gradient10'>  Gradient 10 </option>
					<option value='gradient11'>  Gradient 11 </option>
					<option value='gradient12'>  Gradient 12 </option>
					<option value='gradient13'>  Gradient 13 </option>
				</select>
			</td>
			<td>Background Color 1 <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the color for background."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_09" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color 2 <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set second color for making gradient in background."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_10" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Mode</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the border color for popup mode."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_12" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for opening popup window."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_SG_14" id="TotalSoft_GV_SG_14" class="Total_Soft_Select" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set background color for popup mode."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_15" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the text color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_16" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select that font family that will make your gallery more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_SG_17" id="TotalSoft_GV_SG_17">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font size for the text."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_SG_18" id="TotalSoft_GV_SG_18" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_SG_18_Output" for="TotalSoft_GV_SG_18"></output>
			</td>
		</tr>
		<tr>
			<td>Hover Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose hover effect for popup mode."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_SG_19">
					<option value='none'>     None                </option>
					<option value='effect01'> Border Fade         </option>
					<option value='effect02'> Overline Grow       </option>
					<option value='effect03'> Background Grow     </option>
					<option value='effect04'> Crosshair           </option>
					<option value='effect05'> Brackets            </option>
					<option value='effect06'> Border Slides Up    </option>
					<option value='effect07'> Three Circles       </option>
					<option value='effect08'> Raise From Flat     </option>
					<option value='effect09'> Flatten From Raised </option>
					<option value='effect10'> Lift Sides          </option>
					<option value='effect11'> Flatten Sides       </option>
					<option value='effect12'> Curl Right Corner   </option>
					<option value='effect13'> Curl Right Side     </option>
					<option value='effect14'> Curl Bottom Corners </option>
					<option value='effect15'> Icon Hiding         </option>
					<option value='effect16'> Icon Sliding        </option>
					<option value='effect17'> Icon From Bottom    </option>
					<option value='effect18'> Icon In Center      </option>
					<option value='effect19'> Icon Sliding Radius </option>
				</select>
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set hover background color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_20" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set hover color for popup mode text."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_21" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Icon Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select icon type for popup."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_SG_22">
					<option value="none">         None         </option>
					<option value="file-video-o"> File Video O </option>
					<option value="video-camera"> Video Camera </option>
					<option value="camera-retro"> Camera Retro </option>
					<option value="eye">          Eye          </option>
					<option value="film">         Film         </option>
					<option value="youtube-play"> YouTube Play </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Icon Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the icon size for icon."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_SG_23" id="TotalSoft_GV_SG_23" min="8" max="72" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_SG_23_Output" for="TotalSoft_GV_SG_23"></output>
			</td>
			<td>Icon Position <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select icon position in container."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_SG_24" id="TotalSoft_GV_SG_24">
					<option value='after'>  After Text  </option>
					<option value='before'> Before Text </option>
				</select>
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Options</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select border width for popup window."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_SG_25" id="TotalSoft_GV_SG_25" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_SG_25_Output" for="TotalSoft_GV_SG_25"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the border color for popup window."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_26" class="Total_Soft_VGallery_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set background color for popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_27" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Title</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select font size for title in popup window."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_SG_28" id="TotalSoft_GV_SG_28" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_SG_28_Output" for="TotalSoft_GV_SG_28"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select font family for the title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_SG_29" id="TotalSoft_GV_SG_29">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the title color in popup."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_30" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Line After Title</td>
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose width for separation line the after title."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangeper" name="TotalSoft_GV_SG_31" id="TotalSoft_GV_SG_31" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_SG_31_Output" for="TotalSoft_GV_SG_31"></output>
			</td>
			<td>Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the line height. Line is located after title in popup window."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_SG_32" id="TotalSoft_GV_SG_32" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_SG_32_Output" for="TotalSoft_GV_SG_32"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose color for separation line the after title."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_33" class="Total_Soft_VGallery_Color" value="">
			</td>
			<td>Align <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select position for separation line."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_SG_40" id="TotalSoft_GV_SG_40">
					<option value='left'>   Left   </option>
					<option value='right'>  Right  </option>
					<option value='center'> Center </option>
				</select>
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Link Options</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select border width for link container in popup window."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_SG_41" id="TotalSoft_GV_SG_41" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_SG_41_Output" for="TotalSoft_GV_SG_41"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the border color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_42" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Install the border radius for gallery link."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_SG_43" id="TotalSoft_GV_SG_43" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_SG_43_Output" for="TotalSoft_GV_SG_43"></output>
			</td>
			<td>Link Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in link button. When you have created a gallery in each box has URL."></i></td>
			<td>
				<input type="text" name="TotalSoft_GV_SG_44" id="TotalSoft_GV_SG_44" class="Total_Soft_Select" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define a background color which is intended for the link button."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_45" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the text for the link button."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_46" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Position <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select link button position in title & description area."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_SG_47" id="TotalSoft_GV_SG_47">
					<option value='beforetitle'> Before Title      </option>
					<option value='aftertitle'>  After Title       </option>
					<option value='afterline'>   After Line        </option>
					<option value='afterdesc'>   After Description </option>
				</select>
			</td>
			<td>Alignment <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select link button alignment in container."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_SG_48" id="TotalSoft_GV_SG_48">
					<option value='left'>   Left   </option>
					<option value='right'>  Right  </option>
					<option value='center'> Center </option>
					<option value='full'>   Full   </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select font family that will make your gallery more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_SG_49" id="TotalSoft_GV_SG_49">
					<?php for($i = 0; $i < count($TotalSoftFontGCount); $i++) { ?>
						<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
					<?php } ?>
				</select>
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for link."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_SG_50" id="TotalSoft_GV_SG_50" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_SG_50_Output" for="TotalSoft_GV_SG_50"></output>
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select hover background color for link button."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_51" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover color for link."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_52" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Icon Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon type for the link button."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_SG_53">
					<option value="none">                 None                 </option>
					<option value="external-link">        External Link        </option>
					<option value="external-link-square"> External Link Square </option>
					<option value="link">                 Link                 </option>
					<option value="location-arrow">       Location Arrow       </option>
					<option value="heart-o">              Heart O              </option>
					<option value="heart">                Heart                </option>
					<option value="heartbeat">            Heartbeat            </option>
				</select>
			</td>
			<td>Icon Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the icon size for the icon."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_SG_54" id="TotalSoft_GV_SG_54" min="8" max="72" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_SG_54_Output" for="TotalSoft_GV_SG_54"></output>
			</td>
		</tr>
		<tr>
			<td>Icon Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color for the link button."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_55" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Icon Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the icon hover color for link button."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_56" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Icon Position <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the position of icon in link button: After text or Before Text."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_GV_SG_57" id="TotalSoft_GV_SG_57">
					<option value='after'>  After  </option>
					<option value='before'> Before </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Close Icon</td>
		</tr>
		<tr>
			<td>Icon Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety beautifully designed sets in the gallery to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_SG_58">
					<option value="times">          Times          </option>
					<option value="times-circle">   Times Circle   </option>
					<option value="times-circle-o"> Times Circle O </option>
					<option value="home">           Home           </option>
					<option value="reply">          Reply          </option>
					<option value="reply-all">      Reply All      </option>
					<option value="refresh">        Refresh        </option>
				</select>
			</td>
			<td>Icon Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the size of the icon for closing the popup."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_SG_59" id="TotalSoft_GV_SG_59" min="8" max="72" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_SG_59_Output" for="TotalSoft_GV_SG_59"></output>
			</td>
		</tr>
		<tr>
			<td>Icon Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the icon to close the popup window."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_60" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Pagination & Load More</td>
		</tr>
		<tr>
			<td>Style <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the style for pagination from this list."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_SG_61">
					<option value="style01"> Style 1 </option>
					<option value="style02"> Style 2 </option>
					<option value="style03"> Style 3 </option>
					<option value="style04"> Style 4 </option>
					<option value="style05"> Style 5 </option>
					<option value="style06"> Style 6 </option>
				</select>
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Install the font size for the pagination or load more text."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_GV_SG_62" id="TotalSoft_GV_SG_62" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_GV_SG_62_Output" for="TotalSoft_GV_SG_62"></output>
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background color for the container of pagination or load more."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_63" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select text color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_64" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Current Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for the selected page number."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_65" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Current Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the text color for the selected page number."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_66" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set hover background color for pagination or load more container."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_67" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select text hover color."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_68" class="Total_Soft_VGallery_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Install the border color bor the items in pagination or load more container."></i></td>
			<td>
				<input type="text" id="TotalSoft_GV_SG_69" class="Total_Soft_VGallery_Color1" value="">
			</td>
			<td>Pagination Icon Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select arrows icon types for pagination."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_SG_70">
					<option value="none">           None           </option>
					<option value="angle-double">   Angle Double   </option>
					<option value="angle">          Angle          </option>
					<option value="arrow-circle">   Arrow Circle   </option>
					<option value="arrow-circle-o"> Arrow Circle O </option>
					<option value="arrow">          Arrow          </option>
					<option value="caret">          Caret          </option>
					<option value="caret-square-o"> Caret Square O </option>
					<option value="chevron-circle"> Chevron Circle </option>
					<option value="chevron">        Chevron        </option>
					<option value="hand-o">         Hand O         </option>
					<option value="long-arrow">     Long Arrow     </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Load More Icon Type <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select icon for load more option."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_SG_71">
					<option value="none">              None              </option>
					<option value="long-arrow-down">   Long Arrow Down   </option>
					<option value="arrow-circle-down"> Arrow Circle Down </option>
					<option value="caret-down">        Caret Down        </option>
					<option value="angle-down">        Angle Down        </option>
					<option value="hand-o-down">       Hand O Down       </option>
					<option value="spinner">           Spinner           </option>
					<option value="sort-desc">         Sort Desc         </option>
				</select>
			</td>
			<td>Load More Icon Position <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the position of the icon in load more container."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_GV_SG_72">
					<option value="After">  After Text  </option>
					<option value="Before"> Before Text </option>
				</select>
			</td>
		</tr>
	</table>
</form>