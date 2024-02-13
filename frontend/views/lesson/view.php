<?php

/** @var \common\models\Lesson $model */

use frontend\assets\LessonAsset;
use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;

LessonAsset::register($this);
?>
<div class="list-group">
    <h1><?= Html::encode($this->title) ?></h1>
    <iframe width="700" height="576" src="<?= $model->link; ?>" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <?= $model->description; ?>
    <?php
        if (!Yii::$app->user->identity->watchedLesson($model->id)) {
            echo Html::button('Просмотрено', ['id' => 'mark-as-watched-btn', 'class' => 'btn btn-success col-2', 'data-key' => $model->id]);
        }
    ?>
</div>