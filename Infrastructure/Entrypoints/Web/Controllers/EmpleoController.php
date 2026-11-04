<?php
declare(strict_types=1);

class EmpleoController
{
    private CreateEmpleoUseCase $createUseCase;
    private GetAllEmpleosUseCase $getAllUseCase;
    private UpdateEmpleoUseCase $updateUseCase;
    private DeleteEmpleoUseCase $deleteUseCase;
    private GetEmpleoByIdUseCase $getByIdUseCase;

    public function __construct(
        CreateEmpleoUseCase $createUseCase,
        GetAllEmpleosUseCase $getAllUseCase,
        UpdateEmpleoUseCase $updateUseCase,
        DeleteEmpleoUseCase $deleteUseCase,
        GetEmpleoByIdUseCase $getByIdUseCase
    ) {
        $this->createUseCase = $createUseCase;
        $this->getAllUseCase = $getAllUseCase;
        $this->updateUseCase = $updateUseCase;
        $this->deleteUseCase = $deleteUseCase;
        $this->getByIdUseCase = $getByIdUseCase;
    }

    public function listar(): void
    {
        $query = new GetAllEmpleosQuery();
        $empleos = $this->getAllUseCase->execute($query);
        
        require_once __DIR__ . '/../Presentation/Views/empleos/listar.php';
    }

    public function crear(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $command = new CreateEmpleoCommand(
                $_POST['nombre'], $_POST['categoria'], $_POST['area_trabajo'], 
                $_POST['empresa'], $_POST['nivel'], (float)$_POST['sueldo'], 
                $_POST['funciones'], $_POST['cargo_jefe']
            );
            
            $this->createUseCase->execute($command);
            
            header('Location: index.php?route=empleos.listar');
            exit;
        }
        
        require_once __DIR__ . '/../Presentation/Views/empleos/crear.php';
    }
}