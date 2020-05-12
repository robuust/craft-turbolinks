<?php

namespace robuust\turbolinks;

use Craft;
use craft\web\Response;
use yii\base\Event;

/**
 * Turbolinks module.
 */
class Module extends \yii\base\Module
{
    /**
     * Initializes the module.
     */
    public function init()
    {
        parent::init();

        // Always set Turbolinks Location.
        Event::on(Response::class, Response::EVENT_BEFORE_SEND, function (Event $e) {
            $e->sender->getHeaders()->set('Turbolinks-Location', Craft::$app->request->url);
        });
    }
}
