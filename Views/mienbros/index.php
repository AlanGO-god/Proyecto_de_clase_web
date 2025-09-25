<main style="flex-direction: column;">
        <h1>Mienbros investigadores de la red</h1>
        <section>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Foto</th>
                    <th>Institucion</th>
                </tr>
                <?php
                foreach ($investigadores as $investigador) {
                    echo "<tr>";
                        echo "<td>" . $investigador['primer_apellido'] .' ' . $investigador['segundo_apellido'] .' ' . $investigador['nombre'] ."</td>";
                        echo "<td>" . $investigador['fotografia'] ."</td>";
                        echo "<td>" . $investigador['id_institucion'] ."</td>";
                    echo "<tr>";
                } 
                ?>
                <br>
            </table>
        </section>
    </main>