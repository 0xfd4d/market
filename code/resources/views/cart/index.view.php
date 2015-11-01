<div class="row">
    <div class="col-md-offset-1">
        <div class="col-md-10">
            <h2>Ваша корзина</h2>
            <hr/>
            <?php foreach ($viewParams['items'] as $item): ?>
                <div class="item">
                    <div class="item-name">
                        <h2>
                            <a href="/shop/<?php echo $item[0]; ?>"><?php echo $item['name']; ?></a>
                            <a href="/cart/remove/<?php echo $item['id']; ?>">
                                <span class="pull-right glyphicon glyphicon-remove text-danger"></span>
                            </a>
                            <span class="pull-right"><?php echo $item['price']; ?>$</span>
                        </h2>
                    </div>
                </div>
            <?php endforeach ?>
            <div class="pull-right">
                <h2>Итого: <?php echo $viewParams['price_count']; ?>$</h2>
            </div>
        </div>
    </div>
</div>
