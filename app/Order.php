<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TransactionalEloquentEvents;

class Order extends Model
{
    // use TransactionalEloquentEvents;

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id',
        'user_id',
        'career_level',
        "order_service",
        "deadline_id",
        "status_id",
        "detail",
        "invoice_id",
    ];

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id' );
    }

    public function careerLevel()
    {
        return $this->belongsTo(CareerLevel::class, 'career_level','id' );
    }

    public function orderService()
    {
        return $this->belongsTo(OrderService::class,'order_service','id');
    }

    public function deadline()
    {
        return $this->belongsTo(Deadline::class,'deadline_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class,'status_id', 'id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }

}
