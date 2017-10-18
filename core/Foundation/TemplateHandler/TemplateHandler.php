<?php

namespace Neegx\Foundation\TemplateHandler;

use Neegx\Foundation\Contracts\TemplateHandlerInterface;
use \Neegx\Foundation\HttpResponse\HttpResponse;

class TemplateHandler implements TemplateHandlerInterface
{

    private $loader;

    private $twig;

    public function __construct(){
        $this->loader = new \Twig_Loader_Filesystem(__DIR__.'/../../../theme/');

        $this->twig = new \Twig_Environment($this->loader, array(
            'cache' => __DIR__.'/../../../cache/',
        ));
    }

    public function render($template,$var_list=array()){

        $a = HttpResponse::Instance();

        $template = $this->twig->load($template);

        $a->add_content($template->render($var_list));

    }

}



