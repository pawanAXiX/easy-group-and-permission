<?php
namespace Pawan\RolesPerm\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Pawan\RolesPerm\Models\Permission;

class UserPermission extends Model
{
    use HasFactory;
    protected $fillable=['user','permission'];

    public function user()
    {
        return $this->belongsToMany(config('rolesperm.user_model'), 'user');
    }
    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'permission');
    }
}