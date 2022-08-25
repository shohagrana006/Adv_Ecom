<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function successMessage($message)
    {
        session()->flash('type', 'success');
        session()->flash('message', $message);
    }
    public function errorMessage($message)
    {
        session()->flash('type', 'warning');
        session()->flash('message', $message);
    }
}
