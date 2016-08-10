<?php

namespace app\modules\articles\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * ArticleSearch represents the model behind the search form about `app\models\ArticleRecord`.
 */
class ArticleSearch extends ArticleRecord
{
    
    public $categories;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'type_id'], 'integer'],
            [['alias', 'name', 'content', 'categories'], 'safe'],
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
     * @return ActiveDataProvider
     * @internal param array $params
     *
     */
    public function search()
    {


        $query = ArticleRecord::find();
        
        // add conditions that should always apply here
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => isset($params['per-page']) ? $params['per-page'] : 10,
            ],
        ]);
        
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'type_id' => $this->type_id,
        ]);

        $query->andFilterWhere(['IN', 'category_id', $this->categories]);
        
        $query->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content', $this->content]);
        
        return $dataProvider;
    }
}
