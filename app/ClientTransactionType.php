<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientTransactionType
 *
 * @package App
 * @property string $title
*/
class ClientTransactionType extends Model
{
    protected $fillable = ['title'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        ClientTransactionType::observe(new \App\Observers\UserActionsObserver);
    }
    
}
