<?php

namespace app\models;

/**
 * This is the model class for table "messages".
 *
 * @property int         $id
 * @property int|null    $owner
 * @property int|null    $create_at
 * @property int|null    $update_at
 * @property string|null $body
 * @property int|null    $blocked
 * @property int|null    $reply
 * @property User        $owner0
 * @property Messages    $reply0
 * @property Messages[]  $messages
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['owner', 'create_at', 'update_at', 'blocked', 'reply'], 'integer'],
            [['body'], 'string'],
            [['owner'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['owner' => 'id']],
            [['reply'], 'exist', 'skipOnError' => true, 'targetClass' => Messages::className(), 'targetAttribute' => ['reply' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'owner' => 'Отправитель',
            'create_at' => 'Написано',
            'update_at' => 'Изменено',
            'body' => 'Сообщение',
            'blocked' => 'Блокировано',
            'reply' => 'ответ для',
        ];
    }

    /**
     * Gets query for [[Owner0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner0()
    {
        return $this->hasOne(User::className(), ['id' => 'owner']);
    }

    /**
     * Gets query for [[Reply0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReply0()
    {
        return $this->hasOne(Messages::className(), ['id' => 'reply']);
    }

    /**
     * Gets query for [[Messages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Messages::className(), ['reply' => 'id']);
    }
}
