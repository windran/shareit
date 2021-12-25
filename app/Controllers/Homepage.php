<?php

namespace App\Controllers;


class Homepage extends BaseController
{

    public function index()
    {
        helper('general');
        $tokenEntity = getTokenInfo();
        $vars['tokenInfo'] = $tokenEntity;
        return view('homepage', $vars);
    }
}
