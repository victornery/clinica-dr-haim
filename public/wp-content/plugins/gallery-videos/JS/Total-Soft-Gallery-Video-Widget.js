function Total_Soft_GV_LVG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV)
{
	jQuery("html, body").animate({ scrollTop: jQuery('.totalsoft-gv-lvg-content'+TotalSoftGV_ID).position().top-100 }, 1000);
	var delaytime = 0;
	var TS_VG_LG_AE = jQuery('.TS_VG_LG_AE_'+TotalSoftGV_ID).val();
	for(i=1;i<=TotalSoftCV;i++)
	{
		if(i>TotalSoftPP*(TotalSoftPage-1) && i<=TotalSoftPP*TotalSoftPage)
		{
			delaytime++;
			if(TS_VG_LG_AE == '')
			{
				jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'opacity':'1'});
			}
			else if(TS_VG_LG_AE == 'fadeIn')
			{
				jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_LG_AE == 'moveUp')
			{
				jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_LG_AE == 'scaleUp')
			{
				jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_LG_AE == 'fallPerspective')
			{
				jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_LG_AE == 'fly')
			{
				jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_LG_AE == 'flip')
			{
				jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_LG_AE == 'helix')
			{
				jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_LG_AE == 'popUp')
			{
				jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
			}
			jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).removeClass('noshow1');
		}
		else
		{
			jQuery('#TotalSoft_GV_LVG_'+TotalSoftGV_ID+'_'+i).hide().addClass('noshow1');
		}
	}

	jQuery('.pagination li').each(function(){
		jQuery(this).find('span').removeClass('active');
	})
	jQuery('#TotalSoft_GV_LVG_PLi_'+TotalSoftGV_ID+'_'+TotalSoftPage).find('span').addClass('active');
}
function Total_Soft_GV_LVG_PageP(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV)
{
	var TotalSoftPage='';
	jQuery('.pagination li').each(function(){
		if(jQuery(this).find('span').hasClass('active'))
		{
			if(jQuery(this).find('span').html()!='1')
			{
				TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())-1);
				Total_Soft_GV_LVG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
			}
		}
	})
}
function Total_Soft_GV_LVG_PageN(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
{
	var TotalSoftPage='';
	jQuery('.pagination li').each(function(){
		if(jQuery(this).find('span').hasClass('active'))
		{
			if(jQuery(this).find('span').html()!=TotalSoftPC)
			{
				TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())+1);
				Total_Soft_GV_LVG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
				return false;
			}
		}
	})
}
function Total_Soft_GV_LVG_PageLM(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
{
	var TotalSoftPage=parseInt(parseInt(jQuery('#TotalSoft_VG_LVG_Page_'+TotalSoftGV_ID).val())+1);
	jQuery('#TotalSoft_VG_LVG_Page_'+TotalSoftGV_ID).val(TotalSoftPage);
	var delaytime = 0;
	var TS_VG_LG_AE = jQuery('.TS_VG_LG_AE_'+TotalSoftGV_ID).val();
	if(TotalSoftPage<=TotalSoftPC)
	{
		for(i=1;i<=TotalSoftCV;i++)
		{
			if(i<=TotalSoftPP*TotalSoftPage && jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).hasClass('noshow1'))
			{
				delaytime++;
				if(TS_VG_LG_AE == '')
				{
					jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'opacity':'1'});
				}
				else if(TS_VG_LG_AE == 'fadeIn')
				{
					jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_LG_AE == 'moveUp')
				{
					jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_LG_AE == 'scaleUp')
				{
					jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_LG_AE == 'fallPerspective')
				{
					jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_LG_AE == 'fly')
				{
					jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_LG_AE == 'flip')
				{
					jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_LG_AE == 'helix')
				{
					jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_LG_AE == 'popUp')
				{
					jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).show().css({'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
				}
				jQuery("#TotalSoft_GV_LVG_"+TotalSoftGV_ID+"_"+i).removeClass('noshow1');
			}
			else if(i>TotalSoftPP*TotalSoftPage)
			{
				jQuery('#TotalSoft_GV_LVG_'+TotalSoftGV_ID+'_'+i).hide(500);
			}
		}
		if(TotalSoftPage==TotalSoftPC)
		{
			jQuery('#TotalSoft_VG_LVG_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
		}
	}
	else
	{
		jQuery('#TotalSoft_VG_LVG_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
	}
}
function Total_Soft_GV_TV_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV)
{
	jQuery("html, body").animate({ scrollTop: jQuery('.effect-container'+TotalSoftGV_ID).position().top-100 }, 1000);
	var delaytime = 0;
	var TS_VG_TG_AE = jQuery('.TS_VG_TG_AE_'+TotalSoftGV_ID).val();
	for(i=1;i<=TotalSoftCV;i++)
	{
		if(i>TotalSoftPP*(TotalSoftPage-1) && i<=TotalSoftPP*TotalSoftPage)
		{
			delaytime++;
			if(TS_VG_TG_AE == '')
			{
				jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'opacity':'1'});
			}
			else if(TS_VG_TG_AE == 'fadeIn')
			{
				jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_TG_AE == 'moveUp')
			{
				jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_TG_AE == 'scaleUp')
			{
				jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_TG_AE == 'fallPerspective')
			{
				jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_TG_AE == 'fly')
			{
				jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_TG_AE == 'flip')
			{
				jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_TG_AE == 'helix')
			{
				jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_TG_AE == 'popUp')
			{
				jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
			}
		}
		else
		{
			jQuery('#TotalSoft_GV_TV_'+TotalSoftGV_ID+'_'+i).css('display','none');
		}
	}

	jQuery('.pagination li').each(function(){
		jQuery(this).find('span').removeClass('active');
	})
	jQuery('#TotalSoft_GV_TV_PLi_'+TotalSoftGV_ID+'_'+TotalSoftPage).find('span').addClass('active');
}
function Total_Soft_GV_TV_PageP(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV)
{
	var TotalSoftPage='';
	jQuery('.pagination li').each(function(){
		if(jQuery(this).find('span').hasClass('active'))
		{
			if(jQuery(this).find('span').html()!='1')
			{
				TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())-1);
				Total_Soft_GV_TV_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
			}
		}
	})
}
function Total_Soft_GV_TV_PageN(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
{
	var TotalSoftPage='';
	jQuery('.pagination li').each(function(){
		if(jQuery(this).find('span').hasClass('active'))
		{
			if(jQuery(this).find('span').html()!=TotalSoftPC)
			{
				TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())+1);
				Total_Soft_GV_TV_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
				return false;
			}
		}
	})
}
function Total_Soft_GV_TV_PageLM(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
{
	var TotalSoftPage=parseInt(parseInt(jQuery('#TotalSoft_VG_TV_Page_'+TotalSoftGV_ID).val())+1);
	jQuery('#TotalSoft_VG_TV_Page_'+TotalSoftGV_ID).val(TotalSoftPage);
	var delaytime = 0;
	var TS_VG_TG_AE = jQuery('.TS_VG_TG_AE_'+TotalSoftGV_ID).val();
	if(TotalSoftPage<=TotalSoftPC)
	{
		for(i=1;i<=TotalSoftCV;i++)
		{
			if(i<=TotalSoftPP*TotalSoftPage && jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).hasClass('noshow1'))
			{
				delaytime++;
				if(TS_VG_TG_AE == '')
				{
					jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'opacity':'1'});
				}
				else if(TS_VG_TG_AE == 'fadeIn')
				{
					jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_TG_AE == 'moveUp')
				{
					jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_TG_AE == 'scaleUp')
				{
					jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_TG_AE == 'fallPerspective')
				{
					jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_TG_AE == 'fly')
				{
					jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_TG_AE == 'flip')
				{
					jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_TG_AE == 'helix')
				{
					jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_TG_AE == 'popUp')
				{
					jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
				}
				jQuery("#TotalSoft_GV_TV_"+TotalSoftGV_ID+"_"+i).removeClass('noshow1')
			}
			else if(i>TotalSoftPP*TotalSoftPage)
			{
				jQuery('#TotalSoft_GV_TV_'+TotalSoftGV_ID+'_'+i).css('display','none');
			}
		}
		if(TotalSoftPage==TotalSoftPC)
		{
			jQuery('#TotalSoft_VG_TV_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
		}
	}
	else
	{
		jQuery('#TotalSoft_VG_TV_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
	}
}
function Total_Soft_GV_CP_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV)
{
	jQuery("html, body").animate({ scrollTop: jQuery('.TotalSoft_GV_CP_Main'+TotalSoftGV_ID).position().top-100 }, 1000);
	var delaytime = 0;
	var TS_VG_CP_AE = jQuery('.TS_VG_CP_AE_'+TotalSoftGV_ID).val();
	for(i=1;i<=TotalSoftCV;i++)
	{
		if(i>TotalSoftPP*(TotalSoftPage-1) && i<=TotalSoftPP*TotalSoftPage)
		{
			delaytime++;
			if(TS_VG_CP_AE == '')
			{
				jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'opacity':'1'});
			}
			else if(TS_VG_CP_AE == 'fadeIn')
			{
				jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_CP_AE == 'moveUp')
			{
				jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_CP_AE == 'scaleUp')
			{
				jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_CP_AE == 'fallPerspective')
			{
				jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_CP_AE == 'fly')
			{
				jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_CP_AE == 'flip')
			{
				jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_CP_AE == 'helix')
			{
				jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_CP_AE == 'popUp')
			{
				jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
			}
		}
		else
		{
			jQuery('#TotalSoft_GV_CP_'+TotalSoftGV_ID+'_'+i).hide();
		}
	}

	jQuery('.pagination li').each(function(){
		jQuery(this).find('span').removeClass('active');
	})
	jQuery('#TotalSoft_GV_CP_PLi_'+TotalSoftGV_ID+'_'+TotalSoftPage).find('span').addClass('active');
}
function Total_Soft_GV_CP_PageP(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV)
{
	var TotalSoftPage='';
	jQuery('.pagination li').each(function(){
		if(jQuery(this).find('span').hasClass('active'))
		{
			if(jQuery(this).find('span').html()!='1')
			{
				TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())-1);
				Total_Soft_GV_CP_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
			}
		}
	})
}
function Total_Soft_GV_CP_PageN(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
{
	var TotalSoftPage='';
	jQuery('.pagination li').each(function(){
		if(jQuery(this).find('span').hasClass('active'))
		{
			if(jQuery(this).find('span').html()!=TotalSoftPC)
			{
				TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())+1);
				Total_Soft_GV_CP_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
				return false;
			}
		}
	})
}
function Total_Soft_GV_CP_PageLM(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
{
	var TotalSoftPage=parseInt(parseInt(jQuery('#TotalSoft_VG_CP_Page_'+TotalSoftGV_ID).val())+1);
	jQuery('#TotalSoft_VG_CP_Page_'+TotalSoftGV_ID).val(TotalSoftPage);
	var delaytime = 0;
	var TS_VG_CP_AE = jQuery('.TS_VG_CP_AE_'+TotalSoftGV_ID).val();
	if(TotalSoftPage<=TotalSoftPC)
	{
		for(i=1;i<=TotalSoftCV;i++)
		{
			if(i<=TotalSoftPP*TotalSoftPage && jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).hasClass('noshow1'))
			{
				delaytime++;
				if(TS_VG_CP_AE == '')
				{
					jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'opacity':'1'});
				}
				else if(TS_VG_CP_AE == 'fadeIn')
				{
					jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_CP_AE == 'moveUp')
				{
					jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_CP_AE == 'scaleUp')
				{
					jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_CP_AE == 'fallPerspective')
				{
					jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_CP_AE == 'fly')
				{
					jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_CP_AE == 'flip')
				{
					jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_CP_AE == 'helix')
				{
					jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_CP_AE == 'popUp')
				{
					jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
				}
				jQuery("#TotalSoft_GV_CP_"+TotalSoftGV_ID+"_"+i).removeClass('noshow1')
			}
			else if(i>TotalSoftPP*TotalSoftPage)
			{
				jQuery('#TotalSoft_GV_CP_'+TotalSoftGV_ID+'_'+i).css('display','none');
			}
		}
		if(TotalSoftPage==TotalSoftPC)
		{
			jQuery('#TotalSoft_VG_CP_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
		}
	}
	else
	{
		jQuery('#TotalSoft_VG_CP_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
	}
}
function Total_Soft_GV_HLG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV)
{
	jQuery("html, body").animate({ scrollTop: jQuery('.Tot_Vid_Gallery'+TotalSoftGV_ID).position().top-100 }, 1000);
	var delaytime = 0;
	var TS_VG_EG_AE = jQuery('.TS_VG_EG_AE_'+TotalSoftGV_ID).val();
	for(i=1;i<=TotalSoftCV;i++)
	{
		if(i>TotalSoftPP*(TotalSoftPage-1) && i<=TotalSoftPP*TotalSoftPage)
		{
			delaytime++;
			if(TS_VG_EG_AE == '')
			{
				jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'opacity':'1'});
			}
			else if(TS_VG_EG_AE == 'fadeIn')
			{
				jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_EG_AE == 'moveUp')
			{
				jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_EG_AE == 'scaleUp')
			{
				jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_EG_AE == 'fallPerspective')
			{
				jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_EG_AE == 'fly')
			{
				jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_EG_AE == 'flip')
			{
				jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_EG_AE == 'helix')
			{
				jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_EG_AE == 'popUp')
			{
				jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
			}
		}
		else
		{
			jQuery('#TotalSoft_GV_HLG_'+TotalSoftGV_ID+'_'+i).hide();
		}
	}

	jQuery('.pagination li').each(function(){
		jQuery(this).find('span').removeClass('active');
	})
	jQuery('#TotalSoft_GV_HLG_PLi_'+TotalSoftGV_ID+'_'+TotalSoftPage).find('span').addClass('active');
}
function Total_Soft_GV_HLG_PageP(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV)
{
	var TotalSoftPage='';
	jQuery('.pagination li').each(function(){
		if(jQuery(this).find('span').hasClass('active'))
		{
			if(jQuery(this).find('span').html()!='1')
			{
				TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())-1);
				Total_Soft_GV_HLG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
			}
		}
	})
}
function Total_Soft_GV_HLG_PageN(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
{
	var TotalSoftPage='';
	jQuery('.pagination li').each(function(){
		if(jQuery(this).find('span').hasClass('active'))
		{
			if(jQuery(this).find('span').html()!=TotalSoftPC)
			{
				TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())+1);
				Total_Soft_GV_HLG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
				return false;
			}
		}
	})
}
function Total_Soft_GV_HLG_PageLM(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
{
	var TotalSoftPage=parseInt(parseInt(jQuery('#TotalSoft_VG_HLG_Page_'+TotalSoftGV_ID).val())+1);
	jQuery('#TotalSoft_VG_HLG_Page_'+TotalSoftGV_ID).val(TotalSoftPage);
	var delaytime = 0;
	var TS_VG_EG_AE = jQuery('.TS_VG_EG_AE_'+TotalSoftGV_ID).val();
	if(TotalSoftPage<=TotalSoftPC)
	{
		for(i=1;i<=TotalSoftCV;i++)
		{
			if(i<=TotalSoftPP*TotalSoftPage && jQuery('#TotalSoft_GV_HLG_'+TotalSoftGV_ID+'_'+i).hasClass('noshow1'))
			{
				delaytime++;
				if(TS_VG_EG_AE == '')
				{
					jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'opacity':'1'});
				}
				else if(TS_VG_EG_AE == 'fadeIn')
				{
					jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_EG_AE == 'moveUp')
				{
					jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_EG_AE == 'scaleUp')
				{
					jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_EG_AE == 'fallPerspective')
				{
					jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_EG_AE == 'fly')
				{
					jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_EG_AE == 'flip')
				{
					jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_EG_AE == 'helix')
				{
					jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_EG_AE == 'popUp')
				{
					jQuery("#TotalSoft_GV_HLG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
				}
				jQuery('#TotalSoft_GV_HLG_'+TotalSoftGV_ID+'_'+i).removeClass('noshow1');
			}
			else if(i>TotalSoftPP*TotalSoftPage)
			{
				jQuery('#TotalSoft_GV_HLG_'+TotalSoftGV_ID+'_'+i).hide(500);
			}
		}
		if(TotalSoftPage==TotalSoftPC)
		{
			jQuery('#TotalSoft_VG_HLG_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
		}
	}
	else
	{
		jQuery('#TotalSoft_VG_HLG_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
	}
}
function Total_Soft_GV_FG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV)
{
	jQuery("html, body").animate({ scrollTop: jQuery('.Total_Soft_GV_Fancy_'+TotalSoftGV_ID).position().top-100 }, 1000);
	var delaytime = 0;
	var TS_VG_FG_AE = jQuery('.TS_VG_FG_AE_'+TotalSoftGV_ID).val();
	for(i=1;i<=TotalSoftCV;i++)
	{
		if(i>TotalSoftPP*(TotalSoftPage-1) && i<=TotalSoftPP*TotalSoftPage)
		{
			delaytime++;
			if(TS_VG_FG_AE == '')
			{
				jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'opacity':'1'});
			}
			else if(TS_VG_FG_AE == 'fadeIn')
			{
				jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_FG_AE == 'moveUp')
			{
				jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_FG_AE == 'scaleUp')
			{
				jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_FG_AE == 'fallPerspective')
			{
				jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_FG_AE == 'fly')
			{
				jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_FG_AE == 'flip')
			{
				jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_FG_AE == 'helix')
			{
				jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_FG_AE == 'popUp')
			{
				jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
			}
		}
		else
		{
			jQuery('#TotalSoft_GV_FG_'+TotalSoftGV_ID+'_'+i).hide();
		}
	}

	jQuery('.pagination li').each(function(){
		jQuery(this).find('span').removeClass('active');
	})
	jQuery('#TotalSoft_GV_FG_PLi_'+TotalSoftGV_ID+'_'+TotalSoftPage).find('span').addClass('active');
}
function Total_Soft_GV_FG_PageP(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV)
{
	var TotalSoftPage='';
	jQuery('.pagination li').each(function(){
		if(jQuery(this).find('span').hasClass('active'))
		{
			if(jQuery(this).find('span').html()!='1')
			{
				TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())-1);
				Total_Soft_GV_FG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
			}
		}
	})
}
function Total_Soft_GV_FG_PageN(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
{
	var TotalSoftPage='';
	jQuery('.pagination li').each(function(){
		if(jQuery(this).find('span').hasClass('active'))
		{
			if(jQuery(this).find('span').html()!=TotalSoftPC)
			{
				TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())+1);
				Total_Soft_GV_FG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
				return false;
			}
		}
	})
}
function Total_Soft_GV_FG_PageLM(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
{
	var TotalSoftPage=parseInt(parseInt(jQuery('#TotalSoft_VG_FG_Page_'+TotalSoftGV_ID).val())+1);
	jQuery('#TotalSoft_VG_FG_Page_'+TotalSoftGV_ID).val(TotalSoftPage);
	var delaytime = 0;
	var TS_VG_FG_AE = jQuery('.TS_VG_FG_AE_'+TotalSoftGV_ID).val();
	if(TotalSoftPage<=TotalSoftPC)
	{
		for(i=1;i<=TotalSoftCV;i++)
		{
			if(i<=TotalSoftPP*TotalSoftPage && jQuery('#TotalSoft_GV_FG_'+TotalSoftGV_ID+'_'+i).hasClass('noshow1'))
			{
				delaytime++;
				if(TS_VG_FG_AE == '')
				{
					jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'opacity':'1'});
				}
				else if(TS_VG_FG_AE == 'fadeIn')
				{
					jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_FG_AE == 'moveUp')
				{
					jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_FG_AE == 'scaleUp')
				{
					jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_FG_AE == 'fallPerspective')
				{
					jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_FG_AE == 'fly')
				{
					jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_FG_AE == 'flip')
				{
					jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_FG_AE == 'helix')
				{
					jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_FG_AE == 'popUp')
				{
					jQuery("#TotalSoft_GV_FG_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
				}
				jQuery('#TotalSoft_GV_FG_'+TotalSoftGV_ID+'_'+i).removeClass('noshow1');
			}
			else if(i>TotalSoftPP*TotalSoftPage)
			{
				jQuery('#TotalSoft_GV_FG_'+TotalSoftGV_ID+'_'+i).hide(500);
			}
		}
		if(TotalSoftPage==TotalSoftPC)
		{
			jQuery('#TotalSoft_VG_FG_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
		}
	}
	else
	{
		jQuery('#TotalSoft_VG_FG_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
	}
}
// Parallax Engine
function Total_Soft_GV_PE_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV)
{
	jQuery("html, body").animate({ scrollTop: jQuery('.TotSoft_GV_Container_'+TotalSoftGV_ID).position().top-100 }, 1000);
	var delaytime = 0;
	var TS_VG_PE_AE = jQuery('.TS_VG_PE_AE_'+TotalSoftGV_ID).val();
	for(i=1;i<=TotalSoftCV;i++)
	{
		if(i>TotalSoftPP*(TotalSoftPage-1) && i<=TotalSoftPP*TotalSoftPage)
		{
			delaytime++;
			if(TS_VG_PE_AE == '')
			{
				jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'opacity':'1'});
			}
			else if(TS_VG_PE_AE == 'fadeIn')
			{
				jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_PE_AE == 'moveUp')
			{
				jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_PE_AE == 'scaleUp')
			{
				jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_PE_AE == 'fallPerspective')
			{
				jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_PE_AE == 'fly')
			{
				jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_PE_AE == 'flip')
			{
				jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_PE_AE == 'helix')
			{
				jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_PE_AE == 'popUp')
			{
				jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
			}
		}
		else
		{
			jQuery('#TotalSoft_GV_PE_'+TotalSoftGV_ID+'_'+i).hide();
		}
	}

	jQuery('.pagination li').each(function(){
		jQuery(this).find('span').removeClass('active');
	})
	jQuery('#TotalSoft_GV_PE_PLi_'+TotalSoftGV_ID+'_'+TotalSoftPage).find('span').addClass('active');
}
function Total_Soft_GV_PE_PageP(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV)
{
	var TotalSoftPage='';
	jQuery('.pagination li').each(function(){
		if(jQuery(this).find('span').hasClass('active'))
		{
			if(jQuery(this).find('span').html()!='1')
			{
				TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())-1);
				Total_Soft_GV_PE_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
			}
		}
	})
}
function Total_Soft_GV_PE_PageN(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
{
	var TotalSoftPage='';
	jQuery('.pagination li').each(function(){
		if(jQuery(this).find('span').hasClass('active'))
		{
			if(jQuery(this).find('span').html()!=TotalSoftPC)
			{
				TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())+1);
				Total_Soft_GV_PE_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
				return false;
			}
		}
	})
}
function Total_Soft_GV_PE_PageLM(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
{
	var TotalSoftPage=parseInt(parseInt(jQuery('#TotalSoft_VG_PE_Page_'+TotalSoftGV_ID).val())+1);
	jQuery('#TotalSoft_VG_PE_Page_'+TotalSoftGV_ID).val(TotalSoftPage);
	var delaytime = 0;
	var TS_VG_PE_AE = jQuery('.TS_VG_PE_AE_'+TotalSoftGV_ID).val();
	if(TotalSoftPage<=TotalSoftPC)
	{
		for(i=1;i<=TotalSoftCV;i++)
		{
			if(i<=TotalSoftPP*TotalSoftPage && jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).hasClass('noshow1'))
			{
				delaytime++;
				if(TS_VG_PE_AE == '')
				{
					jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'opacity':'1'});
				}
				else if(TS_VG_PE_AE == 'fadeIn')
				{
					jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_PE_AE == 'moveUp')
				{
					jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_PE_AE == 'scaleUp')
				{
					jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_PE_AE == 'fallPerspective')
				{
					jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_PE_AE == 'fly')
				{
					jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_PE_AE == 'flip')
				{
					jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_PE_AE == 'helix')
				{
					jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_PE_AE == 'popUp')
				{
					jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).css({"display":"inline-block",'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
				}
				jQuery("#TotalSoft_GV_PE_"+TotalSoftGV_ID+"_"+i).removeClass('noshow1');
			}
			else if(i>TotalSoftPP*TotalSoftPage)
			{
				jQuery('#TotalSoft_GV_PE_'+TotalSoftGV_ID+'_'+i).hide();
			}
		}
		if(TotalSoftPage==TotalSoftPC)
		{
			jQuery('#TotalSoft_VG_PE_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
		}
	}
	else
	{
		jQuery('#TotalSoft_VG_PE_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
	}
}
// Classic Gallery
function Total_Soft_GV_CG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV)
{
	jQuery("html, body").animate({ scrollTop: jQuery('.TS_GV_ClG_'+TotalSoftGV_ID).position().top-100 }, 1000);
	var GV_CG_Height = jQuery('.GV_CG_Height_'+TotalSoftGV_ID).css('height');
	var delaytime = 0;
	var TS_VG_CG_AE = jQuery('.TS_VG_CG_AE_'+TotalSoftGV_ID).val();
	for(i=1;i<=TotalSoftCV;i++)
	{
		if(i>TotalSoftPP*(TotalSoftPage-1) && i<=TotalSoftPP*TotalSoftPage)
		{
			delaytime++;
			if(TS_VG_CG_AE == 'none')
			{
				jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'opacity':'1'}).addClass('GV_CG_Height_'+TotalSoftGV_ID);
			}
			else if(TS_VG_CG_AE == '')
			{
				jQuery('#TS_GV_ClG_Div1_'+TotalSoftGV_ID+'_'+i).animate({'height': GV_CG_Height, 'padding': '0.5em','opacity':'1'},1000).css({'display': 'inline-block'}).addClass('GV_CG_Height_'+TotalSoftGV_ID);
			}
			else if(TS_VG_CG_AE == 'fadeIn')
			{
				jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'}).addClass('GV_CG_Height_'+TotalSoftGV_ID);
			}
			else if(TS_VG_CG_AE == 'moveUp')
			{
				jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'}).addClass('GV_CG_Height_'+TotalSoftGV_ID);
			}
			else if(TS_VG_CG_AE == 'scaleUp')
			{
				jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'}).addClass('GV_CG_Height_'+TotalSoftGV_ID);
			}
			else if(TS_VG_CG_AE == 'fallPerspective')
			{
				jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'}).addClass('GV_CG_Height_'+TotalSoftGV_ID);
			}
			else if(TS_VG_CG_AE == 'fly')
			{
				jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'}).addClass('GV_CG_Height_'+TotalSoftGV_ID);
			}
			else if(TS_VG_CG_AE == 'flip')
			{
				jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'}).addClass('GV_CG_Height_'+TotalSoftGV_ID);
			}
			else if(TS_VG_CG_AE == 'helix')
			{
				jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'}).addClass('GV_CG_Height_'+TotalSoftGV_ID);
			}
			else if(TS_VG_CG_AE == 'popUp')
			{
				jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'}).addClass('GV_CG_Height_'+TotalSoftGV_ID);
			}
		}
		else
		{
			jQuery('#TS_GV_ClG_Div1_'+TotalSoftGV_ID+'_'+i).css({'display': 'none'}).animate({'height': '0', 'padding': '0','opacity':'0'},500).removeClass('GV_CG_Height_'+TotalSoftGV_ID);
		}
	}

	jQuery('.TS_GV_ClG_Pagination_'+TotalSoftGV_ID+' li').each(function(){
		jQuery(this).find('span').removeClass('active');
	})
	jQuery('#TotalSoft_GV_CG_PLi_'+TotalSoftGV_ID+'_'+TotalSoftPage).find('span').addClass('active');
}
function Total_Soft_GV_CG_PageP(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV)
{
	var TotalSoftPage='';
	jQuery('.TS_GV_ClG_Pagination_'+TotalSoftGV_ID+' li').each(function(){
		if(jQuery(this).find('span').hasClass('active'))
		{
			if(jQuery(this).find('span').html()!='1')
			{
				TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())-1);
				Total_Soft_GV_CG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
			}
		}
	})
}
function Total_Soft_GV_CG_PageN(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
{
	var TotalSoftPage='';
	jQuery('.TS_GV_ClG_Pagination_'+TotalSoftGV_ID+' li').each(function(){
		if(jQuery(this).find('span').hasClass('active'))
		{
			if(jQuery(this).find('span').html()!=TotalSoftPC)
			{
				TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())+1);
				Total_Soft_GV_CG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
				return false;
			}
		}
	})
}
function Total_Soft_GV_CG_PageLM(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
{
	var TotalSoftPage=parseInt(parseInt(jQuery('#TotalSoft_VG_CG_Page_'+TotalSoftGV_ID).val())+1);
	jQuery('#TotalSoft_VG_CG_Page_'+TotalSoftGV_ID).val(TotalSoftPage);
	var GV_CG_Height = jQuery('.GV_CG_Height_'+TotalSoftGV_ID).css('height');
	var delaytime = 0;
	var TS_VG_CG_AE = jQuery('.TS_VG_CG_AE_'+TotalSoftGV_ID).val();

	if(TotalSoftPage<=TotalSoftPC)
	{
		for(i=1;i<=TotalSoftCV;i++)
		{
			if(i<=TotalSoftPP*TotalSoftPage && i > TotalSoftPP*parseInt(parseInt(TotalSoftPage)-1))
			{
				delaytime++;
				if(TS_VG_CG_AE == 'none')
				{
					jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'opacity':'1'});
				}
				else if(TS_VG_CG_AE == '')
				{
					jQuery('#TS_GV_ClG_Div1_'+TotalSoftGV_ID+'_'+i).animate({'height': GV_CG_Height, 'padding': '0.5em','opacity':'1'},1000).css({'display': 'inline-block'});
				}
				else if(TS_VG_CG_AE == 'fadeIn')
				{
					jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_CG_AE == 'moveUp')
				{
					jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_CG_AE == 'scaleUp')
				{
					jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_CG_AE == 'fallPerspective')
				{
					jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_CG_AE == 'fly')
				{
					jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_CG_AE == 'flip')
				{
					jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_CG_AE == 'helix')
				{
					jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_CG_AE == 'popUp')
				{
					jQuery("#TS_GV_ClG_Div1_"+TotalSoftGV_ID+"_"+i).css({'height': GV_CG_Height, 'padding': '0.5em', "display":"inline-block",'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
				}
			}
		}
		if(TotalSoftPage==TotalSoftPC)
		{
			jQuery('#TotalSoft_VG_CG_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
		}
	}
	else
	{
		jQuery('#TotalSoft_VG_CG_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
	}
}
function TS_GV_XG_Video_Play(TotalSoftGV_ID, Video_SRC)
{
	if(Video_SRC.indexOf('.mp4')>-1)
	{
		var Video_SRC_end = '';
	}
	else
	{
		var Video_SRC_end = '?autoplay=1;rel=0;iv_load_policy=3';
	}
	jQuery('.TS_GV_XG_Video_'+TotalSoftGV_ID).attr('src',Video_SRC+Video_SRC_end);
	jQuery("html, body").animate({ scrollTop: jQuery('.TS_GV_XG_Main_Container_'+TotalSoftGV_ID).position().top-100 }, 1000);
}
function TS_GV_XG_PageP(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV)
{
	var TotalSoftPage='';
	jQuery('.TS_GV_XG_Pagination_'+TotalSoftGV_ID+' li').each(function(){
		if(jQuery(this).find('span').hasClass('active'))
		{
			if(jQuery(this).find('span').html()!='1')
			{
				TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())-1);
				TS_GV_XG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
			}
		}
	})
}
function TS_GV_XG_PageN(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
{
	var TotalSoftPage='';
	jQuery('.TS_GV_XG_Pagination_'+TotalSoftGV_ID+' li').each(function(){
		if(jQuery(this).find('span').hasClass('active'))
		{
			if(jQuery(this).find('span').html()!=TotalSoftPC)
			{
				TotalSoftPage=parseInt(parseInt(jQuery(this).find('span').html())+1);
				TS_GV_XG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV);
				return false;
			}
		}
	})
}
function TS_GV_XG_Page(TotalSoftGV_ID, TotalSoftPage, TotalSoftPP, TotalSoftCV)
{
	jQuery("html, body").animate({ scrollTop: jQuery('.TS_GV_XG_Main_Container_'+TotalSoftGV_ID).position().top-100 }, 1000);
	var delaytime = 0;
	var TS_VG_XG_AE = jQuery('.TS_VG_XG_AE_'+TotalSoftGV_ID).val();
	for(i=1;i<=TotalSoftCV;i++)
	{
		if(i>TotalSoftPP*(TotalSoftPage-1) && i<=TotalSoftPP*TotalSoftPage)
		{
			delaytime++;
			if(TS_VG_XG_AE == 'none')
			{
				jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({"display":"block",'opacity':'1'});
			}
			else if(TS_VG_XG_AE == 'fadeIn')
			{
				jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({"display":"block",'animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_XG_AE == 'moveUp')
			{
				jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({"display":"block",'animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_XG_AE == 'scaleUp')
			{
				jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({"display":"block",'animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_XG_AE == 'fallPerspective')
			{
				jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({"display":"block",'animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_XG_AE == 'fly')
			{
				jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({"display":"block",'animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_XG_AE == 'flip')
			{
				jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({"display":"block",'animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_XG_AE == 'helix')
			{
				jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({"display":"block",'animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
			}
			else if(TS_VG_XG_AE == 'popUp')
			{
				jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({"display":"block",'animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
			}
		}
		else
		{
			jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({'display': 'none'});
		}
	}
	jQuery('.TS_GV_XG_Pagination_'+TotalSoftGV_ID+' li').each(function(){ jQuery(this).find('span').removeClass('active'); })
	jQuery('#TS_GV_XG_PLi_'+TotalSoftGV_ID+'_'+TotalSoftPage).find('span').addClass('active');
}
function TS_GV_XG_PageLM(TotalSoftGV_ID, TotalSoftPP, TotalSoftCV, TotalSoftPC)
{
	var TotalSoftPage=parseInt(parseInt(jQuery('#TS_VG_XG_Page_'+TotalSoftGV_ID).val())+1);
	jQuery('#TS_VG_XG_Page_'+TotalSoftGV_ID).val(TotalSoftPage);
	var delaytime = 0;
	var TS_VG_XG_AE = jQuery('.TS_VG_XG_AE_'+TotalSoftGV_ID).val();

	if(TotalSoftPage<=TotalSoftPC)
	{
		for(i=1;i<=TotalSoftCV;i++)
		{
			if(i<=TotalSoftPP*TotalSoftPage && i > TotalSoftPP*parseInt(parseInt(TotalSoftPage)-1))
			{
				delaytime++;
				if(TS_VG_XG_AE == 'none')
				{
					jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({'display':'block','opacity':'1'});
				}
				else if(TS_VG_XG_AE == 'fadeIn')
				{
					jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'fadeIn 0.65s ease '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_XG_AE == 'moveUp')
				{
					jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-webkit-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards','-moz-animation':'moveUp 0.65s ease '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_XG_AE == 'scaleUp')
				{
					jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'scaleUp 0.65s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_XG_AE == 'fallPerspective')
				{
					jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fallPerspective 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_XG_AE == 'fly')
				{
					jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'fly 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_XG_AE == 'flip')
				{
					jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'flip 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_XG_AE == 'helix')
				{
					jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-webkit-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards','-moz-animation':'helix 0.8s ease-in-out '+0.2*delaytime+'s forwards'});
				}
				else if(TS_VG_XG_AE == 'popUp')
				{
					jQuery('.TS_GV_XG_Gallery_Div1_'+TotalSoftGV_ID+'_'+i).css({'display':'block','animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-webkit-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards','-moz-animation':'popUp 0.8s ease-in '+0.2*delaytime+'s forwards'});
				}
			}
		}
		if(TotalSoftPage==TotalSoftPC)
		{
			jQuery('#TS_VG_XG_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
		}
	}
	else
	{
		jQuery('#TS_VG_XG_PageDiv_'+TotalSoftGV_ID).animate({'opacity':'0'},500).css('display','none');
	}
}