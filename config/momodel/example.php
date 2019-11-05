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
    //https://github.com/fzaninotto/faker
   // ['type','validate','faker']
   ,'columns'=> ['id' => ['increments','','']
                ,'category_id' => ['integer,unsigned','1','']
                ,'name' => ['string:50,default:doc1','doc1'] 
                ,'note' => ['text,nullable','lorem']
 
                ]
//column type :               
//column modifier: [unique,unsigned,nullable,]
//faker:     
 //validation string:  ,integer:
    , 'seed' => [
        [ 'category_id'=> '1', 'name'=> 'doc1', 'note'=> 'fgweg ergwegwegwegw ']
       , [ 'category_id'=> '1', 'name'=> 'doc2', 'note'=> 'dfghgb efddggfgf']
        ]
        
    , 'goodtest' => [
        [ 'category_id'=> '1', 'name'=> 'doc1', 'note'=> 'fgweg ergwegwegwegw ']
        , [ 'category_id'=> '1', 'name'=> 'doc2', 'note'=> 'dfghgb efddggfgf']
        ]   

/*
 //https://laravel.com/docs/5.8/validation

accepted|between:min,max (integer, string,array, file)|boolean|different:field
email|exists:table,column|file|filled|image|integer|json|max:value|min:value|numeric|required
not_regex:pattern|regex:pattern
same:field


datum:
'start_date' => 'required|date|after:tomorrow'
'finish_date' => 'required|date|after:start_date' 
after:date, after_or_equal:date,
before:date, before_or_equal:date
date_format:Y-m-d

'photo' => 'mimes:jpeg,bmp,png'
confirmed: lennie kell egy columname_confirmation mezőnek Pl.: password-hez password_confirmation -nak és abba ugyanazt kell beírni
different:field_name   nem lehet ugyanolyan mint a field_name mező
ends_with:foo,bar,...The field under validation must end with one of the given values.
gt:field  nagyobb mint a field 
 gte:field nagyobb vagy egyenlő field-el 
lt:field kisebb mint a field 
lte:field kisebb vagy egyenlő field-el 
not_in:foo,bar,... nem lehetsem foo sem bar  stb.

required_if:anotherfield,value,...
use Illuminate\Validation\Rule;
Validator::make($request->all(), [
    'role_id' => Rule::requiredIf($request->user()->is_admin),
]);

*/
];
