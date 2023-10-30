# IPC Workshop 2023 Clean Code like a Pro

Task:
https://codingdojo.org/kata/birthday-greetings/

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

### Docker Stack

// derived from Repo [IshtarStar/docker-compose-nginx-phpfpm-xdebug-mariadb](https://github.com/IshtarStar/docker-compose-nginx-phpfpm-xdebug-mariadb)

TODO: replace with `webdevops/php-dev` ([Documentation], [DockerHub], [GitHub], [example Docker file][example])

[documentation]: https://webdevops.gitbook.io/dockerfile
[dockerhub]: https://hub.docker.com/r/webdevops/php-dev/tags
[github]: https://github.com/webdevops/Dockerfile
[example]: https://github.com/codenamephp/neos.googleSecretsManager/blob/release/docker/application/Dockerfile