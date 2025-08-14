<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContactformTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContactformTable Test Case
 */
class ContactformTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContactformTable
     */
    protected $Contactform;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Contactform',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Contactform') ? [] : ['className' => ContactformTable::class];
        $this->Contactform = $this->getTableLocator()->get('Contactform', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Contactform);

        parent::tearDown();
    }
}
