<?php
namespace App\Traits;

trait PropertyHandler
{
    /**
     *visszatér a  $keyname -nek megfelelő propertyvel. Ha nincs, a configfile $keyname kulcsanak megfelelő értékkel 
     * célja a config értékek dinamikus felülírása
     * Ha van $configFile property nem kell megadni
     */
    public function getProp($keyname,$configFile=null)
    {
        $conf=$configFile ?? $this->$configFile;
        return $this->$keyname ?? config($conf. '.' . $keyname) ?? null;
    }
}