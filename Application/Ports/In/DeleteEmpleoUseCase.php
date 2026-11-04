<?php
declare(strict_types=1);
require_once __DIR__ . '/../../Services/Dto/Commands/DeleteEmpleoCommand.php';

interface DeleteEmpleoUseCase {
    public function execute(DeleteEmpleoCommand $command): void;
}