<?php 
namespace Pawan\RolesPerm\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class UserGroup extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'group_id'];

    public function user()
    {
        return $this->belongsTo(config('rolesperm.user_model'), 'user_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}


