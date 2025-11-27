<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WirelessPrinting extends Model
{
    use HasFactory;

    protected $fillable = [
        'patron',
        'phone',
        'email',
        'copies',
        'location',
        'libnumber',
        'file',
        'library_uid',
        'library_id',
    ];

    protected $table = 'wp';

    public function library()
    {
        return $this->belongsTo(Library::class);
    }
}