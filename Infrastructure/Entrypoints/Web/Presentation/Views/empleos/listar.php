<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Empleos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f8f9fa; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 14px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #dee2e6; }
        th { background-color: #343a40; color: white; }
        tr:hover { background-color: #f1f1f1; }
        .btn { padding: 6px 12px; text-decoration: none; border-radius: 4px; color: white; font-size: 12px; margin-right: 5px; border: none; cursor: pointer; }
        .btn-edit { background-color: #007bff; }
        .btn-delete { background-color: #dc3545; }
        .btn-create { background-color: #28a745; display: inline-block; margin-bottom: 15px; padding: 10px 15px; font-size: 14px;}
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Empleos</h1>
        <a href="index.php?route=empleos.crear" class="btn btn-create">➕ Registrar Nuevo Empleo</a>
        <a href="index.php?route=home" style="margin-left: 15px;">Volver al inicio</a>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Trabajador</th>
                    <th>Cargo</th>
                    <th>Empresa</th>
                    <th>Nivel</th>
                    <th>Sueldo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($empleos)): ?>
                    <?php foreach ($empleos as $emp): ?>
                    <tr>
                        <td><?= htmlspecialchars((string)$emp->id()->value()) ?></td>
                        <td><strong><?= htmlspecialchars($emp->trabajador()) ?></strong></td>
                        <td><?= htmlspecialchars($emp->nombre()->value()) ?></td>
                        <td><?= htmlspecialchars($emp->empresa()) ?></td>
                        <td><?= htmlspecialchars($emp->nivel()) ?></td>
                        <td>$<?= number_format($emp->sueldo()->value(), 2) ?></td>
                        <td>
                            <a href="index.php?route=empleos.editar&id=<?= $emp->id()->value() ?>" class="btn btn-edit">Editar</a>
                            <form method="POST" action="index.php?route=empleos.eliminar" style="display:inline;" onsubmit="return confirm('¿Seguro que deseas eliminar este empleo?');">
                                <input type="hidden" name="id" value="<?= $emp->id()->value() ?>">
                                <button type="submit" class="btn btn-delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7" style="text-align: center;">No hay empleos registrados aún.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>