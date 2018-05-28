<?php
declare(strict_types=1);

namespace Ueef\Typer\Tests\Types {

    use Ueef\Typer\Interfaces\TypeInterface;
    use Ueef\Typer\Types\ArrayType;
    use PHPUnit\Framework\TestCase;
    use Ueef\Typer\Types\FloatType;
    use Ueef\Typer\Types\IntType;
    use Ueef\Typer\Types\StringType;

    class ArrayTypeTest extends TestCase
    {
        /**
         * @param $type
         * @param $value
         * @param $expected
         * @dataProvider convertProvider
         */
        public function testConvert(TypeInterface $type, $value, $expected)
        {
            $type = new ArrayType($type);
            $this->assertEquals($expected, $type->convert($value));
        }

        public function convertProvider()
        {
            return [
                [new IntType(), ['1', 'a1', '1a'], [1, 0, 0]],
                [new FloatType(), ['1.1', 'a1.1', '1.1a'], [1.1, 0, 0]],
                [new StringType(), [1, 2, 3], ['1', '2', '3']],
            ];
        }
    }
}
