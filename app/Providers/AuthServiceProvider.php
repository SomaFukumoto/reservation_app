<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * アプリケーションのポリシーマップ。
     */
    protected $policies = [
        // モデル => ポリシー クラスのマッピング
    ];

    /**
     * 任意の認可サービスの登録
     */
    public function boot()
    {
        $this->registerPolicies();

        // ここで is-admin Gate を定義
        Gate::define('is-admin', function ($user) {
            return $user->role === 'admin';
        });
    }
}
