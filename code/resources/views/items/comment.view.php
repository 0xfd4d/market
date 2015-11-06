<?php
use App\Library\View;
use App\Library\Auth;

?>

<div>
    <h2>Комментарии к <?php echo View::escape($viewParams['item']['name']); ?> (<?php echo $viewParams['comments_count']; ?>):</h2>
</div>
<div style="padding-bottom: 2em">
    <?php if($viewParams['comments_count'] > 0 ): ?>
        <?php foreach($viewParams['comments'] as $comment): ?>
            <div style="padding-bottom: 1em; font-size: 1.2em;">
                <div>
                    <b><?php echo View::escape($comment['name']); ?></b> написал:
                </div>
                <div>
                    <?php echo View::escape($comment['body']); ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h4>Комментариев нету</h4>
    <?php endif; ?>
</div>
<?php if(Auth::check()): ?>
    <div>
        <form action="/shop/<?php echo $viewParams['request']->params[0]; ?>/comment" method="post">
            <div class="form-group">
                <div class="form-group">
                    <textarea style="height: 10em;" name="body" class="form-control" placeholder="Комментарий"><?php
                        if ($viewParams['request']->hasPost('body')):
                            echo View::escape($viewParams['request']->post['body']);
                        endif;
                            ?></textarea>
                </div>
            </div>
            <?php if (isset($viewParams['request']->errors[0])): ?>
                <?php foreach ($viewParams['request']->errors as $error): ?>
                    <p class="text-danger"><?php echo $error; ?></p>
                <?php endforeach ?>
            <?php endif ?>
            <button type="submit" class="btn btn-primary">Готово</button>
        </form>
    </div>
<?php endif; ?>
