<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Dusk test Defaults
    |--------------------------------------------------------------------------
    |
    */
 'baseurl' => env('DUSK_TEST_BASE_URL', 'http://localhost:8000'),
//'baseurl' => env('DUSK_TEST_BASE_URL', 'http://doc.mottoweb.hu'),
 'memoryDB' => 'sqlite_testing',
 'DB' => 'docmater',
 'imageGeneral' => env('IMAGE_GENERAL', false),
];
