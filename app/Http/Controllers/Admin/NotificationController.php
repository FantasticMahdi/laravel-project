<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function readAll()
    {
        $notifications = Notification::where('read_at', null)->update([
            'read_at' => now(),
        ]);

    }
}
