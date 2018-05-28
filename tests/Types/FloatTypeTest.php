<?php
declare(strict_types=1);

namespace Ueef\Typer\Tests\Types {

    use Ueef\Typer\Types\FloatType;
    use PHPUnit\Framework\TestCase;

    class FloatTypeTest extends TestCase
    {
        /**
         * @param $default
         * @param $value
         * @param $expected
         * @dataProvider convertProvider
         */
        public function testConvert($default, $value, $expected)
        {
            $type = new FloatType($default);
            $this->assertEquals($expected, $type->convert($value));
        }

        public function convertProvider()
        {
            return [
                [0, null, 0],
                [1, null, 1],
                [-1, null, -1],

                [0, 1, 1],
                [0, '1', 1],
            ];
        }
    }
}
