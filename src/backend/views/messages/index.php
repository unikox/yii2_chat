<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MessagestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messages-index">

    <h1><?= Html::encode($this->title); ?></h1>

    <p>
        <?= Html::a('Create Messages', ['create'], ['class' => 'btn btn-success']); ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'owner0.username',
            'create_at:date',
            //'update_at',
            'body:ntext',
            //'blocked',
            //'reply',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
