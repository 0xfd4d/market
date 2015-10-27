<?php
use App\Library\View;
?>

<div class="row">
    <div class="col-md-offset-3">
        <div class="col-md-8">
            <h2>Регистрация</h2>
            <hr/>
            <form action="/auth/register" method="post">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Имя" value="<?php if($viewParams['request']->hasPost('name')) echo View::escape($viewParams['request']->post['name']); ?>">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Почта" value="<?php if($viewParams['request']->hasPost('email')) echo View::escape($viewParams['request']->post['email']); ?>">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Пароль">
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirm" class="form-control" placeholder="Повторите Пароль">
                </div>
                <?php if(isset($viewParams['request']->errors[0])): ?>
                    <?php foreach($viewParams['request']->errors as $error): ?>
                        <p class="text-danger"><?php echo $error; ?></p>
                    <?php endforeach ?>
                <?php endif ?>
                <button type="submit" class="btn btn-primary">Готово</button>
            </form>
        </div>
    </div>
</div>
