<?php

use Phinx\Seed\AbstractSeed;

class LogSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $data = [
            [
                'level' => 'INFO',
                'value' => '{
                                "referer": "http://localhost:8080/",
                                "authUser": null,
                                "userAgent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 11_2_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36",
                                "remoteHost": "172.20.0.1",
                                "requestUri": "/",
                                "scriptName": "/index.php"
                            }',
            ],
            [
                'level' => 'INFO',
                'value' => '{
                                "referer": "http://localhost:8080/index",
                                "authUser": null,
                                "userAgent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 11_2_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36",
                                "remoteHost": "172.20.0.1",
                                "requestUri": "/",
                                "scriptName": "/index.php"
                            }',
            ],
        ];
        $this->table('logs')->insert($data)->save();
    }
}
