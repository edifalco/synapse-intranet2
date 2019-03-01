<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Budget
 *
 * @package App
 * @property double $amount
 * @property string $project
 * @property string $category
 * @property string $year
*/
class Budget extends Model
{
    protected $fillable = ['amount', 'project_id', 'category_id', 'year_id'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setAmountAttribute($input)
    {
        if ($input != '') {
            $this->attributes['amount'] = $input;
        } else {
            $this->attributes['amount'] = null;
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProjectIdAttribute($input)
    {
        $this->attributes['project_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCategoryIdAttribute($input)
    {
        $this->attributes['category_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setYearIdAttribute($input)
    {
        $this->attributes['year_id'] = $input ? $input : null;
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withTrashed();
    }
    
    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id')->withTrashed();
    }
    
}
