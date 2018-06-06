<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$class = ' class="categories-item"';
JHtml::_('bootstrap.tooltip');
$lang	= JFactory::getLanguage();

if (count($this->items[$this->parent->id]) > 0 && $this->maxLevelcat != 0) :
?>
<div class="categories-cont">
	<?php foreach($this->items[$this->parent->id] as $id => $item) : ?>
		<?php
		if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) :
		if (!isset($this->items[$this->parent->id][$id + 1]))
		{
			//$class = ' class="last"';
		}
		?>
		<a href="<?php echo JRoute::_('index.php?Itemid='.$item->note);?>">
			<div <?php echo $class; ?> >
				<?php if ($this->params->get('show_description_image') && $item->getParams()->get('image')) : ?>
					<img src="<?php echo $item->getParams()->get('image'); ?>"/>
				<?php endif; ?>
				<h3><?php echo TSFilter::nosingleletter($this->escape($item->title)); ?></h3>
			</div>
		</a>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
<?php endif; ?>
<div class="clr"></div>
