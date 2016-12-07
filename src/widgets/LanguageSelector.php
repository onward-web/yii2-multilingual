<?php

namespace DevGroup\Multilingual\widgets;
use Yii;
use yii\base\Widget;
use onwardWeb\Multilingual\models\Language;
use kartik\icons\FlagIconAsset;


class LanguageSelector extends Widget
{
    public $viewFile = 'language-selector';

    public $blockClass = 'b-language-selector dropdown';
    
    public function run()
    {
        /** @var \onwardWeb\Multilingual\Multilingual $multilingual */
        $multilingual = Yii::$app->get('multilingual');
        $currentLanguageId = $multilingual->language_id;

       
        FlagIconAsset::register($this->view);

        return $this->render(
            $this->viewFile,
            [
                'languages' => $multilingual->getAllLanguages(),
                'currentLanguageId' => $currentLanguageId,
                'multilingual' => $multilingual,             
                'blockClass' => $this->blockClass,
            ]
        );
    }
}