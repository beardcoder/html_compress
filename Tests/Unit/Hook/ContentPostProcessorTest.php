<?php
/**
 * Created by PhpStorm.
 * User: markussommer
 * Date: 23.12.16
 * Time: 22:32
 */
namespace Markussom\HtmlCompress\Tests\Unit\Hook;

use Markussom\HtmlCompress\Hook\ContentPostProcessor;

/**
 * Class ContentPostProcessorTest
 */
class ContentPostProcessorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ContentPostProcessor
     */
    protected $subject;

    /**
     * Initializes subject
     */
    public function setup()
    {
        $this->subject = new ContentPostProcessor();
        $GLOBALS['TSFE'] = new \stdClass();
        $GLOBALS['TSFE']->config['config']['compressBody'] = '1';
    }

    /**
     * @test
     */
    public function isTsfeSetTest()
    {
        $this->assertNotEmpty($GLOBALS['TSFE']);
    }

    /**
     * @test
     */
    public function hasTsfeAnConfigArrayTest()
    {
        $this->assertTrue(is_array($GLOBALS['TSFE']->config));
    }

    /**
     * @test
     */
    public function isCompressBodyActiveTest()
    {
        $this->assertTrue($this->invokeMethod($this->subject, 'isCompressBodyActive'));
    }

    /**
     * @test
     */
    public function isCompressBodyNotActiveTest()
    {
        $GLOBALS['TSFE']->config['config']['compressBody'] = '0';
        $this->assertFalse($this->invokeMethod($this->subject, 'isCompressBodyActive'));
    }

    /**
     * @test
     */
    public function canMinifyOnlyBodyTest()
    {
        $GLOBALS['TSFE']->content = '<html>
<head>
    
</head>
<body>
<!-- TYPO3_SEARCH_begin -->
<p>Test content</p>
<p>Test content</p>
<p>Test content</p>
<!-- TYPO3_SEARCH_end -->
</body>
</html>';

        $expected = '<html>
<head>
    
</head>
<body><!-- TYPO3_SEARCH_begin --><p>Test content</p><p>Test content</p><p>Test content</p><!-- TYPO3_SEARCH_end --></body>
</html>';
        $this->subject->render('', $GLOBALS['TSFE']);
        $this->assertEquals($expected, $GLOBALS['TSFE']->content);
    }

    /**
     * Call protected/private method of a class.
     *
     * @param object &$object Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}
