<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'campaign_id', 
        'url'
    ];
    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }
}
