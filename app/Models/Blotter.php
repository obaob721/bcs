<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blotter extends Model
{
    use HasFactory;

    protected $fillable = [
        'citizen_id',
        'complainant',
        'incident_type',
        'location',
        'witness_1',
        'witness_2',
        'blotter_status_id'
    ];

    protected $table = 'blotter';


    public function citizen()
    {
        return $this->belongsTo(Citizen::class);
    }    

}
