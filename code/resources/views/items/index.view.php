<?php
    use App\Library\View;
?>

<?php foreach($viewParams['items'] as $item): ?>
    <div style="padding-bottom: 5em;">
        <h2>
            <a href="/shop/<?php echo View::escape($item['id']); ?>">
                <?php echo View::escape($item['name']); ?>
            </a>
        </h2>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <p><?php echo View::escape($item['description']); ?></p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="<?php echo View::escape($item['image']); ?>">
            </div>
        </div>
        <div>
            <ul class="list-inline">
                <li><a class="btn btn-success" href="/cart/add/<?php echo View::escape($item['id']); ?>">Add to cart</a></li>
                <li><a class="btn btn-danger" href="#">Buy now!</a></li>
            </ul>
        </div>
    </div>
<?php endforeach ?>
