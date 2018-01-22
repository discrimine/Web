<?php
$this->title = 'Your deals';

use yii\helpers\Url;

?>
<div class="main_hi"><h1> Робоча панель користувача <?php echo $logged_user[0]['login']; ?></h1></div>
<hr>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>Назва</th>
            <th>Дедлайн</th>
            <th>Опис</th>
            <th>Статус</th>
            <th>Видалення</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($notes as $note) {
            ?>
            <tr>
                <td class='db1'>
                    <?= $note->name ?>
                </td>
                <td class='db1'>
                    <?= $note->date ?>
                </td>
                <td class='db1'>
                    <?= $note->description ?>
                </td>
                <td class="check">
                    <input type="checkbox" class="checkClass" name="checkbox"
                           id="<?php echo $note->id; ?>" <?php echo $note->completed ? "checked" : "" ?> >
                </td>
                <td class='delete'>
                    <a href="<? echo Url::to(['todo/delete', 'id' => $note->id]) ?>"
                       onclick="return confirm('Ви впевнені?')">Видалити</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <div class="controlbut">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Нове замовлення</button>
        <button type="button" class="btn btn-info btn-lg"><a href="/web/index.php?r=todo/logout"> Вихід </a></button>
    </div>
</div>
<hr>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Додати замовлення</h4>
            </div>
            <div class="modal-body">
                <form action="<? echo Url::to(['todo/success']) ?>" method="post">
                    <div class="main_but">
                    Назва
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="main_but">
                    Дедлайн
                        <input class="form-control" type="date" name="date">
                    </div>
                    <div class="main_but">
                    Опис
                       <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                    </div>
                    <div class="main_but">
                        <input class="btn btn-success" type="submit" name="add" value="Додати">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
            </div>
        </div>
    </div>
</div>