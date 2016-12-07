<?php
use yii\helpers\Html;
use yii\bootstrap\Dropdown;



/** @var onwardWeb\Multilingual\models\Language[] $languages */
/** @var integer $currentLanguageId */
/** @var \onwardWeb\Multilingual\Multilingual $multilingual */
/** @var \yii\web\View $this */
/** @var string $blockClass */
/** @var string $blockId */
/**  @codeCoverageIgnore */
?>


<?php 
$items = array();
$currentLanguage = array();
foreach ($languages as $language) :
    if ($language->id === $currentLanguageId) {
        $currentLanguage['label'] = '<i class="flag-icon flag-icon-' . $language->icon . ' language__icon"></i><span class = "language__inside">'.$language->name.'</span>';
        continue;
    }
    $items[] = array(
        'label' => '<i class="flag-icon flag-icon-' . $language->icon . '  language__icon"></i>'.'<span class = "language__inside">'.$language->name.'</span>',
        'url' => $multilingual->translateCurrentRequest($language->id),
        'encode' => false,
        'options' => array('class' => 'language__item'),
        'linkOptions' => array('class' => 'language__button'), 
    );
   
endforeach;

echo Html::beginTag('div', ['class'=>  $blockClass]);
echo Html::button($currentLanguage['label'].'<span class="language__caret caret"><div class="helper-vertical-align helper-vertical-align_middle helper-vertical-align_languages"></div></span><div class = "helper-vertical-align helper-vertical-align_middle helper-vertical-align_languages"></div></button>', 
    ['type'=>'button', 'class'=>'language__button_drop-down b-drop-down__button']);
echo Dropdown::widget([
    'items' =>  $items,
    'options' => array('class' => 'b-drop-down__menu language-menu', 'style' => 'display:none')
    
]); 
//echo Html::tag('div', '',['class'=>  'helper-vertical-align helper-vertical-align_middle helper-vertical-align_languages' ]);

echo Html::endTag('div');
?>

