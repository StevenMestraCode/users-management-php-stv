<?php
class EmpleoId {
    private $value;
    public function __construct($value) {
        if (empty($value)) throw new InvalidArgumentException('El ID no puede estar vacío.');
        $this->value = (int) $value;
    }
    public function value() { return $this->value; }
}