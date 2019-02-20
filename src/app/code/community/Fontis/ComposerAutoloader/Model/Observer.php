<?php
/**
 * Fontis Composer Autoloader
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/osl-3.0.php
 *
 * @category   Fontis
 * @package    Fontis_ComposerAutoloader
 * @copyright  Copyright (c) 2019 Fontis Pty. Ltd. (https://www.fontis.com.au)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Fontis_ComposerAutoloader_Model_Observer
{
    /**
     * @var bool
     */
    protected static $added = false;

    /**
     * Register the Composer autoloader.
     *
     * @listen resource_get_tablename
     * @param Varien_Event_Observer $observer
     */
    public function addComposerAutoloader(Varien_Event_Observer $observer)
    {
        if (self::$added === false) {
            /** @var Fontis_ComposerAutoloader_Helper_Data $helper */
            $helper = Mage::helper('fontis_composerautoloader');
            $helper->registerAutoloader();
            self::$added = true;
        }
    }
}
