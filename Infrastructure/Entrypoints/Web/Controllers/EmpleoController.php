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
        require_once __DIR__ . '/../Presentation/Views/empleos/crear.php';
    }

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $command = new CreateEmpleoCommand(
                    $_POST['trabajador'], 
                    $_POST['nombre'], 
                    $_POST['categoria'], 
                    $_POST['area_trabajo'], 
                    $_POST['empresa'], 
                    $_POST['nivel'], 
                    (float)$_POST['sueldo'], 
                    $_POST['funciones'], 
                    $_POST['cargo_jefe']
                );
                
                $this->createUseCase->execute($command);
                
                header('Location: index.php?route=empleos.listar');
                exit;
            } catch (\Throwable $e) {
                // --- MODO DIAGNÓSTICO ---
                echo "<div style='background: #f8d7da; color: #721c24; padding: 20px; border: 1px solid #f5c6cb; margin: 20px; font-family: monospace;'>";
                echo "<h2>⚠️ Error detectado al guardar el empleo:</h2>";
                echo "<p><strong>Mensaje:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
                echo "<p><strong>Archivo:</strong> " . htmlspecialchars($e->getFile()) . "</p>";
                echo "<p><strong>Línea:</strong> " . $e->getLine() . "</p>";
                echo "</div>";
                die();
            }
        }
    }

    public function editar(): void
    {
        $id = $_GET['id'] ?? null;
        
        if ($id) {
            $query = new GetEmpleoByIdQuery($id);
            $empleo = $this->getByIdUseCase->execute($query);
            
            require_once __DIR__ . '/../Presentation/Views/empleos/editar.php';
        } else {
            header('Location: index.php?route=empleos.listar');
            exit;
        }
    }

    public function actualizar(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $command = new UpdateEmpleoCommand(
                $_POST['id'],
                $_POST['trabajador'], 
                $_POST['nombre'], 
                $_POST['categoria'], 
                $_POST['area_trabajo'], 
                $_POST['empresa'], 
                $_POST['nivel'], 
                (float)$_POST['sueldo'], 
                $_POST['funciones'], 
                $_POST['cargo_jefe']
            );
            
            $this->updateUseCase->execute($command);
            
            header('Location: index.php?route=empleos.listar');
            exit;
        }
    }

    public function eliminar(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $command = new DeleteEmpleoCommand($_POST['id']);
            
            $this->deleteUseCase->execute($command);
            
            header('Location: index.php?route=empleos.listar');
            exit;
        }
    }
}