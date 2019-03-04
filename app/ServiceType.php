<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServiceType
 *
 * @package App
 * @property string $name
*/
class ServiceType extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        ServiceType::observe(new \App\Observers\UserActionsObserver);
    }
    
}
