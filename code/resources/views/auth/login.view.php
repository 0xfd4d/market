<?php
use App\Library\View;
?>

<div class="row">
    <div class="col-md-offset-3">
        <div class="col-md-8">
            <h2>Login</h2>
            <hr/>
            <form action="/auth/login" method="post">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if($viewParams['request']->hasPost('email')) echo View::escape($viewParams['request']->post['email']); ?>">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <?php if(isset($viewParams['request']->errors[0])): ?>
                    <?php foreach($viewParams['request']->errors as $error): ?>
                        <p class="text-danger"><?php echo $error; ?></p>
                    <?php endforeach ?>
                <?php endif ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
