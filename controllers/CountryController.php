<?php 

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;

class CountryController extends Controller
{
	public function actionIndex()
	{
		//отр всі записи
		$query  = Country::find();
		//pagin init
		$pagination  = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
		]);
		// this page
		$countries  = $query->orderBy('name')
			->offset($pagination->offset)
			->limit($pagination->limit)
			->all();
		return $this->render('index',[
			'countries' => $countries,
			'pagination' => $pagination,
		]);
	}
}