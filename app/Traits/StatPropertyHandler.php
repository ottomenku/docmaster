<?php
namespace App\Traits;

trait StatPropertyHandler
{
   /**
     *visszatér a  $keyname -nek megfelelő propertyvel. Ha nincs, a configfile $keyname kulcsanak megfelelő értékkel 
     * célja a config értékek dinamikus felülírása
     * ugyanaz mint a PropertyHandler csak ez statikus propertykkel dolgozik
     * Ha van $configFile property nem kell megadni
     */
    public static function getProp($keyname,$configFile=null)
    {
        $conf=$configFile ?? self::$configFile;
        return self::$$keyname ?? config($conf. '.' . $keyname) ?? null;
    }
}