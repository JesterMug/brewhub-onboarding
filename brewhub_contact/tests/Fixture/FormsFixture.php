<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FormsFixture
 */
class FormsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '15431e0c-5491-4847-b87e-244907ef513b',
                'fname' => 'Lorem ipsum dolor sit amet',
                'lname' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'message' => 'Lorem ipsum dolor sit amet',
                'date' => 1755161852,
            ],
        ];
        parent::init();
    }
}
