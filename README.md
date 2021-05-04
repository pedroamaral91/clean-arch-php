## Clean Arch API

### 1.1 Run docker-compose command:
```bash
$ docker-compose up -d
```

### 1.2 Install dependencies:
```bash
$ docker exec -it clean-arch-api composer install
```

### 1.3 Run tests:
```bash
$ docker exec -it clean-arch-api ./vendor/bin/phpunit tests
```

**Default ports**

| Name  | Port | Exposed |
|--------|-----|---------|
| `nginx` | `80` | `yes` |
| `php-fpm` | `9000` | `no` |
| `postgres`| `5432` | `yes` |

