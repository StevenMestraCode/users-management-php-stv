<?php
declare(strict_types=1);
require_once __DIR__ . '/../../Services/Dto/Queries/GetAllEmpleosQuery.php';
require_once __DIR__ . '/../../../Domain/Models/EmpleoModel.php';

interface GetAllEmpleosUseCase {
    public function execute(GetAllEmpleosQuery $query): array;
}