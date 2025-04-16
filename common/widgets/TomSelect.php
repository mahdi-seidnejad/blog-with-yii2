<?php

namespace common\widgets;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class TomSelect extends InputWidget
{
    public $items = [];
    public $pluginOptions = [];

    public function run()
    {
        $this->registerAssets();

        $id = $this->options['id'];
        $options = $this->options;
        $items = $this->items;

        if ($this->hasModel()) {
            echo Html::activeDropDownList($this->model, $this->attribute, $items, $options);
        } else {
            echo Html::dropDownList($this->name, $this->value, $items, $options);
        }

        $pluginOptions = Json::encode($this->pluginOptions);

        $this->view->registerJs("new TomSelect('#{$id}', {$pluginOptions});");
    }

    protected function registerAssets()
    {
        $view = $this->getView();
        $view->registerCssFile('https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css');
        $view->registerJsFile('https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js', [
            'depends' => [\yii\web\JqueryAsset::class],
        ]);
    }
}
