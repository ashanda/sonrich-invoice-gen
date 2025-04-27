<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'address',
        'telephone_number',
        'email',
        'logo',
    ];
    public function invoices()
    {
        return $this->hasMany(Invoice::class); // A company has many invoices
    }
}
