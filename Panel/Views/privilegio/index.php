<h1>Privilegios</h1>
<div class="btn-group" role="group" aria-label="Basic mixed styles example">
    <a href="privilegios.php?action=create" class="btn btn-success">Nuevo</a>
    <a class="btn btn-primary">Imprimir</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Privilegio</th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($data as $privilegio): ?>
        <tr>
            <td><? echo htmlspecialchars($privilegio['id_privilegio']); ?></td>
            <td><? echo htmlspecialchars($privilegio['privilegio']); ?></td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a href="privilegios.php?action=update&id=<? echo $privilegio['id_privilegio']; ?>" class="btn btn-warning">Editar</a>
                    <a href="privilegios.php?action=delete&id=<? echo $privilegio['id_privilegio']; ?>"  class="btn btn-danger">Eliminar</a>
                </div>
        </tr>
        <? endforeach; ?>
    </tbody>