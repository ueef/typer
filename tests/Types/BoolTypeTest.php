<?php
declare(strict_types=1);

namespace Ueef\Typer\Tests\Types {

    use Ueef\Typer\Types\BoolType;
    use PHPUnit\Framework\TestCase;

    class BoolTypeTest extends TestCase
    {
        public function testDefault()
        {
            $type = new BoolType(true);
            $this->assertTrue($type->convert(null));

            $type = new BoolType(false);
            $this->assertFalse($type->convert(null));
        }

        public function testConvert()
        {
            $type = new BoolType();

            $this->assertFalse($type->convert(false));
            $this->assertFalse($type->convert(''));
            $this->assertFalse($type->convert(0));
            $this->assertFalse($type->convert('0'));

            $this->assertTrue($type->convert(true));
            $this->assertTrue($type->convert(1));
            $this->assertTrue($type->convert('a'));
        }
    }
}
