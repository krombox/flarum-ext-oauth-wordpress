<?php

namespace krombox\OAuthWordPress;

use Flarum\Extend;
use FoF\OAuth\Extend as OAuthExtend;
use Krombox\OAuthWordPress\Providers\WordPress;

return [
    (new Extend\Frontend('forum'))
        ->css(__DIR__.'/less/forum.less'),

    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),

    new Extend\Locales(__DIR__.'/locale'),

    (new OAuthExtend\RegisterProvider(WordPress::class)),
];