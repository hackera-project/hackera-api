FROM public.ecr.aws/x1j8x6h3/laravel-octane-image-base:8.3

WORKDIR /app

COPY composer.josn composer.json

RUN composer install --no-dev --no-interaction --optimize-autoloader

COPY . .
COPY .docker/prod.supervisord.conf /etc/supervisor.d/app.conf

