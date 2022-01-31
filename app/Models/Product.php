<?php

namespace App\Models;

use App\Models\Traits\GetterSetterTrait;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use GetterSetterTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'price', 'size', 'code'];

    /**
     * The attributes used in paginaion.
     *
     * @var array
     */
    protected $perPage = 12;

    protected $casts = [];

    public $timestamps = false;

    /**
     * Get basket.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function basket()
    {
        return $this->hasMany(Basket::class);
    }

    /**
     * Get short description attribute
     */
    public function getShortDescriptionAttribute()
    {
        $return = substr($this->getColumn('description'), 0, 150);

        if (mb_strlen($this->getColumn('description')) > 150) {
            $return .= '...';
        }

        return $return;
    }

    /**
     * Get price attribute
     */
    public function getPriceFormatAttribute()
    {
        $price = number_format((float) $this->getColumn('price'), 2, '.', ' ');

        return $price;
    }
}
