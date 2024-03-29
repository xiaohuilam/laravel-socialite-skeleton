<?php
namespace Xiaohuilam\Laravel\SocialiteSkeleton\Models\Traits;

use Xiaohuilam\Laravel\SocialiteSkeleton\Models\UserSocialite;
use Xiaohuilam\Laravel\SocialiteSkeleton\Exceptions\InvalidTypeException;
use Xiaohuilam\Laravel\SocialiteSkeleton\Exceptions\DuplicateBindingsException;
use Xiaohuilam\Laravel\SocialiteSkeleton\Exceptions\AccountAlreadyBindedException;
use Xiaohuilam\Laravel\SocialiteSkeleton\Exceptions\UserMismatchException;

/**
 * @property-read UserSocialite[]|\Illuminate\Database\Eloquent\Collection $userSocialites
 * @method \Illuminate\Database\Eloquent\Relations\HasMany hasMany($related, $foreignKey, $localKey)
 */
trait HasManyUserSocialites
{
    abstract public function getAuthIdentifierName();

    /**
     * 用户绑定关系
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userSocialites()
    {
        return $this->hasMany(UserSocialite::class, 'user_id', 'id');
    }

    /**
     * 绑定
     *
     * @param UserSocialite|array $userSocialite
     * @return UserSocialite
     */
    public function bindSocialite($userSocialite)
    {
        if (!is_object($userSocialite) || !$userSocialite instanceof UserSocialite) {
            $userSocialite = new UserSocialite($userSocialite);
        }
        $userSocialite->user()->associate($this);

        if (!collect(config('laravel-socialite-skeleton.types'))->contains($userSocialite->type)) {
            throw new InvalidTypeException();
        }
        if (!config('laravel-socialite-skeleton.allow_duplicate') && UserSocialite::where(['type' => $userSocialite->type, 'user_id' => $userSocialite->user_id,])->first()) {
            throw new DuplicateBindingsException();
        }
        if (UserSocialite::where(['type' => $userSocialite->type, 'account' => $userSocialite->account,])->first()) {
            throw new AccountAlreadyBindedException();
        }

        $userSocialite->save();
        return $userSocialite;
    }

    /**
     * 解绑
     *
     * @param UserSocialite|array $userSocialite
     * @return bool
     */
    public function unbindSocialite($userSocialite)
    {
        if (!is_object($userSocialite) || !$userSocialite instanceof UserSocialite) {
            $userSocialite = UserSocialite::where($userSocialite)->firstOrFail();
        }

        if ($userSocialite->user_id != $this->id) {
            throw new UserMismatchException();
        }
        return $userSocialite->delete();
    }
}
