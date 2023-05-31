<?php require(__DIR__ . '/../../templates/header.php'); ?>
                    <?php if(isset($_GET['success'])):?>
                        <div class="success">
                            El post ha sido borrado
                        </div>
                    <?php endif; ?>
                    <table>
                            <?php foreach($all_posts as $post):?>
                                <tr>
                                    <td><?php echo $post['content'] ?></td>
                                    <td> <a href="?delete-post=<?php echo $post['id'] ?>&hash=<?php echo generate_hash( 'delete-post-' . $post['id']); ?>">Eliminar entrada</a></td>
                                </tr>
                            <?php endforeach; ?>
                    </table>
<?php require(__DIR__ . '/../../templates/footer.php'); ?>