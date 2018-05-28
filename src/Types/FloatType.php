<?php
declare(strict_types=1);

namespace Ueef\Typer\Types {

    use Ueef\Typer\Interfaces\TypeInterface;

    class FloatType implements TypeInterface
    {
        /** @var float */
        private $default;


        public function __construct(float $default = 0.0)
        {
            $this->default = $default;
        }

        public function convert($value)
        {
            if (is_float($value)) {
                return $value;
            }

            if (is_numeric($value)) {
                return (float) $value;
            }

            return $this->default;
        }
    }
}