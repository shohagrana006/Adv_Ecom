<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Database\Factories\CategryFactory;


class Category extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return CategryFactory::new();
    }
    protected $gaurded = [];

    protected static function boot()
    {
        parent::boot();
        static::creating(function($category){
            $category->slug = Str::slug($category->name);
        });
    }

    /**
     * Get the user that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent_categpry(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(__CLASS__);
    }
    
    /**
     * Get all of the child_category for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function child_category(): HasMany
    {
        return $this->hasMany(__CLASS__);
    }
    
    /**
     * Get all of the products for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
