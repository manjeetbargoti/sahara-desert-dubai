<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function tour(){
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }

    public function vendor(){
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }
}
