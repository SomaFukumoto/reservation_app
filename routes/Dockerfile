# PHPランタイム
FROM php:8.3-cli

# 必要な拡張
RUN apt-get update && apt-get install -y git unzip libzip-dev \
    && docker-php-ext-install zip pdo_mysql

# composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . /app

# 依存インストール（本番最適化）
RUN composer install --no-dev --optimize-autoloader

# ⚠️ 注意：ここで key:generate はしない
#   APP_KEY は Render の Environment で設定してください。
#   （ビルド時に生成するとデプロイ毎にキーが変わり、セッション等が壊れます）
# RUN php artisan key:generate --force  # ←削除

# キャッシュ系は環境変数が入る「起動後」に行うのが安全ですが、
# まずは未設定でも動く最小にして様子見推奨

# 起動（$PORT にバインド）
CMD sh -lc 'php -S 0.0.0.0:$PORT -t public'
