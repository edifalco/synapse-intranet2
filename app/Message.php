<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Message
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
*/
class Message extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'phone', 'message'];
    protected $hidden = [];
    
    
    
}
