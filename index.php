<?php require('init.php'); ?> 

<?php $all_posts = get_all_posts(); ?>

<?php
    $post_found = false;
    $post_error = false;

    if ( isset($_GET['view'])){
        $post_found = get_post($_GET['view']); 
          if( $post_found ){
            $all_posts = [$post_found];
          } else {
              $post_error = true;
          }
    }

?>



<?php require('templates/header.php'); ?>
    <?php if(isset($_GET['success'])):?>
        <div class="success">
            El post ha sido creado
        </div>
    <?php endif; ?>
	<div class="posts">
        <?php if($post_error):?>
            <p>Lo sentimos muchísimo, la entrada seleccionada no existe...</p>
            <a href=".">Volver a la página anterior</a>
        <?php else:?>
            <?php foreach($all_posts as $post):?>
                        <article class="post">
                            <header>
                                    <a href=".?view=<?php echo $post['id']?>"><h2 class="post-title"><?php echo $post['title'] ?></a></h2>
                            </header>
                    <?php if($post_found):?>
                            <div class="post-content"><?php echo $post['content'] ?></div>
                    <?php else: ?>
                            <div class="post-content"><?php echo $post['excerpt'] ?></div>
                    <?php endif;?>
                            <footer>
                                <span class="post-date">Publicada en: <?php echo strftime( '%d %b %Y', strtotime( $post['published_on'])); ?></span>
                            </footer>
                    <?php if($post_found):?>
                        <a href=".">Volver a la página anterior</a>
                    <?php endif;?>
                        </article>
            <?php endforeach; ?>
        <?php endif;?>
	</div>

<?php require('templates/footer.php'); ?>
