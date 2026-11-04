<?php
declare(strict_types=1);
require_once __DIR__ . '/../Ports/In/DeleteEmpleoUseCase.php';
require_once __DIR__ . '/../Ports/Out/DeleteEmpleoPort.php';
require_once __DIR__ . '/../../Domain/ValueObjects/EmpleoId.php';

final class DeleteEmpleoService implements DeleteEmpleoUseCase
{
    private DeleteEmpleoPort $deletePort;

    public function __construct(DeleteEmpleoPort $deletePort)
    {
        $this->deletePort = $deletePort;
    }

    public function execute(DeleteEmpleoCommand $command): void
    {
        $id = new EmpleoId($command->id);
        $this->deletePort->delete($id);
    }
}