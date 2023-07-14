<?php

namespace App\Http\Controllers;

use App\Events\MyPrivateEvent;
use App\Events\MyPublicEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TryPusherController extends Controller
{
    public function tryPublicEvent()
    {
        Log::debug("tryPublicEvent");
        event(new MyPublicEvent('hello world'));

        return [
            'status' => true,
            'message' => 'success'
        ];
    }

    public function tryPrivateEvent()
    {
        Log::debug("tryPrivateEvent");
        $user_id = 1;
        event(new MyPrivateEvent('hello world', 1));

        return [
            'status' => true,
            'message' => 'success'
        ];
    }
}
