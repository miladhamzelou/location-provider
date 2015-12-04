<?php
/**
 * Created by PhpStorm.
 * User: milad
 * Date: 11/23/15
 * Time: 4:03 PM
 */

namespace Mabna\Location;



class Location
{

    protected $db;

    public function __construct()
    {
        $this->db = new db();
        $this->db->prepareDatabase();
    }


    public function searchAddress($key)
    {
        $key = str_replace(' ','%',$key);

        $locator = new LocatorManager('\Mabna\Location\model\location');
        return $locator->findAddress($key);
    }

    public function nearest($lat,$long)
    {

        $locator = new LocatorManager('\Mabna\Location\model\info');

        $point = new Point();
        $point->setLattitude($lat);
        $point->setLangtiude($long);
        $point->setTitle('user');
        $result = $locator->nearest($point,Type::restaurant,500);
        return $result;
    }

    public function findRestaurants($id)
    {
        $locator = new LocatorManager('App\Http\Models\info');
        return $locator->getList(strtoupper( Type::restaurant),$id);
    }

}