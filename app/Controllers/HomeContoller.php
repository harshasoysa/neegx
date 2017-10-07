<?php

namespace App\Controllers;

class HomeContoller
{
    public function welcome(){
        return tpl('welcome');
    }

}