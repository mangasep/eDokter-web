eDokter-web (YII2 Advanced Example Project)
==========================

This is example project implementing a medical record & appointment examination of a hospital or clinic created to help people learn Yii 2.0. The idea was to show how to deal with Gii, grids, filtering and other Yii 2.0 usage. It may contain bugs, shortcuts etc.

There are screenshoot project: 

It is built on top of advanced template which includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

There are screenshoot from applications: https://imgur.com/a/j0Zr9

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-advanced/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-advanced/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install the application using the following command:

~~~
git clone https://github.com/alasepnugroho/eDokter-web.git
composer self-update
composer global require "fxp/composer-asset-plugin:~1.1.1"
cd eDokter-web
composer install
~~~

### Install from an Archive File
Extract the archive file downloaded from this repository to
a directory named eDokter-web that is directly under the Web root.

CONFIGURATION
-------------


After you install the application, you have to conduct the following steps to initialize
the installed application. You only need to do these once for all.

1. Run command `init` to initialize the application with a specific environment.
2. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.

Edit the file `common/config/main-local.php` with real data, for example:

```php
'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=edokterx_db_edokter',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `common/config/` directory to customize your application as required.

3. Apply migrations with console command `yii migrate`. This will create tables needed for the application to work. Or can import a database that has been provided
4. Set document roots of your Web server:

- for frontend `/path/to/eDokter-web/frontend/web/`
- for backend `/path/to/eDokter-web/backend/web/`

To login into the application, you need to first sign up, with any of your email address, username and password.
Then, you can login into the application with same email address and password at any time.
