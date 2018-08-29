<?php
declare(strict_types=1);

namespace Ueef\Typer\Types {

    use Ueef\Typer\Interfaces\TypeInterface;

    class MapType implements TypeInterface
    {
        /** @var TypeInterface */
        private $type;


        public function __construct(?TypeInterface $itemsType =null)
        {
            $this->type = $itemsType;
        }

        public function convert($value)
        {
            if (!is_array($value)) {
                $value = [];
            }

            if ($this->type) {
                foreach ($value as &$_value) {
                    $_value = $this->type->convert($_value);
                }
            }

            return $value;
        }
    }
}