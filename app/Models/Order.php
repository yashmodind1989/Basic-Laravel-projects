<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="parcels";
    protected $primaryKey="id";
    protected $fillable=[
        'product',
        'userId',
        'weight',
        'source_address',
        'destination_address',
        'status',
        'created_at',
        'updated_at',
    ];
    public function getIdAttribute($value)
    {
       return $value;
    }
    public function belongsToDeliveryagent():BelongsTo
    {
        return $this->belongsTo(\App\Models\agents::class,'id','order_id');  // Each parcel belongs to one delivery agent
    }
}
