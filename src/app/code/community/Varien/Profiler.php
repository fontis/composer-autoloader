<?php

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
