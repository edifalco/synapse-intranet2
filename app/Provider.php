<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Provider
 *
 * @package App
 * @property string $name
 * @property string $address
 * @property string $postal_code
 * @property string $city
 * @property string $country
 * @property string $phone
 * @property string $contact_person
 * @property string $email
*/
class Provider extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'address', 'postal_code', 'city', 'country', 'phone', 'contact_person', 'email'];
    protected $hidden = [];
    
    
    
}
