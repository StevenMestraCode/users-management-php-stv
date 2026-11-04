<?php
declare(strict_types=1);
require_once __DIR__ . '/../../Services/Dto/Commands/UpdateEmpleoCommand.php';
require_once __DIR__ . '/../../../Domain/Models/EmpleoModel.php';

interface UpdateEmpleoUseCase {
    public function execute(UpdateEmpleoCommand $command): EmpleoModel;
}