<?php

return [
    'table' =>'exampletable'

    ,'fillable' => ['category_id', 'name', 'note']
    ,'sofdelete' => true
    ,'timestamps' => true  // timestamps();

    //https://laravel.com/docs/5.8/eloquent-relationships
    , 'relations' => [
        //foreign_key: alapértelmezetten 'modelname_id'
        //otherTable_key: alapértelmezetten 'id'  
        'relationsname1' => ['hasOne', 'App\Modelname','foreign_key', 'otherTable_key'], //one to one
        'relationsname2' => ['hasMany', 'App\Modelname','foreign_key', 'otherTable_key'], //one to many
        'relationsname3' => ['belongsTo', 'App\Modelname','foreign_key', 'otherTable_key' ,'casacade'], //Inverse one to many   
       //belongsToMany -----------------------------------------------
        //3. ar'role_user': joining table name
        //4. arg:'user_id':annak a modellnek a idegen kulcsneve, amelynél a kapcsolatot definiálja
        //5. arg:'role_id' annak a modellnek a idegen kulcsneve, amelyhez csatlakozik
        'relationsname4' => ['belongsToMany', 'App\Role', 'role_user', 'user_id', 'role_id'], //many to many
    ]

    //https://laravel.com/docs/5.8/migrations
    //https://laravel.com/docs/5.8/validation
    //https://github.com/fzaninotto/faker
   // ['type','faker','validate','alias=ha nem egyezik a beviteli mező neve az adatbázi mezőével']
   ,'columns'=> ['id' => ['increments','','', null]
                ,'category_id' => ['integer,unsigned','1','','cat']
                ,'name' => ['string:50,default:doc1','doc1',''] 
                ,'note' => ['text,nullable','lorem','']
 
                ]
//column type :               
//column modifier: [unique,unsigned,nullable,]
//faker:     
 //validation string:  ,integer:
    , 'seed' => [
        [ 'category_id'=> '1', 'name'=> 'doc1', 'note'=> 'fgweg ergwegwegwegw ']
       , [ 'category_id'=> '1', 'name'=> 'doc2', 'note'=> 'dfghgb efddggfgf']
        ]

];
