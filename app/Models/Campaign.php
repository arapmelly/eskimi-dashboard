<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Creative;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'startDate', 'endDate', 'timezone', 'dailyBudget', 'totalBudget', 'currency'];

    /**
     * The creatives that belong to a campaign.
     */
    public function creatives()
    {
        return $this->belongsToMany(Creative::class,'campaign_creatives','campaign_id','creative_id');
    }

    
}
