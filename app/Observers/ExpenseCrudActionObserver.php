<?php

namespace App\Observers;

use App\Expense;
use App\Notifications\QA_EmailNotification;
use Illuminate\Support\Facades\Notification;

class ExpenseCrudActionObserver
{

    public function created(Expense $model)
    {
        $emails = ["admin@admin.com"];
        $data = [
            "action" => "Created",
            "crud_name" => "Expenses"
        ];

        $users = \App\User::where("email", $emails)->get();
        Notification::send($users, new QA_EmailNotification($data));

    }

    public function updated(Expense $model)
    {
        $emails = ["admin@admin.com"];
        $data = [
            "action" => "Updated",
            "crud_name" => "Expenses"
        ];
        $users = \App\User::where("email", $emails)->get();
        Notification::send($users, new QA_EmailNotification($data));
    }

    

}