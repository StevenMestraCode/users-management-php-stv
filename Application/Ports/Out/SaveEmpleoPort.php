<?php
declare(strict_types=1);
require_once __DIR__ . '/../../../Domain/Models/EmpleoModel.php';

interface SaveEmpleoPort {
    public function save(EmpleoModel $empleo): EmpleoModel;
}