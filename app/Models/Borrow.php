<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
    use HasFactory;
    // use SoftDeletes;

    function book() {
        return $this->belongsTo(Book::class);
    }

    function admin() {
        return $this->belongsTo(Admin::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }

    function return() {
        return $this->belongsTo(Returns::class);
    }
}