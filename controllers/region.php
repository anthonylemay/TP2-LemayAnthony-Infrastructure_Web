<?php

require_once __DIR__ . '/../models/region.php';

class MenuRegionController {
    public function afficherMenuRegions() {
        $regions = regionModel::getAllRegions();
        $region_list = '<ul>';
        foreach ($regions as $region) {
            $region_list .= '<li><a href="liste_chalets_par_region.php?region_id=' . $region->id . '">' . $region->nom_region . '</a></li>';
        }
        $region_list .= '</ul>';
        return $region_list;
    }
}
