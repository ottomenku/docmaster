<?php

return [

    'param' => 'base',
    'base' => [

        'domain' => 'base',
        'marad' =>['marad1'],
        'todel' => '',
    ],

    'nemcrud' => [
        'domain' => 'nemcrud',
        'marad' =>['marad1'],
    ],
    'index' => [
      'obClass' => ['baseOB'=>'App\Post'],
        'funcRun' =>['this.Moview'=>[[],'ACT.return']],// a this elhagyható az obkey kell ami az OB kulcsa nem a classname
      // 'delParrent' => 'todel',
    ],
    'create'=> [],
    'store'=> [],
    'show '=> [],
    'update'=> [],
    'destroy'=> [],
];