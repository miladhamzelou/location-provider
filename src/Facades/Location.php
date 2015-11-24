<?php namespace Mabna\Location\Facades;

use Illuminate\Support\Facades\Facade;

class Loaction extends Facade {
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'geo\src\Location'; }
}