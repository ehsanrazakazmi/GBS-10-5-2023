<?php

namespace App\Models;

use App\Models\Color;
use App\Models\Order;
use App\Models\Services;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Services()
    {
        return $this->belongsTo(Services::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
