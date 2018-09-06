<?php
declare(strict_types=1);

namespace Ueef\Typer\Tests\Types {

    use PHPUnit\Framework\TestCase;
    use Ueef\Typer\Types\IntType;
    use Ueef\Typer\Types\EnumType;
    use Ueef\Typer\Types\FloatType;
    use Ueef\Typer\Types\StringType;
    use Ueef\Typer\Interfaces\TypeInterface;

    class EnumTypeTest extends TestCase
    {
        /**
         * @param TypeInterface $type
         * @param $value
         * @param $expected
         * @param $default
         * @param $values
         * @dataProvider convertProvider
         */
        public function testConvert(TypeInterface $type, $value, $expected, $default, $values)
        {
            $type = new EnumType($type, $default, $values);
            $this->assertEquals($expected, $type->convert($value));
        }

        public function convertProvider()
        {
            return [
                [new IntType(), '1', 1, 3, [1, 2, 3]],
                [new IntType(), 4, 3, '3', [1, 2, 3]],
            ];
        }
    }
}
