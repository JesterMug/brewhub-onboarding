<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormTable Test Case
 */
class FormTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FormTable
     */
    protected $Form;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Form',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Form') ? [] : ['className' => FormTable::class];
        $this->Form = $this->getTableLocator()->get('Form', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Form);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\FormTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
