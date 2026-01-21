<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function hasRole(string $roleName) : bool{
        return $this->roles()->contains('name', $roleName);
    }

    public function hasAnyRole(array $roles) : bool{
        return $this->roles()->whereIn('name', $roles)->exists();
    }
}
