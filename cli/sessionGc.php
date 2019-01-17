<?php
/**
 * @package    Joomla.Cli
 *
 * @copyright  Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * This is a CRON script to delete expired session data which should be called from the command-line, not the
 * web. For example something like:
 * /usr/bin/php /path/to/site/cli/sessionGc.php
 */

// Initialize Joomla framework
const _JEXEC = 1;

// Load system defines
if (file_exists(dirname(__DIR__) . '/defines.php'))
{
	require_once dirname(__DIR__) . '/defines.php';
}

if (!defined('_JDEFINES'))
{
	define('JPATH_BASE', dirname(__DIR__));
	require_once JPATH_BASE . '/includes/defines.php';
}

// Get the framework.
require_once JPATH_LIBRARIES . '/import.legacy.php';

// Bootstrap the CMS libraries.
require_once JPATH_LIBRARIES . '/cms.php';

// AstoSoft - start
// Import the configuration.
require_once JPATH_CONFIGURATION . '/configuration.php';

// System configuration.
$config = new JConfig;
define('JDEBUG', $config->debug);

// Configure error reporting to maximum for CLI output.
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load Library language
$lang = JFactory::getLanguage();
// AstoSoft - end

/**
 * Cron job to trash expired session data.
 *
 * @since  3.8.6
 */
class SessionGc extends JApplicationCli
{
	/**
	 * Entry point for the script
	 *
	 * @return  void
	 *
	 * @since   3.8.6
	 */
	public function doExecute()
	{
		// AstoSoft - start
		//JFactory::getSession()->gc();
		// Print a blank line.
		$this->out('Session cleaner');
		$this->out('============================');

		$db = JFactory::getDbo();

		// Clear session table
		$query = $db->getQuery(true);
		$query->delete($db->quoteName('#__session'));
		$db->setQuery($query)->execute();
		$this->out('#__session truncated');
		// AstoSoft - end
	}
}

JApplicationCli::getInstance('SessionGc')->execute();
