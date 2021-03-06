<?php
/**
 * Created by PhpStorm.
 * User: masoud
 * Date: 11/7/15
 * Time: 3:31 PM
 */

namespace Mabna\Location;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Config;

class db
{
    public static function prepareDatabase()
    {




        $capsule = new Capsule();
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => Config::get('database.connections.mysql.host'),
            'database'  => Config::get('database.connections.mysql.database'),
            'username'  => Config::get('database.connections.mysql.username'),
            'password'  => Config::get('database.connections.mysql.password'),
            'charset'   => Config::get('database.connections.mysql.charset'),
            'collation' => Config::get('database.connections.mysql.collation'),
            'prefix'    => Config::get('database.connections.mysql.prefix')]);

        $capsule->setEventDispatcher(new Dispatcher(new Container()));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

}