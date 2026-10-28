<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WasteRecord extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'owner_name',
        'address_kampung',
        'rt',
        'rw',
        'village',
        'district',
        'regency',
        'weigh_date',
        'week_number',
        'organic_weight',
        'non_organic_weight',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'weigh_date' => 'date:Y-m-d',
            'organic_weight' => 'float',
            'non_organic_weight' => 'float',
        ];
    }

    /**
     * Appended accessors to the JSON form.
     *
     * @var list<string>
     */
    protected $appends = [
        'total_weight',
    ];

    /**
     * Total weight accessor (organic + non-organic).
     */
    public function getTotalWeightAttribute(): float
    {
        return round((float) $this->organic_weight + (float) $this->non_organic_weight, 2);
    }

    /**
     * Get the user who recorded this waste record.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
