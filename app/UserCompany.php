<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserCompany extends Authenticatable
{
	use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guard = 'company';

    protected $table = 'users_company';

    protected $fillable = [
        'name', 'email', 'password', 'verification_code', 'is_verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'social' => 'array',
    ];

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function usersProfile() 
    {
        return $this->hasMany(UsersProfile::class);
    }

    public function companyJob() 
    {
        return $this->hasMany(CompanyJobs::class);
    }

    public function companyProfile() 
    {
        return $this->hasMany(CompanyProfile::class);
    }
}
