<?php
declare(strict_types=1);

final class DeleteEmpleoCommand {
    public function __construct(public readonly string $id) {}
}