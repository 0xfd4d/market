<div class="row">
    <div class="col-md-offset-3">
        <div class="col-md-8">
            <h2>Ваша корзина</h2>
            <hr/>
            <?php foreach($viewParams['items'] as $item): ?>
                <h2>
                    <a href="/shop/<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a>
                </h2>
            <?php endforeach ?>
        </div>
    </div>
</div>
