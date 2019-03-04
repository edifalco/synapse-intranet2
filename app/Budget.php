<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Budget
 *
 * @package App
 * @property double $amount
 * @property string $projects
 * @property string $category
 * @property string $year
*/
class Budget extends Model
{
    use SoftDeletes;

    protected $fillable = ['amount', 'projects_id', 'category_id', 'year_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Budget::observe(new \App\Observers\UserActionsObserver);
    }

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
    public function setProjectsIdAttribute($input)
    {
        $this->attributes['projects_id'] = $input ? $input : null;
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
    
    public function projects()
    {
        return $this->belongsTo(Project::class, 'projects_id')->withTrashed();
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
