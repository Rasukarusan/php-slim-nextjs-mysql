<?php

namespace Tests\Functional;

use Phinx\Console\PhinxApplication;
use Services\HomeService;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\NullOutput;

class HomeServiceUnitTest extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // $app = new PhinxApplication();
        // $app->setAutoExit(false);
        // $app->run(new StringInput('seed:run'), new NullOutput());
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testFindAll(): void
    {
        $service = new HomeService();
        $result = $service->findAll();
        $expect = 7;
        $this->assertSame($expect, $result[0]->id);
    }
}
