<?php

namespace Neegx\Foundation\Contracts;

interface KernelInterface
{
  
    /*
    |-----------------------------------------------------------------
    | handle request
    |-----------------------------------------------------------------
    */
    public function handle($request);

    
    /*
    |-----------------------------------------------------------------
    | terminate application
    |-----------------------------------------------------------------
    */
    public function die();


}