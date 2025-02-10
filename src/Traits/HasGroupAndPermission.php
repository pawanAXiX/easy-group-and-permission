<?php 
namespace Pawan\RolesPerm\Traits;
use Pawan\RolesPerm\Models\Group;
use Pawan\RolesPerm\Models\Permission;
use Pawan\RolesPerm\Models\UserGroup;

trait HasGroupAndPerrmission
{
    public function permission(){
        return $this->belongToMany(Permission::class);
    }

    public function groups(){
        return $this->belongsToMany(Group::class,UserGroup::class,'user_id','group_id');
    }

    public function hasGroupAndPermission($codename)
    {
        if($this->permission()->where ('codename',$codename)->exists()){
            return true;
        }
        if($this->groups()->whereHas('permissions', function ($query) use ($codename) {
        $query->where('codename', $codename);
        })->exists()){
            return true;
        }
        else{
            return false;
        }
    }
}