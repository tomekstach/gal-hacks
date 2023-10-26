<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * marker_class: Class based on the selection of text, none, or icons
 * jicon-text, jicon-none, jicon-icon
 */
?>
<p>
	<?php echo TSFilter::nosingleletter($this->contact->address); ?><br />
	<?php echo TSFilter::nosingleletter($this->contact->postcode); ?>
</p>
<p>
	<?php echo JText::_('CONTACT_PON_SOB'); ?>: <?php echo TSFilter::nosingleletter($this->contact->sortname1); ?><br />
	<?php echo JText::_('CONTACT_NIEDZ'); ?>: <?php echo TSFilter::nosingleletter($this->contact->sortname2); ?>
</p>
<p>
	<?php echo JText::_('CONTACT_TEL'); ?>: <?php echo TSFilter::nosingleletter($this->contact->telephone); ?><br />
	<?php echo JText::_('CONTACT_EMAIL'); ?>: <?php echo TSFilter::nosingleletter('poczta@galicjanka.com'); ?>
</p>
