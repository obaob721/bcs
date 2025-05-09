<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'blotter_id',
        'report_offense_id'
    ];

    public function blotter()
    {
        return $this->belongsTo(Blotter::class, 'blotter_id', 'blotter_id');
    }

    public function reportOffense()
    {
        return $this->belongsTo(ReportOffense::class, 'report_offense_id', 'report_offense_id');
    }
}
