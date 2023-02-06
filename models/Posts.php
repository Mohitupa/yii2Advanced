<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $post_title
 * @property string $post_description
 * @property int $auther_id
 *
 * @property Users $auther
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_title', 'post_description', 'auther_id'], 'required'],
            [['post_description'], 'string'],
            [['auther_id'], 'integer'],
            [['post_title'], 'string', 'max' => 255],
            [['auther_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['auther_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_title' => 'Post Title',
            'post_description' => 'Post Description',
            'auther_id' => 'Auther ID',
        ];
    }

    /**
     * Gets query for [[Auther]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuther()
    {
        return $this->hasOne(Users::class, ['id' => 'auther_id']);
    }
}
