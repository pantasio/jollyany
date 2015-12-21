<?php
/**
 * @file
 * jollyany's HTML template.
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie6 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]> <!--> <html class="not-ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <!--<![endif]-->
<head>
	<?php print $head; ?>
	<title><?php print $head_title; ?></title>
	<?php print $styles; ?>
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<?php print $scripts; ?>
	<?php 
		global $theme_root; 
		$curr_uri = request_uri();
	?>
  
	<!-- Support for HTML5 -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Enable media queries on older bgeneral_rowsers -->
	<!--[if lt IE 9]>
		<script src="js/respond.min.js"></script>
	<![endif]-->
  
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,300,400italic,300italic,700,700italic,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Exo:400,300,600,500,400italic,700italic,800,900' rel='stylesheet' type='text/css'>

	<?php jollyany_user_css();?> 
	
	<link rel="alternate stylesheet" type="text/css" href="<?php echo $theme_root; ?>/switcher/css/green.css" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo $theme_root; ?>/switcher/css/tael.css" title="tael" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo $theme_root; ?>/switcher/css/light-green.css" title="light-green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo $theme_root; ?>/switcher/css/yellow.css" title="yellow" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo $theme_root; ?>/switcher/css/blue.css" title="blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo $theme_root; ?>/switcher/css/light-blue.css" title="light-blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo $theme_root; ?>/switcher/css/purple.css" title="purple" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo $theme_root; ?>/switcher/css/violet.css" title="violet" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo $theme_root; ?>/switcher/css/red.css" title="red" media="all" />        
	<link rel="alternate stylesheet" type="text/css" href="<?php echo $theme_root; ?>/switcher/css/orange.css" title="orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo $theme_root; ?>/switcher/css/dark-style.css" title="dark" media="all" />

	<!-- Settings Design Default -->
	<?php if(drupal_is_front_page()) :?>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				switchStylestyle('<?php echo theme_get_setting('color_scheme'); ?>');
				return false;
				
				var c = readCookie('style');
				if (c) switchStylestyle(c);
			});
			
			function switchStylestyle(styleName)
			{
				jQuery('link[rel*=style][title]').each(function(i) 
				{
					this.disabled = true;
					if (this.getAttribute('title') == styleName) this.disabled = false;
				});
				createCookie('style', styleName, 365);
			}
		</script>
	<?php endif; ?>
	
	<?php if(theme_get_setting('background_style') == 'dark' && drupal_is_front_page()) :?>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				switchStylestyle('dark');
				return false;
				
				var c = readCookie('style');
				if (c) switchStylestyle(c);
			});
			
			function switchStylestyle(styleName)
			{
				jQuery('link[rel*=style][title]').each(function(i) 
				{
					this.disabled = true;
					if (this.getAttribute('title') == styleName) this.disabled = false;
				});
				createCookie('style', styleName, 365);
			}
		</script>
	<?php endif; ?>
	
	<?php if(isset($_GET['color_style']) && $_GET['color_style'] == 'dark') :?>
		<link rel="stylesheet" type="text/css" href="<?php echo $theme_root; ?>/switcher/css/dark-style.css" media="all" />
	<?php endif; ?>
</head>

<?php  
	$page_style1 = theme_get_setting('page_style1');
	$arrayPageStyle1 = explode(',', $page_style1);
	
	$page_style2 = theme_get_setting('page_style2');
	$arrayPageStyle2 = explode(',', $page_style2);
	
	$curr_uri = request_uri();
	$array_curr_uri = explode('/', $curr_uri);
	$array_curr_uri2 = explode('?', $curr_uri);
	
	$getPageStyle1 = array_intersect($arrayPageStyle1, $array_curr_uri);
	$getPageStyle2 = array_intersect($arrayPageStyle2, $array_curr_uri);
	
	if(!isset($_GET['header'])) {$_GET['header'] = NULL;}
	if(!isset($_GET['footer'])) {$_GET['footer'] = NULL;}
	if(!isset($_GET['layout'])) {$_GET['layout'] = NULL;}
?>

<body <?php if(count($getPageStyle2) > 0 || $_GET['layout'] == 'boxed' || theme_get_setting('layout_option') == 'boxed') { echo 'id="boxed"'; } ?> class="<?php print $classes; ?> <?php print theme_get_setting('color_scheme'); ?>" <?php print $attributes;?>>
	<?php if(theme_get_setting('switcher') == 1) :?>
		<!-- ADD Switcher -->
		<div class="demo_changer">
			<div class="demo-icon"><i class="fa fa-cog fa-spin fa-2x"></i></div>
            <div class="form_holder">
                <h4>CHOOSE YOUR STYLE</h4>
                <p>Choose a color via Color picker or click the predefined style names!</p>
                <div class="predefined_styles">                    
				<form>
					<select id="headers" class="show-menu-arrow selectpicker" onChange="document.location = this.value">
                   	    <option value="<?php echo $array_curr_uri2[0]; ?>">Change Header</option>
                        <option <?php if($_GET['header'] == 'header1') { echo 'selected="selected"'; } ?> value="<?php if(!empty($_GET['header'])) { echo str_replace($_GET['header'], 'header1', $curr_uri); } elseif(empty($_GET['footer']) && empty($_GET['layout'])) { echo $curr_uri.'?header=header1'; } else { echo $curr_uri.'&header=header1'; } ?>">Header Style 1</option>
                        <option <?php if($_GET['header'] == 'header2') { echo 'selected="selected"'; } ?> value="<?php if(!empty($_GET['header'])) { echo str_replace($_GET['header'], 'header2', $curr_uri); } elseif(empty($_GET['footer']) && empty($_GET['layout'])) { echo $curr_uri.'?header=header2'; } else { echo $curr_uri.'&header=header2'; } ?>">Header Style 2</option>
                        <option <?php if($_GET['header'] == 'header3') { echo 'selected="selected"'; } ?> value="<?php if(!empty($_GET['header'])) { echo str_replace($_GET['header'], 'header3', $curr_uri); } elseif(empty($_GET['footer']) && empty($_GET['layout'])) { echo $curr_uri.'?header=header3'; } else { echo $curr_uri.'&header=header3'; } ?>">Header Style 3</option>
					</select>         
					<select id="footers" class="show-menu-arrow selectpicker" onChange="document.location = this.value">
                   	    <option value="<?php echo $array_curr_uri2[0]; ?>">Change Footer</option>                            
						<option <?php if($_GET['footer'] == 'footer1') { echo 'selected="selected"'; } ?> value="<?php if(!empty($_GET['footer'])) { echo str_replace($_GET['footer'], 'footer1', $curr_uri); } elseif(empty($_GET['header']) && empty($_GET['layout'])) { echo $curr_uri.'?footer=footer1'; } else { echo $curr_uri.'&footer=footer1'; } ?>">Footer Style 1</option>
                        <option <?php if($_GET['footer'] == 'footer2') { echo 'selected="selected"'; } ?> value="<?php if(!empty($_GET['footer'])) { echo str_replace($_GET['footer'], 'footer2', $curr_uri); } elseif(empty($_GET['header']) && empty($_GET['layout'])) { echo $curr_uri.'?footer=footer2'; } else { echo $curr_uri.'&footer=footer2'; } ?>">Footer Style 2</option>
                        <option <?php if($_GET['footer'] == 'footer3') { echo 'selected="selected"'; } ?> value="<?php if(!empty($_GET['footer'])) { echo str_replace($_GET['footer'], 'footer3', $curr_uri); } elseif(empty($_GET['header']) && empty($_GET['layout'])) { echo $curr_uri.'?footer=footer3'; } else { echo $curr_uri.'&footer=footer3'; } ?>">Footer Style 3</option>
					</select>     
					<select id="layouts" class="show-menu-arrow selectpicker" onChange="document.location = this.value">
                   	    <option value="<?php echo $array_curr_uri2[0]; ?>">Select Layout</option>
                        <option <?php if($_GET['layout'] == 'fullwidth') { echo 'selected="selected"'; } ?> value="<?php if(!empty($_GET['layout'])) { echo str_replace($_GET['layout'], 'fullwidth', $curr_uri); } elseif(empty($_GET['header']) && empty($_GET['footer'])) { echo $curr_uri.'?layout=fullwidth'; } else { echo $curr_uri.'&layout=fullwidth'; } ?>">Fullwidth Layout</option>
                        <option <?php if($_GET['layout'] == 'boxed') { echo 'selected="selected"'; } ?> value="<?php if(!empty($_GET['layout'])) { echo str_replace($_GET['layout'], 'boxed', $curr_uri); } elseif(empty($_GET['header']) && empty($_GET['footer'])) { echo $curr_uri.'?layout=boxed'; } else { echo $curr_uri.'&layout=boxed'; } ?>">Boxed Layout</option>
					</select>                   
				</form>
                <hr>
                <h4>LIGHT OR DARK</h4>
                    <a href="" id="light" class="styleswitch"><img class="img-thumbnail" src="<?php echo $theme_root; ?>/switcher/images/light.png" alt=""></a>	
                    <a href="" id="dark" class="styleswitch"><img class="img-thumbnail" src="<?php echo $theme_root; ?>/switcher/images/dark.png" alt=""></a>	
                <hr> 
                <h4>PREDEFINED SKINS</h4>
                    <a href="" id="green" class="styleswitch"><img src="<?php echo $theme_root; ?>/switcher/images/green.png" alt=""></a>	
                    <a href="" id="tael" class="styleswitch"><img src="<?php echo $theme_root; ?>/switcher/images/tael.png" alt=""></a>	
                    <a href="" id="light-green" class="styleswitch"><img src="<?php echo $theme_root; ?>/switcher/images/light-green.png" alt=""></a>	
                    <a href="" id="yellow" class="styleswitch"><img src="<?php echo $theme_root; ?>/switcher/images/yellow.png" alt=""></a>	
                    <a href="" id="blue" class="styleswitch"><img src="<?php echo $theme_root; ?>/switcher/images/blue.png" alt=""></a>	
                    <a href="" id="light-blue" class="styleswitch"><img src="<?php echo $theme_root; ?>/switcher/images/light-blue.png" alt=""></a>	
                    <a href="" id="purple" class="styleswitch"><img src="<?php echo $theme_root; ?>/switcher/images/purple.png" alt=""></a>	
                    <a href="" id="violet" class="styleswitch"><img src="<?php echo $theme_root; ?>/switcher/images/violet.png" alt=""></a>	
                    <a href="" id="red" class="styleswitch"><img src="<?php echo $theme_root; ?>/switcher/images/red.png" alt=""></a>	
                    <a href="" id="orange" class="styleswitch"><img src="<?php echo $theme_root; ?>/switcher/images/orange.png" alt=""></a>	
                </div>
                <hr>
                <p>This tools is just for demo site.</p>
            </div>
        </div>
		<!-- END Switcher -->
	<?php endif; ?>
	
	<?php print $page_top; ?>
	<?php print $page; ?>
	<?php print $page_bottom; ?>
	
	<div class="dmtop">Scroll to Top</div>
	<!-- Main Scripts-->
  
	<script src="<?php echo $theme_root; ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo $theme_root; ?>/js/menu.js"></script>
	<script src="<?php echo $theme_root; ?>/js/addclass.js"></script>
	<script src="<?php echo $theme_root; ?>/js/owl.carousel.min.js"></script>
	<script src="<?php echo $theme_root; ?>/js/jquery.parallax-1.1.3.js"></script>
	<script src="<?php echo $theme_root; ?>/js/jquery.simple-text-rotator.js"></script>
	<script src="<?php echo $theme_root; ?>/js/wow.min.js"></script>
	<script src="<?php echo $theme_root; ?>/js/jquery.fitvids.js"></script>
	<script src="<?php echo $theme_root; ?>/js/custom.js"></script>
  
	<script src="<?php echo $theme_root; ?>/js/jquery.isotope.min.js"></script>
	<script src="<?php echo $theme_root; ?>/js/custom-portfolio.js"></script>
	<script src="<?php echo $theme_root; ?>/js/custom-portfolio-masonry.js"></script>
      
	<!-- Royal Slider script files -->
	<script src="<?php echo $theme_root; ?>/royalslider/jquery.easing-1.3.js"></script>
	<script src="<?php echo $theme_root; ?>/royalslider/jquery.royalslider.min.js"></script>
	<script>
		jQuery(document).ready(function($) {
			<?php if($_GET['layout'] == 'boxed' || theme_get_setting('layout_option') == 'boxed') : ?>
				$('.pane-art-revolution').addClass('slider-wrapper fullwidthbanner-container');
			<?php endif; ?>
			var rsi = $('#slider-in-laptop').royalSlider({
				autoHeight: false,
				arrowsNav: false,
				fadeinLoadedSlide: false,
				controlNavigationSpacing: 0,
				controlNavigation: 'bullets',
				imageScaleMode: 'fill',
				imageAlignCenter: true,
				loop: false,
				loopRewind: false,
				numImagesToPreload: 6,
				keyboardNavEnabled: true,
				autoScaleSlider: true,  
				autoScaleSliderWidth: 486,     
				autoScaleSliderHeight: 315,
			
				/* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
				imgWidth: 792,
				imgHeight: 479
		
			}).data('royalSlider');
			$('#slider-next').click(function() {
				rsi.next();
			});
			$('#slider-prev').click(function() {
				rsi.prev();
			});
		});
	</script>
  
	<script>
		jQuery(document).ready(function() {
		  jQuery('#gallery-2').royalSlider({
			fullscreen: {
			  enabled: true,
			  nativeFS: true
			},
			controlNavigation: 'thumbnails',
			thumbs: {
			  orientation: 'vertical',
			  paddingBottom: 4,
			  appendSpan: true
			},
			transitionType:'fade',
			autoScaleSlider: true, 
			autoScaleSliderWidth: 960,     
			autoScaleSliderHeight: 600,
			loop: true,
			arrowsNav: false,
			keyboardNavEnabled: true
		
		  });
		});
	</script>

	<!-- Affix menu -->
	<script>
		jQuery("#header-style-1").affix({
			offset: {
			  top: 100
			, bottom: function () {
				return (this.bottom = jQuery('#copyrights').outerHeight(true))
			  }
			}
		});	
		
		jQuery("#topbar .language").click(function () {
			jQuery('#block-locale-language').slideToggle( "slow" );
		}); 
	</script>
  
	<!-- FlexSlider JavaScript
    ================================================== -->
 	<script src="<?php echo $theme_root; ?>/js/jquery.flexslider.js"></script>
	<script>
        jQuery(window).load(function() {
            jQuery('#aboutslider').flexslider({
                animation: "fade",
                controlNav: true,
                animationLoop: true,
                slideshow: true,
                sync: "#carousel"
            });
        });
    </script>
	
	<script type="text/javascript">
		/*jQuery(function(){
		  SyntaxHighlighter.all();
		});*/
		jQuery(window).load(function(){
		  jQuery('.flexslider').flexslider({
			animation: "fade",
			controlNav: false,
			start: function(slider){
			  jQuery('body').removeClass('loading');
			}
		  });
		});
	</script>

	<!-- Google Map -->
	<script type="text/javascript">
		var locations = [
		['<div class="infobox"><h3 class="title"><a href="<?php echo theme_get_setting('contactmap_website'); ?>"><?php echo theme_get_setting('contactmap_title'); ?></a></h3><span><?php echo theme_get_setting('contactmap_address'); ?></span><br><?php echo theme_get_setting('contactmap_phone'); ?></p></div></div></div>', <?php echo theme_get_setting('contactmap_lat'); ?>, <?php echo theme_get_setting('contactmap_long'); ?>, 2]
		];
	
		var map = new google.maps.Map(document.getElementById('map'), {
		  zoom: 10,
			scrollwheel: false,
			navigationControl: true,
			mapTypeControl: false,
			scaleControl: false,
			draggable: true,
			styles: [ { "stylers": [ { "hue": "#000" },  {saturation: -100},
                {gamma: 0.50} ] } ],
			center: new google.maps.LatLng(<?php echo theme_get_setting('contactmap_lat'); ?>, <?php echo theme_get_setting('contactmap_long'); ?>),
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		});
	
		var infowindow = new google.maps.InfoWindow();
	
		var marker, i;
	
		for (i = 0; i < locations.length; i++) {  
	  
			marker = new google.maps.Marker({ 
			position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
			map: map ,
			<?php if( theme_get_setting('contact_icon') ) :?>
				icon: '<?php echo file_create_url(theme_get_setting('contact_icon')); ?>'
			<?php endif; ?>
			});
	
	
		  google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() {
			  infowindow.setContent(locations[i][0]);
			  infowindow.open(map, marker);
			}
		  })(marker, i));
		}
	</script>
  
	<!-- Demo Switcher JS -->
	<script type="text/javascript" src="<?php echo $theme_root; ?>/switcher/js/fswit.js"></script>
	<script src="<?php echo $theme_root; ?>/switcher/js/bootstrap-select.js"></script>
	<script src="<?php echo $theme_root; ?>/js/customize-twitter-1.1.js"></script>
	<script>
		var options = {
			"url": "<?php echo $theme_root; ?>/css/twitter-styles.css"
		};
		CustomizeTwitterWidget(options);
	</script> 
   
</body>
</html>