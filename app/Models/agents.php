<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class agents extends Model
{
    use HasFactory;
    protected $table='agents';
    protected $primaryKey='id';
    protected $fillable=[
        'name',
        'custId',
        'orderId',
        'status',
        'created_at',
        'updated_at',
    ];
    public function hasManyParcels():HasMany
    {
        return $this->hasMany(\App\Models\Order::class,'id','order_id');
    }
}
