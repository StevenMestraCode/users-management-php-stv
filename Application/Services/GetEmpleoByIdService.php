<?php
declare(strict_types=1);
require_once __DIR__ . '/../Ports/In/GetEmpleoByIdUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetEmpleoByIdPort.php';
require_once __DIR__ . '/../../Domain/ValueObjects/EmpleoId.php';

final class GetEmpleoByIdService implements GetEmpleoByIdUseCase
{
    private GetEmpleoByIdPort $getPort;

    public function __construct(GetEmpleoByIdPort $getPort)
    {
        $this->getPort = $getPort;
    }

    public function execute(GetEmpleoByIdQuery $query): EmpleoModel
    {
        $id = new EmpleoId($query->id);
        $empleo = $this->getPort->getById($id);

        if ($empleo === null) {
            throw new Exception("Empleo no encontrado");
        }

        return $empleo;
    }
}