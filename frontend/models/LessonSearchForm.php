<?php

namespace frontend\models;

use common\models\Lesson;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;

class LessonSearchForm extends Model
{
    public string $name = '';

    public function rules()
    {
        return [
            ['name', 'safe'],
        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels(): array
    {
        return [
            'name' => 'Название',
        ];
    }

    /**
     * @return ActiveDataProvider
     */
    public function search(): ActiveDataProvider
    {
        $query = $this->prepareQuery();

        return new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_ASC]],
        ]);
    }

    /**
     * @return ActiveQuery
     */
    private function prepareQuery(): ActiveQuery
    {
        $query = Lesson::find()->andWhere(['show' => true]);
        if ($this->validate() && !empty($this->name)) {
            $query->andWhere(['ilike', 'name', $this->name]);
        }

        return $query;
    }
}