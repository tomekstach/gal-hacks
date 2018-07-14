<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.galicjanka
 *
 * @copyright   Copyright (C) 2013 AstoSoft. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
$doc->addScript('templates/' .$this->template. '/js/template.js');
$doc->addScript('templates/' .$this->template. '/js/categories.js');
$doc->addScript('templates/' .$this->template. '/js/events.js');
$doc->addScript('/media/system/js/mootools-core.js');
$doc->addScript('/media/system/js/mootools-more.js');
$doc->addScript('/media/system/js/modal.js');

// Add Stylesheets
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css?v=2018071401');
$doc->addStyleSheet('templates/'.$this->template.'/css/template_responsive.css?v=2018071401');
$doc->addStyleSheet('/media/system/css/modal_zabki.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Add current user information
$user = JFactory::getUser();

// Adjusting content width
if ($this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span6";
}
elseif ($this->countModules('position-7') && !$this->countModules('position-8'))
{
	$span = "span9";
}
elseif (!$this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span9";
}
else
{
	$span = "span12";
}

// Logo file or site title param
if ($this->params->get('logoFile'))
{
	$logo = '<img src="'. JUri::root() . $this->params->get('logoFile') .'" alt="'. $sitename .'" />';
}
elseif ($this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="'. $sitename .'">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>';
}
else
{
	$logo = '<span class="site-title" title="'. $sitename .'">'. $sitename .'</span>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta property="og:site_name" content="galicjanka.com"/>
	<meta property="og:title" content="Galicjanka"/>
	<meta property="og:image" content="http://galicjanka.com/images/galicjanka.jpg"/>
	<jdoc:include type="head" />

	<link href='http://fonts.googleapis.com/css?family=Six+Caps' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Herr+Von+Muellerhoff&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<?php
	// Use of Google Font
	if ($this->params->get('googleFont'))
	{
	?>
		<link href='//fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName');?>' rel='stylesheet' type='text/css' />
		<style type="text/css">
			h1,h2,h3,h4,h5,h6,.site-title{
				font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName'));?>', sans-serif;
			}
		</style>
	<?php
	}
	?>
	<?php
	// Template color
	if ($this->params->get('templateColor'))
	{
	?>
	<style type="text/css">
		body.site
		{
			background-color: <?php echo $this->params->get('templateBackgroundColor');?>
		}
		a
		{
			color: <?php echo $this->params->get('templateColor');?>;
		}
		.navbar-inner, .nav-list > .active > a, .nav-list > .active > a:hover, .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover,
		.btn-primary
		{
			background: <?php echo $this->params->get('templateColor');?>;
		}
		.navbar-inner
		{
			-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
		}
	</style>
	<?php
	}
	?>
	<!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
	<![endif]-->
	<script type="text/javascript">
	window.addEvent('domready', function() {
		SqueezeBox.initialize({});
		SqueezeBox.assign($$('a.modal_link'), {
			parse: 'rel'
		});
		if (jQuery('.promocje').length && jQuery(window).width() >= 1000) {
			var myLight = SqueezeBox.fromElement('promocje', {
				parse: 'rel'
			});

			setTimeout(function(){
				SqueezeBox.close(myLight);
			}, 10000);
		}
	});
	</script>
</head>

<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
?>">

	<!-- Body -->
	<div class="body">
		<!-- Header -->
		<div class="header-cont header-pc">
			<div class="header-cont-inner cont">
				<header class="header" role="banner">
					<div class="header-inner clearfix">
						<a class="brand pull-left" href="<?php echo $this->baseurl; ?>" onfocus="blur()">
							<?php echo $logo;?> <?php if ($this->params->get('sitedescription')) { echo '<div class="site-description">'. htmlspecialchars($this->params->get('sitedescription')) .'</div>'; } ?>
						</a>
					</div>
				</header>
				<?php if ($this->countModules('position-1')) : ?>
				<nav class="navigation" role="navigation">
					<jdoc:include type="modules" name="position-1" style="none" />
				</nav>
				<?php endif; ?>
				<?php if ($this->countModules('position-6')) : ?>
					<jdoc:include type="modules" name="position-6" style="none" />
				<?php endif; ?>
			</div>
		</div>
		<jdoc:include type="modules" name="menu-phones" style="none" />
		<?php if ($itemid == '194' || $itemid == '199'):?>
		<div class="header-cont header-phone">
			<div class="header-cont-inner cont">
				<header class="header" role="banner">
					<div class="header-inner clearfix">
						<a class="brand pull-left" href="<?php echo $this->baseurl; ?>" onfocus="blur()">
							<?php echo $logo;?> <?php if ($this->params->get('sitedescription')) { echo '<div class="site-description">'. htmlspecialchars($this->params->get('sitedescription')) .'</div>'; } ?>
						</a>
					</div>
				</header>
				<?php if ($this->countModules('position-6')) : ?>
					<jdoc:include type="modules" name="position-6" style="none" />
				<?php endif; ?>
			</div>
		</div>
		<?php endif;?>
		<?php if ($this->countModules('banner')) : ?>
		<div class="banner-cont">
			<div class="banner-cont-inner">
				<jdoc:include type="modules" name="banner" style="none" />
			</div>
		</div>
		<?php endif;?>
		<?php if ($this->countModules('map')) : ?>
		<div class="map-cont">
			<div class="map-cont-inner">
				<div class="cont">
					<jdoc:include type="modules" name="map" style="none" />
					<div class="map-sep"><img src="images/fiszka.png" alt="" /></div>
				</div>
			</div>
		</div>
		<?php elseif($itemid != '194' && $itemid != '199'):?>
		<div class="main-top">
			<div class="main-top-inner"></div>
		</div>
		<?php endif;?>
		<jdoc:include type="modules" name="front-cont" style="none" />
		<?php if ($itemid != '194' && $itemid != '199'):?>
		<main role="main">
			<div id="content">
				<!-- Begin Content -->
				<jdoc:include type="modules" name="position-4" style="none" />
				<jdoc:include type="message" />
				<jdoc:include type="component" />
		<?php if ($this->countModules('position-3')) : ?>
				<div class="produkty">
					<div class="produkty-cont">
						<jdoc:include type="modules" name="position-3" style="none" />
					</div>
				</div>
		<?php endif;?>
		<?php if ($this->countModules('position-5')) : ?>
				<div class="wydarzenia">
					<div class="cont">
						<jdoc:include type="modules" name="position-5" style="none" />
					</div>
				</div>
		<?php endif;?>
				<div class="main-bottom <?php if ($itemid != '194' && $itemid != '199'):?>bottom-tab<?php endif;?>">
					<div class="main-bottom-cont">
						<jdoc:include type="modules" name="position-2" style="none" />
					</div>
				</div>
			</div>
			<!-- End Content -->
		</main>
		<?php endif;?>
	</div>
	<?php if ($this->countModules('category-front')) : ?>
	<div class="category-cont">
		<div class="category-sep-top"></div>
		<div class="category-front">
			<div class="cont">
				<jdoc:include type="modules" name="category-front" style="none" />
				<div class="clr"></div>
			</div>
		</div>
		<div class="category-sep-bottom"></div>
	</div>
	<?php endif;?>
	<?php if ($this->countModules('banners-front')) : ?>
	<div class="banners-front">
		<div class="cont">
			<jdoc:include type="modules" name="banners-front" style="none" />
			<div class="clr"></div>
		</div>
	</div>
	<?php endif;?>
	<div class="contact">
		<div class="cont">
			<a class="brand pull-left" href="<?php echo $this->baseurl; ?>" onfocus="blur()"><img src="images/logo_male.png" alt="<?php echo $sitename;?>" /></a>
			<jdoc:include type="modules" name="contact-info" style="none" />
			<div class="social-media">
				<a href="https://www.facebook.com/galicjanka.wadowice" class="facebook" target="_blank" onfocus="blur()"></a>
				<a href="https://plus.google.com/108580591444957699911/posts" class="googleplus" target="_blank" onfocus="blur()"></a>
				<a href="http://www.pinterest.com/galicjanka/pins/" class="pinterest" target="_blank" onfocus="blur()"></a>
				<a href="https://www.youtube.com/channel/UC0u5H4r7lquF_CUvntYhLzA" class="youtubebuttton" target="_blank" onfocus="blur()"></a>
			</div>
			<div class="clr"></div>
		</div>
		<div class="clr"></div>
	</div>
	<!-- Footer -->
	<footer class="footer" role="contentinfo">
		<div class="cont">
			<p style="float: left">&copy; <?php echo date('Y');?> <?php echo $sitename; ?>. All right reserved.</p>
			<p style="float: right;">powered by <a href="http://www.astosoft.pl" target="_blank" onfocus="blur()">AstoSoft</a> & <a href="http://www.gs77.com" target="_blank" onfocus="blur()">gs77</a></p>
		</div>
	</footer>
	<jdoc:include type="modules" name="debug" style="none" />

	<nav class="navigation-bottom" role="navigation">
		<div class="bottom-cont">
			<img src="/images/koleczka.png" alt="" class="phone-bot-sep" />
			<img src="/images/phone_produkty.png" class="phone-produkty" alt="" />
			<a class="phone-home" href="<?php echo $this->baseurl; ?>" onfocus="blur()"><img src="/images/phone_home.png" alt="" /></a>
			<img src="/images/phone_menu.png" class="phone-menu" alt="" />
			<img src="/images/phone_gallery.png" class="phone-gallery" alt="" />
		</div>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.menu-top').hide();
			$('.menu-top2').hide();
			$('.menu-top3').hide();
			$('.phone-home').hide();

			$('.phone-menu').click(function() {
				$('.menu-top2').hide('slow');
				$('.menu-top3').hide('slow');
				$('.menu-top').show('slow');
				$('.phone-menu').hide();
				$('.phone-home').show();
			});

			$('.phone-produkty').click(function() {
				$('.menu-top').hide('slow');
				$('.menu-top3').hide('slow');
				$('.menu-top2').show('slow');
				$('.phone-home').hide();
				$('.phone-menu').show();
			});

			$('.phone-gallery').click(function() {
				$('.menu-top').hide('slow');
				$('.menu-top2').hide('slow');
				$('.menu-top3').show('slow');
				$('.phone-home').hide();
				$('.phone-menu').show();
			});
		});
		</script>
	</nav>

	<?php if ($itemid == '194' || $itemid == '199'):?>
	<!--<a href="https://www.facebook.com/galicjanka.wadowice" class="facebook" target="_blank" onfocus="blur()">Facebook profil Galicjanki</a>-->
	<?php if ($this->countModules('promocje')) : ?>
		<a href="/?tmpl=promocje&amp;layout=modal" id="promocje" class="modal_link promocje" rel="{handler: 'iframe', size: {x: 674, y: 475}}" onfocus="blur()">Promocje</a>
	<?php endif;?>
	<?php endif;?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48899699-1', 'galicjanka.com');
  ga('send', 'pageview');
</script>
</body>
</html>
