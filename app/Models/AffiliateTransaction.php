<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AffiliateTransaction extends Model
{
    use HasFactory;
    protected $guarded =[];

       /**
     * Get user
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
    
       public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
