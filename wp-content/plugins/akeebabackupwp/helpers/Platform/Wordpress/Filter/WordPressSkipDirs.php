<?php
/**
 * @package   solo
 * @copyright Copyright (c)2014-2021 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU General Public License version 3, or later
 */

namespace Akeeba\Engine\Filter;

use Akeeba\Engine\Factory;
use Akeeba\Engine\Filter\Base as FilterBase;

// Protection against direct access
defined('AKEEBAENGINE') or die();

/**
 * WordPress-specific Filter: Skip Directories
 *
 * Exclude subdirectories of special directories
 */
class WordPressSkipDirs extends FilterBase
{	
	public function __construct()
	{
		$this->object	= 'dir';
		$this->subtype	= 'children';
		$this->method	= 'direct';
		$this->filter_name = 'WordPressSkipDirs';

		$configuration = Factory::getConfiguration();

		$root = '[SITEROOT]';

		if ($configuration->get('akeeba.platform.override_root', 0))
		{
			$root = $configuration->get('akeeba.platform.newroot', '[SITEROOT]');
		}

		$this->filter_data[$root] = [
			// Cache directories. Ok, here's the deal. In theory inside WordPress you can use whatever you want as
			// "cache" directory, since when you enable WP_CACHE you simply tell WP to look for a specific file that will
			// handle the cache. In practice, 99% of time everything will go inside wp-content/cache .
			// If the user did something different, it's up to him to remember to exclude the directory.
			'wp-content/cache'
		];

		parent::__construct();
	}
}
