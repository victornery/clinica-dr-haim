// Admin Page
function Total_Soft_Gallery_Video_AMD2_But1(Gallery_Video_ID)
{
	jQuery('.Total_Soft_Gallery_Video_AMD2').hide(500);
	jQuery('.Total_Soft_Gallery_VideoAMMTable').hide(500);
	jQuery('.Total_Soft_Gallery_VideoAMOTable').hide(500);
	jQuery('.Total_Soft_Gallery_Video_Save').show(500);
	jQuery('.Total_Soft_Gallery_Video_Update').hide(500);
	jQuery('.Total_Soft_Gallery_Video_ID').html('[Total_Soft_Gallery_Video id="'+Gallery_Video_ID+'"]');
	jQuery('.Total_Soft_Gallery_Video_TID').html('&lt;?php echo do_shortcode(&#039;[Total_Soft_Gallery_Video id="'+Gallery_Video_ID+'"]&#039;);?&gt');
	Total_Soft_GVideo_Editor();
	setTimeout(function(){
		jQuery('.Total_Soft_Gallery_Video_AMD3').show(500);
		jQuery('.Total_Soft_AMTable').show(500);
		jQuery('.Total_Soft_AMVideoTable').show(500);
		jQuery('.Total_Soft_AMVideoTable1').show(500);
		jQuery('.Total_Soft_GV_AMShortTable').show(500);
	},500)
}
function TotalSoft_Reload()
{
	location.reload();
}
function TotalSoftGallery_Video_Show()
{
	var TotalSoftGallery_Video_ShowType=jQuery('#TotalSoftGallery_Video_ShowType').val();
	if(TotalSoftGallery_Video_ShowType=='All')
	{
		jQuery('#TotalSoftGallery_Video_PerPage').hide(500);
		jQuery('#TotalSoftGallery_LoadMore').hide(500);
	}
	else if(TotalSoftGallery_Video_ShowType=='Pagination')
	{
		jQuery('#TotalSoftGallery_LoadMore').hide(500);
		setTimeout(function(){
			jQuery('#TotalSoftGallery_Video_PerPage').show(500);
		},500)
	}
	else
	{
		jQuery('#TotalSoftGallery_Video_PerPage').show(500);
		jQuery('#TotalSoftGallery_LoadMore').show(500);
	}
}
function TotalSoftGallery_Video_URL_Clicked()
{
	var nIntervId = setInterval(function(){
		var code = jQuery('#TotalSoftGallery_Video_URL_1').val();
		if(code.indexOf('www.youtube.com/')>0)
		{
			if(code.indexOf('list')>0 || code.indexOf('index')>0)
			{
				if(code.indexOf('embed')>0)
				{
					var TotalSoftCodes1=code.split('[embed]');
					var TotalSoftCodes2=TotalSoftCodes1[1].split('[/embed]');
					var TotalSoftCodes3=TotalSoftCodes2[0].split('www.youtube.com/watch?v=');
					if(TotalSoftCodes3[1].length != 11) { TotalSoftCodes3[1] = TotalSoftCodes3[1].substr(0,11); }

					jQuery('#TotalSoftGallery_Video_URL_2').val('https://www.youtube.com/embed/'+TotalSoftCodes3[1]);
					jQuery('#TotalSoftGallery_VideoIm_URL_2').val('http://img.youtube.com/vi/'+TotalSoftCodes3[1]+'/mqdefault.jpg');
					jQuery('#TotalSoftGallery_Video_Video_1').val('https://www.youtube.com/watch?v='+TotalSoftCodes3[1]);

					if(jQuery('#TotalSoftGallery_Video_URL_2').val().length>0){ clearInterval(nIntervId); jQuery('#TotalSoftGallery_Video_URL_1').val(''); }
				}
				else
				{
					var TotalSoftCodes1 = code.split('<a href="https://www.youtube.com/');
					var TotalSoftCodes2= TotalSoftCodes1[1].split("=");
					var TotalSoftCodeSrc = TotalSoftCodes2[1].split('&');

					jQuery('#TotalSoftGallery_Video_URL_2').val('https://www.youtube.com/embed/'+TotalSoftCodeSrc[0]);
					jQuery('#TotalSoftGallery_VideoIm_URL_2').val('http://img.youtube.com/vi/'+TotalSoftCodeSrc[0]+'/mqdefault.jpg');
					jQuery('#TotalSoftGallery_Video_Video_1').val('https://www.youtube.com/watch?v='+TotalSoftCodeSrc[0]);

					if(jQuery('#TotalSoftGallery_Video_URL_2').val().length>0){ clearInterval(nIntervId); jQuery('#TotalSoftGallery_Video_URL_1').val(''); }
				}
			}
			else if(code.indexOf('embed')>0)
			{
				var TotalSoftCodes1=code.split('[embed]');
				var TotalSoftCodes2=TotalSoftCodes1[1].split('[/embed]');
				if(TotalSoftCodes2[0].indexOf('watch?')>0)
				{
					var TotalSoftCodes3=TotalSoftCodes2[0].split('=');
					if(TotalSoftCodes3[1].length != 11) { TotalSoftCodes3[1] = TotalSoftCodes3[1].substr(0,11); }
					
					jQuery('#TotalSoftGallery_Video_URL_2').val('https://www.youtube.com/embed/'+TotalSoftCodes3[1]);
					jQuery('#TotalSoftGallery_VideoIm_URL_2').val('http://img.youtube.com/vi/'+TotalSoftCodes3[1]+'/mqdefault.jpg');
					jQuery('#TotalSoftGallery_Video_Video_1').val('https://www.youtube.com/watch?v='+TotalSoftCodes3[1]);

					if(jQuery('#TotalSoftGallery_Video_URL_2').val().length>0){ clearInterval(nIntervId); jQuery('#TotalSoftGallery_Video_URL_1').val(''); }
				}
				else if(TotalSoftCodes2[0].indexOf('/embed/')>0)
				{
					var TotalSoftCodes3=TotalSoftCodes2[0].split('/embed/');
					if(TotalSoftCodes3[1].length != 11) { TotalSoftCodes3[1] = TotalSoftCodes3[1].substr(0,11); }

					jQuery('#TotalSoftGallery_Video_URL_2').val('https://www.youtube.com/embed/'+TotalSoftCodes3[1]);
					jQuery('#TotalSoftGallery_VideoIm_URL_2').val('http://img.youtube.com/vi/'+TotalSoftCodes3[1]+'/mqdefault.jpg');
					jQuery('#TotalSoftGallery_Video_Video_1').val('https://www.youtube.com/watch?v='+TotalSoftCodes3[1]);

					if(jQuery('#TotalSoftGallery_Video_URL_2').val().length>0){ clearInterval(nIntervId); jQuery('#TotalSoftGallery_Video_URL_1').val(''); }
				}
				else
				{
					var TotalSoftCodes2 = TotalSoftCodes1[1].split('=');
					var TotalSoftCodeSrc = TotalSoftCodes2[1].split('">https://');
					if(TotalSoftCodeSrc[0].length != 11) { TotalSoftCodeSrc[0] = TotalSoftCodeSrc[0].substr(0,11); }

					jQuery('#TotalSoftGallery_Video_URL_2').val('https://www.youtube.com/embed/'+TotalSoftCodeSrc[0]);
					jQuery('#TotalSoftGallery_VideoIm_URL_2').val('http://img.youtube.com/vi/'+TotalSoftCodeSrc[0]+'/mqdefault.jpg');
					jQuery('#TotalSoftGallery_Video_Video_1').val('https://www.youtube.com/watch?v='+TotalSoftCodeSrc[0]);

					if(jQuery('#TotalSoftGallery_Video_URL_2').val().length>0){ clearInterval(nIntervId); jQuery('#TotalSoftGallery_Video_URL_1').val(''); }
				}
			}
			else
			{
				var TotalSoftCodes1 = code.split('<a href="https://www.youtube.com/');
				var TotalSoftCodes2 = TotalSoftCodes1[1].split('=');

				if(TotalSoftCodes2.length >= 5) 
				{
					var TotalSoftCodeSrc = TotalSoftCodes2[3].split('&');
				}
				else
				{
					var TotalSoftCodeSrc = TotalSoftCodes2[1].split('">https://');
				}

				jQuery('#TotalSoftGallery_Video_URL_2').val('https://www.youtube.com/embed/'+TotalSoftCodeSrc[0]);
				jQuery('#TotalSoftGallery_VideoIm_URL_2').val('http://img.youtube.com/vi/'+TotalSoftCodeSrc[0]+'/mqdefault.jpg');
				jQuery('#TotalSoftGallery_Video_Video_1').val('https://www.youtube.com/watch?v='+TotalSoftCodeSrc[0]);

				if(jQuery('#TotalSoftGallery_Video_URL_2').val().length>0){ clearInterval(nIntervId); jQuery('#TotalSoftGallery_Video_URL_1').val(''); }
			}
		}
		else if(code.indexOf('https://youtu.be/')>0)
		{
			if(code.indexOf('embed')>0)
			{
				var TotalSoftCodes1=code.split('[embed]');
				var TotalSoftCodes2=TotalSoftCodes1[1].split('[/embed]');
				var TotalSoftCodes3=TotalSoftCodes2[0].split('youtu.be/');
				if(TotalSoftCodes3[1].length != 11) { TotalSoftCodes3[1] = TotalSoftCodes3[1].substr(0,11); }

				jQuery('#TotalSoftGallery_Video_URL_2').val('https://www.youtube.com/embed/'+TotalSoftCodes3[1]);
				jQuery('#TotalSoftGallery_VideoIm_URL_2').val('http://img.youtube.com/vi/'+TotalSoftCodes3[1]+'/mqdefault.jpg');
				jQuery('#TotalSoftGallery_Video_Video_1').val('https://www.youtube.com/watch?v='+TotalSoftCodes3[1]);

				if(jQuery('#TotalSoftGallery_Video_URL_2').val().length>0){ clearInterval(nIntervId); jQuery('#TotalSoftGallery_Video_URL_1').val(''); }
			}
			else
			{
				var TotalSoftCodes1 = code.split('<a href="https://youtu.be/'); 
				var TotalSoftCodeSrc = TotalSoftCodes1[1].split('">https://');
				if(TotalSoftCodeSrc[0].length != 11) { TotalSoftCodeSrc[0] = TotalSoftCodeSrc[0].substr(0,11); }
				jQuery('#TotalSoftGallery_Video_URL_2').val('https://www.youtube.com/embed/'+TotalSoftCodeSrc[0]);
				jQuery('#TotalSoftGallery_VideoIm_URL_2').val('http://img.youtube.com/vi/'+TotalSoftCodeSrc[0]+'/mqdefault.jpg');
				jQuery('#TotalSoftGallery_Video_Video_1').val('https://www.youtube.com/watch?v='+TotalSoftCodeSrc[0]);

				if(jQuery('#TotalSoftGallery_Video_URL_2').val().length>0){ clearInterval(nIntervId); jQuery('#TotalSoftGallery_Video_URL_1').val(''); }
			}
		}
		else if(code.indexOf('vimeo.com')>0)
		{
			if(code.indexOf('embed')>0)
			{
				var s1=code.split('[embed]https://vimeo.com/');
				var src=s1[1].split('[/embed]');
				if(src[0].length>9)
				{
					var real_src=src[0].split('/');
					src[0]=real_src[2];
				}
				jQuery('#TotalSoftGallery_Video_URL_2').val('https://player.vimeo.com/video/'+src[0]);
				jQuery('#TotalSoftGallery_Video_Video_1').val('https://vimeo.com/'+src[0]);

				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'TSoft_Vimeo_Video_Image', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#TotalSoftGallery_VideoIm_URL_2').val(response);
					if(jQuery('#TotalSoftGallery_Video_URL_2').val().length>0){ clearInterval(nIntervId); jQuery('#TotalSoftGallery_Video_URL_1').val(''); }
				});
			}
			else if(code.indexOf('player.vimeo') > 0)
			{
				var s1 = code.split('<a href="https://player.vimeo.com/video/'); 
				var src = s1[1].split('">https://');
				if(src[0].length>9)
				{
					var real_src=src[0].split('/');
					src[0]=real_src[2];
				}
				jQuery('#TotalSoftGallery_Video_URL_2').val('https://player.vimeo.com/video/'+src[0]);
				jQuery('#TotalSoftGallery_Video_Video_1').val('https://vimeo.com/'+src[0]);

				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'TSoft_Vimeo_Video_Image', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#TotalSoftGallery_VideoIm_URL_2').val(response);
					if(jQuery('#TotalSoftGallery_Video_URL_2').val().length>0){ clearInterval(nIntervId); jQuery('#TotalSoftGallery_Video_URL_1').val(''); }
				});
			}
			else
			{
				var s1 = code.split('<a href="https://vimeo.com/'); 
				var src = s1[1].split('">https://');
				if(src[0].length>9)
				{
					var real_src=src[0].split('/');
					src[0]=real_src[2];
				}
				jQuery('#TotalSoftGallery_Video_URL_2').val('https://player.vimeo.com/video/'+src[0]);
				jQuery('#TotalSoftGallery_Video_Video_1').val('https://vimeo.com/'+src[0]);

				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'TSoft_Vimeo_Video_Image', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#TotalSoftGallery_VideoIm_URL_2').val(response);
					if(jQuery('#TotalSoftGallery_Video_URL_2').val().length>0){ clearInterval(nIntervId); jQuery('#TotalSoftGallery_Video_URL_1').val(''); }
				});
			}
		}
		else if(code.indexOf('wistia.com')>0)
		{
			if(code.indexOf('[/embed]')>0)
			{
				var TotalSoftCodes0=code.split('[embed]');
				var TotalSoftCodes1=TotalSoftCodes0[1].split('[/embed]');
				var TotalSoftCodes2=TotalSoftCodes1[0].split('/');
				var TotalSoftCodes3=TotalSoftCodes2[TotalSoftCodes2.length-1];

				jQuery('#TotalSoftGallery_Video_URL_2').val('//fast.wistia.net/embed/iframe/'+TotalSoftCodes3);
				jQuery('#TotalSoftGallery_Video_Video_1').val(TotalSoftCodes1[0]);
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'TSoft_Wistia_Video_Image', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: TotalSoftCodes1[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#TotalSoftGallery_VideoIm_URL_2').val(response);
					if(jQuery('#TotalSoftGallery_Video_URL_2').val().length>0){ clearInterval(nIntervId); jQuery('#TotalSoftGallery_Video_URL_1').val(''); }
				});
			}
			else
			{
				var TotalSoftCodes1 = code.split('<a href="');
				var TotalSoftCodes2 = TotalSoftCodes1[1].split('">https://');
				var TotalSoftCodeSrc = TotalSoftCodes2[0].split('/');
				var TotalSoftCodeSrcRe = TotalSoftCodeSrc[TotalSoftCodeSrc.length-1];

				jQuery('#TotalSoftGallery_Video_URL_2').val('//fast.wistia.net/embed/iframe/'+TotalSoftCodeSrcRe);
				jQuery('#TotalSoftGallery_Video_Video_1').val(TotalSoftCodes2[0]);

				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'TSoft_Wistia_Video_Image', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: TotalSoftCodes2[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#TotalSoftGallery_VideoIm_URL_2').val(response);
					if(jQuery('#TotalSoftGallery_Video_URL_2').val().length>0){ clearInterval(nIntervId); jQuery('#TotalSoftGallery_Video_URL_1').val(''); }
				});
			}
		}
		else if(code.indexOf('.mp4')>0)
		{
			if(code.indexOf('embed')>0)
			{
				var TotalSoftCodes1=code.split('[embed]');
				var TotalSoftCodeSrc=TotalSoftCodes1[1].split('[/embed]');
				jQuery('#TotalSoftGallery_Video_URL_2').val(TotalSoftCodeSrc[0]);
				jQuery('#TotalSoftGallery_Video_Video_1').val(TotalSoftCodeSrc[0]);
				if(jQuery('#TotalSoftGallery_Video_Video_1').val().length>0){ clearInterval(nIntervId); jQuery('#TotalSoftGallery_Video_URL_1').val(''); }
			}
			else if(code.indexOf('video')>0)
			{
				var TotalSoftCodes1 = code.split('mp4="');
				var TotalSoftCodeSrc = TotalSoftCodes1[1].split('"]');
				jQuery('#TotalSoftGallery_Video_URL_2').val(TotalSoftCodeSrc[0]);
				jQuery('#TotalSoftGallery_Video_Video_1').val(TotalSoftCodeSrc[0]);
				if(jQuery('#TotalSoftGallery_Video_Video_1').val().length>0){ clearInterval(nIntervId); jQuery('#TotalSoftGallery_Video_URL_1').val(''); }
			}
			else
			{
				var TotalSoftCodes1 = code.split('<a href="');
				var TotalSoftCodeSrc = TotalSoftCodes1[1].split('">');
				jQuery('#TotalSoftGallery_Video_URL_2').val(TotalSoftCodeSrc[0]);
				jQuery('#TotalSoftGallery_Video_Video_1').val(TotalSoftCodeSrc[0]);
				if(jQuery('#TotalSoftGallery_Video_Video_1').val().length>0){ clearInterval(nIntervId); jQuery('#TotalSoftGallery_Video_URL_1').val(''); }
			}
		}
	},100)
}
function TotalSoftGallery_Image_URL_Clicked()
{
	var nIntervId = setInterval(function(){
		var code = jQuery('#TotalSoftGallery_Image_URL_1').val();
		if(code.indexOf('img')>0)
		{
			var s=code.split('src="');
			var src=s[1].split('"');
			jQuery('#TotalSoftGallery_VideoIm_URL_2').val(src[0]);
			if(jQuery('#TotalSoftGallery_VideoIm_URL_2').val().length>0){ jQuery('#TotalSoftGallery_Image_URL_1').val(''); clearInterval(nIntervId); }
		}
	},100)
}
function Total_Soft_Gallery_Video_Res_Vid()
{
	jQuery('#TotalSoftGallery_Video_Title').val('');
	jQuery('#TotalSoftGallery_Video_URL_1').val('');
	jQuery('#TotalSoftGallery_Video_Video_1').val('');
	jQuery('#TotalSoftGallery_Video_URL_2').val('');
	jQuery('#TotalSoftGallery_VideoIm_URL_2').val('');

	tinyMCE.get('TotalSoftGallery_Video_Desc').setContent('');
	jQuery('#TotalSoftGallery_Video_Link').val('');
	jQuery('#TotalSoftGallery_Video_ONT').attr('checked',true);
	jQuery('#Total_Soft_Gallery_Video_Upd').hide(500);
	jQuery('#Total_Soft_Gallery_Video_Sav').show(500);
}
function Total_Soft_Gallery_Video_Save_Vid()
{
	var TotalSoftGVHidNum=jQuery('#TotalSoftGVHidNum').val();
	var TotalSoftGallery_Video_Title=jQuery('#TotalSoftGallery_Video_Title').val();
	var TotalSoftGallery_Video_URL_2=jQuery('#TotalSoftGallery_Video_URL_2').val();
	var TotalSoftGallery_Video_Video_1=jQuery('#TotalSoftGallery_Video_Video_1').val();
	var TotalSoftGallery_VideoIm_URL_2=jQuery('#TotalSoftGallery_VideoIm_URL_2').val();
	var TotalSoftGallery_Video_Desc=tinyMCE.get('TotalSoftGallery_Video_Desc').getContent();
	var TotalSoftGallery_Video_Link=jQuery('#TotalSoftGallery_Video_Link').val();
	var TotalSoftGallery_Video_ONT=jQuery('#TotalSoftGallery_Video_ONT').attr('checked');
	if(TotalSoftGallery_Video_ONT=='checked')
	{ TotalSoftGallery_Video_ONT='true'; }
	else
	{ TotalSoftGallery_Video_ONT='false'; }

	if(TotalSoftGVHidNum=='0')
	{
		jQuery('#TotalSoftGallery_VideoUl').html('<li id="TotalSoftGallery_VideoLi_1"><table class="Total_Soft_AMVideoTable1 Total_Soft_AMVideoTable2"><tr><td>1</td><td><input type="text" readonly value="'+TotalSoftGallery_Video_Title+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftGallery_Video_VT_1" name="TotalSoftGallery_Video_VT_1"><input type="text" style="display:none;" class="TotalSoftGallery_Video_Desc" id="TotalSoftGallery_Video_VDesc_1" name="TotalSoftGallery_Video_VDesc_1" value=""><input type="text" style="display:none;" class="TotalSoftGallery_Video_Link" id="TotalSoftGallery_Video_VLink_1" name="TotalSoftGallery_Video_VLink_1" value="'+TotalSoftGallery_Video_Link+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_Video" id="TotalSoftGallery_Video_RVideo_1" name="TotalSoftGallery_Video_RVideo_1" value="'+TotalSoftGallery_Video_Video_1+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_ONT" id="TotalSoftGallery_Video_VONT_1" name="TotalSoftGallery_Video_VONT_1" value="'+TotalSoftGallery_Video_ONT+'"></td><td><input type="text" readonly value="'+TotalSoftGallery_Video_URL_2+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftGallery_Video_VURL_1" name="TotalSoftGallery_Video_VURL_1"></td><td><img class="TotalSoftGallery_VideoImage" src="'+TotalSoftGallery_VideoIm_URL_2+'"><input type="text" readonly value="'+TotalSoftGallery_VideoIm_URL_2+'" class="Total_Soft_Select Total_Soft_Select1" style="display:none;" id="TotalSoftGallery_Video_IURL_1" name="TotalSoftGallery_Video_IURL_1"></td><td><i class="Total_Soft_icon totalsoft totalsoft-file-text" onclick="TotalSoftGV_Video_Copy(1)"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-pencil" onclick="TotalSoftGV_Video_Edit(1)"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftGV_Video_Del(1)"></i><span class="Total_Soft_GVideo_Del_Span"><i class="Total_Soft_GVideo_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_GVideo_Del_Vd_Yes(1)"></i><i class="Total_Soft_GVideo_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_GVideo_Del_Vd_No(1)"></i></span></td></tr></table></li>');
	}
	else
	{
		if(TotalSoftGVHidNum%2==1)
		{
			jQuery('<li id="TotalSoftGallery_VideoLi_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'"><table class="Total_Soft_AMVideoTable1 Total_Soft_AMVideoTable3"><tr><td>'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'</td><td><input type="text" readonly value="'+TotalSoftGallery_Video_Title+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftGallery_Video_VT_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_VT_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_Desc" id="TotalSoftGallery_Video_VDesc_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_VDesc_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" value=""><input type="text" style="display:none;" class="TotalSoftGallery_Video_Link" id="TotalSoftGallery_Video_VLink_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_VLink_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" value="'+TotalSoftGallery_Video_Link+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_Video" id="TotalSoftGallery_Video_RVideo_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_RVideo_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" value="'+TotalSoftGallery_Video_Video_1+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_ONT" id="TotalSoftGallery_Video_VONT_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_VONT_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" value="'+TotalSoftGallery_Video_ONT+'"></td><td><input type="text" readonly value="'+TotalSoftGallery_Video_URL_2+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftGallery_Video_VURL_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_VURL_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'"></td><td><img class="TotalSoftGallery_VideoImage" src="'+TotalSoftGallery_VideoIm_URL_2+'"><input type="text" readonly value="'+TotalSoftGallery_VideoIm_URL_2+'" class="Total_Soft_Select Total_Soft_Select1" style="display:none;" id="TotalSoftGallery_Video_IURL_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_IURL_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'"></td><td><i class="Total_Soft_icon totalsoft totalsoft-file-text" onclick="TotalSoftGV_Video_Copy('+parseInt(parseInt(TotalSoftGVHidNum)+1)+')"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-pencil" onclick="TotalSoftGV_Video_Edit('+parseInt(parseInt(TotalSoftGVHidNum)+1)+')"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftGV_Video_Del('+parseInt(parseInt(TotalSoftGVHidNum)+1)+')"></i><span class="Total_Soft_GVideo_Del_Span"><i class="Total_Soft_GVideo_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_GVideo_Del_Vd_Yes('+parseInt(parseInt(TotalSoftGVHidNum)+1)+')"></i><i class="Total_Soft_GVideo_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_GVideo_Del_Vd_No('+parseInt(parseInt(TotalSoftGVHidNum)+1)+')"></i></span></td></tr></table></li>').insertAfter('#TotalSoftGallery_VideoUl li:nth-child('+TotalSoftGVHidNum+')');
		}
		else
		{
			jQuery('<li id="TotalSoftGallery_VideoLi_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'"><table class="Total_Soft_AMVideoTable1 Total_Soft_AMVideoTable2"><tr><td>'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'</td><td><input type="text" readonly value="'+TotalSoftGallery_Video_Title+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftGallery_Video_VT_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_VT_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_Desc" id="TotalSoftGallery_Video_VDesc_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_VDesc_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" value=""><input type="text" style="display:none;" class="TotalSoftGallery_Video_Link" id="TotalSoftGallery_Video_VLink_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_VLink_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" value="'+TotalSoftGallery_Video_Link+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_Video" id="TotalSoftGallery_Video_RVideo_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_RVideo_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" value="'+TotalSoftGallery_Video_Video_1+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_ONT" id="TotalSoftGallery_Video_VONT_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_VONT_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" value="'+TotalSoftGallery_Video_ONT+'"></td><td><input type="text" readonly value="'+TotalSoftGallery_Video_URL_2+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftGallery_Video_VURL_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_VURL_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'"></td><td><img class="TotalSoftGallery_VideoImage" src="'+TotalSoftGallery_VideoIm_URL_2+'"><input type="text" readonly value="'+TotalSoftGallery_VideoIm_URL_2+'" class="Total_Soft_Select Total_Soft_Select1" style="display:none;" id="TotalSoftGallery_Video_IURL_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_IURL_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'"></td><td><i class="Total_Soft_icon totalsoft totalsoft-file-text" onclick="TotalSoftGV_Video_Copy('+parseInt(parseInt(TotalSoftGVHidNum)+1)+')"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-pencil" onclick="TotalSoftGV_Video_Edit('+parseInt(parseInt(TotalSoftGVHidNum)+1)+')"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftGV_Video_Del('+parseInt(parseInt(TotalSoftGVHidNum)+1)+')"></i><span class="Total_Soft_GVideo_Del_Span"><i class="Total_Soft_GVideo_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_GVideo_Del_Vd_Yes('+parseInt(parseInt(TotalSoftGVHidNum)+1)+')"></i><i class="Total_Soft_GVideo_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_GVideo_Del_Vd_No('+parseInt(parseInt(TotalSoftGVHidNum)+1)+')"></i></span></td></tr></table></li>').insertAfter('#TotalSoftGallery_VideoUl li:nth-child('+TotalSoftGVHidNum+')');
		}
	}
	jQuery('#TotalSoftGallery_Video_VDesc_'+parseInt(parseInt(TotalSoftGVHidNum)+1)).val(TotalSoftGallery_Video_Desc);
	jQuery('#TotalSoftGVHidNum').val(parseInt(parseInt(TotalSoftGVHidNum)+1));
	
	Total_Soft_Gallery_Video_Res_Vid();
}
function TotalSoftGV_Video_Copy(TotalSoftGV_Video_Li_ID)
{
	var TotalSoftGVHidNum = jQuery('#TotalSoftGVHidNum').val();
	var TotalSoftGallery_Video_VT    =jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.Total_Soft_Select').val();
	var TotalSoftGallery_Video_VDesc =jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Desc').val();
	var TotalSoftGallery_Video_VLink =jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Link').val();
	var TotalSoftGallery_Video_VONT  =jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_ONT').val();
	var TotalSoftGallery_Video_VURL  =jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(3)').find('.Total_Soft_Select').val();
	var TotalSoftGallery_Video_IURL  =jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(4)').find('.Total_Soft_Select').val();
	var TotalSoftGallery_Video_Video =jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Video').val();
	
	jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).after('<li id="TotalSoftGallery_VideoLi_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'"><table class="Total_Soft_AMVideoTable1 Total_Soft_AMVideoTable2"><tr><td>'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'</td><td><input type="text" readonly value="'+TotalSoftGallery_Video_VT+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftGallery_Video_VT_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_VT_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_Desc" id="TotalSoftGallery_Video_VDesc_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_VDesc_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_Link" id="TotalSoftGallery_Video_VLink_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_VLink_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" value="'+TotalSoftGallery_Video_VLink+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_Video" id="TotalSoftGallery_Video_RVideo_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_RVideo_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" value="'+TotalSoftGallery_Video_Video+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_ONT" id="TotalSoftGallery_Video_VONT_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_VONT_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" value="'+TotalSoftGallery_Video_VONT+'"></td><td><input type="text" readonly value="'+TotalSoftGallery_Video_VURL+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftGallery_Video_VURL_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_VURL_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'"></td><td><img class="TotalSoftGallery_VideoImage" src="'+TotalSoftGallery_Video_IURL+'"><input type="text" readonly value="'+TotalSoftGallery_Video_IURL+'" class="Total_Soft_Select Total_Soft_Select1" style="display:none;" id="TotalSoftGallery_Video_IURL_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'" name="TotalSoftGallery_Video_IURL_'+parseInt(parseInt(TotalSoftGVHidNum)+1)+'"></td><td><i class="Total_Soft_icon totalsoft totalsoft-file-text" onclick="TotalSoftGV_Video_Copy('+parseInt(parseInt(TotalSoftGVHidNum)+1)+')"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-pencil" onclick="TotalSoftGV_Video_Edit('+parseInt(parseInt(TotalSoftGVHidNum)+1)+')"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftGV_Video_Del('+parseInt(parseInt(TotalSoftGVHidNum)+1)+')"></i><span class="Total_Soft_GVideo_Del_Span"><i class="Total_Soft_GVideo_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_GVideo_Del_Vd_Yes('+parseInt(parseInt(TotalSoftGVHidNum)+1)+')"></i><i class="Total_Soft_GVideo_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_GVideo_Del_Vd_No('+parseInt(parseInt(TotalSoftGVHidNum)+1)+')"></i></span></td></tr></table></li>').insertAfter('#TotalSoftGallery_VideoUl li:nth-child('+TotalSoftGV_Video_Li_ID+')');
	
	jQuery('#TotalSoftGallery_Video_VDesc_'+parseInt(parseInt(TotalSoftGVHidNum)+1)).val(TotalSoftGallery_Video_VDesc);

	jQuery('#TotalSoftGVHidNum').val(parseInt(parseInt(TotalSoftGVHidNum)+1));

	jQuery("#TotalSoftGallery_VideoUl > li").each(function(){
		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(1)').html(parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.Total_Soft_Select').attr('id','TotalSoftGallery_Video_VT_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.Total_Soft_Select').attr('name','TotalSoftGallery_Video_VT_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Desc').attr('id','TotalSoftGallery_Video_VDesc_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Desc').attr('name','TotalSoftGallery_Video_VDesc_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Link').attr('id','TotalSoftGallery_Video_VLink_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Link').attr('name','TotalSoftGallery_Video_VLink_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Video').attr('id','TotalSoftGallery_Video_RVideo_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Video').attr('name','TotalSoftGallery_Video_RVideo_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_ONT').attr('id','TotalSoftGallery_Video_VONT_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_ONT').attr('name','TotalSoftGallery_Video_VONT_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(3)').find('.Total_Soft_Select').attr('id','TotalSoftGallery_Video_VURL_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(3)').find('.Total_Soft_Select').attr('name','TotalSoftGallery_Video_VURL_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(4)').find('.Total_Soft_Select').attr('id','TotalSoftGallery_Video_IURL_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(4)').find('.Total_Soft_Select').attr('name','TotalSoftGallery_Video_IURL_'+parseInt(parseInt(jQuery(this).index())+1));

		if(jQuery(this).find('.Total_Soft_AMVideoTable1').hasClass('Total_Soft_AMVideoTable2'))
		{
			jQuery(this).find('.Total_Soft_AMVideoTable1').removeClass("Total_Soft_AMVideoTable2");
		}
		else if(jQuery(this).find('.Total_Soft_AMVideoTable1').hasClass('Total_Soft_AMVideoTable3'))
		{
			jQuery(this).find('.Total_Soft_AMVideoTable1').removeClass("Total_Soft_AMVideoTable3");
		}
		if(jQuery(this).index()%2==0)
		{
			jQuery(this).find('.Total_Soft_AMVideoTable1').addClass("Total_Soft_AMVideoTable2");
		}
		else
		{
			jQuery(this).find('.Total_Soft_AMVideoTable1').addClass("Total_Soft_AMVideoTable3");
		}
	});
}
function TotalSoftGV_Video_Edit(TotalSoftGV_Video_Li_ID)
{
	var TotalSoftGallery_Video_VT    =jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.Total_Soft_Select').val();
	var TotalSoftGallery_Video_VDesc =jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Desc').val();
	var TotalSoftGallery_Video_VLink =jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Link').val();
	var TotalSoftGallery_Video_VONT  =jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_ONT').val();
	var TotalSoftGallery_Video_VURL  =jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(3)').find('.Total_Soft_Select').val();
	var TotalSoftGallery_Video_IURL  =jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(4)').find('.Total_Soft_Select').val();
	var TotalSoftGallery_Video_Video =jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Video').val();

	jQuery('#TotalSoftGVHidUpdate').val(TotalSoftGV_Video_Li_ID);
	jQuery('#Total_Soft_Gallery_Video_Sav').hide(500);
	jQuery('#Total_Soft_Gallery_Video_Upd').show(500);

	jQuery('#TotalSoftGallery_Video_Title').val(TotalSoftGallery_Video_VT);
	jQuery('#TotalSoftGallery_Video_URL_2').val(TotalSoftGallery_Video_VURL);
	jQuery('#TotalSoftGallery_Video_Video_1').val(TotalSoftGallery_Video_Video);
	jQuery('#TotalSoftGallery_VideoIm_URL_2').val(TotalSoftGallery_Video_IURL);
	tinyMCE.get('TotalSoftGallery_Video_Desc').setContent(TotalSoftGallery_Video_VDesc);
	jQuery('#TotalSoftGallery_Video_Link').val(TotalSoftGallery_Video_VLink);

	if(TotalSoftGallery_Video_VONT=='true')
	{ jQuery('#TotalSoftGallery_Video_ONT').attr('checked', true); }
	else
	{ jQuery('#TotalSoftGallery_Video_ONT').attr('checked', false); }
}
function TotalSoftGV_Video_Del(TotalSoftGV_Video_Li_ID)
{
	jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_GVideo_Del_Span').addClass('Total_Soft_GVideo_Del_Span1');
}
function Total_Soft_GVideo_Del_Vd_No(TotalSoftGV_Video_Li_ID)
{
	jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_GVideo_Del_Span').removeClass('Total_Soft_GVideo_Del_Span1');
}
function Total_Soft_GVideo_Del_Vd_Yes(TotalSoftGV_Video_Li_ID)
{
	jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).remove();
	jQuery('#TotalSoftGVHidNum').val(jQuery('#TotalSoftGVHidNum').val()-1);

	jQuery("#TotalSoftGallery_VideoUl > li").each(function(){
		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(1)').html(parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.Total_Soft_Select').attr('id','TotalSoftGallery_Video_VT_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.Total_Soft_Select').attr('name','TotalSoftGallery_Video_VT_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Desc').attr('id','TotalSoftGallery_Video_VDesc_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Desc').attr('name','TotalSoftGallery_Video_VDesc_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Link').attr('id','TotalSoftGallery_Video_VLink_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Link').attr('name','TotalSoftGallery_Video_VLink_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Video').attr('id','TotalSoftGallery_Video_RVideo_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Video').attr('name','TotalSoftGallery_Video_RVideo_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_ONT').attr('id','TotalSoftGallery_Video_VONT_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_ONT').attr('name','TotalSoftGallery_Video_VONT_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(3)').find('.Total_Soft_Select').attr('id','TotalSoftGallery_Video_VURL_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(3)').find('.Total_Soft_Select').attr('name','TotalSoftGallery_Video_VURL_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(4)').find('.Total_Soft_Select').attr('id','TotalSoftGallery_Video_IURL_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(4)').find('.Total_Soft_Select').attr('name','TotalSoftGallery_Video_IURL_'+parseInt(parseInt(jQuery(this).index())+1));

		if(jQuery(this).find('.Total_Soft_AMVideoTable1').hasClass('Total_Soft_AMVideoTable2'))
		{
			jQuery(this).find('.Total_Soft_AMVideoTable1').removeClass("Total_Soft_AMVideoTable2");
		}
		else if(jQuery(this).find('.Total_Soft_AMVideoTable1').hasClass('Total_Soft_AMVideoTable3'))
		{
			jQuery(this).find('.Total_Soft_AMVideoTable1').removeClass("Total_Soft_AMVideoTable3");
		}
		if(jQuery(this).index()%2==0)
		{
			jQuery(this).find('.Total_Soft_AMVideoTable1').addClass("Total_Soft_AMVideoTable2");
		}
		else
		{
			jQuery(this).find('.Total_Soft_AMVideoTable1').addClass("Total_Soft_AMVideoTable3");
		}
	});
}
function TotalSoftGallery_VideoUlSort()
{
	jQuery('#TotalSoftGallery_VideoUl').sortable({
		update: function() {
			jQuery("#TotalSoftGallery_VideoUl > li").each(function(){
				jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(1)').html(parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.Total_Soft_Select').attr('id','TotalSoftGallery_Video_VT_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.Total_Soft_Select').attr('name','TotalSoftGallery_Video_VT_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Desc').attr('id','TotalSoftGallery_Video_VDesc_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Desc').attr('name','TotalSoftGallery_Video_VDesc_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Link').attr('id','TotalSoftGallery_Video_VLink_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Link').attr('name','TotalSoftGallery_Video_VLink_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Video').attr('id','TotalSoftGallery_Video_RVideo_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Video').attr('name','TotalSoftGallery_Video_RVideo_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_ONT').attr('id','TotalSoftGallery_Video_VONT_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_ONT').attr('name','TotalSoftGallery_Video_VONT_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(3)').find('.Total_Soft_Select').attr('id','TotalSoftGallery_Video_VURL_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(3)').find('.Total_Soft_Select').attr('name','TotalSoftGallery_Video_VURL_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(4)').find('.Total_Soft_Select').attr('id','TotalSoftGallery_Video_IURL_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_AMVideoTable1 td:nth-child(4)').find('.Total_Soft_Select').attr('name','TotalSoftGallery_Video_IURL_'+parseInt(parseInt(jQuery(this).index())+1));

				if(jQuery(this).find('.Total_Soft_AMVideoTable1').hasClass('Total_Soft_AMVideoTable2'))
				{
					jQuery(this).find('.Total_Soft_AMVideoTable1').removeClass("Total_Soft_AMVideoTable2");
				}
				else if(jQuery(this).find('.Total_Soft_AMVideoTable1').hasClass('Total_Soft_AMVideoTable3'))
				{
					jQuery(this).find('.Total_Soft_AMVideoTable1').removeClass("Total_Soft_AMVideoTable3");
				}
				if(jQuery(this).index()%2==0)
				{
					jQuery(this).find('.Total_Soft_AMVideoTable1').addClass("Total_Soft_AMVideoTable2");
				}
				else
				{
					jQuery(this).find('.Total_Soft_AMVideoTable1').addClass("Total_Soft_AMVideoTable3");
				}
			});
		}
	});
}
function Total_Soft_Gallery_Video_Update_Vid()
{
	var TotalSoftGV_Video_Li_ID=jQuery('#TotalSoftGVHidUpdate').val();

	var TotalSoftGallery_Video_Title=jQuery('#TotalSoftGallery_Video_Title').val();
	var TotalSoftGallery_Video_URL_2=jQuery('#TotalSoftGallery_Video_URL_2').val();
	var TotalSoftGallery_Video_Video_1=jQuery('#TotalSoftGallery_Video_Video_1').val();
	var TotalSoftGallery_VideoIm_URL_2=jQuery('#TotalSoftGallery_VideoIm_URL_2').val();
	var TotalSoftGallery_Video_Desc=tinyMCE.get('TotalSoftGallery_Video_Desc').getContent();

	var TotalSoftGallery_Video_Link=jQuery('#TotalSoftGallery_Video_Link').val();
	var TotalSoftGallery_Video_ONT=jQuery('#TotalSoftGallery_Video_ONT').attr('checked');
	if(TotalSoftGallery_Video_ONT=='checked')
	{ TotalSoftGallery_Video_ONT='true'; }
	else
	{ TotalSoftGallery_Video_ONT='false'; }

	jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.Total_Soft_Select').val(TotalSoftGallery_Video_Title);
	jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Video').val(TotalSoftGallery_Video_Video_1);
	jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Desc').val(TotalSoftGallery_Video_Desc);
	jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_Link').val(TotalSoftGallery_Video_Link);
	jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(2)').find('.TotalSoftGallery_Video_ONT').val(TotalSoftGallery_Video_ONT);
	jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(3)').find('.Total_Soft_Select').val(TotalSoftGallery_Video_URL_2);
	jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(4)').find('.Total_Soft_Select').val(TotalSoftGallery_VideoIm_URL_2);
	jQuery('#TotalSoftGallery_VideoLi_'+TotalSoftGV_Video_Li_ID).find('.Total_Soft_AMVideoTable1 td:nth-child(4)').find('.TotalSoftGallery_VideoImage').attr('src',TotalSoftGallery_VideoIm_URL_2);

	jQuery('#Total_Soft_Gallery_Video_Upd').hide(500);
	jQuery('#Total_Soft_Gallery_Video_Sav').show(500);

	Total_Soft_Gallery_Video_Res_Vid();
}
function TotalSoftGallery_Video_Del(Gallery_Video_ID)
{
	jQuery('#Total_Soft_Gallery_VideoAMOTable_tr_'+Gallery_Video_ID).find('.Total_Soft_GVideo_Del_Span').addClass('Total_Soft_GVideo_Del_Span1');
}
function TotalSoftGallery_Video_Del_No(Gallery_Video_ID)
{
	jQuery('#Total_Soft_Gallery_VideoAMOTable_tr_'+Gallery_Video_ID).find('.Total_Soft_GVideo_Del_Span').removeClass('Total_Soft_GVideo_Del_Span1');
}
function TotalSoftGallery_Video_Del_Yes(Gallery_Video_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftGallery_Video_Del', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Gallery_Video_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		location.reload();
	})
}
function TotalSoftGallery_Video_Clone(Gallery_Video_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftGallery_Video_Clone', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Gallery_Video_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		location.reload();
	})
}
function TotalSoftGallery_Video_Edit(Gallery_Video_ID)
{
	jQuery('.Total_Soft_Gallery_Video_AMD2').hide(500);
	jQuery('.Total_Soft_Gallery_VideoAMMTable').hide(500);
	jQuery('.Total_Soft_Gallery_VideoAMOTable').hide(500);
	jQuery('.Total_Soft_Gallery_Video_Save').hide(500);
	jQuery('.Total_Soft_Gallery_Video_Update').show(500);
	jQuery('.Total_Soft_Gallery_Video_ID').html('[Total_Soft_Gallery_Video id="'+Gallery_Video_ID+'"]');
	jQuery('.Total_Soft_Gallery_Video_TID').html('&lt;?php echo do_shortcode(&#039;[Total_Soft_Gallery_Video id="'+Gallery_Video_ID+'"]&#039;);?&gt');
	
	jQuery('#Total_SoftGallery_Video_Update').val(Gallery_Video_ID);
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftGallery_Video_Edit', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Gallery_Video_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var b=Array();
		var a=response.split('=>');
		for(var i=3;i<a.length;i++)
		{ b[b.length]=a[i].split('[')[0].trim(); }
		b[b.length-1]=b[b.length-1].split(')')[0].trim();

		jQuery('#TotalSoftGallery_Video_Gallery_Title').val(b[0]); 
		jQuery('#TotalSoftGallery_Video_Option').val(b[1]); 
		jQuery('#TotalSoftGallery_Video_ShowType').val(b[2]); 
		jQuery('#TotalSoftGallery_Video_PerPage').val(b[3]);
		jQuery('#TotalSoftGallery_LoadMore').val(b[4]);

		TotalSoftGallery_Video_Show();
		Total_Soft_GVideo_Editor();
	})

	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftGallery_Video_Edit_Videos', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Gallery_Video_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var TotalSoftGallery_Video_VT=Array();
		var TotalSoftGallery_Video_VDesc=Array();
		var TotalSoftGallery_Video_VLink=Array();
		var TotalSoftGallery_Video_VONT=Array();
		var TotalSoftGallery_Video_VURL=Array();
		var TotalSoftGallery_Video_IURL=Array();
		var TotalSoftGallery_Video_Video_1=Array();

		var a=response.split('stdClass Object');
		for(i=1;i<a.length;i++)
		{
			var c=a[i].split('=>');
			TotalSoftGallery_Video_VT[TotalSoftGallery_Video_VT.length]=c[2].split('[')[0].trim();
			TotalSoftGallery_Video_VDesc[TotalSoftGallery_Video_VDesc.length]=c[3].split('[')[0].trim();
			TotalSoftGallery_Video_VLink[TotalSoftGallery_Video_VLink.length]=c[4].split('[')[0].trim();
			TotalSoftGallery_Video_VONT[TotalSoftGallery_Video_VONT.length]=c[5].split('[')[0].trim();
			TotalSoftGallery_Video_VURL[TotalSoftGallery_Video_VURL.length]=c[6].split('[')[0].trim();
			TotalSoftGallery_Video_IURL[TotalSoftGallery_Video_IURL.length]=c[7].split('[')[0].trim();
			TotalSoftGallery_Video_Video_1[TotalSoftGallery_Video_Video_1.length]=c[8].split('[')[0].trim();
		}
		for(i=1;i<=TotalSoftGallery_Video_VT.length;i++)
		{
			if(i==1)
			{
				jQuery('#TotalSoftGallery_VideoUl').html('<li id="TotalSoftGallery_VideoLi_1"><table class="Total_Soft_AMVideoTable1 Total_Soft_AMVideoTable2"><tr><td>1</td><td><input type="text" readonly value="'+TotalSoftGallery_Video_VT[0]+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftGallery_Video_VT_1" name="TotalSoftGallery_Video_VT_1"><input type="text" style="display:none;" class="TotalSoftGallery_Video_Desc" id="TotalSoftGallery_Video_VDesc_1" name="TotalSoftGallery_Video_VDesc_1" value=\''+TotalSoftGallery_Video_VDesc[0]+'\'><input type="text" style="display:none;" class="TotalSoftGallery_Video_Link" id="TotalSoftGallery_Video_VLink_1" name="TotalSoftGallery_Video_VLink_1" value="'+TotalSoftGallery_Video_VLink[0]+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_Video" id="TotalSoftGallery_Video_RVideo_1" name="TotalSoftGallery_Video_RVideo_1" value="'+TotalSoftGallery_Video_Video_1[0]+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_ONT" id="TotalSoftGallery_Video_VONT_1" name="TotalSoftGallery_Video_VONT_1" value="'+TotalSoftGallery_Video_VONT[0]+'"></td><td><input type="text" readonly value="'+TotalSoftGallery_Video_VURL[0]+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftGallery_Video_VURL_1" name="TotalSoftGallery_Video_VURL_1"></td><td><img class="TotalSoftGallery_VideoImage" src="'+TotalSoftGallery_Video_IURL[0]+'"><input type="text" readonly value="'+TotalSoftGallery_Video_IURL[0]+'" class="Total_Soft_Select Total_Soft_Select1" style="display:none;" id="TotalSoftGallery_Video_IURL_1" name="TotalSoftGallery_Video_IURL_1"></td><td><i class="Total_Soft_icon totalsoft totalsoft-file-text" onclick="TotalSoftGV_Video_Copy(1)"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-pencil" onclick="TotalSoftGV_Video_Edit(1)"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftGV_Video_Del(1)"></i><span class="Total_Soft_GVideo_Del_Span"><i class="Total_Soft_GVideo_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_GVideo_Del_Vd_Yes(1)"></i><i class="Total_Soft_GVideo_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_GVideo_Del_Vd_No(1)"></i></span></td></tr></table></li>');
			}
			else
			{
				if(i%2==0)
				{
					jQuery('<li id="TotalSoftGallery_VideoLi_'+i+'"><table class="Total_Soft_AMVideoTable1 Total_Soft_AMVideoTable3"><tr><td>'+i+'</td><td><input type="text" readonly value="'+TotalSoftGallery_Video_VT[i-1]+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftGallery_Video_VT_'+i+'" name="TotalSoftGallery_Video_VT_'+i+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_Desc" id="TotalSoftGallery_Video_VDesc_'+i+'" name="TotalSoftGallery_Video_VDesc_'+i+'" value=\''+TotalSoftGallery_Video_VDesc[i-1]+'\'><input type="text" style="display:none;" class="TotalSoftGallery_Video_Link" id="TotalSoftGallery_Video_VLink_'+i+'" name="TotalSoftGallery_Video_VLink_'+i+'" value="'+TotalSoftGallery_Video_VLink[i-1]+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_Video" id="TotalSoftGallery_Video_RVideo_'+i+'" name="TotalSoftGallery_Video_RVideo_'+i+'" value="'+TotalSoftGallery_Video_Video_1[i-1]+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_ONT" id="TotalSoftGallery_Video_VONT_'+i+'" name="TotalSoftGallery_Video_VONT_'+i+'" value="'+TotalSoftGallery_Video_VONT[i-1]+'"></td><td><input type="text" readonly value="'+TotalSoftGallery_Video_VURL[i-1]+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftGallery_Video_VURL_'+i+'" name="TotalSoftGallery_Video_VURL_'+i+'"></td><td><img class="TotalSoftGallery_VideoImage" src="'+TotalSoftGallery_Video_IURL[i-1]+'"><input type="text" readonly value="'+TotalSoftGallery_Video_IURL[i-1]+'" class="Total_Soft_Select Total_Soft_Select1" style="display:none;" id="TotalSoftGallery_Video_IURL_'+i+'" name="TotalSoftGallery_Video_IURL_'+i+'"></td><td><i class="Total_Soft_icon totalsoft totalsoft-file-text" onclick="TotalSoftGV_Video_Copy('+i+')"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-pencil" onclick="TotalSoftGV_Video_Edit('+i+')"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftGV_Video_Del('+i+')"></i><span class="Total_Soft_GVideo_Del_Span"><i class="Total_Soft_GVideo_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_GVideo_Del_Vd_Yes('+i+')"></i><i class="Total_Soft_GVideo_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_GVideo_Del_Vd_No('+i+')"></i></span></td></tr></table></li>').insertAfter('#TotalSoftGallery_VideoUl li:nth-child('+parseInt(parseInt(i)-1)+')');
				}
				else
				{
					jQuery('<li id="TotalSoftGallery_VideoLi_'+i+'"><table class="Total_Soft_AMVideoTable1 Total_Soft_AMVideoTable2"><tr><td>'+i+'</td><td><input type="text" readonly value="'+TotalSoftGallery_Video_VT[i-1]+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftGallery_Video_VT_'+i+'" name="TotalSoftGallery_Video_VT_'+i+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_Desc" id="TotalSoftGallery_Video_VDesc_'+i+'" name="TotalSoftGallery_Video_VDesc_'+i+'" value=\''+TotalSoftGallery_Video_VDesc[i-1]+'\'><input type="text" style="display:none;" class="TotalSoftGallery_Video_Link" id="TotalSoftGallery_Video_VLink_'+i+'" name="TotalSoftGallery_Video_VLink_'+i+'" value="'+TotalSoftGallery_Video_VLink[i-1]+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_Video" id="TotalSoftGallery_Video_RVideo_'+i+'" name="TotalSoftGallery_Video_RVideo_'+i+'" value="'+TotalSoftGallery_Video_Video_1[i-1]+'"><input type="text" style="display:none;" class="TotalSoftGallery_Video_ONT" id="TotalSoftGallery_Video_VONT_'+i+'" name="TotalSoftGallery_Video_VONT_'+i+'" value="'+TotalSoftGallery_Video_VONT[i-1]+'"></td><td><input type="text" readonly value="'+TotalSoftGallery_Video_VURL[i-1]+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftGallery_Video_VURL_'+i+'" name="TotalSoftGallery_Video_VURL_'+i+'"></td><td><img class="TotalSoftGallery_VideoImage" src="'+TotalSoftGallery_Video_IURL[i-1]+'"><input type="text" readonly value="'+TotalSoftGallery_Video_IURL[i-1]+'" class="Total_Soft_Select Total_Soft_Select1" style="display:none;" id="TotalSoftGallery_Video_IURL_'+i+'" name="TotalSoftGallery_Video_IURL_'+i+'"></td><td><i class="Total_Soft_icon totalsoft totalsoft-file-text" onclick="TotalSoftGV_Video_Copy('+i+')"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-pencil" onclick="TotalSoftGV_Video_Edit('+i+')"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftGV_Video_Del('+i+')"></i><span class="Total_Soft_GVideo_Del_Span"><i class="Total_Soft_GVideo_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_GVideo_Del_Vd_Yes('+i+')"></i><i class="Total_Soft_GVideo_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_GVideo_Del_Vd_No('+i+')"></i></span></td></tr></table></li>').insertAfter('#TotalSoftGallery_VideoUl li:nth-child('+parseInt(parseInt(i)-1)+')');
				}
			}
		}
		jQuery('#TotalSoftGVHidNum').val(TotalSoftGallery_Video_VT.length);
	})
	setTimeout(function(){
		jQuery('.Total_Soft_Gallery_Video_AMD3').show(500);
		jQuery('.Total_Soft_AMTable').show(500);
		jQuery('.Total_Soft_AMVideoTable').show(500);
		jQuery('.Total_Soft_AMVideoTable1').show(500);
		jQuery('.Total_Soft_GV_AMShortTable').show(500);
	},500)
}
function Total_Soft_GVideo_Editor()
{
	tinymce.init({
		selector: '#TotalSoftGallery_Video_Desc',
		menubar: false,
		statusbar: false,
		height: 250,
		plugins: [
			'advlist autolink lists link image charmap print preview hr',
			'searchreplace wordcount code media ',
			'insertdatetime save table contextmenu directionality',
			'paste textcolor colorpicker textpattern imagetools codesample'
		],
		toolbar1: "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect fontselect fontsizeselect",
		toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink code | insertdatetime preview | forecolor backcolor",
		toolbar3: "table | hr | subscript superscript | charmap | print | codesample ",
		fontsize_formats: '8px 10px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px',
		font_formats: 'Abadi MT Condensed Light = Abadi MT Condensed Light; ABeeZee = ABeeZee, sans-serif; Abel = Abel, sans-serif; Abhaya Libre = Abhaya Libre, serif; Abril Fatface = Abril Fatface, cursive; Aclonica = Aclonica, sans-serif; Acme = Acme, sans-serif; Actor = Actor, sans-serif; Adamina = Adamina, serif; Advent Pro = Advent Pro, sans-serif; Aguafina Script = Aguafina Script, cursive; Aharoni = Aharoni; Akronim = Akronim, cursive; Aladin = Aladin, cursive; Aldhabi = Aldhabi; Aldrich = Aldrich, sans-serif; Alef = Alef, sans-serif; Alegreya = Alegreya, serif; Alegreya Sans = Alegreya Sans, sans-serif; Alegreya Sans SC = Alegreya Sans SC, sans-serif; Alegreya SC = Alegreya SC, serif; Alex Brush = Alex Brush, cursive; Alfa Slab One = Alfa Slab One, cursive; Alice = Alice, serif; Alike = Alike, serif; Alike Angular = Alike Angular, serif; Allan = Allan, cursive; Allerta = Allerta, sans-serif; Allerta Stencil = Allerta Stencil, sans-serif; Allura = Allura, cursive; Almendra = Almendra, serif; Almendra Display = Almendra Display, cursive; Almendra SC = Almendra SC, serif; Amarante = Amarante, cursive; Amaranth = Amaranth, sans-serif; Amatic SC = Amatic SC, cursive; Amethysta = Amethysta, serif; Amiko = Amiko, sans-serif; Amiri = Amiri, serif; Amita = Amita, cursive; Anaheim = Anaheim, sans-serif; Andada = Andada, serif; Andalus = Andalus; Andika = Andika, sans-serif; Angkor = Angkor, cursive; Angsana New = Angsana New; AngsanaUPC = AngsanaUPC; Annie Use Your Telescope = Annie Use Your Telescope, cursive; Anonymous Pro = Anonymous Pro, monospace; Antic = Antic, sans-serif; Antic Didone = Antic Didone, serif; Antic Slab = Antic Slab, serif; Anton = Anton, sans-serif; Aparajita = Aparajita; Arabic Typesetting = Arabic Typesetting; Arapey = Arapey, serif; Arbutus = Arbutus, cursive; Arbutus Slab = Arbutus Slab, serif; Architects Daughter = Architects Daughter, cursive; Archivo = Archivo, sans-serif; Archivo Black = Archivo Black, sans-serif; Archivo Narrow = Archivo Narrow, sans-serif; Aref Ruqaa = Aref Ruqaa, serif; Arial = Arial; Arial Black = Arial Black; Arimo = Arimo, sans-serif; Arima Madurai = Arima Madurai, cursive; Arizonia = Arizonia, cursive; Armata = Armata, sans-serif; Arsenal = Arsenal, sans-serif; Artifika = Artifika, serif; Arvo = Arvo, serif; Arya = Arya, sans-serif; Asap = Asap, sans-serif; Asap Condensed = Asap Condensed, sans-serif; Asar = Asar, serif; Asset = Asset, cursive; Assistant = Assistant, sans-serif; Astloch = Astloch, cursive; Asul = Asul, sans-serif; Athiti = Athiti, sans-serif; Atma = Atma, cursive; Atomic Age = Atomic Age, cursive; Aubrey = Aubrey, cursive; Audiowide = Audiowide, cursive; Autour One = Autour One, cursive; Average = Average, serif; Average Sans = Average Sans, sans-serif; Averia Gruesa Libre = Averia Gruesa Libre, cursive; Averia Libre = Averia Libre, cursive; Averia Sans Libre = Averia Sans Libre, cursive; Averia Serif Libre = Averia Serif Libre, cursive; Bad Script = Bad Script, cursive; Bahiana = Bahiana, cursive; Baloo = Baloo, cursive; Balthazar = Balthazar, serif; Bangers = Bangers, cursive; Barlow = Barlow, sans-serif; Barlow Condensed = Barlow Condensed, sans-serif; Barlow Semi Condensed = Barlow Semi Condensed, sans-serif; Barrio = Barrio, cursive; Basic = Basic, sans-serif; Batang = Batang; BatangChe = BatangChe; Battambang = Battambang, cursive; Baumans = Baumans, cursive; Bayon = Bayon, cursive; Belgrano = Belgrano, serif; Bellefair = Bellefair, serif; Belleza = Belleza, sans-serif; BenchNine = BenchNine, sans-serif; Bentham = Bentham, serif; Berkshire Swash = Berkshire Swash, cursive; Bevan = Bevan, cursive; Bigelow Rules = Bigelow Rules, cursive; Bigshot One = Bigshot One, cursive; Bilbo = Bilbo, cursive; Bilbo Swash Caps = Bilbo Swash Caps, cursive; BioRhyme = BioRhyme, serif; BioRhyme Expanded = BioRhyme Expanded, serif; Biryani = Biryani, sans-serif; Bitter = Bitter, serif; Black And White Picture = Black And White Picture, sans-serif; Black Han Sans = Black Han Sans, sans-serif; Black Ops One = Black Ops One, cursive; Bokor = Bokor, cursive; Bonbon = Bonbon, cursive; Boogaloo = Boogaloo, cursive; Bowlby One = Bowlby One, cursive; Bowlby One SC = Bowlby One SC, cursive; Brawler = Brawler, serif; Bree Serif = Bree Serif, serif; Browallia New = Browallia New; BrowalliaUPC = BrowalliaUPC; Bubbler One = Bubbler One, sans-serif; Bubblegum Sans = Bubblegum Sans, cursive; Buda = Buda, cursive; Buenard = Buenard, serif; Bungee = Bungee, cursive; Bungee Hairline = Bungee Hairline, cursive; Bungee Inline = Bungee Inline, cursive; Bungee Outline = Bungee Outline, cursive; Bungee Shade = Bungee Shade, cursive; Butcherman = Butcherman, cursive; Butterfly Kids = Butterfly Kids, cursive; Cabin = Cabin, sans-serif; Cabin Condensed = Cabin Condensed, sans-serif; Cabin Sketch = Cabin Sketch, cursive; Caesar Dressing = Caesar Dressing, cursive; Cagliostro = Cagliostro, sans-serif; Cairo = Cairo, sans-serif; Calibri = Calibri; Calibri Light = Calibri Light; Calisto MT = Calisto MT; Calligraffitti = Calligraffitti, cursive; Cambay = Cambay, sans-serif; Cambo = Cambo, serif; Cambria = Cambria; Candal = Candal, sans-serif; Candara = Candara; Cantarell = Cantarell, sans-serif; Cantata One = Cantata One, serif; Cantora One = Cantora One, sans-serif; Capriola = Capriola, sans-serif; Cardo = Cardo, serif; Carme = Carme, sans-serif; Carrois Gothic = Carrois Gothic, sans-serif; Carrois Gothic SC = Carrois Gothic SC, sans-serif; Carter One = Carter One, cursive; Catamaran = Catamaran, sans-serif; Caudex = Caudex, serif; Caveat = Caveat, cursive; Caveat Brush = Caveat Brush, cursive; Cedarville Cursive = Cedarville Cursive, cursive; Century Gothic = Century Gothic; Ceviche One = Ceviche One, cursive; Changa = Changa, sans-serif; Changa One = Changa One, cursive; Chango = Chango, cursive; Chathura = Chathura, sans-serif; Chau Philomene One = Chau Philomene One, sans-serif; Chela One = Chela One, cursive; Chelsea Market = Chelsea Market, cursive; Chenla = Chenla, cursive; Cherry Cream Soda = Cherry Cream Soda, cursive; Cherry Swash = Cherry Swash, cursive; Chewy = Chewy, cursive; Chicle = Chicle, cursive; Chivo = Chivo, sans-serif; Chonburi = Chonburi, cursive; Cinzel = Cinzel, serif; Cinzel Decorative = Cinzel Decorative, cursive; Clicker Script = Clicker Script, cursive; Coda = Coda, cursive; Coda Caption = Coda Caption, sans-serif; Codystar = Codystar, cursive; Coiny = Coiny, cursive; Combo = Combo, cursive; Comic Sans MS = Comic Sans MS; Coming Soon = Coming Soon, cursive; Comfortaa = Comfortaa, cursive; Concert One = Concert One, cursive; Condiment = Condiment, cursive; Consolas = Consolas; Constantia = Constantia; Content = Content, cursive; Contrail One = Contrail One, cursive; Convergence = Convergence, sans-serif; Cookie = Cookie, cursive; Copperplate Gothic = Copperplate Gothic; Copperplate Gothic Light = Copperplate Gothic Light; Copse = Copse, serif; Corbel = Corbel; Corben = Corben, cursive; Cordia New = Cordia New; CordiaUPC = CordiaUPC; Cormorant = Cormorant, serif; Cormorant Garamond = Cormorant Garamond, serif; Cormorant Infant = Cormorant Infant, serif; Cormorant SC = Cormorant SC, serif; Cormorant Unicase = Cormorant Unicase, serif; Cormorant Upright = Cormorant Upright, serif; Courgette = Courgette, cursive; Courier New = Courier New; Cousine = Cousine, monospace; Coustard = Coustard, serif; Covered By Your Grace = Covered By Your Grace, cursive; Crafty Girls = Crafty Girls, cursive; Creepster = Creepster, cursive; Crete Round = Crete Round, serif; Crimson Text = Crimson Text, serif; Croissant One = Croissant One, cursive; Crushed = Crushed, cursive; Cuprum = Cuprum, sans-serif; Cute Font = Cute Font, cursive; Cutive = Cutive, serif; Cutive Mono = Cutive Mono, monospace; Damion = Damion, cursive; Dancing Script = Dancing Script, cursive; Dangrek = Dangrek, cursive; DaunPenh = DaunPenh; David = David; David Libre = David Libre, serif; Dawning of a New Day = Dawning of a New Day, cursive; Days One = Days One, sans-serif; Delius = Delius, cursive; Delius Swash Caps = Delius Swash Caps, cursive; Delius Unicase = Delius Unicase, cursive; Della Respira = Della Respira, serif; Denk One = Denk One, sans-serif; Devonshire = Devonshire, cursive; DFKai-SB = DFKai-SB; Dhurjati = Dhurjati, sans-serif; Didact Gothic = Didact Gothic, sans-serif; DilleniaUPC = DilleniaUPC; Diplomata = Diplomata, cursive; Diplomata SC = Diplomata SC, cursive; Do Hyeon = Do Hyeon, sans-serif; DokChampa = DokChampa; Dokdo = Dokdo, cursive; Domine = Domine, serif; Donegal One = Donegal One, serif; Doppio One = Doppio One, sans-serif; Dorsa = Dorsa, sans-serif; Dosis = Dosis, sans-serif; Dotum = Dotum; DotumChe = DotumChe; Dr Sugiyama = Dr Sugiyama, cursive; Duru Sans = Duru Sans, sans-serif; Dynalight = Dynalight, cursive; Eagle Lake = Eagle Lake, cursive; East Sea Dokdo = East Sea Dokdo, cursive; Eater = Eater, cursive; EB Garamond = EB Garamond, serif; Ebrima = Ebrima; Economica = Economica, sans-serif; Eczar = Eczar, serif; El Messiri = El Messiri, sans-serif; Electrolize = Electrolize, sans-serif; Elsie = Elsie, cursive; Elsie Swash Caps = Elsie Swash Caps, cursive; Emblema One = Emblema One, cursive; Emilys Candy = Emilys Candy, cursive; Encode Sans = Encode Sans, sans-serif; Encode Sans Condensed = Encode Sans Condensed, sans-serif; Encode Sans Expanded = Encode Sans Expanded, sans-serif; Encode Sans Semi Condensed = Encode Sans Semi Condensed, sans-serif; Encode Sans Semi Expanded = Encode Sans Semi Expanded, sans-serif; Engagement = Engagement, cursive; Englebert = Englebert, sans-serif; Enriqueta = Enriqueta, serif; Erica One = Erica One, cursive; Esteban = Esteban, serif; Estrangelo Edessa = Estrangelo Edessa; EucrosiaUPC = EucrosiaUPC; Euphemia = Euphemia; Euphoria Script = Euphoria Script, cursive; Ewert = Ewert, cursive; Exo = Exo, sans-serif; Expletus Sans = Expletus Sans, cursive; FangSong = FangSong; Fanwood Text = Fanwood Text, serif; Farsan = Farsan, cursive; Fascinate = Fascinate, cursive; Fascinate Inline = Fascinate Inline, cursive; Faster One = Faster One, cursive; Fasthand = Fasthand, serif; Fauna One = Fauna One, serif; Faustina = Faustina, serif; Federant = Federant, cursive; Federo = Federo, sans-serif; Felipa = Felipa, cursive; Fenix = Fenix, serif; Finger Paint = Finger Paint, cursive; Fira Mono = Fira Mono, monospace; Fira Sans = Fira Sans, sans-serif; Fira Sans Condensed = Fira Sans Condensed, sans-serif; Fira Sans Extra Condensed = Fira Sans Extra Condensed, sans-serif; Fjalla One = Fjalla One, sans-serif; Fjord One = Fjord One, serif; Flamenco = Flamenco, cursive; Flavors = Flavors, cursive; Fondamento = Fondamento, cursive; Fontdiner Swanky = Fontdiner Swanky, cursive; Forum = Forum, cursive; Francois One = Francois One, sans-serif; Frank Ruhl Libre = Frank Ruhl Libre, serif; Franklin Gothic Medium = Franklin Gothic Medium; FrankRuehl = FrankRuehl; Freckle Face = Freckle Face, cursive; Fredericka the Great = Fredericka the Great, cursive; Fredoka One = Fredoka One, cursive; Freehand = Freehand, cursive; FreesiaUPC = FreesiaUPC; Fresca = Fresca, sans-serif; Frijole = Frijole, cursive; Fruktur = Fruktur, cursive; Fugaz One = Fugaz One, cursive; Gabriela = Gabriela, serif; Gabriola = Gabriola; Gadugi = Gadugi; Gaegu = Gaegu, cursive; Gafata = Gafata, sans-serif; Galada = Galada, cursive; Galdeano = Galdeano, sans-serif; Galindo = Galindo, cursive; Gamja Flower = Gamja Flower, cursive; Gautami = Gautami; Gentium Basic = Gentium Basic, serif; Gentium Book Basic = Gentium Book Basic, serif; Geo = Geo, sans-serif; Georgia = Georgia; Geostar = Geostar, cursive; Geostar Fill = Geostar Fill, cursive; Germania One = Germania One, cursive; GFS Didot = GFS Didot, serif; GFS Neohellenic = GFS Neohellenic, sans-serif; Gidugu = Gidugu, sans-serif; Gilda Display = Gilda Display, serif; Gisha = Gisha; Give You Glory = Give You Glory, cursive; Glass Antiqua = Glass Antiqua, cursive; Glegoo = Glegoo, serif; Gloria Hallelujah = Gloria Hallelujah, cursive; Goblin One = Goblin One, cursive; Gochi Hand = Gochi Hand, cursive; Gorditas = Gorditas, cursive; Gothic A1 = Gothic A1, sans-serif; Graduate = Graduate, cursive; Grand Hotel = Grand Hotel, cursive; Gravitas One = Gravitas One, cursive; Great Vibes = Great Vibes, cursive; Griffy = Griffy, cursive; Gruppo = Gruppo, cursive; Gudea = Gudea, sans-serif; Gugi = Gugi, cursive; Gulim = Gulim; GulimChe = GulimChe; Gungsuh = Gungsuh; GungsuhChe = GungsuhChe; Gurajada = Gurajada, serif; Habibi = Habibi, serif; Halant = Halant, serif; Hammersmith One = Hammersmith One, sans-serif; Hanalei = Hanalei, cursive; Hanalei Fill = Hanalei Fill, cursive; Handlee = Handlee, cursive; Hanuman = Hanuman, serif; Happy Monkey = Happy Monkey, cursive; Harmattan = Harmattan, sans-serif; Headland One = Headland One, serif; Heebo = Heebo, sans-serif; Henny Penny = Henny Penny, cursive; Herr Von Muellerhoff = Herr Von Muellerhoff, cursive; Hi Melody = Hi Melody, cursive; Hind = Hind, sans-serif; Holtwood One SC = Holtwood One SC, serif; Homemade Apple = Homemade Apple, cursive; Homenaje = Homenaje, sans-serif; IBM Plex Mono = IBM Plex Mono, monospace; IBM Plex Sans = IBM Plex Sans, sans-serif; IBM Plex Sans Condensed = IBM Plex Sans Condensed, sans-serif; IBM Plex Serif = IBM Plex Serif, serif; Iceberg = Iceberg, cursive; Iceland = Iceland, cursive; IM Fell Double Pica = IM Fell Double Pica, serif; IM Fell Double Pica SC = IM Fell Double Pica SC, serif; IM Fell DW Pica = IM Fell DW Pica, serif; IM Fell DW Pica SC = IM Fell DW Pica SC, serif; IM Fell English = IM Fell English, serif; IM Fell English SC = IM Fell English SC, serif; IM Fell French Canon = IM Fell French Canon, serif; IM Fell French Canon SC = IM Fell French Canon SC, serif; IM Fell Great Primer = IM Fell Great Primer, serif; IM Fell Great Primer SC = IM Fell Great Primer SC, serif; Impact = Impact; Imprima = Imprima, sans-serif; Inconsolata = Inconsolata, monospace; Inder = Inder, sans-serif; Indie Flower = Indie Flower, cursive; Inika = Inika, serif; Irish Grover = Irish Grover, cursive; IrisUPC = IrisUPC; Istok Web = Istok Web, sans-serif; Iskoola Pota = Iskoola Pota; Italiana = Italiana, serif; Italianno = Italianno, cursive; Itim = Itim, cursive; Jacques Francois = Jacques Francois, serif; Jacques Francois Shadow = Jacques Francois Shadow, cursive; Jaldi = Jaldi, sans-serif; JasmineUPC = JasmineUPC; Jim Nightshade = Jim Nightshade, cursive; Jockey One = Jockey One, sans-serif; Jolly Lodger = Jolly Lodger, cursive; Jomhuria = Jomhuria, cursive; Josefin Sans = Josefin Sans, sans-serif; Josefin Slab = Josefin Slab, serif; Joti One = Joti One, cursive; Jua = Jua, sans-serif; Judson = Judson, serif; Julee = Julee, cursive; Julius Sans One = Julius Sans One, sans-serif; Junge = Junge, serif; Jura = Jura, sans-serif; Just Another Hand = Just Another Hand, cursive; Just Me Again Down Here = Just Me Again Down Here, cursive; Kadwa = Kadwa, serif; KaiTi = KaiTi; Kalam = Kalam, cursive; Kalinga = Kalinga; Kameron = Kameron, serif; Kanit = Kanit, sans-serif; Kantumruy = Kantumruy, sans-serif; Karla = Karla, sans-serif; Karma = Karma, serif; Kartika = Kartika; Katibeh = Katibeh, cursive; Kaushan Script = Kaushan Script, cursive; Kavivanar = Kavivanar, cursive; Kavoon = Kavoon, cursive; Kdam Thmor = Kdam Thmor, cursive; Keania One = Keania One, cursive; Kelly Slab = Kelly Slab, cursive; Kenia = Kenia, cursive; Khand = Khand, sans-serif; Khmer = Khmer, cursive; Khmer UI = Khmer UI; Khula = Khula, sans-serif; Kirang Haerang = Kirang Haerang, cursive; Kite One = Kite One, sans-serif; Knewave = Knewave, cursive; KodchiangUPC = KodchiangUPC; Kokila = Kokila; Kotta One = Kotta One, serif; Koulen = Koulen, cursive; Kranky = Kranky, cursive; Kreon = Kreon, serif; Kristi = Kristi, cursive; Krona One = Krona One, sans-serif; Kurale = Kurale, serif; La Belle Aurore = La Belle Aurore, cursive; Laila = Laila, serif; Lakki Reddy = Lakki Reddy, cursive; Lalezar = Lalezar, cursive; Lancelot = Lancelot, cursive; Lao UI = Lao UI; Lateef = Lateef, cursive; Latha = Latha; Lato = Lato, sans-serif; League Script = League Script, cursive; Leckerli One = Leckerli One, cursive; Ledger = Ledger, serif; Leelawadee = Leelawadee; Lekton = Lekton, sans-serif; Lemon = Lemon, cursive; Lemonada = Lemonada, cursive; Levenim MT = Levenim MT; Libre Baskerville = Libre Baskerville, serif; Libre Franklin = Libre Franklin, sans-serif; Life Savers = Life Savers, cursive; Lilita One = Lilita One, cursive; Lily Script One = Lily Script One, cursive; LilyUPC = LilyUPC; Limelight = Limelight, cursive; Linden Hill = Linden Hill, serif; Lobster = Lobster, cursive; Lobster Two = Lobster Two, cursive; Londrina Outline = Londrina Outline, cursive; Londrina Shadow = Londrina Shadow, cursive; Londrina Sketch = Londrina Sketch, cursive; Londrina Solid = Londrina Solid, cursive; Lora = Lora, serif; Love Ya Like A Sister = Love Ya Like A Sister, cursive; Loved by the King = Loved by the King, cursive; Lovers Quarrel = Lovers Quarrel, cursive; Lucida Console = Lucida Console; Lucida Handwriting Italic = Lucida Handwriting Italic; Lucida Sans Unicode = Lucida Sans Unicode; Luckiest Guy = Luckiest Guy, cursive; Lusitana = Lusitana, serif; Lustria = Lustria, serif; Macondo = Macondo, cursive; Macondo Swash Caps = Macondo Swash Caps, cursive; Mada = Mada, sans-serif; Magra = Magra, sans-serif; Maiden Orange = Maiden Orange, cursive; Maitree = Maitree, serif; Mako = Mako, sans-serif; Malgun Gothic = Malgun Gothic; Mallanna = Mallanna, sans-serif; Mandali = Mandali, sans-serif; Mangal = Mangal; Manny ITC = Manny ITC; Manuale = Manuale, serif; Marcellus = Marcellus, serif; Marcellus SC = Marcellus SC, serif; Marck Script = Marck Script, cursive; Margarine = Margarine, cursive; Marko One = Marko One, serif; Marlett = Marlett; Marmelad = Marmelad, sans-serif; Martel = Martel, serif; Martel Sans = Martel Sans, sans-serif; Marvel = Marvel, sans-serif; Mate = Mate, serif; Mate SC = Mate SC, serif; Maven Pro = Maven Pro, sans-serif; McLaren = McLaren, cursive; Meddon = Meddon, cursive; MedievalSharp = MedievalSharp, cursive; Medula One = Medula One, cursive; Meera Inimai = Meera Inimai, sans-serif; Megrim = Megrim, cursive; Meie Script = Meie Script, cursive; Meiryo = Meiryo; Meiryo UI = Meiryo UI; Merienda = Merienda, cursive; Merienda One = Merienda One, cursive; Merriweather = Merriweather, serif; Merriweather Sans = Merriweather Sans, sans-serif; Metal = Metal, cursive; Metal Mania = Metal Mania, cursive; Metamorphous = Metamorphous, cursive; Metrophobic = Metrophobic, sans-serif; Michroma = Michroma, sans-serif; Microsoft Himalaya = Microsoft Himalaya; Microsoft JhengHei = Microsoft JhengHei; Microsoft JhengHei UI = Microsoft JhengHei UI; Microsoft New Tai Lue = Microsoft New Tai Lue; Microsoft PhagsPa = Microsoft PhagsPa; Microsoft Sans Serif = Microsoft Sans Serif; Microsoft Tai Le = Microsoft Tai Le; Microsoft Uighur = Microsoft Uighur; Microsoft YaHei = Microsoft YaHei; Microsoft YaHei UI = Microsoft YaHei UI; Microsoft Yi Baiti = Microsoft Yi Baiti; Milonga = Milonga, cursive; Miltonian = Miltonian, cursive; Miltonian Tattoo = Miltonian Tattoo, cursive; Mina = Mina, sans-serif; MingLiU_HKSCS = MingLiU_HKSCS; MingLiU_HKSCS-ExtB = MingLiU_HKSCS-ExtB; Miniver = Miniver, cursive; Miriam = Miriam; Miriam Libre = Miriam Libre, sans-serif; Mirza = Mirza, cursive; Miss Fajardose = Miss Fajardose, cursive; Mitr = Mitr, sans-serif; Modak = Modak, cursive; Modern Antiqua = Modern Antiqua, cursive; Mogra = Mogra, cursive; Molengo = Molengo, sans-serif; Molle = Molle, cursive; Monda = Monda, sans-serif; Mongolian Baiti = Mongolian Baiti; Monofett = Monofett, cursive; Monoton = Monoton, cursive; Monsieur La Doulaise = Monsieur La Doulaise, cursive; Montaga = Montaga, serif; Montez = Montez, cursive; Montserrat = Montserrat, sans-serif; Montserrat Alternates = Montserrat Alternates, sans-serif; Montserrat Subrayada = Montserrat Subrayada, sans-serif; MoolBoran = MoolBoran; Moul = Moul, cursive; Moulpali = Moulpali, cursive; Mountains of Christmas = Mountains of Christmas, cursive; Mouse Memoirs = Mouse Memoirs, sans-serif; Mr Bedfort = Mr Bedfort, cursive; Mr Dafoe = Mr Dafoe, cursive; Mr De Haviland = Mr De Haviland, cursive; Mrs Saint Delafield = Mrs Saint Delafield, cursive; Mrs Sheppards = Mrs Sheppards, cursive; MS UI Gothic = MS UI Gothic; Mukta = Mukta, sans-serif; Muli = Muli, sans-serif; MV Boli = MV Boli; Myanmar Text = Myanmar Text; Mystery Quest = Mystery Quest, cursive; Nanum Brush Script = Nanum Brush Script, cursive; Nanum Gothic = Nanum Gothic, sans-serif; Nanum Gothic Coding = Nanum Gothic Coding, monospace; Nanum Myeongjo = Nanum Myeongjo, serif; Nanum Pen Script = Nanum Pen Script, cursive; Narkisim = Narkisim; Neucha = Neucha, cursive; Neuton = Neuton, serif; New Rocker = New Rocker, cursive; News Cycle = News Cycle, sans-serif; News Gothic MT = News Gothic MT; Niconne = Niconne, cursive; Nirmala UI = Nirmala UI; Nixie One = Nixie One, cursive; Nobile = Nobile, sans-serif; Nokora = Nokora, serif; Norican = Norican, cursive; Nosifer = Nosifer, cursive; Nothing You Could Do = Nothing You Could Do, cursive; Noticia Text = Noticia Text, serif; Noto Sans = Noto Sans, sans-serif; Noto Serif = Noto Serif, serif; Nova Cut = Nova Cut, cursive; Nova Flat = Nova Flat, cursive; Nova Mono = Nova Mono, monospace; Nova Oval = Nova Oval, cursive; Nova Round = Nova Round, cursive; Nova Script = Nova Script, cursive; Nova Slim = Nova Slim, cursive; Nova Square = Nova Square, cursive; NSimSun = NSimSun; NTR = NTR, sans-serif; Numans = Numans, sans-serif; Nunito = Nunito, sans-serif; Nunito Sans = Nunito Sans, sans-serif; Nyala = Nyala; Odor Mean Chey = Odor Mean Chey, cursive; Offside = Offside, cursive; Old Standard TT = Old Standard TT, serif; Oldenburg = Oldenburg, cursive; Oleo Script = Oleo Script, cursive; Oleo Script Swash Caps = Oleo Script Swash Caps, cursive; Open Sans = Open Sans, sans-serif; Open Sans Condensed = Open Sans Condensed, sans-serif; Oranienbaum = Oranienbaum, serif; Orbitron = Orbitron, sans-serif; Oregano = Oregano, cursive; Orienta = Orienta, sans-serif; Original Surfer = Original Surfer, cursive; Oswald = Oswald, sans-serif; Over the Rainbow = Over the Rainbow, cursive; Overlock = Overlock, cursive; Overlock SC = Overlock SC, cursive; Overpass = Overpass, sans-serif; Overpass Mono = Overpass Mono, monospace; Ovo = Ovo, serif; Oxygen = Oxygen, sans-serif; Oxygen Mono = Oxygen Mono, monospace; Pacifico = Pacifico, cursive; Padauk = Padauk, sans-serif; Palanquin = Palanquin, sans-serif; Palanquin Dark = Palanquin Dark, sans-serif; Palatino Linotype = Palatino Linotype; Pangolin = Pangolin, cursive; Paprika = Paprika, cursive; Parisienne = Parisienne, cursive; Passero One = Passero One, cursive; Passion One = Passion One, cursive; Pathway Gothic One = Pathway Gothic One, sans-serif; Patrick Hand = Patrick Hand, cursive; Patrick Hand SC = Patrick Hand SC, cursive; Pattaya = Pattaya, sans-serif; Patua One = Patua One, cursive; Pavanam = Pavanam, sans-serif; Paytone One = Paytone One, sans-serif; Peddana = Peddana, serif; Peralta = Peralta, cursive; Permanent Marker = Permanent Marker, cursive; Petit Formal Script = Petit Formal Script, cursive; Petrona = Petrona, serif; Philosopher = Philosopher, sans-serif; Piedra = Piedra, cursive; Pinyon Script = Pinyon Script, cursive; Pirata One = Pirata One, cursive; Plantagenet Cherokee = Plantagenet Cherokee; Plaster = Plaster, cursive; Play = Play, sans-serif; Playball = Playball, cursive; Playfair Display = Playfair Display, serif; Playfair Display SC = Playfair Display SC, serif; Podkova = Podkova, serif; Poiret One = Poiret One, cursive; Poller One = Poller One, cursive; Poly = Poly, serif; Pompiere = Pompiere, cursive; Pontano Sans = Pontano Sans, sans-serif; Poor Story = Poor Story, cursive; Poppins = Poppins, sans-serif; Port Lligat Sans = Port Lligat Sans, sans-serif; Port Lligat Slab = Port Lligat Slab, serif; Pragati Narrow = Pragati Narrow, sans-serif; Prata = Prata, serif; Preahvihear = Preahvihear, cursive; Pridi = Pridi, serif; Princess Sofia = Princess Sofia, cursive; Prociono = Prociono, serif; Prompt = Prompt, sans-serif; Prosto One = Prosto One, cursive; Proza Libre = Proza Libre, sans-serif; PT Mono = PT Mono, monospace; PT Sans = PT Sans, sans-serif; PT Sans Caption = PT Sans Caption, sans-serif; PT Sans Narrow = PT Sans Narrow, sans-serif; PT Serif = PT Serif, serif; PT Serif Caption = PT Serif Caption, serif; Puritan = Puritan, sans-serif; Purple Purse = Purple Purse, cursive; Quando = Quando, serif; Quantico = Quantico, sans-serif; Quattrocento = Quattrocento, serif; Quattrocento Sans = Quattrocento Sans, sans-serif; Questrial = Questrial, sans-serif; Quicksand = Quicksand, sans-serif; Quintessential = Quintessential, cursive; Qwigley = Qwigley, cursive; Raavi = Raavi; Racing Sans One = Racing Sans One, cursive; Radley = Radley, serif; Rajdhani = Rajdhani, sans-serif; Rakkas = Rakkas, cursive; Raleway = Raleway, sans-serif; Raleway Dots = Raleway Dots, cursive; Ramabhadra = Ramabhadra, sans-serif; Ramaraja = Ramaraja, serif; Rambla = Rambla, sans-serif; Rammetto One = Rammetto One, cursive; Ranchers = Ranchers, cursive; Rancho = Rancho, cursive; Ranga = Ranga, cursive; Rasa = Rasa, serif; Rationale = Rationale, sans-serif; Ravi Prakash = Ravi Prakash, cursive; Redressed = Redressed, cursive; Reem Kufi = Reem Kufi, sans-serif; Reenie Beanie = Reenie Beanie, cursive; Revalia = Revalia, cursive; Rhodium Libre = Rhodium Libre, serif; Ribeye = Ribeye, cursive; Ribeye Marrow = Ribeye Marrow, cursive; Righteous = Righteous, cursive; Risque = Risque, cursive; Roboto = Roboto, sans-serif; Roboto Condensed = Roboto Condensed, sans-serif; Roboto Mono = Roboto Mono, monospace; Roboto Slab = Roboto Slab, serif; Rochester = Rochester, cursive; Rock Salt = Rock Salt, cursive; Rod = Rod; Rokkitt = Rokkitt, serif; Romanesco = Romanesco, cursive; Ropa Sans = Ropa Sans, sans-serif; Rosario = Rosario, sans-serif; Rosarivo = Rosarivo, serif; Rouge Script = Rouge Script, cursive; Rozha One = Rozha One, serif; Rubik = Rubik, sans-serif; Rubik Mono One = Rubik Mono One, sans-serif; Ruda = Ruda, sans-serif; Rufina = Rufina, serif; Ruge Boogie = Ruge Boogie, cursive; Ruluko = Ruluko, sans-serif; Rum Raisin = Rum Raisin, sans-serif; Ruslan Display = Ruslan Display, cursive; Russo One = Russo One, sans-serif; Ruthie = Ruthie, cursive; Rye = Rye, cursive; Sacramento = Sacramento, cursive; Sahitya = Sahitya, serif; Sail = Sail, cursive; Saira = Saira, sans-serif; Saira Condensed = Saira Condensed, sans-serif; Saira Extra Condensed = Saira Extra Condensed, sans-serif; Saira Semi Condensed = Saira Semi Condensed, sans-serif; Sakkal Majalla = Sakkal Majalla; Salsa = Salsa, cursive; Sanchez = Sanchez, serif; Sancreek = Sancreek, cursive; Sansita = Sansita, sans-serif; Sarala = Sarala, sans-serif; Sarina = Sarina, cursive; Sarpanch = Sarpanch, sans-serif; Satisfy = Satisfy, cursive; Scada = Scada, sans-serif; Scheherazade = Scheherazade, serif; Schoolbell = Schoolbell, cursive; Scope One = Scope One, serif; Seaweed Script = Seaweed Script, cursive; Secular One = Secular One, sans-serif; Sedgwick Ave = Sedgwick Ave, cursive; Sedgwick Ave Display = Sedgwick Ave Display, cursive; Segoe Print = Segoe Print; Segoe Script = Segoe Script; Segoe UI Symbol = Segoe UI Symbol; Sevillana = Sevillana, cursive; Seymour One = Seymour One, sans-serif; Shadows Into Light = Shadows Into Light, cursive; Shadows Into Light Two = Shadows Into Light Two, cursive; Shanti = Shanti, sans-serif; Share = Share, cursive; Share Tech = Share Tech, sans-serif; Share Tech Mono = Share Tech Mono, monospace; Shojumaru = Shojumaru, cursive; Shonar Bangla = Shonar Bangla; Short Stack = Short Stack, cursive; Shrikhand = Shrikhand, cursive; Shruti = Shruti; Siemreap = Siemreap, cursive; Sigmar One = Sigmar One, cursive; Signika = Signika, sans-serif; Signika Negative = Signika Negative, sans-serif; SimHei = SimHei; SimKai = SimKai; Simonetta = Simonetta, cursive; Simplified Arabic = Simplified Arabic; SimSun = SimSun; SimSun-ExtB = SimSun-ExtB; Sintony = Sintony, sans-serif; Sirin Stencil = Sirin Stencil, cursive; Six Caps = Six Caps, sans-serif; Skranji = Skranji, cursive; Slackey = Slackey, cursive; Smokum = Smokum, cursive; Smythe = Smythe, cursive; Sniglet = Sniglet, cursive; Snippet = Snippet, sans-serif; Snowburst One = Snowburst One, cursive; Sofadi One = Sofadi One, cursive; Sofia = Sofia, cursive; Song Myung = Song Myung, serif; Sonsie One = Sonsie One, cursive; Sorts Mill Goudy = Sorts Mill Goudy, serif; Source Code Pro = Source Code Pro, monospace; Source Sans Pro = Source Sans Pro, sans-serif; Source Serif Pro = Source Serif Pro, serif; Space Mono = Space Mono, monospace; Special Elite = Special Elite, cursive; Spectral = Spectral, serif; Spectral SC = Spectral SC, serif; Spicy Rice = Spicy Rice, cursive; Spinnaker = Spinnaker, sans-serif; Spirax = Spirax, cursive; Squada One = Squada One, cursive; Sree Krushnadevaraya = Sree Krushnadevaraya, serif; Sriracha = Sriracha, cursive; Stalemate = Stalemate, cursive; Stalinist One = Stalinist One, cursive; Stardos Stencil = Stardos Stencil, cursive; Stint Ultra Condensed = Stint Ultra Condensed, cursive; Stint Ultra Expanded = Stint Ultra Expanded, cursive; Stoke = Stoke, serif; Strait = Strait, sans-serif; Stylish = Stylish, sans-serif; Sue Ellen Francisco = Sue Ellen Francisco, cursive; Suez One = Suez One, serif; Sumana = Sumana, serif; Sunflower = Sunflower, sans-serif; Sunshiney = Sunshiney, cursive; Supermercado One = Supermercado One, cursive; Sura = Sura, serif; Suranna = Suranna, serif; Suravaram = Suravaram, serif; Suwannaphum = Suwannaphum, cursive; Swanky and Moo Moo = Swanky and Moo Moo, cursive; Sylfaen = Sylfaen; Syncopate = Syncopate, sans-serif; Tahoma = Tahoma; Tajawal = Tajawal, sans-serif; Tangerine = Tangerine, cursive; Taprom = Taprom, cursive; Tauri = Tauri, sans-serif; Taviraj = Taviraj, serif; Teko = Teko, sans-serif; Telex = Telex, sans-serif; Tenali Ramakrishna = Tenali Ramakrishna, sans-serif; Tenor Sans = Tenor Sans, sans-serif; Text Me One = Text Me One, sans-serif; The Girl Next Door = The Girl Next Door, cursive; Tienne = Tienne, serif; Tillana = Tillana, cursive; Times New Roman = Times New Roman; Timmana = Timmana, sans-serif; Tinos = Tinos, serif; Titan One = Titan One, cursive; Titillium Web = Titillium Web, sans-serif; Trade Winds = Trade Winds, cursive; Traditional Arabic = Traditional Arabic; Trebuchet MS = Trebuchet MS; Trirong = Trirong, serif; Trocchi = Trocchi, serif; Trochut = Trochut, cursive; Trykker = Trykker, serif; Tulpen One = Tulpen One, cursive; Tunga = Tunga; Ubuntu = Ubuntu, sans-serif; Ubuntu Condensed = Ubuntu Condensed, sans-serif; Ubuntu Mono = Ubuntu Mono, monospace; Ultra = Ultra, serif; Uncial Antiqua = Uncial Antiqua, cursive; Underdog = Underdog, cursive; Unica One = Unica One, cursive; UnifrakturCook = UnifrakturCook, cursive; UnifrakturMaguntia = UnifrakturMaguntia, cursive; Unkempt = Unkempt, cursive; Unlock = Unlock, cursive; Unna = Unna, serif; Utsaah = Utsaah; Vampiro One = Vampiro One, cursive; Vani = Vani; Varela = Varela, sans-serif; Varela Round = Varela Round, sans-serif; Vast Shadow = Vast Shadow, cursive; Vesper Libre = Vesper Libre, serif; Vibur = Vibur, cursive; Vidaloka = Vidaloka, serif; Viga = Viga, sans-serif; Vijaya = Vijaya; Voces = Voces, cursive; Volkhov = Volkhov, serif; Vollkorn = Vollkorn, serif; Vollkorn SC = Vollkorn SC, serif; Voltaire = Voltaire, sans-serif; VT323 = VT323, monospace; Waiting for the Sunrise = Waiting for the Sunrise, cursive; Wallpoet = Wallpoet, cursive; Walter Turncoat = Walter Turncoat, cursive; Warnes = Warnes, cursive; Wellfleet = Wellfleet, cursive; Wendy One = Wendy One, sans-serif; Wire One = Wire One, sans-serif; Work Sans = Work Sans, sans-serif; Yanone Kaffeesatz = Yanone Kaffeesatz, sans-serif; Yantramanav = Yantramanav, sans-serif; Yatra One = Yatra One, cursive; Yellowtail = Yellowtail, cursive; Yeon Sung = Yeon Sung, cursive; Yeseva One = Yeseva One, cursive; Yesteryear = Yesteryear, cursive; Yrsa = Yrsa, serif; Zeyada = Zeyada, cursive; Zilla Slab = Zilla Slab, serif; Zilla Slab Highlight = Zilla Slab Highlight, cursive'
	});
}
// Theme Menu
function Total_Soft_Gallery_Video_Opt_AMD2_But1()
{
	alert('This is Our Free Version. For more adventures Click to buy Personal version.');
}
function TotalSoft_VG_GVG_HEffect()
{
	var TotalSoft_VG_GVG_HE=jQuery('#TotalSoft_GV_GG_06').val();
	if(TotalSoft_VG_GVG_HE=='drop-shadow')
	{
		jQuery('#TotalSoft_GV_GG_07').hide(500);
		jQuery('#TotalSoft_GV_GG_07_Output').hide(500);
		jQuery('.DropShadow1').hide();
		setTimeout(function(){
			jQuery('.DropShadow').show(500);
		},500)
	}
	else if(TotalSoft_VG_GVG_HE=='opacity')
	{
		jQuery('#TotalSoft_GV_GG_07').show(500);
		jQuery('#TotalSoft_GV_GG_07_Output').show(500);
		jQuery('.DropShadow').hide(500);
		setTimeout(function(){
			jQuery('.DropShadow1').show();
		},500)
	}
	else
	{
		jQuery('#TotalSoft_GV_GG_07').hide(500);
		jQuery('#TotalSoft_GV_GG_07_Output').hide(500);
		jQuery('.DropShadow').hide(500);
		setTimeout(function(){
			jQuery('.DropShadow1').show();
		},500)
	}
}
function TotalSoftGalleryV_Clone_Option(Gallery_Video_OptID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftGalleryV_Clone_Option', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Gallery_Video_OptID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		location.reload();
	})
}
function TotalSoftGalleryV_Del_Option(Gallery_Video_OptID)
{
	jQuery('#Total_Soft_AMOTable_tr_'+Gallery_Video_OptID).find('.Total_Soft_GVideo_Del_Span').addClass('Total_Soft_GVideo_Del_Span1');
}
function TotalSoftGalleryV_Del_Option_No(Gallery_Video_OptID)
{
	jQuery('#Total_Soft_AMOTable_tr_'+Gallery_Video_OptID).find('.Total_Soft_GVideo_Del_Span').removeClass('Total_Soft_GVideo_Del_Span1');
}
function TotalSoftGalleryV_Edit_Option(Gallery_Video_OptID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftGallery_VideoOpt_Edit', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Gallery_Video_OptID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var b=Array();
		var a=response.split('=>');
		for(var i=3;i<a.length;i++)
		{ b[b.length]=a[i].split('[')[0].trim(); }
		b[b.length-1]=b[b.length-1].split(')')[0].trim();
		
		setTimeout(function(){
			jQuery('#Total_SoftGallery_Video_Update').val(Gallery_Video_OptID);
			jQuery('#TotalSoftGalleryV_SetName').val(b[1]); jQuery('#TotalSoftGalleryV_SetType').val(b[2]);

			if(b[2]=='Grid Video Gallery')
			{
				if(b[3]=='true'){ b[3]=true; }else{ b[3]=false; }
				if(b[4]=='true'){ b[4]=true; }else{ b[4]=false; }
				jQuery('#TotalSoft_GV_GG_01').attr('checked', b[3]); jQuery('#TotalSoft_GV_GG_02').attr('checked', b[4]); jQuery('#TotalSoft_GV_GG_03').val(b[5]); jQuery('#TotalSoft_GV_GG_04').val(b[6]); jQuery('#TotalSoft_GV_GG_05').val(b[7]); jQuery('#TotalSoft_GV_GG_06').val(b[8]); jQuery('#TotalSoft_GV_GG_07').val(parseInt(parseFloat(b[9])*100)); jQuery('#TotalSoft_GV_GG_08').val(b[10]); jQuery('#TotalSoft_GV_GG_09').val(b[11]); jQuery('#TotalSoft_GV_GG_10').val(b[12]); jQuery('#TotalSoft_GV_GG_11').val(b[13]); jQuery('#TotalSoft_GV_GG_12').val(b[14]); jQuery('#TotalSoft_GV_GG_13').val(b[15]); jQuery('#TotalSoft_GV_GG_14').val(b[16]); jQuery('#TotalSoft_GV_GG_15').val(b[17]); jQuery('#TotalSoft_GV_GG_16').val(b[18]); jQuery('#TotalSoft_GV_GG_17').val(b[19]); jQuery('#TotalSoft_GV_GG_18').val(b[20]); jQuery('#TotalSoft_GV_GG_19').val(b[21]); jQuery('#TotalSoft_GV_GG_20').val(b[22]); jQuery('#TotalSoft_GV_GG_21').val(b[23]); jQuery('#TotalSoft_GV_GG_22').val(b[24]); jQuery('#TotalSoft_GV_GG_23').val(b[25]); jQuery('#TotalSoft_GV_GG_24').val(b[26]); jQuery('#TotalSoft_GV_GG_25').val(b[27]); jQuery('#TotalSoft_GV_GG_26').val(b[28]); jQuery('#TotalSoft_GV_GG_27').val(b[29]); jQuery('#TotalSoft_GV_GG_28').val(b[30]); jQuery('#TotalSoft_GV_GG_29').val(b[31]); jQuery('#TotalSoft_GV_GG_30').val(b[32]); jQuery('#TotalSoft_GV_GG_31').val(b[33]); jQuery('#TotalSoft_GV_GG_32').val(b[34]); jQuery('#TotalSoft_GV_GG_33').val(b[35]); jQuery('#TotalSoft_GV_GG_34').val(b[36]); jQuery('#TotalSoft_GV_GG_35').val(b[37]); jQuery('#TotalSoft_GV_GG_36').val(b[38]); jQuery('#TotalSoft_GV_GG_37').val(b[39]); jQuery('#TotalSoft_GV_GG_38').val(b[40]); jQuery('#TotalSoft_GV_GG_39').val(b[41]);
				TotalSoft_VG_GVG_HEffect();
			}
			else if(b[2]=='LightBox Video Gallery')
			{
				if(b[16]=='true'){ b[16]=true; }else{ b[16]=false; }

				jQuery('#TotalSoft_GV_LG_01').val(b[3]); jQuery('#TotalSoft_GV_LG_02').val(b[4]); jQuery('#TotalSoft_GV_LG_03').val(b[5]); jQuery('#TotalSoft_GV_LG_04').val(b[6]); jQuery('#TotalSoft_GV_LG_05').val(b[7]); jQuery('#TotalSoft_GV_LG_06').val(b[8]); jQuery('#TotalSoft_GV_LG_07').val(b[9]); jQuery('#TotalSoft_GV_LG_08').val(b[10]); jQuery('#TotalSoft_GV_LG_09').val(b[11]); jQuery('#TotalSoft_GV_LG_10').val(b[12]); jQuery('#TotalSoft_GV_LG_11').val(b[13]); jQuery('#TotalSoft_GV_LG_12').val(b[14]); jQuery('#TotalSoft_GV_LG_13').val(b[15]); jQuery('#TotalSoft_GV_LG_14').attr('checked', b[16]); jQuery('#TotalSoft_GV_LG_15').val(b[17]); jQuery('#TotalSoft_GV_LG_16').val(b[18]); jQuery('#TotalSoft_GV_LG_17').val(b[19]); jQuery('#TotalSoft_GV_LG_18').val(b[20]); jQuery('#TotalSoft_GV_LG_19').val(b[21]); jQuery('#TotalSoft_GV_LG_20').val(b[22]); jQuery('#TotalSoft_GV_LG_21').val(b[23]); jQuery('#TotalSoft_GV_LG_22').val(b[24]); jQuery('#TotalSoft_GV_LG_23').val(b[25]); jQuery('#TotalSoft_GV_LG_24').val(b[26]); jQuery('#TotalSoft_GV_LG_25').val(b[27]); jQuery('#TotalSoft_GV_LG_26').val(b[28]); jQuery('#TotalSoft_GV_LG_27').val(b[29]); jQuery('#TotalSoft_GV_LG_28').val(b[30]); jQuery('#TotalSoft_GV_LG_29').val(b[31]); jQuery('#TotalSoft_GV_LG_30').val(b[32]); jQuery('#TotalSoft_GV_LG_31').val(b[33]); jQuery('#TotalSoft_GV_LG_32').val(b[34]); jQuery('#TotalSoft_GV_LG_33').val(b[35]); jQuery('#TotalSoft_GV_LG_34').val(b[36]); jQuery('#TotalSoft_GV_LG_35').val(b[37]); jQuery('#TotalSoft_GV_LG_36').val(b[38]); jQuery('#TotalSoft_GV_LG_37').val(b[39]); jQuery('#TotalSoft_GV_LG_38').val(b[40]); jQuery('#TotalSoft_GV_LG_39').val(b[41]);
			}
			else if(b[2]=='Thumbnails Video')
			{
				if(b[22]=='true'){ b[22]=true; }else{ b[22]=false; }
				if(b[26]=='true'){ b[26]=true; }else{ b[26]=false; }

				jQuery('#TotalSoft_GV_TV_01').val(b[3]); jQuery('#TotalSoft_GV_TV_02').val(b[4]); jQuery('#TotalSoft_GV_TV_03').val(b[5]); jQuery('#TotalSoft_GV_TV_04').val(b[6]); jQuery('#TotalSoft_GV_TV_05').val(b[7]); jQuery('#TotalSoft_GV_TV_06').val(b[8]); jQuery('#TotalSoft_GV_TV_07').val(b[9]); jQuery('#TotalSoft_GV_TV_08').val(b[10]); jQuery('#TotalSoft_GV_TV_09').val(b[11]); jQuery('#TotalSoft_GV_TV_10').val(b[12]); jQuery('#TotalSoft_GV_TV_11').val(b[13]); jQuery('#TotalSoft_GV_TV_12').val(b[14]); jQuery('#TotalSoft_GV_TV_19').val(b[21]); jQuery('#TotalSoft_GV_TV_20').attr('checked', b[22]); jQuery('#TotalSoft_GV_TV_21').val(b[23]); jQuery('#TotalSoft_GV_TV_22').val(b[24]); jQuery('#TotalSoft_GV_TV_23').val(b[25]); jQuery('#TotalSoft_GV_TV_24').attr('checked', b[26]); jQuery('#TotalSoft_GV_TV_25').val(b[27]); jQuery('#TotalSoft_GV_TV_26').val(b[28]); jQuery('#TotalSoft_GV_TV_27').val(b[29]); jQuery('#TotalSoft_GV_TV_28').val(b[30]); jQuery('#TotalSoft_GV_TV_29').val(b[31]); jQuery('#TotalSoft_GV_TV_30').val(b[32]); jQuery('#TotalSoft_GV_TV_31').val(b[33]); jQuery('#TotalSoft_GV_TV_32').val(b[34]); jQuery('#TotalSoft_GV_TV_33').val(b[35]); jQuery('#TotalSoft_GV_TV_34').val(b[36]); jQuery('#TotalSoft_GV_TV_35').val(b[37]); jQuery('#TotalSoft_GV_TV_36').val(b[38]); jQuery('#TotalSoft_GV_TV_37').val(b[39]); jQuery('#TotalSoft_GV_TV_38').val(b[40]); jQuery('#TotalSoft_GV_TV_39').val(b[41]); 
			}
			else if(b[2]=='Content Popup')
			{
				if(b[8]=='true'){ b[8]=true; }else{ b[8]=false; }
				if(b[13]=='true'){ b[13]=true; }else{ b[13]=false; }
				if(b[18]=='true'){ b[18]=true; }else{ b[18]=false; }

				jQuery('#TotalSoft_GV_CP_01').val(b[3]); jQuery('#TotalSoft_GV_CP_02').val(b[4]); jQuery('#TotalSoft_GV_CP_03').val(b[5]); jQuery('#TotalSoft_GV_CP_04').val(b[6]); jQuery('#TotalSoft_GV_CP_05').val(b[7]); jQuery('#TotalSoft_GV_CP_06').attr('checked', b[8]); jQuery('#TotalSoft_GV_CP_07').val(b[9]); jQuery('#TotalSoft_GV_CP_08').val(b[10]); jQuery('#TotalSoft_GV_CP_09').val(b[11]); jQuery('#TotalSoft_GV_CP_10').val(b[12]); jQuery('#TotalSoft_GV_CP_11').attr('checked', b[13]); jQuery('#TotalSoft_GV_CP_12').val(b[14]); jQuery('#TotalSoft_GV_CP_13').val(b[15]); jQuery('#TotalSoft_GV_CP_14').val(b[16]); jQuery('#TotalSoft_GV_CP_15').val(b[17]); jQuery('#TotalSoft_GV_CP_16').attr('checked', b[18]); jQuery('#TotalSoft_GV_CP_17').val(b[19]); jQuery('#TotalSoft_GV_CP_18').val(b[20]); jQuery('#TotalSoft_GV_CP_19').val(b[21]); jQuery('#TotalSoft_GV_CP_20').val(b[22]); jQuery('#TotalSoft_GV_CP_21').val(b[23]); jQuery('#TotalSoft_GV_CP_22').val(b[24]); jQuery('#TotalSoft_GV_CP_23').val(b[25]); jQuery('#TotalSoft_GV_CP_24').val(b[26]); jQuery('#TotalSoft_GV_CP_25').val(b[27]); jQuery('#TotalSoft_GV_CP_26').val(b[28]); jQuery('#TotalSoft_GV_CP_27').val(b[29]); jQuery('#TotalSoft_GV_CP_28').val(b[30]); jQuery('#TotalSoft_GV_CP_29').val(b[31]); jQuery('#TotalSoft_GV_CP_30').val(b[32]); jQuery('#TotalSoft_GV_CP_31').val(b[33]); jQuery('#TotalSoft_GV_CP_32').val(b[34]); jQuery('#TotalSoft_GV_CP_33').val(b[35]); jQuery('#TotalSoft_GV_CP_34').val(b[36]); jQuery('#TotalSoft_GV_CP_35').val(b[37]); jQuery('#TotalSoft_GV_CP_36').val(b[38]); jQuery('#TotalSoft_GV_CP_37').val(b[39]); jQuery('#TotalSoft_GV_CP_38').val(b[40]); jQuery('#TotalSoft_GV_CP_39').val(b[41]);
			}
			else if(b[2]=='Elastic Gallery')
			{
				if(b[18]=='true'){ b[18]=true; }else{ b[18]=false; }
				if(b[39]=='true'){ b[39]=true; }else{ b[39]=false; }
				if(b[40]=='true'){ b[40]=true; }else{ b[40]=false; }

				jQuery('#TotalSoft_GV_EG_01').val(b[3]); jQuery('#TotalSoft_GV_EG_02').val(b[4]); jQuery('#TotalSoft_GV_EG_03').val(b[5]); jQuery('#TotalSoft_GV_EG_04').val(b[6]); jQuery('#TotalSoft_GV_EG_05').val(b[7]); jQuery('#TotalSoft_GV_EG_06').val(b[8]); jQuery('#TotalSoft_GV_EG_07').val(b[9]); jQuery('#TotalSoft_GV_EG_08').val(b[10]); jQuery('#TotalSoft_GV_EG_09').val(b[11]); jQuery('#TotalSoft_GV_EG_10').val(b[12]); jQuery('#TotalSoft_GV_EG_11').val(b[13]); jQuery('#TotalSoft_GV_EG_12').val(b[14]); jQuery('#TotalSoft_GV_EG_13').val(b[15]); jQuery('#TotalSoft_GV_EG_14').val(b[16]); jQuery('#TotalSoft_GV_EG_15').val(b[17]); jQuery('#TotalSoft_GV_EG_16').attr('checked', b[18]); jQuery('#TotalSoft_GV_EG_17').val(b[19]); jQuery('#TotalSoft_GV_EG_18').val(b[20]); jQuery('#TotalSoft_GV_EG_19').val(b[21]); jQuery('#TotalSoft_GV_EG_20').val(b[22]); jQuery('#TotalSoft_GV_EG_21').val(b[23]); jQuery('#TotalSoft_GV_EG_22').val(b[24]); jQuery('#TotalSoft_GV_EG_23').val(b[25]); jQuery('#TotalSoft_GV_EG_24').val(b[26]); jQuery('#TotalSoft_GV_EG_25').val(b[27]); jQuery('#TotalSoft_GV_EG_26').val(b[28]); jQuery('#TotalSoft_GV_EG_27').val(b[29]); jQuery('#TotalSoft_GV_EG_28').val(b[30]); jQuery('#TotalSoft_GV_EG_29').val(b[31]); jQuery('#TotalSoft_GV_EG_30').val(b[32]); jQuery('#TotalSoft_GV_EG_31').val(b[33]); jQuery('#TotalSoft_GV_EG_32').val(b[34]); jQuery('#TotalSoft_GV_EG_33').val(b[35]); jQuery('#TotalSoft_GV_EG_34').val(b[36]); jQuery('#TotalSoft_GV_EG_35').val(b[37]); jQuery('#TotalSoft_GV_EG_36').val(b[38]); jQuery('#TotalSoft_GV_EG_37').attr('checked', b[39]); jQuery('#TotalSoft_GV_EG_38').attr('checked', b[40]); jQuery('#TotalSoft_GV_EG_39').val(b[41]);
			}
			else if(b[2]=='Fancy Gallery')
			{
				jQuery('#TotalSoft_GV_FG_01').val(b[3]); jQuery('#TotalSoft_GV_FG_02').val(b[4]); jQuery('#TotalSoft_GV_FG_03').val(b[5]); jQuery('#TotalSoft_GV_FG_04').val(b[6]); jQuery('#TotalSoft_GV_FG_05').val(b[7]); jQuery('#TotalSoft_GV_FG_06').val(b[8]); jQuery('#TotalSoft_GV_FG_07').val(b[9]); jQuery('#TotalSoft_GV_FG_08').val(b[10]); jQuery('#TotalSoft_GV_FG_09').val(b[11]); jQuery('#TotalSoft_GV_FG_10').val(b[12]); jQuery('#TotalSoft_GV_FG_11').val(b[13]); jQuery('#TotalSoft_GV_FG_12').val(b[14]); jQuery('#TotalSoft_GV_FG_13').val(b[15]); jQuery('#TotalSoft_GV_FG_14').val(b[16]); jQuery('#TotalSoft_GV_FG_15').val(b[17]); jQuery('#TotalSoft_GV_FG_16').val(b[18]); jQuery('#TotalSoft_GV_FG_17').val(b[19]); jQuery('#TotalSoft_GV_FG_18').val(b[20]); jQuery('#TotalSoft_GV_FG_19').val(b[21]); jQuery('#TotalSoft_GV_FG_20').val(b[22]); jQuery('#TotalSoft_GV_FG_21').val(b[23]); jQuery('#TotalSoft_GV_FG_22').val(b[24]); jQuery('#TotalSoft_GV_FG_23').val(b[25]); jQuery('#TotalSoft_GV_FG_24').val(b[26]); jQuery('#TotalSoft_GV_FG_25').val(b[27]); jQuery('#TotalSoft_GV_FG_26').val(b[28]); jQuery('#TotalSoft_GV_FG_27').val(b[29]); jQuery('#TotalSoft_GV_FG_28').val(b[30]); jQuery('#TotalSoft_GV_FG_29').val(b[31]); jQuery('#TotalSoft_GV_FG_30').val(b[32]); jQuery('#TotalSoft_GV_FG_31').val(b[33]); jQuery('#TotalSoft_GV_FG_32').val(b[34]); jQuery('#TotalSoft_GV_FG_33').val(b[35]); jQuery('#TotalSoft_GV_FG_34').val(b[36]); jQuery('#TotalSoft_GV_FG_35').val(b[37]); jQuery('#TotalSoft_GV_FG_36').val(b[38]); jQuery('#TotalSoft_GV_FG_37').val(b[39]); jQuery('#TotalSoft_GV_FG_38').val(b[40]); jQuery('#TotalSoft_GV_FG_39').val(b[41]);
			}
			else if(b[2]=='Parallax Engine')
			{
				if(b[17]=='true'){ b[17]=true; }else{ b[17]=false; }
				if(b[22]=='true'){ b[22]=true; }else{ b[22]=false; }
				if(b[29]=='true'){ b[29]=true; }else{ b[29]=false; }

				jQuery('#TotalSoft_GV_PE_01').val(b[3]); jQuery('#TotalSoft_GV_PE_02').val(b[4]); jQuery('#TotalSoft_GV_PE_03').val(b[5]); jQuery('#TotalSoft_GV_PE_04').val(b[6]); jQuery('#TotalSoft_GV_PE_05').val(b[7]); jQuery('#TotalSoft_GV_PE_06').val(b[8]); jQuery('#TotalSoft_GV_PE_07').val(b[9]); jQuery('#TotalSoft_GV_PE_08').val(b[10]); jQuery('#TotalSoft_GV_PE_09').val(b[11]); jQuery('#TotalSoft_GV_PE_10').val(b[12]); jQuery('#TotalSoft_GV_PE_11').val(b[13]); jQuery('#TotalSoft_GV_PE_12').val(b[14]); jQuery('#TotalSoft_GV_PE_13').val(b[15]); jQuery('#TotalSoft_GV_PE_14').val(b[16]); jQuery('#TotalSoft_GV_PE_15').attr('checked', b[17]); jQuery('#TotalSoft_GV_PE_16').val(b[18]); jQuery('#TotalSoft_GV_PE_17').val(b[19]); jQuery('#TotalSoft_GV_PE_18').val(b[20]); jQuery('#TotalSoft_GV_PE_19').val(b[21]); jQuery('#TotalSoft_GV_PE_20').attr('checked', b[22]); jQuery('#TotalSoft_GV_PE_21').val(b[23]); jQuery('#TotalSoft_GV_PE_22').val(b[24]); jQuery('#TotalSoft_GV_PE_23').val(b[25]); jQuery('#TotalSoft_GV_PE_24').val(b[26]); jQuery('#TotalSoft_GV_PE_25').val(b[27]); jQuery('#TotalSoft_GV_PE_26').val(b[28]); jQuery('#TotalSoft_GV_PE_27').attr('checked', b[29]); jQuery('#TotalSoft_GV_PE_28').val(b[30]); jQuery('#TotalSoft_GV_PE_29').val(b[31]); jQuery('#TotalSoft_GV_PE_30').val(b[32]); jQuery('#TotalSoft_GV_PE_31').val(b[33]); jQuery('#TotalSoft_GV_PE_32').val(b[34]); jQuery('#TotalSoft_GV_PE_33').val(b[35]); jQuery('#TotalSoft_GV_PE_34').val(b[36]); jQuery('#TotalSoft_GV_PE_35').val(b[37]); jQuery('#TotalSoft_GV_PE_36').val(b[38]); jQuery('#TotalSoft_GV_PE_37').val(b[39]); jQuery('#TotalSoft_GV_PE_38').val(b[40]); jQuery('#TotalSoft_GV_PE_39').val(b[41]);
			}
			else if(b[2]=='Classic Gallery')
			{
				if(b[21]=='true'){ b[21]=true; }else{ b[21]=false; }
				if(b[26]=='true'){ b[26]=true; }else{ b[26]=false; }

				jQuery('#TotalSoft_GV_CG_01').val(b[3]); jQuery('#TotalSoft_GV_CG_02').val(b[4]); jQuery('#TotalSoft_GV_CG_03').val(b[5]); jQuery('#TotalSoft_GV_CG_04').val(b[6]); jQuery('#TotalSoft_GV_CG_05').val(b[7]); jQuery('#TotalSoft_GV_CG_06').val(b[8]); jQuery('#TotalSoft_GV_CG_07').val(b[9]); jQuery('#TotalSoft_GV_CG_08').val(b[10]); jQuery('#TotalSoft_GV_CG_09').val(b[11]); jQuery('#TotalSoft_GV_CG_10').val(b[12]); jQuery('#TotalSoft_GV_CG_11').val(b[13]); jQuery('#TotalSoft_GV_CG_12').val(b[14]); jQuery('#TotalSoft_GV_CG_13').val(b[15]); jQuery('#TotalSoft_GV_CG_14').val(b[16]); jQuery('#TotalSoft_GV_CG_15').val(b[17]); jQuery('#TotalSoft_GV_CG_16').val(b[18]); jQuery('#TotalSoft_GV_CG_17').val(b[19]); jQuery('#TotalSoft_GV_CG_18').val(b[20]); jQuery('#TotalSoft_GV_CG_19').attr('checked', b[21]); jQuery('#TotalSoft_GV_CG_20').val(b[22]); jQuery('#TotalSoft_GV_CG_21').val(b[23]); jQuery('#TotalSoft_GV_CG_22').val(b[24]); jQuery('#TotalSoft_GV_CG_23').val(b[25]); jQuery('#TotalSoft_GV_CG_24').attr('checked', b[26]); jQuery('#TotalSoft_GV_CG_25').val(b[27]); jQuery('#TotalSoft_GV_CG_26').val(b[28]); jQuery('#TotalSoft_GV_CG_27').val(b[29]); jQuery('#TotalSoft_GV_CG_28').val(b[30]); jQuery('#TotalSoft_GV_CG_29').val(b[31]); jQuery('#TotalSoft_GV_CG_30').val(b[32]); jQuery('#TotalSoft_GV_CG_31').val(b[33]); jQuery('#TotalSoft_GV_CG_32').val(b[34]); jQuery('#TotalSoft_GV_CG_33').val(b[35]); jQuery('#TotalSoft_GV_CG_34').val(b[36]); jQuery('#TotalSoft_GV_CG_35').val(b[37]); jQuery('#TotalSoft_GV_CG_36').val(b[38]); jQuery('#TotalSoft_GV_CG_37').val(b[39]); jQuery('#TotalSoft_GV_CG_38').val(b[40]); jQuery('#TotalSoft_GV_CG_39').val(b[41]);
			}
			else if(b[2]=='Space Gallery')
			{
				jQuery('#TotalSoft_GV_SG_01').val(b[3]); jQuery('#TotalSoft_GV_SG_02').val(b[4]); jQuery('#TotalSoft_GV_SG_03').val(b[5]); jQuery('#TotalSoft_GV_SG_04').val(b[6]); jQuery('#TotalSoft_GV_SG_05').val(b[7]); jQuery('#TotalSoft_GV_SG_06').val(b[8]); jQuery('#TotalSoft_GV_SG_07').val(b[9]); jQuery('#TotalSoft_GV_SG_08').val(b[10]); jQuery('#TotalSoft_GV_SG_09').val(b[11]); jQuery('#TotalSoft_GV_SG_10').val(b[12]); jQuery('#TotalSoft_GV_SG_12').val(b[14]); jQuery('#TotalSoft_GV_SG_14').val(b[16]); jQuery('#TotalSoft_GV_SG_15').val(b[17]); jQuery('#TotalSoft_GV_SG_16').val(b[18]); jQuery('#TotalSoft_GV_SG_17').val(b[19]); jQuery('#TotalSoft_GV_SG_18').val(b[20]); jQuery('#TotalSoft_GV_SG_19').val(b[21]); jQuery('#TotalSoft_GV_SG_20').val(b[22]); jQuery('#TotalSoft_GV_SG_21').val(b[23]); jQuery('#TotalSoft_GV_SG_22').val(b[24]); jQuery('#TotalSoft_GV_SG_23').val(b[25]); jQuery('#TotalSoft_GV_SG_24').val(b[26]); jQuery('#TotalSoft_GV_SG_25').val(b[27]); jQuery('#TotalSoft_GV_SG_26').val(b[28]); jQuery('#TotalSoft_GV_SG_27').val(b[29]); jQuery('#TotalSoft_GV_SG_28').val(b[30]); jQuery('#TotalSoft_GV_SG_29').val(b[31]); jQuery('#TotalSoft_GV_SG_30').val(b[32]); jQuery('#TotalSoft_GV_SG_31').val(b[33]); jQuery('#TotalSoft_GV_SG_32').val(b[34]); jQuery('#TotalSoft_GV_SG_33').val(b[35]);
			}
			TotalSoft_VGallery_Out();
			jQuery('.Total_Soft_VGallery_Color').alphaColorPicker();
			jQuery('.wp-picker-holder').addClass('alpha-picker-holder');
		},500)
	})

	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftGallery_VideoOpt_Edit1', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Gallery_Video_OptID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var b=Array();
		var a=response.split('=>');
		for(var i=3;i<a.length;i++)
		{ b[b.length]=a[i].split('[')[0].trim(); }
		b[b.length-1]=b[b.length-1].split(')')[0].trim();
		jQuery('.Total_Soft_Gallery_Video_AMD2').hide(500);
		jQuery('.Total_Soft_AMMTable').hide(500);
		jQuery('.Total_Soft_AMOTable').hide(500);
		jQuery('.Total_Soft_Gallery_Video_Save_Option').hide(500);
		jQuery('.Total_Soft_Gallery_Video_Update_Option').show(500);
		jQuery('#TotalSoftGalleryV_SetType').hide(500);
		setTimeout(function(){
			if(b[2]=='Grid Video Gallery')
			{
				if(b[24]=='true'){ b[24]=true; }else{ b[24]=false; }
				if(b[25]=='true'){ b[25]=true; }else{ b[25]=false; }
				jQuery('#TotalSoft_GV_GG_40').val(b[3]); jQuery('#TotalSoft_GV_GG_41').val(b[4]); jQuery('#TotalSoft_GV_GG_42').val(b[5]); jQuery('#TotalSoft_GV_GG_43').val(b[6]); jQuery('#TotalSoft_GV_GG_44').val(b[7]); jQuery('#TotalSoft_GV_GG_45').val(b[8]); jQuery('#TotalSoft_GV_GG_46').val(b[9]); jQuery('#TotalSoft_GV_GG_47').val(b[10]); jQuery('#TotalSoft_GV_GG_48').val(b[11]); jQuery('#TotalSoft_GV_GG_49').val(b[12]); jQuery('#TotalSoft_GV_GG_50').val(b[13]); jQuery('#TotalSoft_GV_GG_51').val(b[14]); jQuery('#TotalSoft_GV_GG_52').val(b[15]); jQuery('#TotalSoft_GV_GG_53').val(b[16]); jQuery('#TotalSoft_GV_GG_54').val(b[17]); jQuery('#TotalSoft_GV_GG_55').val(b[18]); jQuery('#TotalSoft_GV_GG_56').val(b[19]); jQuery('#TotalSoft_GV_GG_57').val(b[20]); jQuery('#TotalSoft_GV_GG_58').val(b[21]); jQuery('#TotalSoft_GV_GG_59').val(b[22]); jQuery('#TotalSoft_GV_GG_60').val(b[23]); jQuery('#TotalSoft_GV_GG_61').attr('checked', b[24]); jQuery('#TotalSoft_GV_GG_62').attr('checked', b[25]); jQuery('#TotalSoft_GV_GG_63').val(b[26]); jQuery('#TotalSoft_GV_GG_64').val(b[27]); jQuery('#TotalSoft_GV_GG_65').val(b[28]);

				jQuery('#Total_Soft_AMSetTable_1').show(500);
			} 
			else if(b[2]=='LightBox Video Gallery')
			{
				jQuery('#TotalSoft_GV_LG_40').val(b[3]); jQuery('#TotalSoft_GV_LG_41').val(b[4]); jQuery('#TotalSoft_GV_LG_42').val(b[5]); jQuery('#TotalSoft_GV_LG_43').val(b[6]); jQuery('#TotalSoft_GV_LG_44').val(b[7]); jQuery('#TotalSoft_GV_LG_45').val(b[8]); jQuery('#TotalSoft_GV_LG_46').val(b[9]); jQuery('#TotalSoft_GV_LG_47').val(b[10]); jQuery('#TotalSoft_GV_LG_48').val(b[11]); jQuery('#TotalSoft_GV_LG_49').val(b[12]); jQuery('#TotalSoft_GV_LG_50').val(b[13]); jQuery('#TotalSoft_GV_LG_51').val(b[14]); jQuery('#TotalSoft_GV_LG_52').val(b[15]); jQuery('#TotalSoft_GV_LG_53').val(b[16]); jQuery('#TotalSoft_GV_LG_54').val(b[17]); jQuery('#TotalSoft_GV_LG_55').val(b[18]); jQuery('#TotalSoft_GV_LG_56').val(b[19]); jQuery('#TotalSoft_GV_LG_57').val(b[20]); jQuery('#TotalSoft_GV_LG_58').val(b[21]); jQuery('#TotalSoft_GV_LG_59').val(b[22]); jQuery('#TotalSoft_GV_LG_60').val(b[23]); jQuery('#TotalSoft_GV_LG_61').val(b[24]); jQuery('#TotalSoft_GV_LG_62').val(b[25]); jQuery('#TotalSoft_GV_LG_63').val(b[26]); jQuery('#TotalSoft_GV_LG_64').val(b[27]); jQuery('#TotalSoft_GV_LG_65').val(b[28]); jQuery('#TotalSoft_GV_LG_66').val(b[29]); jQuery('#TotalSoft_GV_LG_67').val(b[30]); jQuery('#TotalSoft_GV_LG_68').val(b[31]); jQuery('#TotalSoft_GV_LG_69').val(b[32]); jQuery('#TotalSoft_GV_LG_70').val(b[33]); jQuery('#TotalSoft_GV_LG_71').val(b[34]); jQuery('#TotalSoft_GV_LG_72').val(b[35]); jQuery('#TotalSoft_GV_LG_73').val(b[36]); jQuery('#TotalSoft_GV_LG_74').val(b[37]);

				jQuery('#Total_Soft_AMSetTable_2').show(500);
			} 
			else if(b[2]=='Thumbnails Video')
			{
				jQuery('#TotalSoft_GV_TV_40').val(b[3]); jQuery('#TotalSoft_GV_TV_41').val(b[4]); jQuery('#TotalSoft_GV_TV_42').val(b[5]); jQuery('#TotalSoft_GV_TV_43').val(b[6]); jQuery('#TotalSoft_GV_TV_44').val(b[7]); jQuery('#TotalSoft_GV_TV_45').val(b[8]); jQuery('#TotalSoft_GV_TV_46').val(b[9]); jQuery('#TotalSoft_GV_TV_47').val(b[10]); jQuery('#TotalSoft_GV_TV_48').val(b[11]); jQuery('#TotalSoft_GV_TV_49').val(b[12]); jQuery('#TotalSoft_GV_TV_50').val(b[13]); jQuery('#TotalSoft_GV_TV_51').val(b[14]); jQuery('#TotalSoft_GV_TV_52').val(b[15]); jQuery('#TotalSoft_GV_TV_53').val(b[16]); jQuery('#TotalSoft_GV_TV_54').val(b[17]);

				jQuery('#Total_Soft_AMSetTable_3').show(500);
			} 
			else if(b[2]=='Content Popup')
			{
				if(b[34]=='true'){ b[34]=true; }else{ b[34]=false; }
				jQuery('#TotalSoft_GV_CP_40').val(b[3]); jQuery('#TotalSoft_GV_CP_41').val(b[4]); jQuery('#TotalSoft_GV_CP_42').val(b[5]); jQuery('#TotalSoft_GV_CP_43').val(b[6]); jQuery('#TotalSoft_GV_CP_44').val(b[7]); jQuery('#TotalSoft_GV_CP_45').val(b[8]); jQuery('#TotalSoft_GV_CP_46').val(b[9]); jQuery('#TotalSoft_GV_CP_47').val(b[10]); jQuery('#TotalSoft_GV_CP_48').val(b[11]); jQuery('#TotalSoft_GV_CP_49').val(b[12]); jQuery('#TotalSoft_GV_CP_50').val(b[13]); jQuery('#TotalSoft_GV_CP_51').val(b[14]); jQuery('#TotalSoft_GV_CP_52').val(b[15]); jQuery('#TotalSoft_GV_CP_53').val(b[16]); jQuery('#TotalSoft_GV_CP_54').val(b[17]); jQuery('#TotalSoft_GV_CP_55').val(b[18]); jQuery('#TotalSoft_GV_CP_56').val(b[19]); jQuery('#TotalSoft_GV_CP_57').val(b[20]); jQuery('#TotalSoft_GV_CP_58').val(b[21]); jQuery('#TotalSoft_GV_CP_59').val(b[22]); jQuery('#TotalSoft_GV_CP_60').val(b[23]); jQuery('#TotalSoft_GV_CP_61').val(b[24]); jQuery('#TotalSoft_GV_CP_62').val(b[25]); jQuery('#TotalSoft_GV_CP_63').val(b[26]); jQuery('#TotalSoft_GV_CP_64').val(b[27]); jQuery('#TotalSoft_GV_CP_65').val(b[28]); jQuery('#TotalSoft_GV_CP_66').val(b[29]); jQuery('#TotalSoft_GV_CP_67').val(b[30]); jQuery('#TotalSoft_GV_CP_68').val(b[31]); jQuery('#TotalSoft_GV_CP_69').val(b[32]); jQuery('#TotalSoft_GV_CP_70').val(b[33]); jQuery('#TotalSoft_GV_CP_71').attr('checked', b[34]); jQuery('#TotalSoft_GV_CP_72').val(b[35]); jQuery('#TotalSoft_GV_CP_73').val(b[36]);

				jQuery('#Total_Soft_AMSetTable_4').show(500);
			} 
			else if(b[2]=='Elastic Gallery')
			{
				jQuery('#TotalSoft_GV_EG_40').val(b[3]); jQuery('#TotalSoft_GV_EG_41').val(b[4]); jQuery('#TotalSoft_GV_EG_42').val(b[5]); jQuery('#TotalSoft_GV_EG_43').val(b[6]); jQuery('#TotalSoft_GV_EG_44').val(b[7]); jQuery('#TotalSoft_GV_EG_45').val(b[8]); jQuery('#TotalSoft_GV_EG_46').val(b[9]); jQuery('#TotalSoft_GV_EG_47').val(b[10]); jQuery('#TotalSoft_GV_EG_48').val(b[11]); jQuery('#TotalSoft_GV_EG_49').val(b[12]); jQuery('#TotalSoft_GV_EG_50').val(b[13]); jQuery('#TotalSoft_GV_EG_51').val(b[14]); jQuery('#TotalSoft_GV_EG_52').val(b[15]); jQuery('#TotalSoft_GV_EG_53').val(b[16]); jQuery('#TotalSoft_GV_EG_54').val(b[17]); jQuery('#TotalSoft_GV_EG_55').val(b[18]); jQuery('#TotalSoft_GV_EG_56').val(b[19]);

				jQuery('#Total_Soft_AMSetTable_5').show(500);
			} 
			else if(b[2]=='Fancy Gallery')
			{
				if(b[11]=='true'){ b[11]=true; }else{ b[11]=false; }
				if(b[12]=='true'){ b[12]=true; }else{ b[12]=false; }
				if(b[13]=='true'){ b[13]=true; }else{ b[13]=false; }
				if(b[14]=='true'){ b[14]=true; }else{ b[14]=false; }
				jQuery('#TotalSoft_GV_FG_40').val(b[3]); jQuery('#TotalSoft_GV_FG_41').val(b[4]); jQuery('#TotalSoft_GV_FG_42').val(b[5]); jQuery('#TotalSoft_GV_FG_43').val(b[6]); jQuery('#TotalSoft_GV_FG_44').val(b[7]); jQuery('#TotalSoft_GV_FG_45').val(b[8]); jQuery('#TotalSoft_GV_FG_46').val(b[9]); jQuery('#TotalSoft_GV_FG_47').val(b[10]); jQuery('#TotalSoft_GV_FG_48').attr('checked', b[11]); jQuery('#TotalSoft_GV_FG_49').attr('checked', b[12]); jQuery('#TotalSoft_GV_FG_50').attr('checked', b[13]); jQuery('#TotalSoft_GV_FG_51').attr('checked', b[14]); jQuery('#TotalSoft_GV_FG_52').val(b[15]); jQuery('#TotalSoft_GV_FG_53').val(b[16]); jQuery('#TotalSoft_GV_FG_54').val(b[17]); jQuery('#TotalSoft_GV_FG_55').val(b[18]); jQuery('#TotalSoft_GV_FG_56').val(b[19]); jQuery('#TotalSoft_GV_FG_57').val(b[20]); jQuery('#TotalSoft_GV_FG_58').val(b[21]); jQuery('#TotalSoft_GV_FG_59').val(b[22]); jQuery('#TotalSoft_GV_FG_60').val(b[23]); jQuery('#TotalSoft_GV_FG_61').val(b[24]); jQuery('#TotalSoft_GV_FG_62').val(b[25]); jQuery('#TotalSoft_GV_FG_63').val(b[26]); jQuery('#TotalSoft_GV_FG_64').val(b[27]); jQuery('#TotalSoft_GV_FG_65').val(b[28]);

				jQuery('#Total_Soft_AMSetTable_6').show(500);
			} 
			else if(b[2]=='Parallax Engine')
			{
				jQuery('#TotalSoft_GV_PE_40').val(b[3]); jQuery('#TotalSoft_GV_PE_41').val(b[4]); jQuery('#TotalSoft_GV_PE_42').val(b[5]); jQuery('#TotalSoft_GV_PE_43').val(b[6]); jQuery('#TotalSoft_GV_PE_44').val(b[7]); jQuery('#TotalSoft_GV_PE_45').val(b[8]); jQuery('#TotalSoft_GV_PE_46').val(b[9]); jQuery('#TotalSoft_GV_PE_47').val(b[10]); jQuery('#TotalSoft_GV_PE_48').val(b[11]); jQuery('#TotalSoft_GV_PE_49').val(b[12]); jQuery('#TotalSoft_GV_PE_50').val(b[13]); jQuery('#TotalSoft_GV_PE_51').val(b[14]); jQuery('#TotalSoft_GV_PE_52').val(b[15]); jQuery('#TotalSoft_GV_PE_53').val(b[16]); jQuery('#TotalSoft_GV_PE_54').val(b[17]); jQuery('#TotalSoft_GV_PE_55').val(b[18]); jQuery('#TotalSoft_GV_PE_56').val(b[19]); jQuery('#TotalSoft_GV_PE_57').val(b[20]);

				jQuery('#Total_Soft_AMSetTable_7').show(500);
			}
			else if(b[2]=='Classic Gallery')
			{
				jQuery('#TotalSoft_GV_CG_40').val(b[3]); jQuery('#TotalSoft_GV_CG_41').val(b[4]); jQuery('#TotalSoft_GV_CG_42').val(b[5]); jQuery('#TotalSoft_GV_CG_43').val(b[6]); jQuery('#TotalSoft_GV_CG_44').val(b[7]); jQuery('#TotalSoft_GV_CG_45').val(b[8]); jQuery('#TotalSoft_GV_CG_46').val(b[9]); jQuery('#TotalSoft_GV_CG_47').val(b[10]); jQuery('#TotalSoft_GV_CG_48').val(b[11]); jQuery('#TotalSoft_GV_CG_49').val(b[12]); jQuery('#TotalSoft_GV_CG_50').val(b[13]); jQuery('#TotalSoft_GV_CG_51').val(b[14]); jQuery('#TotalSoft_GV_CG_52').val(b[15]); jQuery('#TotalSoft_GV_CG_53').val(b[16]); jQuery('#TotalSoft_GV_CG_54').val(b[17]); jQuery('#TotalSoft_GV_CG_55').val(b[18]); jQuery('#TotalSoft_GV_CG_56').val(b[19]); jQuery('#TotalSoft_GV_CG_57').val(b[20]); jQuery('#TotalSoft_GV_CG_58').val(b[21]);

				jQuery('#Total_Soft_AMSetTable_8').show(500);
			}
			else if(b[2]=='Space Gallery')
			{
				jQuery('#TotalSoft_GV_SG_40').val(b[3]); jQuery('#TotalSoft_GV_SG_41').val(b[4]); jQuery('#TotalSoft_GV_SG_42').val(b[5]); jQuery('#TotalSoft_GV_SG_43').val(b[6]); jQuery('#TotalSoft_GV_SG_44').val(b[7]); jQuery('#TotalSoft_GV_SG_45').val(b[8]); jQuery('#TotalSoft_GV_SG_46').val(b[9]); jQuery('#TotalSoft_GV_SG_47').val(b[10]); jQuery('#TotalSoft_GV_SG_48').val(b[11]); jQuery('#TotalSoft_GV_SG_49').val(b[12]); jQuery('#TotalSoft_GV_SG_50').val(b[13]); jQuery('#TotalSoft_GV_SG_51').val(b[14]); jQuery('#TotalSoft_GV_SG_52').val(b[15]); jQuery('#TotalSoft_GV_SG_53').val(b[16]); jQuery('#TotalSoft_GV_SG_54').val(b[17]); jQuery('#TotalSoft_GV_SG_55').val(b[18]); jQuery('#TotalSoft_GV_SG_56').val(b[19]); jQuery('#TotalSoft_GV_SG_57').val(b[20]); jQuery('#TotalSoft_GV_SG_58').val(b[21]); jQuery('#TotalSoft_GV_SG_59').val(b[22]); jQuery('#TotalSoft_GV_SG_60').val(b[23]); jQuery('#TotalSoft_GV_SG_61').val(b[24]); jQuery('#TotalSoft_GV_SG_62').val(b[25]); jQuery('#TotalSoft_GV_SG_63').val(b[26]); jQuery('#TotalSoft_GV_SG_64').val(b[27]); jQuery('#TotalSoft_GV_SG_65').val(b[28]); jQuery('#TotalSoft_GV_SG_66').val(b[29]); jQuery('#TotalSoft_GV_SG_67').val(b[30]); jQuery('#TotalSoft_GV_SG_68').val(b[31]); jQuery('#TotalSoft_GV_SG_69').val(b[32]); jQuery('#TotalSoft_GV_SG_70').val(b[33]); jQuery('#TotalSoft_GV_SG_71').val(b[34]); jQuery('#TotalSoft_GV_SG_72').val(b[35]);

				jQuery('#Total_Soft_AMSetTable_9').show(500);
			}
			TotalSoft_VGallery_Out();
			jQuery('.Total_Soft_Gallery_Video_AMD3').show(500);
			jQuery('.Total_Soft_AMSet_Table').show(500);
			jQuery('.Total_Soft_VGallery_Color1').alphaColorPicker();
			jQuery('.wp-picker-holder').addClass('alpha-picker-holder');
		},500)
	})
}
function TotalSoft_VGallery_Out()
{
	jQuery('.TotalSoft_VG_Range').each(function(){
		if(jQuery(this).hasClass('TotalSoft_VG_Rangeper'))
		{
			jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val()+'%');
		}
		else if(jQuery(this).hasClass('TotalSoft_VG_Rangepx'))
		{
			jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val()+'px');
		}
		else if(jQuery(this).hasClass('TotalSoft_VG_Rangesec'))
		{
			jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val()+'s');
		}
		else if(jQuery(this).hasClass('TotalSoft_VG_Rangemsec'))
		{
			jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val()+'ms');
		}
		else
		{
			jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val());
		}
	})
}