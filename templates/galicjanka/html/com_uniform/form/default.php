<?php

/**
 * @version     $Id: default.php 19013 2012-11-28 04:48:47Z thailv $
 * @package     JSNUniform
 * @subpackage  Form
 * @author      JoomlaShine Team <support@joomlashine.com>
 * @copyright   Copyright (C) 2012 JoomlaShine.com. All Rights Reserved.
 * @license     GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.joomlashine.com
 * Technical Support:  Feedback - http://www.joomlashine.com/contact-us/get-support.html
 */
defined('_JEXEC') or die('Restricted access');
$showTitle = false;
$showDes = false;
$app = JFactory::getApplication();
$params = $app->getParams();
$getShowTitle = $this->_input->get('show_form_title');
$getShowDes = $this->_input->get('show_form_description');
if (!empty($getShowTitle) && $getShowTitle == 1)
{
	$showTitle = true;
}
if (!empty($getShowDes) && $getShowDes == 1)
{
	$showDes = true;
}
if (JSNUniformHelper::checkStateForm($this->_formId))
{
	?>
	<script type="text/javascript" src="/components/com_uniform/assets/js/bootstrap-select.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('.prze_lij_wz_r .controls').append('<div class="file_text"></div>');
			jQuery('.send_a_model .controls').append('<div class="file_text"></div>');

			jQuery('.dropdown').selectpicker({
				'selectedText': 'cat'
			});
			jQuery('.jsn-input-fluid').selectpicker({
				'selectedText': 'cat'
			});
			
			jQuery('.prze_lij_wz_r input').change(function() {
				var value = jQuery('.prze_lij_wz_r input').val();
				jQuery('.prze_lij_wz_r .controls .file_text').html(value);
			});
			
			jQuery('.send_a_model input').change(function() {
				var value = jQuery('.send_a_model input').val();
				jQuery('.send_a_model .controls .file_text').html(value);
			});
		});
	</script> 
	<link rel="stylesheet" type="text/css" href="/components/com_uniform/assets/css/bootstrap-select.css">
	<?php
	echo JSNUniformHelper::generateHTMLPages($this->_formId, $this->_formName,'','','',$showTitle,$showDes);
}
