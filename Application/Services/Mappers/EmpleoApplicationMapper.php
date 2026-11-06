<?php
declare(strict_types=1);

require_once __DIR__ . '/../Dto/Commands/CreateEmpleoCommand.php';
require_once __DIR__ . '/../Dto/Commands/UpdateEmpleoCommand.php';
require_once __DIR__ . '/../../../Domain/Models/EmpleoModel.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EmpleoId.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EmpleoNombre.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EmpleoSueldo.php';

final class EmpleoApplicationMapper
{
    public static function fromCreateCommandToModel(CreateEmpleoCommand $command, ?string $generatedId = null): EmpleoModel
    {
        return new EmpleoModel(
            $generatedId ? new EmpleoId($generatedId) : null,
            $command->trabajador(),
            new EmpleoNombre($command->nombre()),
            $command->categoria(), $command->areaTrabajo(), $command->empresa(), $command->nivel(),
            new EmpleoSueldo($command->sueldo()), $command->funciones(), $command->cargoJefe()
        );
    }

    public static function fromUpdateCommandToModel(UpdateEmpleoCommand $command): EmpleoModel
    {
        return new EmpleoModel(
            new EmpleoId($command->id()),
            $command->trabajador(),
            new EmpleoNombre($command->nombre()),
            $command->categoria(), $command->areaTrabajo(), $command->empresa(), $command->nivel(),
            new EmpleoSueldo($command->sueldo()), $command->funciones(), $command->cargoJefe()
        );
    }

    public static function fromModelToArray(EmpleoModel $empleo): array
    {
        return [
            'id' => $empleo->id() ? $empleo->id()->value() : null,
            'trabajador' => $empleo->trabajador(),
            'nombre' => $empleo->nombre()->value(),
            'categoria' => $empleo->categoria(),
            'areaTrabajo' => $empleo->areaTrabajo(),
            'empresa' => $empleo->empresa(),
            'nivel' => $empleo->nivel(),
            'sueldo' => $empleo->sueldo()->value(),
            'funciones' => $empleo->funciones(),
            'cargoJefe' => $empleo->cargoJefe()
        ];
    }
}