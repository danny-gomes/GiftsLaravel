<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;

        protected $fillable = [
            'user_id',
            'gift_name',
            'recipient_name',
            'expected_value',
            'money_spent'
        ];

        public function user()
        {
            return $this->belongsTo(User::class);
        }
}
