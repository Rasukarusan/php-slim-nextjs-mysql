# php-slim-nextjs-mysql

## Setup

```sh
docker-compose up -d

cd app/server
composer update
composer migrate
composer migrate -- -e testing
composer seed

cd ../client
yarn
```

## DB確認

`app`と`app_test`が作成されていればOK

もし作成`app_test`が作成されていない場合下記を実行(docker/db/sql/000_create_database_app_test.sql)
```sql
$ docker exec -it slim-practice-db bash
$ mysql -uroot -proot

CREATE DATABASE IF NOT EXISTS `app_test`;
GRANT ALL ON `app_test`.* TO "docker"@"%";
FLUSH PRIVILEGES;
```

```sh
$ docker exec -it slim-practice-db bash
$ composer migrate -- -e testing
```

## Article
https://www.rasukarusan.com/entry/2021/05/01/121005
