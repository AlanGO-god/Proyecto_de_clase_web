<h1>Nuevo investigador</h1>
<form method="POST" enctype="multipart/form-data" action="investigador.php?action=create">
    <div class="mb-3">
        <label for="primer_apellido" class="form-label">Primer apellido</label>
        <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" placeholder="Primer apellido" required>

        <label for="segundo_apellido" class="form-label">Segundo apellido</label>
        <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" placeholder="Segundo apellido">

        <label for="investigador" class="form-label">Nombre del investigador</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>

        <label for="investigador" class="form-label">Correo electronico</label>
        <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>

        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="pasword" placeholder="Contrsena" required>


        <label for="fotografia" class="form-label">Fotografía</label>
        <input type="file" class="form-control" id="fotografia" name="fotografia" placeholder="foto.npg">

        <label for="id_institucion" class="form-label">Institución</label>
        <select class="form-select" id="id_institucion" name="id_institucion" required>
            <?php foreach ($instituciones as $institucion): ?>
                $selected = '';
                if($data['id_institucion'] == $institucion['id_institucion']){
                    $selected = 'selected';
                   }
                   <option value="<?php echo $institucion['id_institucion']; ?>"><?php echo $institucion['institucion']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="semblance" class="form-label">Semblanza</label>
        <input type="text" class="form-control" id="semblance" name="semblance" placeholder="Semblanza">

        <label for="id_tratamiento" class="form-label">Tratamiento</label>
        <select class="form-select" id="id_tratamiento" name="id_tratamiento" required>
            <?php foreach ($tratamientos as $tratamiento):
                $selected = '';
                if($data['id_tratamiento'] == $tratamiento['id_tratamiento']){
                    $selected = 'selected';
                   }?> 
                <option <?php echo $selected; ?> value="<?php echo $tratamiento['id_tratamiento']; ?>"><?php echo $tratamiento['tratamiento']; ?></option>
            <?php endforeach; ?>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>