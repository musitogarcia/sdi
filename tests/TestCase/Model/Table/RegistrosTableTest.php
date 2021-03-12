<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegistrosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegistrosTable Test Case
 */
class RegistrosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RegistrosTable
     */
    protected $Registros;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Registros',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Registros') ? [] : ['className' => RegistrosTable::class];
        $this->Registros = $this->getTableLocator()->get('Registros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Registros);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
