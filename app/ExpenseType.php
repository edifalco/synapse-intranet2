<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ExpenseType
 *
 * @package App
 * @property string $name
*/
class ExpenseType extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        ExpenseType::observe(new \App\Observers\UserActionsObserver);
    }
    
}
