<?php
declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/EmpleoModel.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EmpleoId.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EmpleoNombre.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EmpleoSueldo.php';
require_once __DIR__ . '/../../../Application/Ports/Out/SaveEmpleoPort.php';
require_once __DIR__ . '/../../../Application/Ports/Out/GetEmpleoByIdPort.php';
require_once __DIR__ . '/../../../Application/Ports/Out/GetAllEmpleosPort.php';
require_once __DIR__ . '/../../../Application/Ports/Out/UpdateEmpleoPort.php';
require_once __DIR__ . '/../../../Application/Ports/Out/DeleteEmpleoPort.php';

final class EmpleoRepositoryMySQL implements SaveEmpleoPort, GetEmpleoByIdPort, GetAllEmpleosPort, UpdateEmpleoPort, DeleteEmpleoPort
{
    private PDO $db;
    public function __construct(PDO $db) { $this->db = $db; }

    public function save(EmpleoModel $empleo): EmpleoModel {
        $stmt = $this->db->prepare(
            "INSERT INTO empleos (trabajador, nombre, categoria, area_trabajo, empresa, nivel, sueldo, funciones, cargo_jefe) 
             VALUES (:trabajador, :nombre, :categoria, :area_trabajo, :empresa, :nivel, :sueldo, :funciones, :cargo_jefe)"
        );
        $stmt->execute([
            ':trabajador' => $empleo->trabajador(), ':nombre' => $empleo->nombre()->value(), ':categoria' => $empleo->categoria(),
            ':area_trabajo' => $empleo->areaTrabajo(), ':empresa' => $empleo->empresa(), ':nivel' => $empleo->nivel(),
            ':sueldo' => $empleo->sueldo()->value(), ':funciones' => $empleo->funciones(), ':cargo_jefe' => $empleo->cargoJefe()
        ]);
        $id = (int) $this->db->lastInsertId();
        return new EmpleoModel(new EmpleoId((string)$id), $empleo->trabajador(), $empleo->nombre(), $empleo->categoria(), $empleo->areaTrabajo(), $empleo->empresa(), $empleo->nivel(), $empleo->sueldo(), $empleo->funciones(), $empleo->cargoJefe());
    }

    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM empleos");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $empleos = [];
        foreach ($rows as $row) {
            $empleos[] = $this->mapToModel($row);
        }
        return $empleos;
    }

    public function getById(EmpleoId $id): ?EmpleoModel {
        $stmt = $this->db->prepare("SELECT * FROM empleos WHERE id = :id");
        $stmt->execute([':id' => $id->value()]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $this->mapToModel($row) : null;
    }

    public function update(EmpleoModel $empleo): EmpleoModel {
        $stmt = $this->db->prepare(
            "UPDATE empleos SET trabajador=:trabajador, nombre=:nombre, categoria=:categoria, area_trabajo=:area_trabajo, 
             empresa=:empresa, nivel=:nivel, sueldo=:sueldo, funciones=:funciones, cargo_jefe=:cargo_jefe WHERE id=:id"
        );
        $stmt->execute([
            ':id' => $empleo->id()->value(), ':trabajador' => $empleo->trabajador(), ':nombre' => $empleo->nombre()->value(), 
            ':categoria' => $empleo->categoria(), ':area_trabajo' => $empleo->areaTrabajo(), ':empresa' => $empleo->empresa(), 
            ':nivel' => $empleo->nivel(), ':sueldo' => $empleo->sueldo()->value(), ':funciones' => $empleo->funciones(), ':cargo_jefe' => $empleo->cargoJefe()
        ]);
        return $empleo;
    }

    public function delete(EmpleoId $id): void {
        $stmt = $this->db->prepare("DELETE FROM empleos WHERE id = :id");
        $stmt->execute([':id' => $id->value()]);
    }

    private function mapToModel(array $row): EmpleoModel {
        return new EmpleoModel(
            new EmpleoId((string)$row['id']), $row['trabajador'], new EmpleoNombre($row['nombre']),
            $row['categoria'], $row['area_trabajo'], $row['empresa'], $row['nivel'],
            new EmpleoSueldo((float)$row['sueldo']), $row['funciones'], $row['cargo_jefe']
        );
    }
}