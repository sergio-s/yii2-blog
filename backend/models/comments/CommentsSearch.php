<?php

namespace backend\models\comments;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\comments\Comments;

/**
 * CommentsSearch represents the model behind the search form about `backend\models\comments\Comments`.
 */
class CommentsSearch extends Comments
{




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'materialId', 'parentId', 'level',], 'integer'],
            [['status',], 'safe'],
//            [['id', 'materialId', 'autorId', 'updaterId', 'parentId', 'level',], 'integer'],
//            [['status',], 'safe'],
//            [['materialType', 'createdDate','updatedDate', 'message'], 'safe'],
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
        $query = Comments::find();

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

if($status = array_search($this->status, \common\models\comments\Comments::getStatusList())){
    $this->status = $status;
}


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'materialId' => $this->materialId,
            'autorId' => $this->autorId,
            'updaterId' => $this->updaterId,
            'parentId' => $this->parentId,
            'level' => $this->level,
            //'createdDate' => $this->createdDate,
            //'updatedDate' => $this->updatedDate,
            //'status' =>  $this->status,
            'status' =>  $this->status,
        ]);

        $query->andFilterWhere(['like', 'materialType', $this->materialType])
            ->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}
