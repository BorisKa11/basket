<?php

namespace App\Models;

use App\Models\Traits\GetterSetterTrait;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use GetterSetterTrait;

    protected $table = 'basket';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'user_id', 'count'];

    protected $casts = [];

    /**
     * Get product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get user row.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
