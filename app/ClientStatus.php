<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientStatus
 *
 * @package App
 * @property string $title
*/
class ClientStatus extends Model
{
    protected $fillable = ['title'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        ClientStatus::observe(new \App\Observers\UserActionsObserver);
    }
    
}
