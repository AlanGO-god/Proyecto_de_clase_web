<h1>Modificar investigador</h1>
<form method="POST" action="investigador.php?action=update&id=<?php echo $id; ?>">
    <div class="mb-3">
        <label for="primer_apellido" class="form-label">Primer apellido</label>
        <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" value="<?php echo $data['primer_apellido']; ?>" placeholder="Primer apellido" required>
        <label for="segundo_apellido" class="form-label">Segundo apellido</label>
        <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" value="<?php echo $data['segundo_apellido']; ?>" placeholder="Segundo apellido">
        <label for="investigador" class="form-label">Nombre del investigador</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data['nombre']; ?>" placeholder="Nombre" required>
        <label for="fotografia" class="form-label">Fotografía</label>
        <input type="text" class="form-control" id="fotografia" name="fotografia" value="<?php echo $data['fotografia']; ?>" placeholder="foto.png">
        <label for="id_institucion" class="form-label">Institución</label>
        <input type="number" class="form-control" id="id_institucion" name="id_institucion" value="<?php echo $data['id_institucion']; ?>" placeholder="1">
        <label for="semblance" class="form-label">Semblanza</label>
        <input type="text" class="form-control" id="semblance" name="semblance" value="<?php echo $data['semblance']; ?>" placeholder="Semblanza">
        <label for="id_tratamiento" class="form-label">Tratamiento</label>
        <input type="number" class="form-control" id="id_tratamiento" name="id_tratamiento" value="<?php echo $data['id_tratamiento']; ?>" placeholder="1">
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>