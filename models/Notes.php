<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notes".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $name
 * @property string $date
 * @property string $description
 * @property integer $completed
 *
 * @property Users $idUser
 */
class Notes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'completed'], 'integer'],
            [['name', 'date', 'description'], 'required'],
            [['name', 'description'], 'string'],
            [['date'], 'safe'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'name' => 'Name',
            'date' => 'Date',
            'description' => 'Description',
            'completed' => 'Completed',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user']);
    }
}
