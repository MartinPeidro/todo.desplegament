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
    ->set('remote_user', 'ddaw-ud4-deployer')
    ->set('deploy_path', '~/var/www/ddaw-ud4-deployer/html');

// Hooks

after('deploy:failed', 'deploy:unlock');
