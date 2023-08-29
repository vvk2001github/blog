@servers(['blog' => ['kulyaginv@kulyaginv_blog']])

@setup
    $dir = '/srv/nginx/blog/'
@endsetup

@task('pull', ['on' => 'blog'])
    cd {{ $dir }}
    git pull
@endtask

@task('composer', ['on' => 'blog'])
    cd {{ $dir }}
    composer install --no-interaction --quiet --no-dev --prefer-dist --optimize-autoloader
@endtask

@task('npm', ['on' => 'blog'])
    cd {{ $dir }}
    npm install
    npm run build
@endtask

@task('artisan', ['on' => 'blog'])
    cd {{ $dir }}
    php artisan migrate --force
    php artisan config:cache
    php artisan event:cache
    php artisan route:cache
    php artisan view:cache
@endtask

@story('deploy')
    pull
    composer
    npm
    artisan
@endstory
