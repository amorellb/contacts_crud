<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use softDeletes;

    public $table = 'contacts';

    protected $fillable = ['name', 'slug', 'birth_date', 'email', 'phone', 'country', 'address',
        'job_contact', 'relation', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // override
    public function getRouteKeyName()
    {
        // return parent::getRouteKeyName();  (original return)
        return 'slug';
    }
}
