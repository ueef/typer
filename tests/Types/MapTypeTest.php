<?php
declare(strict_types=1);

namespace Ueef\Typer\Tests\Types {

    use PHPUnit\Framework\TestCase;
    use Ueef\Typer\Types\IntType;
    use Ueef\Typer\Types\MapType;
    use Ueef\Typer\Interfaces\TypeInterface;

    class MapTypeTest extends TestCase
    {
        /**
         * @param $type
         * @param $value
         * @param $expected
         * @dataProvider convertProvider
         */
        public function testConvert(?TypeInterface $type, $value, $expected)
        {
            $type = new MapType($type);
            $this->assertEquals($expected, $type->convert($value));
        }

        public function convertProvider()
        {
            return [
                [null, ['a' => '1', 'b' => 'b', 'c' => 1], ['a' => '1', 'b' => 'b', 'c' => 1]],
                [new IntType(), ['a' => '1', 'b' => 'b', 'c' => 1], ['a' => 1, 'b' => 0, 'c' => 1]],
            ];
        }
    }
}
