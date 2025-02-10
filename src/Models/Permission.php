<?php 
namespace Pawan\RolesPerm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Permission extends Model
{
    use HasFactory;
    protected $table='permissions';
    protected $fillable=['name','contentType','codename'];
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_permission');
    }

}