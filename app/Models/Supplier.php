<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Supplier extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait;

    protected $softCascade = ["areas", "bgs", "powers"];

    protected $dates = ["deleted_at"];

    protected $fillable = [
        "uuid",
        "start_on",
        "end_on",
        "pps_code",
        "name",
        "disp_name",
        "user_id",
    ];

    public function getRouteKeyName()
    {
        return "uuid";
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function bgs()
    {
        return $this->hasMany(Bg::class);
    }

    public function powers()
    {
        return $this->hasMany(Power::class);
    }
}
