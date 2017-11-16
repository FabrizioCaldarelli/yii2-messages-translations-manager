<?php

namespace sfmobile\ext\messagesTranslationsManager\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use sfmobile\ext\messagesTranslationsManager\models\SourceMessage;

/**
 * SourceMessageSearch represents the model behind the search form about `sfmobile\ext\messagesTranslationsManager\models\SourceMessage`.
 */
class SourceMessageSearch extends SourceMessage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['category', 'message'], 'safe'],
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
     * Creates query from params
     *
     * @param array $params
     *
     * @return ActiveQuery
     */
    public function loadAndSearchQuery($params)
    {
        $query = SourceMessage::find();

        $this->load($params);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'message', $this->message]);

        return $query;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param ActiveQuery $query
     *
     * @return ActiveDataProvider
     */
    public function search($query)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }
}
