<?php
use App\Library\View;
use App\Library\Auth;

?>

<?php foreach ($viewParams['items'] as $item): ?>
    <div style="padding-bottom: 5em;">
        <h2>
            <a href="/shop/<?php echo View::escape($item['id']); ?>">
                <?php echo View::escape($item['name']); ?>
            </a>
        </h2>
        <hr/>
        <div class="row" style="padding-bottom: 1em">
            <div class="col-md-4">
                <img class="img-responsive" src="<?php echo View::escape($item['image']); ?>">
            </div>
            <div class="col-md-8">
                <p><?php echo View::escape($item['littledescription']); ?></p>
            </div>
        </div>
        <div>
            <ul class="list-inline">
                <ul class="list-inline">
                    <li><h3>Цена: <?php echo View::escape($item['price']); ?>$</li></h3>
                    <?php if (Auth::check()): ?>
                        <li><a class="btn btn-success" href="/cart/add/<?php echo View::escape($item['id']); ?>">Добавить в корзину</a></li>
                    <?php else: ?>
                        <li>
                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Вы должны быть залогинены для добавления в корзину">Добавить в корзину</button>
                        </li>
                    <?php endif ?>
                </ul>
            </ul>
        </div>
    </div>
<?php endforeach ?>
