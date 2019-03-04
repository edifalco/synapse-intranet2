<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public function index() 
    {
        $events = []; 

        foreach (\App\Expense::all() as $expense) { 
           $crudFieldValue = $expense->getOriginal('due_date'); 

           if (! $crudFieldValue) {
               continue;
           }

           $eventLabel     = $expense->due_date; 
           $prefix         = 'Invoice due'; 
           $suffix         = ''; 
           $dataFieldValue = trim($prefix . " " . $eventLabel . " " . $suffix); 
           $events[]       = [ 
                'title' => $dataFieldValue, 
                'start' => $crudFieldValue, 
                'url'   => route('admin.expenses.edit', $expense->id)
           ]; 
        } 


       return view('admin.calendar' , compact('events')); 
    }

}
