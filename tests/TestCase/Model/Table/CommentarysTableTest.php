<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommentarysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommentarysTable Test Case
 */
class CommentarysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CommentarysTable
     */
    public $Commentarys;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.commentarys',
        'app.users',
        'app.roles',
        'app.articles',
        'app.categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Commentarys') ? [] : ['className' => 'App\Model\Table\CommentarysTable'];
        $this->Commentarys = TableRegistry::get('Commentarys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Commentarys);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
