<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Year
 *
 * @package App
 * @property string $name
*/
class Year extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        Year::observe(new \App\Observers\UserActionsObserver);
    }
    
}
