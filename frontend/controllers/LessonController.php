<?php

namespace frontend\controllers;

use common\models\Lesson;
use frontend\models\LessonSearchForm;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class LessonController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['list', 'view', 'mark-as-watched'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return Response
     */
    public function actionIndex()
    {
        return $this->redirect(['lesson/list']);
    }

    /**
     * @return string
     */
    public function actionList()
    {
        $searchModel = new LessonSearchForm();
        $searchModel->load(Yii::$app->request->get());

        return $this->render('list', ['model' => $searchModel]);
    }

    /**
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView(int $id)
    {
        $lesson = Lesson::findOne($id);
        if (is_null($lesson)) {
            throw new NotFoundHttpException('Урок не найден');
        }

        return $this->render('view', [
            'model' => $lesson,
        ]);
    }

    /**
     * @param int $id
     * @return array
     */
    public function actionMarkAsWatched(int $id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $lesson = Lesson::findOne($id);
        $user = Yii::$app->user->identity;
        if (is_null($lesson) || is_null($user) || $user->watchedLesson($id)) {
            return ['success' => false, 'error' => 'Некорректные данные'];
        }
        try {
            $user->link('watchedLessons', $lesson);
        } catch (\Exception $e) {
            return ['success' => false, 'error' => 'Не удалось сохранить запись'];
        }

        return ['success' => true, 'redirectUrl' => Url::to(['lesson/list'])];
    }

    public function actionAdd(int $id)
    {
        // TODO
    }

    public function actionEdit(int $id)
    {
        // TODO
    }

    public function actionDelete(int $id)
    {
        // TODO
    }
}
