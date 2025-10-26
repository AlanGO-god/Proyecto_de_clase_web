<h1>Roles</h1>
<div class="btn-group" role="group" aria-label="Basic mixed styles example">
    <a href="roles.php?action=create" class="btn btn-success">Nuevo</a>
    <a class="btn btn-primary">Imprimir</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">rol</th>
        <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($data as $rol): ?>
        <tr>
        <th scope="row"><? echo $rol['id_rol']; ?></th>
        <td><? echo $rol['rol']; ?></td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a href="roles.php?action=update&id=<? echo $rol['id_rol']; ?>" class="btn btn-warning">Editar</a>
                <a href="roles.php?action=delete&id=<? echo $rol['id_rol']; ?>"  class="btn btn-danger">Eliminar</a>
            </div>
        </td>
        </tr>
        <? endforeach; ?>
    </tbody>