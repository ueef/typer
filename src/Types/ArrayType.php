<?php

namespace Ueef\Typer\Types {

    use Ueef\Typer\Interfaces\TypeInterface;

    class ArrayType implements TypeInterface
    {
        /** @var TypeInterface */
        private $type;


        public function __construct(TypeInterface $itemsType)
        {
            $this->type = $itemsType;
        }

        public function convert($value)
        {
            $_values = [];
            if (is_array($value)) {
                foreach ($value as &$_value) {
                    $_values[] = $this->type->convert($_value);
                }
            }

            return $_values;
        }
    }
}