<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyClient extends Model
{
    use HasFactory;

    protected $table = 'company_clients';


    protected $fillable = [
        'client_name',
        'image',
    ];
}
