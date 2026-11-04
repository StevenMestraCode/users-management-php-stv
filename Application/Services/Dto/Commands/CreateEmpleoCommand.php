<?php
declare(strict_types=1);

final class CreateEmpleoCommand
{
    private string $nombre;
    private string $categoria;
    private string $areaTrabajo;
    private string $empresa;
    private string $nivel;
    private float $sueldo;
    private string $funciones;
    private string $cargoJefe;

    public function __construct(
        string $nombre, string $categoria, string $areaTrabajo, string $empresa, 
        string $nivel, float $sueldo, string $funciones, string $cargoJefe
    ) {
        $this->nombre = trim($nombre);
        $this->categoria = trim($categoria);
        $this->areaTrabajo = trim($areaTrabajo);
        $this->empresa = trim($empresa);
        $this->nivel = trim($nivel);
        $this->sueldo = $sueldo;
        $this->funciones = trim($funciones);
        $this->cargoJefe = trim($cargoJefe);
    }

    public function nombre(): string { return $this->nombre; }
    public function categoria(): string { return $this->categoria; }
    public function areaTrabajo(): string { return $this->areaTrabajo; }
    public function empresa(): string { return $this->empresa; }
    public function nivel(): string { return $this->nivel; }
    public function sueldo(): float { return $this->sueldo; }
    public function funciones(): string { return $this->funciones; }
    public function cargoJefe(): string { return $this->cargoJefe; }
}