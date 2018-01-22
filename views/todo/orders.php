<?php
$this->title = 'Your deals';

use yii\helpers\Url;
use app\models\Users;

?>
<div class="main_hi"><h1>Перелік замовлень</h1></div>
<hr>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>Назва</th>
            <th>Дедлайн</th>
            <th>Опис</th>
            <th>Деталі</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($notes as $note) {
            $idshkin = $note['id_user']
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
                 <td class='db1'>
                     <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#<?php echo($idshkin) ?>">Деталі</button>
                </td>
               
            </tr>
<!-- Modal -->
<div class="modal fade" id="<?php echo($idshkin)?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Інформація по замовленню</h4>
            </div>
            <div class="modal-body">
                <?php
                 $resultik = Users::find()
        ->where(['id' => $idshkin])
        ->all();
                ?>
               <h3> Замовлення належить користувачу:<b> <?php echo($resultik[0]['login']); ?> </b> </h3>  
               <h3> Зв'язатися з роботодавцем можна за допомогою електронної пошти:<b> <?php echo($resultik[0]['email']); ?> </b>  </h3>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
            </div>
        </div>
    </div>
</div>



            <?php
        }
        ?>
        </tbody>
    </table>
       
</div>
<hr>

