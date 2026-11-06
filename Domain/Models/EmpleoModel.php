<?php
require_once __DIR__ . '/../ValueObjects/EmpleoId.php';
require_once __DIR__ . '/../ValueObjects/EmpleoNombre.php';
require_once __DIR__ . '/../ValueObjects/EmpleoSueldo.php';

class EmpleoModel
{
    private ?EmpleoId $id;
    private string $trabajador;
    private EmpleoNombre $nombre;
    private string $categoria;
    private string $areaTrabajo;
    private string $empresa;
    private string $nivel;
    private EmpleoSueldo $sueldo;
    private string $funciones;
    private string $cargoJefe;

    public function __construct(
        ?EmpleoId $id, string $trabajador, EmpleoNombre $nombre, string $categoria, string $areaTrabajo, 
        string $empresa, string $nivel, EmpleoSueldo $sueldo, string $funciones, string $cargoJefe
    ) {
        $this->id = $id;
        $this->trabajador = $trabajador;
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->areaTrabajo = $areaTrabajo;
        $this->empresa = $empresa;
        $this->nivel = $nivel;
        $this->sueldo = $sueldo;
        $this->funciones = $funciones;
        $this->cargoJefe = $cargoJefe;
    }

    public function id(): ?EmpleoId { return $this->id; }
    public function trabajador(): string { return $this->trabajador; }
    public function nombre(): EmpleoNombre { return $this->nombre; }
    public function categoria(): string { return $this->categoria; }
    public function areaTrabajo(): string { return $this->areaTrabajo; }
    public function empresa(): string { return $this->empresa; }
    public function nivel(): string { return $this->nivel; }
    public function sueldo(): EmpleoSueldo { return $this->sueldo; }
    public function funciones(): string { return $this->funciones; }
    public function cargoJefe(): string { return $this->cargoJefe; }

    public function changeSueldo(EmpleoSueldo $newSueldo): self
    {
        return new self(
            $this->id, $this->trabajador, $this->nombre, $this->categoria, $this->areaTrabajo, 
            $this->empresa, $this->nivel, $newSueldo, $this->funciones, $this->cargoJefe
        );
    }
}