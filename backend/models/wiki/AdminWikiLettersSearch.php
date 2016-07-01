<?php

namespace backend\models\wiki;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\wiki\AdminWikiLetters;

/**
 * AdminWikiLettersSearch represents the model behind the search form about `backend\models\wiki\AdminWikiLetters`.
 */
class AdminWikiLettersSearch extends AdminWikiLetters
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'autorId', 'updaterId'], 'integer'],
            [['alias', 'letter', 'title', 'description', 'keywords', 'h1', 'createdDate', 'updatedDate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AdminWikiLetters::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'createdDate' => $this->createdDate,
            'updatedDate' => $this->updatedDate,
            'autorId' => $this->autorId,
            'updaterId' => $this->updaterId,
        ]);

        $query->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'letter', $this->letter])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'h1', $this->h1]);

        return $dataProvider;
    }
}
