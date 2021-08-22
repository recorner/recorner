<?php

namespace App\Observers;

use App\Models\Supporter;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class SupporterActionObserver
{
    public function created(Supporter $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Supporter'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
