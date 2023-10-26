<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$cparams = JComponentHelper::getParams('com_media');

jimport('joomla.html.html.bootstrap');
?>
<?php if ($this->contact->misc && $this->params->get('show_misc')): ?>
<div class="naglowek">
	<?php echo TSFilter::nosingleletter($this->contact->misc); ?>
</div>
<div class="naglowek-sep naglowek-sep-phone"></div>
<?php endif;?>
<div class="contact-comp">
	<div class="cont">
		<div class="contact-address">
			<?php echo $this->loadTemplate('address'); ?>
			<div class="center">
				<a id="formularz" class="back pc-no"><?php echo JText::_('COM_CONTACT_FORMULARZ'); ?></a>
			</div>
		</div>
		<!-- <div class="contact-form">
			<div class="center">
				<a id="cofnij" class="back pc-no"><?php echo JText::_('COM_CONTACT_COFNIJ'); ?></a>
			</div>
			<?php // echo $this->loadTemplate('form');  ?>
		</div> -->
		<div class="clr"></div>
	</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
	jQuery('#formularz').click(function(){
		jQuery('.contact-address').slideUp('slow');
		jQuery('.contact-form').slideDown('slow');
	});

	jQuery('#cofnij').click(function(){
		jQuery('.contact-form').slideUp('slow');
		jQuery('.contact-address').slideDown('slow');
	});
});
</script>
