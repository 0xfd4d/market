<?php
use App\Library\Auth;
use App\Library\Cart;

?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Магазин</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Главная</a></li>
                <?php if (Auth::check()): ?>
                    <li class="active"><a href="/cart">Корзина (<?php echo sizeof(Cart::getItemsByUserId(Auth::user()['id'])); ?>)</a></li>
                <?php endif ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (Auth::isAdmin()): ?>
                    <li class="active"><a href="/shop/create">Опубликовать товар</a></li>
                <?php endif ?>
                <?php if (!Auth::check()): ?>
                    <li><a href="/auth/login">Логин</a></li>
                    <li><a href="/auth/register">Регистрация</a></li>
                <?php else: ?>
                    <li class='navbar-text'>Вы залогинены</li>
                    <li><a href="/auth/logout">Выйти</a></li>
                <?php endif ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
