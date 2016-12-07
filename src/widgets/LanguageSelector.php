<?php

namespace DevGroup\Multilingual\widgets;

use DevGroup\Multilingual\models\Language;
use Yii;
use yii\base\Widget;

class LanguageSelector extends Widget
{
    public $viewFile = 'language-selector';

    public $blockClass = 'b-language-selector dropdown';
    public $blockId = '';

    public function run()
    {
        /** @var \DevGroup\Multilingual\Multilingual $multilingual */
        $multilingual = Yii::$app->get('multilingual');
        $currentLanguageId = $multilingual->language_id;

        if (empty($this->blockId)) {
            $this->blockId = 'language-selector-' . $this->getId();
        }

        return $this->render(
            $this->viewFile,
            [
                'languages' => $multilingual->getAllLanguages(),
                'currentLanguageId' => $currentLanguageId,
                'multilingual' => $multilingual,
                'blockId' => $this->blockId,
                'blockClass' => $this->blockClass,
            ]
        );
    }
}