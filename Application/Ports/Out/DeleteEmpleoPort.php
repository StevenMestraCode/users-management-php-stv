<?php
declare(strict_types=1);
require_once __DIR__ . '/../../../Domain/ValueObjects/EmpleoId.php';

interface DeleteEmpleoPort {
    public function delete(EmpleoId $id): void;
}