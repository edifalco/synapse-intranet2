<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Medium
 *
 * @package App
 * @property string $model_type
 * @property integer $model_id
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property string $disk
 * @property string $mime_type
 * @property integer $size
 * @property string $manipulations
 * @property string $custom_properties
 * @property string $responsive_images
 * @property integer $order_column
*/
class Medium extends Model
{
    protected $fillable = ['model_type', 'model_id', 'collection_name', 'name', 'file_name', 'disk', 'mime_type', 'size', 'manipulations', 'custom_properties', 'responsive_images', 'order_column'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setModelIdAttribute($input)
    {
        $this->attributes['model_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setSizeAttribute($input)
    {
        $this->attributes['size'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setOrderColumnAttribute($input)
    {
        $this->attributes['order_column'] = $input ? $input : null;
    }
    
}
