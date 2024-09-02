<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = ['account_id', 'name', 'ssl_mode'];

    /**
     * Get the account that owns the domain.
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * Get the page rules associated with the domain.
     */
    public function pageRules()
    {
        return $this->hasMany(PageRule::class);
    }
}
