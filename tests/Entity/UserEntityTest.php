<?php

namespace App\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Liip\TestFixturesBundle\Services\DatabaseToolCollection;

class UserEntityTest extends KernelTestCase
{
    protected $databaseTool;
    
    protected function setUp(): void
    {
        parent::setUp();

        $this->databaseTool = self::getContainer()->get(DatabaseToolCollection::class);
    }

    public function testRepositoryYserCount()
    {
        $users = $this->databaseTool->getUsers();
    }
}