<h1 id="title_members" class="text-center mb-4">Miembros Investigadores de la red</h1>

<section class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Fotografia</th>
                <th scope="col">Semblanza</th>
                <th scope="col">Institución</th>
            </tr>
        </thead>
        <tbody class="align-middle">
<?php
                foreach ($investigadores as $investigador) {
                    echo "<tr>";
                        echo "<td>" . $investigador['primer_apellido'] . $investigador['segundo_apellido'] . $investigador['nombre'] ."</td>";
                        echo "<td>" . $investigador['fotografia'] ."</td>";
                        echo "<td>" . $investigador['semblanza'] ."</td>";
                        echo "<td>" . $investigador['id_institucion'] ."</td>";
                    echo "<tr>";
                } 
?>
        </tbody>      
        </tbody>
    </table>
</section>