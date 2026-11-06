<h1>Editar Empleo</h1>
<form method="POST" action="index.php?route=empleos.actualizar" style="max-width: 500px;">
    <input type="hidden" name="id" value="<?= $empleo->id()->value() ?>">
    <div><label>Trabajador (Nombre):</label><br><input type="text" name="trabajador" value="<?= htmlspecialchars($empleo->trabajador()) ?>" required style="width:100%; padding:8px;"></div><br>
    <div><label>Cargo:</label><br><input type="text" name="nombre" value="<?= htmlspecialchars($empleo->nombre()->value()) ?>" required style="width:100%; padding:8px;"></div><br>
    <div><label>Categoría:</label><br><input type="text" name="categoria" value="<?= htmlspecialchars($empleo->categoria()) ?>" required style="width:100%; padding:8px;"></div><br>
    <div><label>Área de Trabajo:</label><br><input type="text" name="area_trabajo" value="<?= htmlspecialchars($empleo->areaTrabajo()) ?>" required style="width:100%; padding:8px;"></div><br>
    <div><label>Empresa:</label><br><input type="text" name="empresa" value="<?= htmlspecialchars($empleo->empresa()) ?>" required style="width:100%; padding:8px;"></div><br>
    <div><label>Nivel:</label><br><input type="text" name="nivel" value="<?= htmlspecialchars($empleo->nivel()) ?>" required style="width:100%; padding:8px;"></div><br>
    <div><label>Sueldo:</label><br><input type="number" step="0.01" name="sueldo" value="<?= $empleo->sueldo()->value() ?>" required style="width:100%; padding:8px;"></div><br>
    <div><label>Funciones:</label><br><textarea name="funciones" style="width:100%; padding:8px;"><?= htmlspecialchars($empleo->funciones()) ?></textarea></div><br>
    <div><label>Cargo del Jefe:</label><br><input type="text" name="cargo_jefe" value="<?= htmlspecialchars($empleo->cargoJefe()) ?>" style="width:100%; padding:8px;"></div><br>
    <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">Actualizar Empleo</button>
    <a href="index.php?route=empleos.listar">Cancelar</a>
</form>