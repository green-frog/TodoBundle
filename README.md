TodoBundle
==========

**Todo list** : Simple task management

**Warning**

> This has NEVER been tested ! This bundle IS NOT yet ready to use
> Please use [TodoBundle-sandbox] (https://github.com/green-frog/TodoBundle-sandbox) wich is ready to use

Requirements
------------

- [FOSUserBundle] (https://github.com/FriendsOfSymfony/FOSUserBundle)
  > Cause we'll do it for our own :
  > You can pass trougth Step 4 : Configure User class
  > And step 6 Configure in ``app/config.yml``
- [FOSJsRoutingBundle] (https://github.com/FriendsOfSymfony/FOSJsRoutingBundle)
- Optional : [Doctrine fixtures](https://github.com/symfony/DoctrineFixturesBundle)

Installation
------------

After installing requirements, just follow thoose steps

1. Download GreenFrogTodoBundle (by deps or using submodule)
2. Configure autoload and enable bundle
3. Extends FOSUser User class and ovverride global FOSUSerBundle template
4. Configure GreenFrogTodoBundle
5. Update database
6. Publish assets
7. Optional : load fixtures

### 1. Download GreenFrogTodoBundle
Using the standard Symfony 2 method with vendors, add the following lines in your `deps` file:

``` ini
[GreenFrogTodoBundle]
    git=git://github.com/green-frog/TodoBundle.git
    target=bundles/GreenFrog/TodoBundle
```

And now, download it:

``` bash
$ php bin/vendors install
```

### 2. Configure Autoloader and enable module

Autload
``` php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    // ...
    'GreenFrog' => __DIR__.'/../vendor/bundles',
));
```
Then enable
``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new GreenFrog\Bundle\TodoBundle\GreenFrogTodoBundle(),
    );
}
```

### 3. Extends FOSUser class and global template

If you skipped step 6 and/or step 4 of FOSUser configuration :
``` yaml
# app/config/config.yml
fos_user:
    db_driver: orm
    firewall_name: main
    user_class: GreenFrog\Bundle\TodoBundle\Entity\User
```

If you use twig :
``` twig
{# app/Ressources/FOSUserBundle/views/layout.html.twig #}
{% extends 'GreenFrogTodoBundle::layout.html.twig' %}

{% block title %}
Secured area - Todo App
{% endblock %}

{% block body %}
{% endblock %}
```

### 4. Configure GreenFrogTodoBundle

``` yaml
# app/config/routing.yml
GreenFrogTodoBundle:
    resource: "@GreenFrogTodoBundle/Controller/"
    type:     annotation
```

### 5. Update database schema

``` bash
$ php app/console doctrine:schema:update --force
```

### 6. Publish assets

``` bash
php app/console assets:install web/ --symlink
```

### 7. Optinal : load fixtures
``` bash
php app/console doctrine:fixtures:load
```

License
-------

    Upcoming MIT

About
-----

Hope you'll enjoy