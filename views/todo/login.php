<?php
$this->title = 'Авторизація';

use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-sm-2"></div>
        <div class="col-md-4 col-sm-8">
            <div class="login_login">
                <h2> Авторизація </h2>
                <hr>
            </div>
            <form action="/web/index.php?r=todo/login" method="POST">
                <p>
                <p><strong>Логін</strong></p>
                <input class="form-control" type="text" name="login" value="<?php echo $post['login'] ?>">
                </p>

                <p>
                <p><strong>Пароль</strong></p>
                <input class="form-control" type="password" name="password">
                </p>

                <p>
                    <button class="btn btn-primary" type="submit" name="do_login">Вхід</button>
                    <span class="controlbut"><button type="button" class="btn btn-primary"> <a
                                    href="<? echo Url::to(['todo/signupform']) ?>"> Реєстрація  </a> </button> </span>
                </p>
            </form>
        </div>
    </div>
 <div class="validat">
<?php if (isset($success)) {
    echo array_shift($success);
} else
    if (isset($logged_user[0]['login'])) { ?>
       
        <div class="alert alert-success">
            Авторизація успішна!<br/> ви можете перейти до <a href="/web/index.php?r=todo/main">робочої панелі</a>
            </div>
        
    <?php } ?>
    </div>
</div>
</body>
</html>