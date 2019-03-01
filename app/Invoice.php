<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

/**
 * Class Invoice
 *
 * @package App
 * @property string $user
 * @property string $project
 * @property string $expense_type
 * @property string $meeting
 * @property string $contingency
 * @property string $date
 * @property string $due_date
 * @property decimal $invoice_subtotal
 * @property decimal $invoice_taxes
 * @property decimal $invoice_total
 * @property decimal $budget_subtotal
 * @property decimal $budget_taxes
 * @property decimal $budget_total
 * @property string $provider
 * @property string $service_type
 * @property string $service
 * @property string $selection_criteria
 * @property string $pm
 * @property time $pm_approval_date
 * @property string $finance
 * @property time $finance_approval_date
*/
class Invoice extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = ['date', 'due_date', 'invoice_subtotal', 'invoice_taxes', 'invoice_total', 'budget_subtotal', 'budget_taxes', 'budget_total', 'service', 'selection_criteria', 'pm_approval_date', 'finance_approval_date', 'user_id', 'project_id', 'expense_type_id', 'meeting_id', 'contingency_id', 'provider_id', 'service_type_id', 'pm_id', 'finance_id'];
    protected $hidden = [];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
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
    public function setExpenseTypeIdAttribute($input)
    {
        $this->attributes['expense_type_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setMeetingIdAttribute($input)
    {
        $this->attributes['meeting_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setContingencyIdAttribute($input)
    {
        $this->attributes['contingency_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDueDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['due_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['due_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDueDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setInvoiceSubtotalAttribute($input)
    {
        $this->attributes['invoice_subtotal'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setInvoiceTaxesAttribute($input)
    {
        $this->attributes['invoice_taxes'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setInvoiceTotalAttribute($input)
    {
        $this->attributes['invoice_total'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setBudgetSubtotalAttribute($input)
    {
        $this->attributes['budget_subtotal'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setBudgetTaxesAttribute($input)
    {
        $this->attributes['budget_taxes'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setBudgetTotalAttribute($input)
    {
        $this->attributes['budget_total'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProviderIdAttribute($input)
    {
        $this->attributes['provider_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setServiceTypeIdAttribute($input)
    {
        $this->attributes['service_type_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setPmIdAttribute($input)
    {
        $this->attributes['pm_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setPmApprovalDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['pm_approval_date'] = Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            $this->attributes['pm_approval_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getPmApprovalDateAttribute($input)
    {
        if ($input != null && $input != '') {
            return Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setFinanceIdAttribute($input)
    {
        $this->attributes['finance_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setFinanceApprovalDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['finance_approval_date'] = Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            $this->attributes['finance_approval_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getFinanceApprovalDateAttribute($input)
    {
        if ($input != null && $input != '') {
            return Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            return '';
        }
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }
    
    public function expense_type()
    {
        return $this->belongsTo(ExpenseType::class, 'expense_type_id')->withTrashed();
    }
    
    public function meeting()
    {
        return $this->belongsTo(Meeting::class, 'meeting_id')->withTrashed();
    }
    
    public function contingency()
    {
        return $this->belongsTo(Contingency::class, 'contingency_id')->withTrashed();
    }
    
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id')->withTrashed();
    }
    
    public function service_type()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id')->withTrashed();
    }
    
    public function pm()
    {
        return $this->belongsTo(User::class, 'pm_id');
    }
    
    public function finance()
    {
        return $this->belongsTo(User::class, 'finance_id');
    }
    
}
