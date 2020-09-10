<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersJobRegistered extends Model
{
    protected $table = 'users_job_registered';

    protected $fillable = ['user_id', 'team_id', 'company_job_id', 'users_description', 'portofolio_uploaded', 'other_question'];
}
