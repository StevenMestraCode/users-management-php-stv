<?php
class EmpleoSueldo {
    private $value;
    public function __construct($value) {
        if ((float)$value < 0) throw new InvalidArgumentException('El sueldo no puede ser negativo.');
        $this->value = (float) $value;
    }
    public function value() { return $this->value; }
}