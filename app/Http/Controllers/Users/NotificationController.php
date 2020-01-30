<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class NotificationController extends Controller
{
    public function userNotifications(User $user)
    {
        foreach ($user->unreadNotifications as $notification) {
           $notifications[] =  $notification->data;
        }

        if(isset($notifications)) {
            return $notifications;
        }

        return false;
    }
}
