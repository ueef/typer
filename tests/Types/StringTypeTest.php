<?php
declare(strict_types=1);

namespace Ueef\Typer\Tests\Types {

    use Ueef\Typer\Types\StringType;
    use PHPUnit\Framework\TestCase;

    class StringTypeTest extends TestCase
    {
        /**
         * @param $default
         * @param $value
         * @param $expected
         * @dataProvider convertProvider
         */
        public function testConvert($default, $value, $expected)
        {
            $type = new StringType($default);
            $this->assertEquals($expected, $type->convert($value));
        }

        public function convertProvider()
        {
            return [
                ['', null, ''],
                ['1', null, '1'],

                ['', 1, '1'],
            ];
        }
    }
}
