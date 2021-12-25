<?php

namespace App\Controllers;

use Config\BscTokenConfig;

class Homepage extends BaseController
{

    public function index()
    {
        helper('general');
        $tokenEntity = getTokenInfo();
        $vars['tokenInfo'] = $tokenEntity;

        $tokenConfig = new BscTokenConfig();
        $vars['tokenConfig'] = $tokenConfig;
        return view('homepage', $vars);
    }
}
