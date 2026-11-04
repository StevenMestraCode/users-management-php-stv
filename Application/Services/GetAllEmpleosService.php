<?php
declare(strict_types=1);
require_once __DIR__ . '/../Ports/In/GetAllEmpleosUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetAllEmpleosPort.php';

final class GetAllEmpleosService implements GetAllEmpleosUseCase
{
    private GetAllEmpleosPort $getAllPort;
    public function __construct(GetAllEmpleosPort $getAllPort) { $this->getAllPort = $getAllPort; }
    public function execute(GetAllEmpleosQuery $query): array { return $this->getAllPort->getAll(); }
}