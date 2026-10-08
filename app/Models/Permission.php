<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Permission extends Model
{
    const UPDATED_AT = null;

    public function rolePermissions(): HasMany{
        return $this->hasMany(RolePermission::class, 'permission_id');
    }

    public function roles(): BelongsToMany{
        return $this->belongsToMany(Role::class, 'role_permissions', 'permission_id', 'role_id')->withPivot(['granted_at', 'granted_by']);
    }
}
