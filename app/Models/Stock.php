<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Carbon\Carbon;

class Stock extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait;

    protected $dates = ["deleted_at"];

    protected $fillable = [
        "uuid",
        "user_id",
        "bg_id",
        "date",
        "segment_1",
        "segment_2",
        "segment_3",
        "segment_4",
        "segment_5",
        "segment_6",
        "segment_7",
        "segment_8",
        "segment_9",
        "segment_10",
        "segment_11",
        "segment_12",
        "segment_13",
        "segment_14",
        "segment_15",
        "segment_16",
        "segment_17",
        "segment_18",
        "segment_19",
        "segment_20",
        "segment_21",
        "segment_22",
        "segment_23",
        "segment_24",
        "segment_25",
        "segment_26",
        "segment_27",
        "segment_28",
        "segment_29",
        "segment_30",
        "segment_31",
        "segment_32",
        "segment_33",
        "segment_34",
        "segment_35",
        "segment_36",
        "segment_37",
        "segment_38",
        "segment_39",
        "segment_40",
        "segment_41",
        "segment_42",
        "segment_43",
        "segment_44",
        "segment_45",
        "segment_46",
        "segment_47",
        "segment_48",
        "user_id"
    ];

    public function getRouteKeyName()
    {
        return "uuid";
    }

    function bg()
    {
        return $this->belongsTo(Bg::class);
    }

    function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d');
    }
}
