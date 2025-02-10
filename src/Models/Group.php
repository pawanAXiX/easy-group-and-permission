<?php

namespace Pawan\RolesPerm\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pawan\RolesPerm\Models\UserGroup;
use Pawan\RolesPerm\Models\GroupPermission;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(config('rolesperm.user_model'),UserGroup::class, 'group_id', 'user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,GroupPermission::class, 'group_id', 'permission_id');
    }
}
