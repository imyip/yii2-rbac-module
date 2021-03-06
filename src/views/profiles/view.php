<?php

use yii\web\View;
use yii\helpers\{Html, Url};
use yii\widgets\DetailView;
use Itstructure\RbacModule\Module;
use Itstructure\RbacModule\interfaces\RbacIdentityInterface;

/* @var $this View */
/* @var $model RbacIdentityInterface */

$this->title = Module::t('profiles', 'Profile') . ': ' . $model->userName;
$this->params['breadcrumbs'][] = [
    'label' => Module::t('profiles', 'Profiles'),
    'url' => [
        $this->params['urlPrefix'].'index'
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

    <p>
        <?php echo Html::a(Module::t('main', 'Update'), [
            $this->params['urlPrefix'].'update',
            'id' => $model->id
        ], [
            'class' => 'btn btn-primary'
        ]) ?>

        <?php echo Html::a(Module::t('main', 'Delete'), [
            $this->params['urlPrefix'].'delete',
            'id' => $model->id
        ], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('main', 'Are you sure you want to do this action?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id' => [
                'attribute' => 'id',
                'label' => Module::t('main', 'ID')
            ],
            'userName' => [
                'attribute' => 'userName',
                'label' => Module::t('profiles', 'Name')
            ],
            'roles' => [
                'label' => Module::t('profiles', 'Roles'),
                'value' => function($model) {
                    /* @var $model RbacIdentityInterface */
                    $roles = $model->getRoles();

                    if (empty($roles)) {return Module::t('profiles', 'No roles');}

                    return implode('<br>', array_map(function ($data) {

                        return Html::a($data, Url::to([
                            '/'.$this->params['urlPrefixNeighbor'].'view',
                            'id' => $data
                        ]),
                            [
                                'target' => '_blank'
                            ]);

                    }, array_keys($roles)));
                },
                'format' => 'raw',
            ],
            'created_at' => [
                'attribute' => 'created_at',
                'format' =>  ['date', 'dd.MM.Y HH:mm:ss'],
                'label' => Module::t('main', 'Created date')
            ],
            'updated_at' => [
                'attribute' => 'updated_at',
                'format' =>  ['date', 'dd.MM.Y HH:mm:ss'],
                'label' => Module::t('main', 'Updated date')
            ],
        ]
    ]) ?>

</div>
