<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head profile="http://gmpg.org/xfn/11">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>;chartset=<?php bloginfo('charset'); ?>" />
<meta charset="<?php bloginfo('charset'); ?>">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<title><?php wp_title(); ?></title>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
  _gaq.push(['_require', 'inpage_linkid', pluginUrl]);
  _gaq.push(['_setAccount', 'UA-36532956-2']);
  _gaq.push(['_setDomainName', 'coursavenue.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>
<body <?php body_class(); ?>>

<div id="line"></div>

<div id="title"><div id="blogtitle"><a href="<?php echo esc_url( home_url() ); ?>"><?php echo bloginfo('name'); ?></a></div><div id="blogdescription"><?php echo bloginfo('description'); ?></div></div>

		<div id="nav-container">
<div id="nav"><div class="menu">
	<?php wp_nav_menu( array('theme_location' => 'header-nav', 'depth' => 0, 'menu_class' => 'nav' )); ?>


	</div></div><div class="clear"></div>





	<?php $header_image = get_header_image();
				if ( $header_image ) : ?>
				<div id="header-container"><img class="header" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height;?>" width="<?php echo get_custom_header()->width; ?>"  alt=""/></div><?php endif; ?>
