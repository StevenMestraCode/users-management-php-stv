<?php
class EmpleoNombre {
    private $value;
    public function __construct($value) {
        $val = trim((string)$value);
        if ($val === '' || mb_strlen($val) < 3) throw new InvalidArgumentException('El nombre debe tener al menos 3 letras.');
        $this->value = $val;
    }
    public function value() { return $this->value; }
}