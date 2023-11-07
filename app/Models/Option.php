<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get the poll that this belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class);
    }

    /**
     * Get the votes associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function votes(): HasMany
    {
        // Return the relationship between this model and the Vote model
        return $this->hasMany(Vote::class);
    }
}
