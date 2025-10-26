<h1>Usuarios</h1>
<div class="btn-group" role="group" aria-label="Basic mixed styles example">
    <a href="usuarios.php?action=create" class="btn btn-success">Nuevo</a>
    <a class="btn btn-primary">Imprimir</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Correo</th>
        </tr>
    </thead>
    <tbody>
        <? foreach($data as $usuario):?>
        <tr>
            <th scope="row"> <? echo $usuario['id_usuario'];?> </th>
            <td> <? echo $usuario['correo'];?> </td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a href="usuarios.php?action=update&id=<? echo $usuario['id_usuario']; ?>" class="btn btn-warning">Editar</a>
                    <a href="usuarios.php?action=delete&id=<? echo $usuario['id_usuario']; ?>"  class="btn btn-danger">Eliminar</a>
                </div>
            </td>
        </tr>
      <? endforeach; ?>
    </tbody>
</table>