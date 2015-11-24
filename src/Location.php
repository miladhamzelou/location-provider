<?php
/**
 * Created by PhpStorm.
 * User: milad
 * Date: 11/23/15
 * Time: 4:03 PM
 */

namespace geo\src;



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
        header('Access-Control-Allow-Origin: *');
        $key = str_replace(' ','%',$key);

        $locator = new LocatorManager('App\Http\Models\location');
        return response()->json($locator->findAddress($key));
    }

    public function nearest($lat,$long)
    {
        header('Access-Control-Allow-Origin: *');

//        $db =new \geo\src\db();
//        $db->prepareDatabase();

        $locator = new LocatorManager('App\Http\Models\info');

        $point = new Point();
        $point->setLattitude($lat);
        $point->setLangtiude($long);
        $point->setTitle('user');
        $result = $locator->nearest($point,Type::restaurant,500);
        return  response()->json ($result);

    }

    public function findRestaurants($id)
    {
        header('Access-Control-Allow-Origin: *');

//        $db =new \geo\src\db();
//        $db->prepareDatabase();

        $locator = new LocatorManager('App\Http\Models\info');
        return response()->json($locator->getList(strtoupper( Type::restaurant),$id));
    }

}