<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;?>
<?php
// Create a shortcut for params.
$params = $this->item->params;
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
$canEdit = $this->item->params->get('access-edit');
JHtml::_('behavior.framework');
?>
<?php if ($this->item->state == 0) : ?>
	<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
<?php endif; ?>

<?php echo JLayoutHelper::render('joomla.content.blog_style_default_item_title', $this->item); ?>

<?php echo JLayoutHelper::render('joomla.content.icons', array('params' => $params, 'item' => $this->item, 'print' => false)); ?>

<?php // Todo Not that elegant would be nice to group the params ?>
<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
	|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author') ); ?>

<?php if ($useDefList) : ?>
	<?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>
<?php endif; ?>

<?php echo JLayoutHelper::render('joomla.content.intro_image', $this->item); ?>

<div class="wydarzenia-cont">
<?php if (!$params->get('show_intro')) : ?>
	<?php echo $this->item->event->afterDisplayTitle; ?>
<?php endif; ?>
<div class="wydarzenia-data">
<?php echo $this->item->event->beforeDisplayContent; ?> <?php echo TSFilter::nosingleletter($this->item->introtext); ?>
</div>
<h1 class="wydarzenia-title">
<?php echo TSFilter::nosingleletter($this->item->title); ?>
</h1>
<?php echo TSFilter::nosingleletter($this->item->fulltext); ?>

<?php if ($useDefList) : ?>
	<?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'below')); ?>
<?php  endif; ?>

<?php echo $this->item->event->afterDisplayContent; ?>
</div>
