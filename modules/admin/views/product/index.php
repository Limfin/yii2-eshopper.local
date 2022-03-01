<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
	</p>


	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',

			// 'category_id',
			[
				'attribute' => 'category_id',
				'value' => function ($data) {
					return $data->category->name;
				}
			],

			'name',
			// 'content:ntext',
			'price',
			//'keywords',
			//'description',
			//'img',

			// 'hit',
			[
				'attribute' => 'hit',
				'value' => function ($data) {
					return !$data->hit ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
				},
				'format' => 'raw',
			],

			// 'new',
			[
				'attribute' => 'new',
				'value' => function ($data) {
					return !$data->new ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
				},
				'format' => 'raw',
			],

			// 'sale',
			[
				'attribute' => 'sale',
				'value' => function ($data) {
					return !$data->sale ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
				},
				'format' => 'raw',
			],
			[
				'class' => ActionColumn::className(),
				// 'urlCreator' => function ($action, Product $model, $key, $index, $column) {
				// 	return Url::toRoute([$action, 'id' => $model->id]);
				// }
			],
		],
	]); ?>


</div>