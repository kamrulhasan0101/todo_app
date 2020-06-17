<?php

namespace App\Exceptions;

use Exception;

class CategoryNotBelongsToUser extends Exception
{
    public function render(){
    	return['error' => 'Category not bellongs to user'];
    }
}
