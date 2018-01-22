<?php
$this->title = 'Signup';

use yii\helpers\Url;

?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-2"></div>
            <div class="col-md-4 col-sm-8">
                <div class="login_login">
                    <h2> Реєстрація </h2>
                    <hr>
                </div>
                <form action="<? echo Url::to(['todo/signupform']) ?>" method="POST">
                    <p>
                        <label for="login"> Логін </label>
                        <input id="login" class="form-control" name="login" value="<?php echo $post['login'] ?>">
                    </p>
                    <p>
                        <label for="email">Електронна пошта</label>
                        <input id="email" class="form-control" type="email" name="email"
                               value="<?php echo $post['email'] ?>">
                    </p>
                    <p>
                        <label for="password">Пароль</label>
                        <input id="password" class="form-control" type="password" name="password">
                    </p>
                    <p>
                        <label for="password_2">Підтвердження паролю</label>
                        <input id="password_2" class="form-control" type="password" name="password_2">
                    </p>
                    <p>
                        <button class="btn btn-primary" type="submit" name="do_signup">Реєстрація</button>
                    </p>
                </form>
            </div>
            <div class="col-md-4 col-sm-2"></div>
        </div>
    </div>

<div class="validat">    
<?php if (isset($success)) {
    echo array_shift($success);
} ?>
</div>