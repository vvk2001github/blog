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
    php artisan storage:link
    php artisan clear-compiled
    php artisan optimize
    php artisan config:cache
    php artisan cache:clear
@endtask

@story('deploy')
    pull
    composer
    npm
    artisan
@endstory
