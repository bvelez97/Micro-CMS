<?php require('init.php'); ?> 
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
       redirect_to( '?success=true' );
       die();
    }
   }
?>
<?php require('templates/header.php'); ?>
    <h2>Crear nueva entrada </h2>
    
        <?php if($error): ?>
            <div class="error">Error en el formulario</div>
        <?php endif; ?>

    <form action="" method="post">
                <label for="title">Título (requerido)</label>
                <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title, ENT_QUOTES); ?>"> <!--para sanear las salidas de la base de datos-->

                <label for="excerpt">Extracto</label>
                <input type="text" name="excerpt" id="excerpt" value="<?php echo htmlspecialchars($excerpt, ENT_QUOTES); ?>">

                <label for="content">Contenido (Requerido)</label>
                <textarea name="content" id="content" cols="30" rows="30"><?php echo htmlspecialchars($content, ENT_QUOTES); ?></textarea>

                <p>
                    <input type="submit" name="submit-new-post" value="Nuevo post">
                </p>
    </form>
<?php require('templates/footer.php'); ?>
