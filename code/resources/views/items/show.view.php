<?php
use App\Library\View;
use App\Library\Auth;

?>

<div style="padding-bottom: 5em;">
    <h2>
        <a href="/shop/<?php echo View::escape($viewParams['item']['id']); ?>">
            <?php echo View::escape($viewParams['item']['name']); ?>
        </a>
            <?php if (Auth::isAdmin()): ?>
            <span class="pull-right">
                <a class="btn btn-info " href="/shop/edit/<?php echo $viewParams['item']['id']; ?>">Изменить</a>
            </span>
        <?php endif; ?>
    </h2>
    <hr/>
    <div class="row" style="padding-bottom: 1em">
        <div class="col-md-4">
            <img class="img-responsive" src="<?php echo View::escape($viewParams['item']['image']); ?>">
        </div>
        <div class="col-md-8">
            <p><?php echo View::escape($viewParams['item']['description']); ?></p>
        </div>
    </div>
    <div>
        <ul class="list-inline">
            <li><h3>Цена: <?php echo View::escape($viewParams['item']['price']); ?>$</li></h3>
            <?php if (Auth::check()): ?>
                <li><a class="btn btn-success" href="/cart/add/<?php echo View::escape($viewParams['item']['id']); ?>">Добавить в корзину</a></li>
            <?php else: ?>
                <li>
                    <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Вы должны быть залогинены для добавления в корзину">Добавить в корзину</button>
                </li>
            <?php endif ?>
        </ul>
    </div>
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
</div>
