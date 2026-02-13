<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ListingAndReviews extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'listingsAndReviews';

    protected $fillable = [
        'name',
        'summary',
        'property_type',
        'bedrooms',
        'beds',
        'bathrooms',
        'price',
        'address',
        'amenities'
    ];

    protected $casts = [
        'bedrooms' => 'integer',
        'bathrooms' => 'decimal:1',
        'price' => 'decimal:2',
    ];

    /**
     * Get listings from a specific city with optional filters.
     *
     * @param string $city
     * @param array  $filters Optional:
     *   - propertyType
     *   - minBedrooms
     *   - maxPrice
     *   - limit
     *
     * @example ListingAndReviews::byCity("Porto")
     * @example ListingAndReviews::byCity("Barcelona", ["limit" => 5])
     */
    public static function byCity(string $city, array $filters = [])
    {
        $query = static::where('address.market', $city);

        if (isset($filters['propertyType']))
            $query->where('property_type', $filters['propertyType']);

        if (isset($filters['minBedrooms']))
            $query->where('bedrooms', '>=', $filters['minBedrooms']);

        if (isset($filters['maxPrice']))
            $query->where('price', '<=', $filters['maxPrice']);

        return $query
            ->limit($filters['limit'] ?? 10)
            ->get(['_id', 'name', 'price', 'bedrooms', 'property_type', 'address']);
    }
}
