<?php
declare(strict_types=1);
require_once __DIR__ . '/../../../Domain/Models/EmpleoModel.php';

interface UpdateEmpleoPort {
    public function update(EmpleoModel $empleo): EmpleoModel;
}