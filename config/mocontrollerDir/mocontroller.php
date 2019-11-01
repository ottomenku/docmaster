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
       // 'obClass' => ['baseOB'=>''],
        'funcRun' =>['this.index_setData'=>[[],'ACT.data.table']],// a this elhagyható az obkey kell ami az OB kulcsa nem a classname
       'delParrent' => 'todel',
    ],
    'create'=> [],
    'store'=> [],
    'show '=> [],
    'update'=> [],
    'destroy'=> [],
];