<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspDevice extends Model
{
    use HasFactory;
    protected $fillable = ['mac_address', 'r1', 'r2', 'SSID', 'SSID_Password', 'API'];
}
