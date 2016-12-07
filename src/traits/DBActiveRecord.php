<?php

namespace onwardWeb\Multilingual\traits;



trait DBActiveRecord
{
    
    public function init()
    {
        if (count(static::primaryKey()) === 1) {
            $this->on(self::EVENT_BEFORE_INSERT, function ($event) {
                if (empty($event->sender->{$event->data['pkName']})) {
                    /** @var ActiveRecord $className */
                    $className = $event->data['className'];
                    $lastModel = $className::find()->orderBy([$event->data['pkName'] => SORT_DESC])->one();
                    $event->sender->{$event->data['pkName']} = $lastModel !== null ? $lastModel->{$event->data['pkName']} + 1 : 1;
                }
            }, ['pkName' => static::primaryKey()[0], 'className' => static::class]);
        }
    }
}
