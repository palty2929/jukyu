<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Area extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait;

    protected $dates = ["deleted_at"];

    protected $fillable = [
        "uuid",
        "start_on",
        "end_on",
        "supplier_id",
        "area_code",
        "is_retail",
        "is_spot",
        "user_id",
    ];

    public function getRouteKeyName()
    {
        return "uuid";
    }

    function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
