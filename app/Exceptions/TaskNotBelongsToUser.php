<?php

namespace App\Exceptions;

use Exception;

class TaskNotBelongsToUser extends Exception
{
    public function render(){
    	return['error' => 'Task not bellongs to user'];
    }
}
