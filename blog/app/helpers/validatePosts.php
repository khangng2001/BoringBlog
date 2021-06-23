<?php
    function validatePost($post)
    {
        $errors = [];

        if (empty($post['title'])) {
            array_push($errors, 'Title must be set');
        }
        if (empty($post['body'])) {
            array_push($errors, 'Body must be set');
        }
        if (empty($post['topic_id'])) {
            array_push($errors, 'Please choose a topic');
        } 
        $existingPost = selectOne('posts', ['title' => $post['title']]);
        if (($existingPost)) {
            if (isset($post['update-post']) && $existingPost['id'] != $post['id']) {
                array_push($errors, 'Post with that title already had');
            }

            if(isset($post['add-post']))
            {
                array_push($errors, 'Post with that title already had');   
            }
        }
        return $errors;
    }
?>
