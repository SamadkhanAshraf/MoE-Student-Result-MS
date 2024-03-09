<?php 
    $keyWords=DB::table('messages')->get();
    $variables=array();
    foreach($keyWords as $word){
        $variables+=[$word->key_name=>$word->english];
    }    
    return  $variables;