<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientProjectStatus
 *
 * @package App
 * @property string $title
*/
class ClientProjectStatus extends Model
{
    protected $fillable = ['title'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        ClientProjectStatus::observe(new \App\Observers\UserActionsObserver);
    }
    
}
