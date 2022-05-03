<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

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

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_at', 'update_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                // 'value' => new Expression('NOW()'),
            ],
        ];
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
            'owner' => 'Автор',
            'create_at' => 'Написано',
            'update_at' => 'Изменено',
            'body' => 'Сообщение',
            'blocked' => 'Заблокировано',
            'reply' => 'в ответ на',
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

    public function getWrite($userid, $body)
    {
        $this->body = $body;
        $this->owner = $userid;
        $this->save();
    }

    public function getMessageList()
    {
        $sql = 'SELECT messages.id, user.username,messages.create_at, messages.update_at, messages.body, messages.reply FROM `messages` JOIN `user` ON messages.owner = user.id';
        //$dataList = Messages::find()->asArray()->all();
        $dataList = Messages::find()
            ->select('messages.id, user.username as owner, messages.create_at, messages.update_at, messages.body, messages.reply')
            //->Join('JOIN `user` ON', '`messages`.`owner` = `user`.`id`')
            ->leftJoin('`user`', '`messages`.`owner` = `user`.`id`')
            
            ->asArray()
            ->all();
        $dataListjson = json_encode($dataList);

        return $dataListjson;
    }
}
