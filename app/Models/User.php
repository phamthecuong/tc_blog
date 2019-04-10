<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function posts()
    {
        return $this->hasMany('App\Models\Posts', 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', "User_roles", "user_id", "role_id");
    }

    /**
     * @param $permission
     * @return bool|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function checkPermission($permission)
    {
        if (empty($this->roles)) {
            return false;
        }

        $user = User::with('roles', 'roles.permissions')
                        ->where('id', Auth::id())
                        ->first();

        foreach ($user->roles as $r) {
            if ($r->permissions->contains($permission)) {
                return true;
            }
        }

        return false;
    }
}
