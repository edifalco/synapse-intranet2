<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contingency
 *
 * @package App
 * @property string $name
*/
class Contingency extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Contingency::observe(new \App\Observers\UserActionsObserver);
    }
    
}
