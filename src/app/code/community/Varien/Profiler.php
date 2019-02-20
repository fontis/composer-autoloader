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

// phpcs:disable MEQP1.Security.Superglobal.SuperglobalUsageWarning -- The framework has not been bootstrapped at this point.
// phpcs:disable MEQP1.Security.IncludeFile.FoundIncludeFile -- Also not relevant here, as this is outside the framework.

if (!empty($_SERVER["FCA_PROFILER_PATH"])) {
    require_once($_SERVER["FCA_PROFILER_PATH"]);
} else {
    if (defined("FONTIS_BASEPATH")) {
        $FCA_BASEPATH = FONTIS_BASEPATH;
    } else {
        $FCA_BASEPATH = BP;
    }

    require_once($FCA_BASEPATH . DS . "lib" . DS . "Varien" . DS . "Profiler.php");
    unset($FCA_BASEPATH);
}

if (Mage::getConfig() !== null) {
    Mage::app()->loadAreaPart(Mage_Core_Model_App_Area::AREA_GLOBAL, Mage_Core_Model_App_Area::PART_EVENTS);
}
