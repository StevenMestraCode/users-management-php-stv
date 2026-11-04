<?php
declare(strict_types=1);
require_once __DIR__ . '/../../Services/Dto/Queries/GetEmpleoByIdQuery.php';
require_once __DIR__ . '/../../../Domain/Models/EmpleoModel.php';

interface GetEmpleoByIdUseCase {
    public function execute(GetEmpleoByIdQuery $query): EmpleoModel;
}