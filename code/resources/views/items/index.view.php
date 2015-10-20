<?php
    use App\Library\View;
?>

<?php foreach($viewParams['items'] as $item): ?>
    <div>
        <?php
            //echo View::escape($item);
            print_r($item);
        ?>
    </div>
<?php endforeach ?>
