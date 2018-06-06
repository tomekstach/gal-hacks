<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
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

// Add current user information
$user = JFactory::getUser();


// Logo file
if ($params->get('logoFile'))
{
	$logo = JUri::root() . $params->get('logoFile');
}
else
{
	$logo = $this->baseurl . "/templates/" . $this->template . "/images/logo.png";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $this->title; ?> <?php echo htmlspecialchars($this->error->getMessage()); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template_responsive.css" type="text/css" />

	<?php
		$debug = JFactory::getConfig()->get('debug_lang');
		if ((defined('JDEBUG') && JDEBUG) || $debug)
		{
	?>
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/media/cms/css/debug.css" type="text/css" />
	<?php
		}
	?>
	<?php
	// If Right-to-Left
	if ($this->direction == 'rtl')
	{
	?>
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/media/jui/css/bootstrap-rtl.css" type="text/css" />
	<?php
	}
	// Use of Google Font
	if ($params->get('googleFont'))
	{
	?>
		<link href='//fonts.googleapis.com/css?family=<?php echo $params->get('googleFontName');?>' rel='stylesheet' type='text/css'>
	<?php
	}
	?>
	<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	<?php
	// Template color
	if ($params->get('templateColor'))
	{
	?>
	<style type="text/css">
		body.site
		{
			background-color: <?php echo $params->get('templateBackgroundColor');?>
		}
		a
		{
			color: <?php echo $params->get('templateColor');?>;
		}
		.navbar-inner, .nav-list > .active > a, .nav-list > .active > a:hover, .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover
		{
			background: <?php echo $params->get('templateColor');?>;
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
</head>

<body class="site error-site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
?>">

	<!-- Body -->
	<div class="body" style="padding-top: 100px;">
		<a class="brand" href="<?php echo $this->baseurl; ?>" onfocus="blur()">
			<img src="<?php echo $logo;?>" alt="<?php echo $sitename; ?>" />
		</a>
		<h1 class="error"><?php echo $this->error->getCode(); ?> <?php echo JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?></h1>
		<p class="error"><?php echo JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND_DESC'); ?></p>
		<a href="<?php echo $this->baseurl; ?>/index.php" class="back"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a>
	</div>
	<!-- Footer -->
	<?php echo $doc->getBuffer('modules', 'debug', array('style' => 'none')); ?>
</body>
</html>
