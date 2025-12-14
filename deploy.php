<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/MartinPeidro/todo.desplegament.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('100.29.248.20')
    ->set('remote_user', 'sa04-deployer')
    ->set('deploy_path', '/var/www/es-cipfpbatoi-deployer/html');

// Hooks

task('artisan:migrate', function () {
 writeln('Skipping artisan:migrate');
 });

task('reload:php-fpm', function () {
 run('sudo /etc/init.d/php8.3-fpm restart');
});

after('deploy', 'reload:php-fpm');
after('deploy:failed', 'deploy:unlock');
