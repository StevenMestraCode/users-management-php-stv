<?php
declare(strict_types=1);
require_once __DIR__ . '/../../../Domain/Models/EmpleoModel.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EmpleoId.php';

interface GetEmpleoByIdPort {
    public function getById(EmpleoId $id): ?EmpleoModel;
}