<?php require( '../init.php' ) ?>
<?php $all_posts = get_all_posts(); ?>
<?php

   $error = false;

   $title = "";
   $excerpt = "";
   $content = "";

   if( isset($_POST['submit-new-post'])) {

    $title = filter_input( INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $excerpt = filter_input( INPUT_POST, 'excerpt', FILTER_SANITIZE_STRING);
    $content = strip_tags( $_POST['content'], '<br><p><a><img><div>');

    if( empty($title) || empty($excerpt) || empty($content)){
       $error = true;
    } else {
       insert_post($title, $excerpt, $content);
       //Redirigir el blog
       redirect_to( '/admin?action=new-post&success=true' );
       die();
    }
   }
?>
<?php
    if( !is_logged_in()){
        redirect_to('/login');
    }

    if ( isset($_GET['delete-post'])){
        $id = $_GET['delete-post'];
            delete_post( $id );
            redirect_to( '/admin?action=list-posts&success=true');
        die();
    }

    $action = ''; 
    if(isset($_GET['action'])){ $action = $_GET['action']; }

    switch($action){
        case 'new-post': {
            require('templates/new-post.php');
            break;
        }
        case 'list-posts': {
            require('templates/list-post.php');
            break;
        }
        default: {
            require('templates/admin.php');
         }
    }
?>

