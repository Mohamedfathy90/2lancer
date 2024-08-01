<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsFeeExemption extends Model
{
    use HasFactory;

    protected $table = 'settings_fee_exemption';
    protected $guarded = [];
}
