<?php
namespace Pawan\RolesPerm\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class GroupPermission extends Model
{
    use HasFactory;
    protected $fillable=['group','permission'];

    public function group()
    {
        return $this->belongsToMany(Permission::class, 'group');
    }
    public function permission()
    {
        return $this->belongsToMany(Group::class, 'permission');
    }
}