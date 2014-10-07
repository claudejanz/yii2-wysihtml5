<?php

namespace claudejanz\wysihtml5;

use dosamigos\editable\EditableWysiHtml5Asset;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

/**
 * This is just an example.
 */
class Wysihtml5 extends InputWidget {

    public function init() {
        parent::init();


        Html::addCssClass($this->options, 'form-control');
    }

    public function run() {
        
       
        $input = $this->hasModel() ? Html::activeTextArea($this->model, $this->attribute, $this->options) : Html::textArea($this->name, $this->value, $this->options);
        echo $input;
        $this->registerClientScript();
    }

    public function registerClientScript() {
        $view = $this->getView();
        EditableWysiHtml5Asset::register($view);
        
        $id = $this->options['id'];
        $selector = ";jQuery('#$id')";
        
        $options = !empty($this->clientOptions) ? Json::encode($this->clientOptions) : '';
        
        $js[] = "$selector.wysihtml5($options);";

        if (!empty($this->clientEvents)) {
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "$selector.on('$event', $handler);";
            }
        }
        $view->registerJs(implode("\n", $js));
    }

}
