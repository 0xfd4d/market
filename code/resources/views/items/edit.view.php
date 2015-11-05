<?php
use App\Library\View;

?>

<div class="row">
    <div class="col-md-offset-3">
        <div class="col-md-8">
            <h2>Изменить товар
                <span class="pull-right">
                    <a class="btn btn-danger" href="/shop/delete/<?php echo $viewParams['request']->params[0]; ?>">Удалить?</a>
                </span>
                </h2>
            <hr/>
            <form action="/shop/edit/<?php echo $viewParams['request']->params[0]; ?>" method="post">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Название" value="<?php
                    if ($viewParams['request']->hasPost('name')):
                        echo View::escape($viewParams['request']->post['name']);
                    else:
                        echo View::escape($viewParams['item']['name']);
                    endif;
                        ?>">
                </div>
                <div class="form-group">
                    <input type="text" name="price" class="form-control" placeholder="Цена" value="<?php
                    if ($viewParams['request']->hasPost('price')):
                        echo View::escape($viewParams['request']->post['price']);
                    else:
                        echo View::escape($viewParams['item']['price']);
                    endif;
                        ?>">
                </div>
                <div class="form-group">
                    <input type="text" name="image" class="form-control" placeholder="Ссылка на картинку" value="<?php
                    if ($viewParams['request']->hasPost('image')):
                        echo View::escape($viewParams['request']->post['image']);
                    else:
                        echo View::escape($viewParams['item']['image']);
                    endif;
                        ?>">
                </div>
                <div class="form-group">
                    <textarea style="height: 10em;" name="description" class="form-control" placeholder="Описание"><?php
                    if ($viewParams['request']->hasPost('description')):
                        echo View::escape($viewParams['request']->post['description']);
                    else:
                        echo View::escape($viewParams['item']['description']);
                    endif;
                        ?></textarea>
                </div>
                <?php if (isset($viewParams['request']->errors[0])): ?>
                    <?php foreach ($viewParams['request']->errors as $error): ?>
                        <p class="text-danger"><?php echo $error; ?></p>
                    <?php endforeach ?>
                <?php endif ?>
                <button type="submit" class="btn btn-primary">Готово</button>
            </form>
        </div>
    </div>
</div>
