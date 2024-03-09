<?php 
    $keyWords=DB::table('variables')->get();
    $variables=array();
    foreach($keyWords as $word){
        $variables+=[$word->key_name=>$word->pashto];
    }    
    return  $variables;