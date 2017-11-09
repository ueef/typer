<?php

namespace Ueef\Typer\Types {

    use Ueef\Typer\Interfaces\TypeInterface;

    class ListType implements TypeInterface
    {
        /** @var boolean */
        private $required;

        /** @var integer */
        private $default = [];

        /** @var TypeInterface */
        private $type;


        public function __construct(TypeInterface $type, $required = false, $default = null)
        {
            $this->type = $type;
            $this->required = $required;

            if (null !== $default) {
                $this->default = $default;
            }
        }

        public function convert($value)
        {
            if (!is_array($value)) {
                $value = null;
            }

            if (null === $value && $this->required) {
                $value = $this->default;
            }

            if ($value) {
                foreach ($value as $key => &$item) {
                    $item = $this->type->convert($item);

                    if (null === $item) {
                        unset($value[$key]);
                    }
                }
            }

            return $value;
        }
    }
}