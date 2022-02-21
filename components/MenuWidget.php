<?php

namespace app\components;

use yii\base\Widget;
use app\models\Category;
use Yii;

class MenuWidget extends Widget
{

	public $tpl;
	public $data; //здесь хранится массив категорий из БД
	public $tree; //здесь хранится результат работы функции, которая из обычного массива преобразует в массив "дерево", где видно какая категория в какую вложена
	public $menuHtml; //здесь хранится готовый Html код в зависимости от того какой шаблон выбран, которое хранится в свойстве $tpl


	public function init()
	{
		parent::init();

		if (empty($this->tpl)) {
			$this->tpl = 'menu';
		}

		$this->tpl .= '.php';
	}

	public function run()
	{

		//get cache
		$menu = Yii::$app->cache->get('menu');
		if ($menu) {
			return $menu;
		}

		$this->data = Category::find()->indexBy('id')->asArray()->all();
		$this->tree = $this->getTree();
		$this->menuHtml = $this->getMenuHtml($this->tree);

		// echo ('<pre>');
		// print_r($this->tree);
		// exit;

		//set cache
		Yii::$app->cache->set('menu', $this->menuHtml, 60); //создание файла кеша на одну минуту
		return $this->menuHtml;
	}

	//метод для преобразования массива в "дерево"
	protected function getTree()
	{

		$tree = [];

		foreach ($this->data as $id => &$node) {
			if (!$node['parent_id']) {
				$tree[$id] = &$node;
			} else {
				$this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
			}
		}

		return $tree;
	}

	protected function getMenuHtml($tree)
	{

		$str = '';

		foreach ($tree as $category) {
			$str .= $this->catToTemplate($category);
		}

		return $str;
	}

	protected function catToTemplate($category)
	{

		ob_start();
		include __DIR__ . '/menu_tpl/' . $this->tpl;

		return ob_get_clean();
	}
}
