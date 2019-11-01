<?php

return [
    'table' =>'docs'
    , 'fillable' => ['category_id', 'name', 'originalname', 'filename', 'type', 'prev', 'thumb', 'sizekb', 'note']

    , 'relations' => ['Category' => ['belongsTo', 'casacade']]
   
    , 'id' => ['increments','','']
    , 'category_id' => ['integer','1','']
    , 'name' => ['integer','doc1','']
    , 'originalname' => ['string','kepfile','']
    , 'filename' => ['string','kepfile','']
    , 'type' => ['string','word','']
    , 'prev' => ['string','kepfile','']
    , 'sizekb' => ['integer','integer','']
    , 'note' => ['text','lorem','']
    // timestamps();
 
    , 'seed' => [[
        'category_id'=> '1',
         'name'=> '1',
          'originalname'=> '1', 
          'filename'=> '1', 
          'type'=> '1', 
          'prev'=> '1', 
          'thumb'=> '1',
          'sizekb'=> '1', 
          'note'=> '1']]

];
