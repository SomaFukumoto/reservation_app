# 1) ベースイメージ（PHP8.2）
FROM php:8.2-cli

# 2) ツールや拡張をインストール
RUN apt-get update \
&& apt-get install -y git unzip libzip-dev \
&& docker-php-ext-install zip

# （MySQLを使っているならこの行を有効化）
RUN docker-php-ext-install pdo_mysql

# 3) composer をインストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 4) 作業ディレクトリを /app にする
WORKDIR /app

# 5) Laravel プロジェクトをコピー
COPY . .

# 6) Composer install & キャッシュ作成
RUN composer install --no-dev --optimize-autoloader
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache || true

# 7) 起動コマンド（Render が渡す $PORT を使用）
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-10000}

