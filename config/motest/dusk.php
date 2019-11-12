<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Dusk test Defaults
    |--------------------------------------------------------------------------
    |
    */
 'truncate' => [
'howcats',
 'categories',
 'howtos'],
 'baseurl' => env('DUSK_TEST_BASE_URL', 'http://test.localhost:8000'),
//'baseurl' => 'http://test.localhost:8000',
 'memoryDB' => 'sqlite_testing',
 'DB' => 'docmater',
 'imageGeneral' => env('IMAGE_GENERAL', false),
/*
->assertSee($text);->assertDontSee($text);
->assertHostIs($host);
->assertPathIs('/home');
->assertTitle($title);->assertTitleContains($title);
->assertSourceHas($code);->assertSourceMissing($code);
->assertSeeLink($linkText);->assertDontSeeLink($linkText);
//action-------------
press('button[type="submit"'), press('Save') // csak gomboknál működik
'click'=>'@new', 'click'=>'.class',  
clickLink($linkText);


//two params:
->assertRouteIs($name, $parameters);-
->assertSeeIn($selector, $text);->assertDontSeeIn($selector, $text);
->assertSelected($field, $value); ->assertNotSelected($field, $value);
//action-------------
->type('firstname', 'John')
->attach('photo', __DIR__ . '/photos/me.png') //file feltöltés
->select('state', 'NC') //Az NC mező kiválsztása
->radio('gender', 'Male') //radiobutton
->keys('input[placeholder="Email"]', 'your.email@gmail.com')
'waitFor'=>'@{crudname}.index:3'  //max 3 másodpercig vár az első paraméterben megadott azonosító megjelenésésre
waitForText('Message')
waitFor('.fa-arrow-left');  //<i class="fa fa-arrow-left" aria-hidden="true"></i>
// Retrieve the value...
$value = $browser->value('selector');

// Set the value...
$browser->value('selector', 'value');
$browser->acceptDialog(); //confirmation
$browser->dismissDialog(); //cancel
*/
'basecruds'=>[ 
    'create'=>   [
        'visit'=>'/admin/{crudname}','waitFor'=>'@new:5', 'press'=>'@new', //'clickLink'=>'Új tudástár kategória',
        'waitFor'=>'@save','form'=> ['type'=>'name:dockat,note:note'], 'click'=>'@save',
        'waitFor'=>'@{crudname}.index:5','assertSee'=>'dockat1,note1'
    ],
   'update'=> [
        'visit'=>'/admin/{crudname}/','waitFor'=>'@edit1:3', //valamiért kell...
        'press'=>'@edit1',
        'waitFor'=>'@save:5', 'form'=> ['type'=>'name:dockat2,note:note2','select'=>'zip:5100'],'click'=>'@save', 
        'waitFor'=>'@{crudname}.index:10','assertSee'=>'dockat2,note2',
    ],
     'show'=>   [
         'visit'=>'/admin/{crudname}/','waitFor'=>'@show1',
        'press'=>'@show1','waitFor'=>'.fa-arrow-left',
        'assertSee'=>'dockat2,note2','assertPresent'=>'@{crudname}.show'
     ],
    'destroy'=>   [
        'visit'=>'/admin/{crudname}/','waitFor'=>'@destroy1', //valamiért kell...
         'press'=>'@destroy1','acceptDialog'=>'', 
          'waitFor'=>'@{crudname}.index:3','assertDontSee'=>'dockat2,note2',
     ] 
    
],  
'managercruds'=>[ 
//--------------------------------------    dusk="{crudname}.create"'assertSee'=>'Create New {crudname}',
'howcat'=>[//rout admin utáni tagját kell megadni CRUD névnek
   /*   'create'=>   [
        'form'=> ['type'=>'name:dockat1,note:note1'],
        'assertSee'=>'dockat1,note1'
        ],
       'update'=> [
        'form'=> ['type'=>'name:dockat2,note:note2'],'assertSee'=>'dockat2,note2'
        ],
        'destroy'=>   [
          'assertDontSee'=>'dockat2,note2',
         ] ,
         'show'=>   ['off'=>true ] 
        ],*/
    'category'=>[
        'create'=>   [
          'form'=> ['type'=>'name:dockat1,note:note1'],
          'assertSee'=>'dockat1,note1'
          ],
         'update'=> [
          'form'=> ['type'=>'name:dockat2,note:note2'],'assertSee'=>'dockat2,note2'
          ],
          'destroy'=>   [
            'assertDontSee'=>'dockat2,note2',
           ] ,
           'show'=>   ['off'=>true ] 
      ]
    ]
],

'popup'=>[],

];
