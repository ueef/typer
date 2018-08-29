<?php
declare(strict_types=1);

namespace Ueef\Typer\Tests\Types {

    use PHPUnit\Framework\TestCase;
    use Ueef\Typer\Types\ArrayType;
    use Ueef\Typer\Types\BoolType;
    use Ueef\Typer\Types\FloatType;
    use Ueef\Typer\Types\IntType;
    use Ueef\Typer\Types\StringType;
    use Ueef\Typer\Types\StructType;

    class StructTypeTest extends TestCase
    {
        /**
         * @param $struct
         * @param $required
         * @param $value
         * @param $expected
         * @dataProvider convertProvider
         */
        public function testConvert(array $struct, $required, $value, $expected)
        {
            $type = new StructType($struct, $required);
            $this->assertEquals($expected, $type->convert($value));
        }

        public function convertProvider()
        {
            return [
                [[
                    'int' => new IntType(),
                    'bool' => new BoolType(),
                    'float' => new FloatType(),
                    'array' => new ArrayType(new IntType()),
                    'string' => new StringType(),
                ], true, [
                    'int' => '123',
                    'bool' => '0',
                    'float' => '1.2',
                    'array' => [
                        '1', '2', '3', null,
                    ],
                    'string' => 123,
                ], [
                    'int' => 123,
                    'bool' => false,
                    'float' => 1.2,
                    'array' => [
                        1, 2, 3, 0,
                    ],
                    'string' => '123',
                ]],
            ];
        }
    }
}
