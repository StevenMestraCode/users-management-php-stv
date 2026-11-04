<h1>Lista de Empleos</h1>
<a href="index.php?route=empleos.crear">➕ Crear Nuevo Empleo</a>
<br><br>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
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
                <td><?= htmlspecialchars($emp->nombre()->value()) ?></td>
                <td><?= htmlspecialchars($emp->categoria()) ?></td>
                <td><?= htmlspecialchars($emp->empresa()) ?></td>
                <td><?= htmlspecialchars($emp->nivel()) ?></td>
                <td>$<?= number_format($emp->sueldo()->value(), 2) ?></td>
                <td>
                   
                    <span>Ver</span>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" style="text-align: center;">No hay empleos registrados aún.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>