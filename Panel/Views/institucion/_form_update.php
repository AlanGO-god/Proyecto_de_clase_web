<h1>Editar Institucion</h1>
<form method="POST" action="instituciones.php?action=update&id=<?= $id; ?>">
    
    <div class="mb-3">
        <label for="Institucion" class="form-label">Nombre de la Institucion</label>
        <input type="text" class="form-control" id="institucion"
         name="institucion" value="<?=$data['institucion']; ?>" placeholder="TecNM" require >
    </div> 
    <div class="mb-3">
        <label for="logotipo" class="form-label">logotipo</label>
        <input type="text" class="form-contgrol" id="logotipo" name="logotipo" value="<?php echo $data['logotipo']; ?>" placeholder="logo.png">
    </div>
    <dic class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>