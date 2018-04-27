<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventories';

    protected $fillable   = ['inventoryid',
        'item',
        'quantity',
        'metric',
        'created_at',
        'updated_at'
    ];
}
