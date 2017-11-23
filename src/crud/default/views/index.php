<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();
echo "<?php\n";
?>
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "<?= $generator->plModelNamePlural ?>";
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
    <div id="ajaxCrudDatatable">
        <?="<?="?>GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="fa fa-plus" aria-hidden="true"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Dodaj','class'=>'btn btn-default']).
                    Html::a('<i class="fa fa-repeat" aria-hidden="true"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Odśwież']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'default',
                'heading' => '<i class="fa fa-list" aria-hidden="true"></i> <?= $generator->plModelNamePlural ?> - lista',
            ],
            'export' => [
                'target' => '_self',
                'showConfirmAlert' => false,
            ],
            'exportConfig' => [
                GridView::EXCEL => true,
                GridView::CSV => true
            ]
        ])<?="?>\n"?>
    </div>
</div>
<?='<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "",// always need it for jquery plugin
    \'size\' => \'modal-lg\',
    "options" => [
        \'tabindex\' => false
    ],
    \'clientOptions\' => [
        //\'backdrop\' => \'static\',
        //\'keyboard\' => false
    ]
]) ?>'."\n"?>
<?='<?php Modal::end(); ?>'?>

