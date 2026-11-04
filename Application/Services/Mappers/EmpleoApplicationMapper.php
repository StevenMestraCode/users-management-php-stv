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
            new EmpleoNombre($command->nombre()),
            $command->categoria(),
            $command->areaTrabajo(),
            $command->empresa(),
            $command->nivel(),
            new EmpleoSueldo($command->sueldo()),
            $command->funciones(),
            $command->cargoJefe()
        );
    }

    public static function fromUpdateCommandToModel(UpdateEmpleoCommand $command): EmpleoModel
    {
        return new EmpleoModel(
            new EmpleoId($command->id()),
            new EmpleoNombre($command->nombre()),
            $command->categoria(),
            $command->areaTrabajo(),
            $command->empresa(),
            $command->nivel(),
            new EmpleoSueldo($command->sueldo()),
            $command->funciones(),
            $command->cargoJefe()
        );
    }
}