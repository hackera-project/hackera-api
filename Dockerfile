FROM public.ecr.aws/x1j8x6h3/laravel-octane-image-base:8.3

WORKDIR /app

RUN docker-php-ext-configure exif \
    && docker-php-ext-install exif

COPY . .
COPY .docker/prod.supervisord.conf /etc/supervisor.d/app.conf

RUN composer install --no-dev --no-interaction --optimize-autoloader

