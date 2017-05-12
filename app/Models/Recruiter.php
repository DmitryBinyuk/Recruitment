<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Model\Position;

class Recruiter extends Model
{

    protected $table = 'recruiters';

    protected $fillable = ['name', 'email', 'company_name'];

    /**
     * Get recruiter job positions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function positions()
    {
	return $this->hasMany(Position::class);
    }

}
