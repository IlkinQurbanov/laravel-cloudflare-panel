<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageRule extends Model
{
    use HasFactory;

    protected $fillable = ['domain_id', 'url_pattern', 'actions'];

    /**
     * Get the domain that owns the page rule.
     */
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    /**
     * Set the actions attribute as a JSON encoded string.
     */
    public function setActionsAttribute($value)
    {
        $this->attributes['actions'] = json_encode($value);
    }

    /**
     * Get the actions attribute as a decoded JSON.
     */
    public function getActionsAttribute($value)
    {
        return json_decode($value, true);
    }
}
