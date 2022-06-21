<?php

use common\models\Comment;
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Commentstatus;
use common\models\Post;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '我的评论';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p>
        <?= Html::a('Create Comment', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'content',
                'value' => 'beginning',
                'value' => function ($model) {
                    // $user = Comment::findOne(['userid' => Yii::$app->user->identity->id]);
                    // return $user->content;
                    $tmpStr = strip_tags($model->content);
                    $tmpLen = mb_strlen($tmpStr);

                    return mb_substr($tmpStr, 0, 20, 'utf-8') . (($tmpLen > 20) ? '...' : '');
                },

            ],

            [
                'attribute' => 'post.title',
                'label' => '文章标题',
                'value' => 'post.title',
            ],
            // 'status',
            [
                'attribute' => 'status',
                'value' => 'status0.name',
                'filter' => Commentstatus::find()
                    ->select(['name', 'id'])
                    ->indexBy('id')
                    ->column(),
            ],
            // 'create_time:datetime',
            [
                'attribute' => 'create_time',
                'format' => ['date', 'php:y-m-d H:i'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete}',
                'buttons'=>
                    [
                    'view'=>function($url,$model,$key)
                            {
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',"http://blog.demo2.com:802/post/".$model->post_id.'.html'.'#comments');
                            },
                    ],	
                        
                ],
        ],
    ]); ?>
</div>