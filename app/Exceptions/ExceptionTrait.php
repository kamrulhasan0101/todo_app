<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait{

	public function apiException($request,$e){
	            if ($this->isModel($e)) {
	            	return $this->modelResponse($e);
                     }

                if ($this->isHttp($e)) {
                    return $this->httpResponse();
                }

                return parent::render($request, $e);

}

public function isModel($e){
	return $e instanceof ModelNotFoundException;
}

public function isHttp($e){
	return $e instanceof NotFoundHttpException;
}

public function modelResponse($e){
	return response()->json([
              'error' => 'Entry for '.str_replace('App\\', '', $e->getModel()).' not found'], 404);
}

public function httpResponse(){
	                    return response()->json([
                        'error' => 'Route Not Found '], 404);
}

}

