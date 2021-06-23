<?php 
    function validateTopic($topic){
        
         $errors=[];
        
        if (empty($topic['name'])) {
            array_push($errors,'Name must be set');
        }

        $existingTopic=selectOne('topics',['name'=>$topic['name']]);
        if (($existingTopic)) {
            if(isset($topic['update-topic']) && $existingTopic['id']!= $topic['id']){
                array_push($errors,'Topic already had');
            }
            if(isset($topic['add-topic'])){
                array_push($errors,'Topic already had'); 
            }
        }
        return $errors;
    }

