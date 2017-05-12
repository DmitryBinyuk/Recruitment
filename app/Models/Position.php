<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Recruiter;

class Position extends Model {

    protected $table = 'positions';
    
    protected $fillable = ['job_name', 'job_description', 'job_created', 'status'];

    /**
     * Get position recruiter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recruiter()
    {
	return $this->belongsTo(Recruiter::class);
    }

}
