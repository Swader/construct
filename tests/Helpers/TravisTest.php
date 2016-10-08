<?php

use JonathanTorres\Construct\Helpers\Travis;
use PHPUnit_Framework_TestCase as PHPUnit;

class TravisTest extends PHPUnit
{
    protected $travis;

    protected function setUp()
    {
        $this->travis = new Travis();
    }

    /**
     * @test
     */
    public function it_should_return_all_versions_to_test_on_a_php54_project()
    {
        $versionsToTest = $this->travis->phpVersionsToTest('5.4.0');
        $versionsExpected = [
            'hhvm',
            'nightly',
            '5.4',
            '5.5',
            '5.6',
            '7.0',
            '7.1',
        ];

        $this->assertEquals($versionsToTest, $versionsExpected);
    }

    /**
     * @test
     */
    public function it_should_generate_string_of_all_versions_to_run_on_a_php54_project()
    {
        $versionsToRun = $this->travis->phpVersionsToRun([
            'hhvm',
            'nightly',
            '5.4',
            '5.5',
            '5.5.9',
            '5.6',
            '7.0',
            '7.1',
        ]);

        $stringExpected = <<<CONTENT
    - php: hhvm
      env: disable-xdebug=false
    - php: nightly
      env: disable-xdebug=false
    - php: 5.4
    - php: 5.5
    - php: 5.5.9
    - php: 5.6
    - php: 7.0
    - php: 7.1
      env: disable-xdebug=false
CONTENT;

        $this->assertEquals($versionsToRun, $stringExpected);
    }

    /**
     * @test
     */
    public function it_should_return_all_versions_to_test_on_a_php55_project()
    {
        $versionsToTest = $this->travis->phpVersionsToTest('5.5.0');
        $versionsExpected = [
            'hhvm',
            'nightly',
            '5.5',
            '5.6',
            '7.0',
            '7.1',
        ];

        $this->assertEquals($versionsToTest, $versionsExpected);
    }

    /**
     * @test
     */
    public function it_should_generate_string_of_all_versions_to_run_on_a_php55_project()
    {
        $versionsToRun = $this->travis->phpVersionsToRun([
            'hhvm',
            '5.5',
            '5.5.9',
            '5.6',
            '7.0',
            '7.1',
        ]);

        $stringExpected = <<<CONTENT
    - php: hhvm
      env: disable-xdebug=false
    - php: 5.5
    - php: 5.5.9
    - php: 5.6
    - php: 7.0
    - php: 7.1
      env: disable-xdebug=false
CONTENT;

        $this->assertEquals($versionsToRun, $stringExpected);
    }

    /**
     * @test
     */
    public function it_should_return_all_versions_to_test_on_a_php559_project()
    {
        $versionsToTest = $this->travis->phpVersionsToTest('5.5.9');
        $versionsExpected = [
            'hhvm',
            'nightly',
            '5.5',
            '5.6',
            '7.0',
            '7.1',
        ];

        $this->assertEquals($versionsToTest, $versionsExpected);
    }

    /**
     * @test
     */
    public function it_should_generate_string_of_all_versions_to_run_on_a_php559_project()
    {
        $versionsToRun = $this->travis->phpVersionsToRun([
            'hhvm',
            '5.5.9',
            '5.6',
            '7.0',
            '7.1',
        ]);

        $stringExpected = <<<CONTENT
    - php: hhvm
      env: disable-xdebug=false
    - php: 5.5.9
    - php: 5.6
    - php: 7.0
    - php: 7.1
      env: disable-xdebug=false
CONTENT;

        $this->assertEquals($versionsToRun, $stringExpected);
    }

    /**
     * @test
     */
    public function it_should_return_all_versions_to_test_on_a_php56_project()
    {
        $versionsToTest = $this->travis->phpVersionsToTest('5.6.0');
        $versionsExpected = [
            'hhvm',
            'nightly',
            '5.6',
            '7.0',
            '7.1',
        ];

        $this->assertEquals($versionsToTest, $versionsExpected);
    }

    /**
     * @test
     */
    public function it_should_generate_string_of_all_versions_to_run_on_a_php56_project()
    {
        $versionsToRun = $this->travis->phpVersionsToRun([
            'hhvm',
            '5.6',
            '7.0',
            '7.1',
        ]);

        $stringExpected = <<<CONTENT
    - php: hhvm
      env: disable-xdebug=false
    - php: 5.6
    - php: 7.0
    - php: 7.1
      env: disable-xdebug=false
CONTENT;

        $this->assertEquals($versionsToRun, $stringExpected);
    }

    /**
     * @test
     */
    public function it_should_return_all_versions_to_test_on_a_php5616_project()
    {
        $versionsToTest = $this->travis->phpVersionsToTest('5.6.16');

        $versionsExpected = [
            'hhvm',
            'nightly',
            '5.6',
            '7.0',
            '7.1',
        ];

        $this->assertEquals($versionsToTest, $versionsExpected);
    }

    /**
     * @test
     */
    public function it_should_return_all_versions_to_test_on_a_php7_0_project()
    {
        $versionsToTest = $this->travis->phpVersionsToTest('7.0.0');
        $versionsExpected = [
            'hhvm',
            'nightly',
            '7.0',
            '7.1',
        ];

        $this->assertEquals($versionsToTest, $versionsExpected);
    }

    /**
     * @test
     */
    public function it_should_generate_string_of_all_versions_to_run_on_a_php7_0_project()
    {
        $versionsToRun = $this->travis->phpVersionsToRun([
            'hhvm',
            '7.0',
            '7.1',
        ]);

        $stringExpected = <<<CONTENT
    - php: hhvm
      env: disable-xdebug=false
    - php: 7.0
    - php: 7.1
      env: disable-xdebug=false
CONTENT;

        $this->assertEquals($versionsToRun, $stringExpected);
    }

    /**
     * @test
     */
    public function it_should_return_all_versions_to_test_on_a_php7_1_project()
    {
        $versionsToTest = $this->travis->phpVersionsToTest('7.1.0');
        $versionsExpected = [
            'hhvm',
            'nightly',
            '7.1',
        ];

        $this->assertEquals($versionsToTest, $versionsExpected);
    }

    /**
     * @test
     */
    public function it_should_generate_string_of_all_versions_to_run_on_a_php7_1_project()
    {
        $versionsToRun = $this->travis->phpVersionsToRun([
            'hhvm',
            '7.1',
        ]);

        $stringExpected = <<<CONTENT
    - php: hhvm
      env: disable-xdebug=false
    - php: 7.1
      env: disable-xdebug=false
CONTENT;

        $this->assertEquals($versionsToRun, $stringExpected);
    }
}
