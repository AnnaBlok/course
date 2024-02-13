<?php

/** @var yii\web\View $this */
/* @var frontend\models\LessonSearchForm $model */

use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Список уроков';
$dataProvider = $model->search();

echo $this->render('search', ['model' => $model]);

if (Yii::$app->user->identity->watchedAllLessons()) {
    echo '<div class="alert alert-info" style="margin: 10px">Поздравляем! Все уроки пройдены.</div>';
}

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'emptyText' => 'Уроки пока не добавлены',
    'columns' => [
        [
            'format' => 'html',
            'value' => function ($model) {
                $lesson = Html::a($model->name, Url::to(['lesson/view', 'id' => $model->id]));
                if (Yii::$app->user->identity->watchedLesson($model->id)) {
                    $lesson .= '<span> &#x2705;</span>';
                }
                return $lesson;
            },
        ],
    ],
]);