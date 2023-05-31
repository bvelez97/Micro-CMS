<?php

     function get_all_posts(){
        global $bbdd;
        $result = $bbdd->query( "SELECT * FROM posts" );
            return  $bbdd->fetch_all( $result );
        
    }

    function get_post( $id_post ){
        global $bbdd;
        $id_post = intval($id_post); 
        $result = $bbdd->query( "SELECT * FROM posts WHERE id=" . $id_post );
            return  $bbdd->fetch_assoc( $result ); 
        
    }

    function insert_post($title, $excerpt, $content ){

        $publish_on = date( 'Y-m-d H:i:s');

        global $bbdd;

        $title = $bbdd->real_escape_string($title);
        $excerpt = $bbdd->real_escape_string($excerpt);
        $content = $bbdd->real_escape_string($content);


        $result = $bbdd->query( "INSERT INTO `posts` (`title`, `excerpt`, `content`, `published_on`) VALUES ('$title','$excerpt','$content',' $publish_on')" );
    
    }

    function delete_post( $id ){
        global $bbdd;
        $id = intval($id); 
        if( !check_hash( 'delete-post-' . $id, $_GET['hash'])){ 
            die( 'Hackeando, no?');
        } else {
            $result = $bbdd->query( "DELETE FROM `posts` WHERE id = $id" );
        }
    
    }




?>