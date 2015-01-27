<?php
/**
 * Fontis Composer Autoloader
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   Fontis
 * @package    Fontis_ComposerAutoloader
 * @copyright  Copyright (c) 2014 Fontis Pty. Ltd. (http://www.fontis.com.au)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
 
class Fontis_ComposerAutoloader_Helper_Data extends Mage_Core_Helper_Abstract
{
    const AUTOLOAD_FILENAME = 'autoload.php';
    const DEFAULT_PATH = '{{libdir}}/fontis/vendor';

    /**
     * The location of the vendor directory on the machine the site is running on.
     * It always comes without a trailing slash.
     *
     * @return string
     */
    public function getVendorDirectoryPath()
    {
        $path = (string) Mage::getConfig()->getNode('global/composer_autoloader/path');
        if (!$path) {
            $path = self::DEFAULT_PATH;
        }
        $path = str_replace('/', DS, $path);
        $path = str_replace('{{basedir}}', Mage::getBaseDir(), $path);
        $path = str_replace('{{libdir}}', Mage::getBaseDir('lib'), $path);
        $path = rtrim($path, DS);
        return realpath($path);
    }

    /**
     * @param string|null $path Path to vendor directory. Pass null to use the configured value.
     * @param string|null $filename Filename of autoload file. Pass null to use the default (autoload.php).
     */
    public function registerAutoloader($path = null, $filename = null)
    {
        if ($path === null) {
            $path = $this->getVendorDirectoryPath();
        }
        if ($filename === null) {
            $filename = self::AUTOLOAD_FILENAME;
        }
        if (file_exists($path . DS . $filename)) {
            require_once($path . DS . $filename);
        }
    }
}
