<?php

declare(strict_types=1);

class Hoge
{
    public static $count = 0;

    public function greet(): void
    {
        echo "Hello!Youtube!\n";
    }

    public static function get(): void
    {
        echo self::$count . "\n";
    }
}
