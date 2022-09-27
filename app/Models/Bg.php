<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Bg extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait;

    protected $softCascade = ["powers"];

    protected $dates = ["deleted_at"];

    protected $fillable = [
        "uuid",
        "start_on",
        "end_on",
        "supplier_id",
        "area_code",
        "bg_code",
        "bg_name",
        "dummy_code",
        "dummy_name",
        "is_jbu",
        "is_power",
        "is_sell",
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

    function powers()
    {
        return $this->hasMany(Power::class);
    }

    function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
