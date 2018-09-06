<?php
declare(strict_types=1);

namespace Ueef\Typer\Types {

    use Ueef\Typer\Interfaces\TypeInterface;

    class EnumType implements TypeInterface
    {
        /** @var TypeInterface */
        private $type;

        /** @var mixed */
        private $values = [];

        /** @var mixed */
        private $default;


        public function __construct(TypeInterface $type, $default, array $values)
        {
            $this->type = $type;
            $this->setValues($values);
            $this->setDefault($default);
        }

        public function convert($value)
        {
            $value = $this->type->convert($value);
            if (!in_array($value, $this->values)) {
                $value = $this->default;
            }

            return $value;
        }

        private function setDefault($default)
        {
            $this->default = $this->type->convert($default);
        }

        private function setValues(array $values)
        {
            foreach ($values as $value) {
                $this->values[] = $this->type->convert($value);
            }
        }
    }
}