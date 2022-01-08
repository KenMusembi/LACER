<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcelContent extends Model
{
    use HasFactory;

    //
    protected $fillable = [
        'inviceNo',
        'stockCode',
        'description',
        'quantity',
        'invoiceDate',
        'unitPrice',
        'customerID',
        'country',
    ];

    //ensure only authorized users can access
    protected $guarded = [];

    //user function to assign a user to a click
    public function user(){
        return $this->belongsTo(User::class);
    }

    //for livewire search
    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('invoiceNo', 'like', '%'.$search.'%')
                ->orWhere('stockCode', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%')
                ->orWhere('quantity', 'like', '%'.$search.'%')
                ->orWhere('invoiceDate', 'like', '%'.$search.'%')
                ->orWhere('unitPrice', 'like', '%'.$search.'%')
                ->orWhere('customerID', 'like', '%'.$search.'%')
                ->orWhere('country', 'like', '%'.$search.'%');
    }
}
