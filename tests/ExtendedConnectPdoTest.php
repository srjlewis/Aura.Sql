<?php

use Aura\Sql\ExtendedPdo;

class ExtendedConnectPdoTest extends \Aura\Sql\ExtendedPdoTest
{
    protected function newPdo()
    {
        return ExtendedPdo::connect('sqlite::memory:');
    }

    public function testPdoType()
    {
        if(version_compare(PHP_VERSION, '8.4', '<')) {
            $this->markTestSkipped('PHP 8.4+ required for this test.');
        }
        $this->assertInstanceOf(Pdo\Sqlite::class, $this->pdo->getPdo());
    }
}