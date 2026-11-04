<?php
declare(strict_types=1);
require_once __DIR__ . '/../../Services/Dto/Commands/CreateEmpleoCommand.php';
require_once __DIR__ . '/../../../Domain/Models/EmpleoModel.php';

interface CreateEmpleoUseCase {
    public function execute(CreateEmpleoCommand $command): EmpleoModel;
}