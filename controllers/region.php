<?php

    require_once __DIR__ . '/../models/region.php';

    class MenuRegionController {
        public function afficherMenuRegions() {
            $regions = regionModel::getAllRegions();
            return $regions;
        }

    }
    

?>