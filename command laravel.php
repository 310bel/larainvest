<?php
php artisan serve

проверка версии laravel
php artisan --version

проверка версии php
php -v

подключенные модули
php -m

php artisan optimize
php artisan route:cache
php artisan route:clear
php artisan config:clear
php artisan cache:clear
php artisan key:generate
composer dump-autoload
php artisan view:clear
php artisan config:cache

выполняем миграцию
php artisan migrate
php artisan migrate:rollback //Rolling back migrations
php artisan migrate:refresh // сначала все Rolling back migrations. после Running migrations.

создаем модели и сразу миграции моделей (ключ -m)
php artisan make:model platform -m

Чтобы сгенерировать миграцию для обновления таблицы можно использовать команду:
php artisan make:migration deposits_update --table="deposits"

Для создания таблиц используется:
Schema::create();
Для обновления таблиц используется:
Schema::table();


php artisan make:controller dashboardController --resource

Установить breeze
В первую очередь надо установить с сайта https://nodejs.org инсталятор. В нем сам nodejs и npm пакетный менеджер.

npm install && npm run dev
npm run build
php composer.phar require laravel/breeze

Composer локально:
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

php composer.phar update
php composer.phar install

install — установка пакетов, прописанных в composer.json
update – обновление пакетов
dumpautoload — пересборка автозагрузчика
require somepackage/somepackage:someversion — добавление нового пакета (по умолчанию пакеты ставятся из оф. репозитория). При установке пакет прописывается в composer.json
update --lock — обновление файла блокировки composer.lock
config --global cache-files-maxsize «2048MiB» — пример изменения параметра конфигурации
--profile — добавление этого параметра к любой команде включит показ времени выполнения и объёма использованной памяти
--verbose — подробная инфомация о выполняемой операции
show --installed — список установленных пакетов с описанием каждого
show --platform — сведения о PHP
--dry-run — репетиция выполнения команды. Может добавляться к командам install и update. Эмулирует выполнение команды без её непосредственного выполнения. Необходим для того, чтобы проверить пройдёт ли установка пакетов и зависимостей успешно.
remove — удаление пакета. Точная противоположность require

livewire
Publishing The Config File
php artisan livewire:publish --config

Publishing Frontend Assets
php artisan livewire:publish --assets

php artisan livewire:discover

Route::get('/ScheduleTeacher', [ ScheduleController::class, 'index' ])->name('ScheduleTeacher');


