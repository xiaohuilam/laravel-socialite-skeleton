<?php
namespace Xiaohuilam\Laravel\SocialiteSkeleton\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * 用户绑定表
 *
 * @property integer $user_id
 * @property string $account
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 * @property-read Authenticatable $user
 */
class UserSocialite extends Model
{
    protected $fillable = [
        'account',
        'type',
    ];

    /**
     * 用户关联关系
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(config('auth.providers.users.model'), 'user_id', 'id');
    }
}
