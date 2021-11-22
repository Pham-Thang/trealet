<?php
namespace Vanguard\Support\Plugins;

use Vanguard\Plugins\Plugin;
use Vanguard\Support\Sidebar\Item;

class Maps extends Plugin
{
    public function maps()
    {
        return Item::create(__('Maps'))
            ->route('maps')
            ->icon('fas fa-maps')
            ->active("maps*");
//            ->permissions('users.manage');
    }
}