<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Delete', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method' => 'post',
			],
		]) ?>
	</p>

	<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
			'id',

			// 'category_id',
			[
				'attribute' => 'category_id',
				'value' => function ($data) {
					return $data->category->name;
				}
			],

			'name',
			'content:ntext',
			'price',
			'keywords',
			'description',
			'img',

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
		],
	]) ?>

</div>