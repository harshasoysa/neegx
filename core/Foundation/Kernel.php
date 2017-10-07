<?php 
    
namespace Neegx\Foundation;

use Neegx\Foundation\Contracts\KernelInterface;
use Neegx\Foundation\HttpResponse\HttpResponse;
use Neegx\Foundation\Route\Route;

class Kernel
{
    
    public function handle($request)
    {
        $action=Route::handle($request);

        $controler_class= 'App\\Controllers\\'.(string)$action[0];

        $controler_method=$action[1];
        
        $instance=new $controler_class();

        $instance->$controler_method();

        $response=new HttpResponse($request);
        
        return $response;
    }
    
    public function terminate()
    {

    }
}