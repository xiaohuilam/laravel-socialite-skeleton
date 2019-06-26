<?php
namespace Xiaohuilam\Laravel\SocialiteSkeleton\Models\Traits;

use Xiaohuilam\Laravel\SocialiteSkeleton\Models\UserSocialite;

/**
 * @method \Illuminate\Database\Eloquent\Relations\HasMany hasMany($related, $foreignKey, $localKey)
 */
trait HasManyUserSocialites
{
    /**
     * 用户绑定关系
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userSocialites()
    {
        return $this->hasMany(UserSocialite::class, 'user_id', 'id');
    }

    public function bindSocialite($userSocialite)
    {
        if (!is_object($userSocialite) || !$userSocialite instanceof UserSocialite) {
            $userSocialite = new UserSocialite($userSocialite);
        }
        $userSocialite->user()->associate($this);
        $userSocialite->save();
    }
}