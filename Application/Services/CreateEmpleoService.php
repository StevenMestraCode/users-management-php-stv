<?php
declare(strict_types=1);
require_once __DIR__ . '/../Ports/In/CreateEmpleoUseCase.php';
require_once __DIR__ . '/../Ports/Out/SaveEmpleoPort.php';
require_once __DIR__ . '/Mappers/EmpleoApplicationMapper.php';

final class CreateEmpleoService implements CreateEmpleoUseCase
{
    private SaveEmpleoPort $savePort;
    public function __construct(SaveEmpleoPort $savePort) { $this->savePort = $savePort; }
    public function execute(CreateEmpleoCommand $command): EmpleoModel {
        $empleo = EmpleoApplicationMapper::fromCreateCommandToModel($command);
        return $this->savePort->save($empleo);
    }
}