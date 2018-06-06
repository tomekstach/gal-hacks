<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<div class="events">
<div class="route_events">
<ul id="under_route_events">
<?php if ($grouped) : ?>
	<?php foreach ($list as $group_name => $group) : ?>
	<li class="event-item">
		<ul>
			<?php foreach ($group as $item) : ?>
				<li>
					<?php if ($params->get('show_introtext')) :?>
						<div class="mod-articles-category-introtext">
							<?php echo $item->displayIntrotext; ?>
						</div>
					<?php endif; ?>
					
					<?php if ($params->get('link_titles') == 1) : ?>
						<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
						<?php echo $item->title; ?>
						</a>
					<?php else : ?>
						<?php echo $item->title; ?>
					<?php endif; ?>

					<?php if ($item->displayHits) : ?>
						<span class="mod-articles-category-hits">
						(<?php echo $item->displayHits; ?>)
						</span>
					<?php endif; ?>

					<?php if ($params->get('show_author')) :?>
						<span class="mod-articles-category-writtenby">
						<?php echo $item->displayAuthorName; ?>
						</span>
					<?php endif;?>

					<?php if ($item->displayCategoryTitle) :?>
						<span class="mod-articles-category-category">
						(<?php echo $item->displayCategoryTitle; ?>)
						</span>
					<?php endif; ?>

					<?php if ($item->displayDate) : ?>
						<span class="mod-articles-category-date"><?php echo $item->displayDate; ?></span>
					<?php endif; ?>

					<?php if ($params->get('show_readmore')) :?>
						<p class="mod-articles-category-readmore">
						<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
						<?php if ($item->params->get('access-view') == false) :
							echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE');
						elseif ($readmore = $item->alternative_readmore) :
							echo $readmore;
							echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
								if ($params->get('show_readmore_title', 0) != 0) :
									echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
									endif;
						elseif ($params->get('show_readmore_title', 0) == 0) :
							echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE');
						else :
							echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE');
							echo JHtml::_('string.truncate', ($item->title), $params->get('readmore_limit'));
						endif; ?>
						</a>
						</p>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</li>
	<?php endforeach; ?>
<?php else : ?>
	<?php foreach ($list as $item) : ?>
		<li class="event-item">
		<a href="<?php echo $item->link; ?>/?layout=blog">
			<div class="ramka_galeria wydarzenia_list_galeria">
				<div class="image_ramka_galeria">
					<div class="wydarzenia-list-cont">
			<?php if ($params->get('show_introtext')) :?>
				<div class="mod-articles-category-introtext">
				<?php echo $item->displayIntrotext; ?>
				</div>
			<?php endif; ?>
			<img src="images/wydarzenia.png" alt="" />
			<?php if ($params->get('link_titles') == 1) : ?>
				<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
				<?php echo $item->title; ?>
				</a>
			<?php else : ?>
			<h4>
				<?php echo $item->title; ?>
			</h4>
			<?php endif; ?>
			
			<div class="pc-no mod-articles-category-full">
				<?php echo $item->displayFulltext; ?>
			</div>

			<?php if ($item->displayHits) :?>
				<span class="mod-articles-category-hits">
				(<?php echo $item->displayHits; ?>)  </span>
			<?php endif; ?>

			<?php if ($params->get('show_author')) :?>
				<span class="mod-articles-category-writtenby">
					<?php echo $item->displayAuthorName; ?>
				</span>
			<?php endif;?>

			<?php if ($item->displayCategoryTitle) :?>
				<span class="mod-articles-category-category">
				(<?php echo $item->displayCategoryTitle; ?>)
				</span>
			<?php endif; ?>

			<?php if ($item->displayDate) : ?>
				<span class="mod-articles-category-date"><?php echo $item->displayDate; ?></span>
			<?php endif; ?>

			<?php if ($params->get('show_readmore')) :?>
				<p class="mod-articles-category-readmore">
				<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
					<?php if ($item->params->get('access-view') == false) :
						echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE');
					elseif ($readmore = $item->alternative_readmore) :
						echo $readmore;
						echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
					elseif ($params->get('show_readmore_title', 0) == 0) :
						echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE');
					else :
						echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE');
						echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
					endif; ?>
				</a>
				</p>
			<?php endif; ?>
					</div>
				</div>
				<div class="image_galeria_ramka wydarzenia_list_ramka"></div>
			</div>
		</a>
		</li>
	<?php endforeach; ?>
<?php endif; ?>
</ul>
</div>
<div class="arrow_men">

	<div id="left_route" class="arrow_men_event_left" style="display: block;"></div>
	<div id="right_route" class="arrow_men_event_right" style="display: block;"></div>

</div>
<div class="clr-both"></div>
</div>
