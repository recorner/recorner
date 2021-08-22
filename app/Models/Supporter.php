<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supporter extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'supporters';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'email_id',
        'name_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        Supporter::observe(new \App\Observers\SupporterActionObserver());
    }

    public function email()
    {
        return $this->belongsTo(User::class, 'email_id');
    }

    public function name()
    {
        return $this->belongsTo(User::class, 'name_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
