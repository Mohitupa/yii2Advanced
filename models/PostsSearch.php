<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Posts;

/**
 * PostsSearch represents the model behind the search form of `app\models\Posts`.
 */
class PostsSearch extends Posts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'auther_id'], 'integer'],
            [['post_title', 'post_description'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Posts::find();

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
            'auther_id' => $this->auther_id,
        ]);

        $query->andFilterWhere(['like', 'post_title', $this->post_title])
            ->andFilterWhere(['like', 'post_description', $this->post_description]);

        return $dataProvider;
    }
}
