<?php
declare(strict_types=1);
require_once __DIR__ . '/../Ports/In/UpdateEmpleoUseCase.php';
require_once __DIR__ . '/../Ports/Out/UpdateEmpleoPort.php';
require_once __DIR__ . '/Mappers/EmpleoApplicationMapper.php';

final class UpdateEmpleoService implements UpdateEmpleoUseCase
{
    private UpdateEmpleoPort $updatePort;

    public function __construct(UpdateEmpleoPort $updatePort)
    {
        $this->updatePort = $updatePort;
    }

    public function execute(UpdateEmpleoCommand $command): EmpleoModel
    {
       
        $empleo = EmpleoApplicationMapper::fromUpdateCommandToModel($command);
        return $this->updatePort->update($empleo);
    }
}