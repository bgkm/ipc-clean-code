# IPC Workshop 2023 Clean Code like a Pro

## dev env

// derived from Repo [IshtarStar/docker-compose-nginx-phpfpm-xdebug-mariadb](https://github.com/IshtarStar/docker-compose-nginx-phpfpm-xdebug-mariadb)

![docker](https://img.shields.io/badge/Docker-compose-brightgreen.svg)
![php](https://img.shields.io/badge/PHP_FPM-8.2.11-brightgreen.svg)
![xdebug](https://img.shields.io/badge/Xdebug-3.2.2-brightgreen.svg)
![nginx](https://img.shields.io/badge/nginx-1.25.2-brightgreen.svg)
<!--![redis](https://img.shields.io/badge/Redis-7.2.1-brightgreen.svg)-->
<!--![mariadb](https://img.shields.io/badge/MariaDB-11.1.2-brightgreen.svg)-->

## Dev Tools

### Phive

[Phive](https://phar.io/) is present in the `php-fpm` container.

You can use it with the `--copy` flag to have an executable copy of your tools present in the `./tools/` folder, which
are available outside the container as well.

1. Open a shell in the `php-fpm` container

   ```shell
   docker compose exec php-fpm /bin/bash
   ```

2. Install tools from `phars.xml`

   ```shell
   phive install
   ```

3. Command to install NEW tools (example [phpab](https://github.com/theseer/Autoload/)):

   ```shell
   phive install --copy phpab
   ```

### Autoload

For every change in classes/namespaces/folders, the `autoload.inc.php` must be recreated.

To do so, run [phpab](https://github.com/theseer/Autoload/) inside the `php-fpm` container:

```shell
tools/phpab -o src/autoload.inc.php src
```

(This may work outside the container as well, if a php runtime is present.)
