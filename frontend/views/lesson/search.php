<?php

/** @var \frontend\models\LessonSearchForm $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'method' => 'get',
    'action' => ['lesson/list'],
])
?>
<div class="list-group-horizontal" style="display: flex">
    <div class="list-group-item">
    <?= $form->field($model, 'name')
        ->input('text', ['placeholder' => 'Введите название...'])
        ->label(false);
    ?>
    </div>
    <div class="list-group-item">
    <?= Html::submitButton('Поиск', ['class' => 'btn btn-outline-secondary']); ?>
    </div>
</div>
<?php ActiveForm::end() ?>
