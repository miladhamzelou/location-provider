<?php
namespace Mabna\Location\interfaces;

use Mabna\Location\model\Point;


interface Locator
{

    function __construct($model);

    /**
     * get a point lattitude and longetude and return address
     * @return mixed
     */
    public function findAddress($key);

    /**
     * get list type and return related list to type
     * @param string $type
     * @param $region
     * @return mixed
     */
    public function getList($type,$region=null,$section=null,$model=null);

    /**
     * get region ID and return section's
     * @param $region
     * @return mixed
     */
    public function getSection($region);



    public function nearest(Point $point,$type,$distance);


    public function getPolygonGeoJson($region,$section);

    public function pointInPolygon($polygons,Point $point);




}

