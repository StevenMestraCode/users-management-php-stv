<?php
declare(strict_types=1);
require_once __DIR__ . '/../../../Domain/Models/EmpleoModel.php';

interface GetAllEmpleosPort {
    public function getAll(): array;
}