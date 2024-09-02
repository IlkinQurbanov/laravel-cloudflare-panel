<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'api_key'];

    /**
     * Get the domains associated with the account.
     */
    public function domains()
    {
        return $this->hasMany(Domain::class);
    }
    
}
