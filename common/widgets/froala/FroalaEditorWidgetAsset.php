<?php

namespace common\widgets\froala;

use Yii;
use yii\web\AssetBundle;

class FroalaEditorWidgetAsset extends AssetBundle
{
	public function init()
	{
		Yii::setAlias('@froala', __DIR__);

		return parent::init();
	}

	public $sourcePath = '@froala/assets/';

	public $css = [
		'fonts/bundle.css',
		'css/overrides.css',
	];

	public $js = [
		//
	];

	public $depends = [
		//
	];
}
