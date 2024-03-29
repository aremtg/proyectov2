
<div>
    <h1 class='panel-heading'>Agregar instructor</h1>
        <form action="./php/guardar_datos_instructores_aprendices.php" class="box" method="POST">
            <div class="field">
                <div class="control">
                    <label class="label">Titulada: <a class="tag is-success js-modal-trigger" id="modal-tituladas" data-target="modal_titu">Buscar</a></label>
                    <?php
                        if(isset($_POST['id_titulada'])){
                        include('./php/mostrar_titulada.php');
                        }else{
                                echo'
                                <input class="input" type="text" value="" disabled>
                                <input type="hidden" name="titulada">
                                <input type="hidden" class="input" name="ntitulada" value="" >
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <label class="label">Ficha titulada:</label>
                    <input class="input" type="text" value="" disabled>
                    <input type="hidden" name="ficha"  >
                </div>
            </div>
                ';}
            ?>
            <div class="field">
                <label class="label" for="nombreInstructor">Nombre del Instructor:</label>
                <div class="control">
                    <input class="input" type="text" id="nombreInstructor" name="nombre_instructor" required>
                </div>
            </div>

            <div class="field">
                <label class="label" for="contacto">Contacto:</label>
                <div class="control">
                    <input class="input" type="text" id="contacto" name="contacto" placeholder="Contacto" required>
                </div>
            </div>

            
            <div class="field">
                <label class="label" for="ambiente">Ambiente:</label>
                <div class="control">
                    <input class="input" type="text" id="ambiente" name="ambiente" placeholder="Ambiente" required>
                </div>
            </div>
    
            <div class="field">
                <div class="my-center-gap">
                    <button id="botonEnviar" type="submit" class="my-button button-clr-verde">
                    <img src="images/iconos/save-icon-b.svg" class="icon" alt="">Agregar instructor</button>
                </div>
            </div>
        </form>
        <br>
        <?php if (isset($_SESSION['guardar'])) : ?>

        <div class='message is-success'>
            <?= $_SESSION['guardar']; ?>
        </div>

        <?php elseif (isset($_SESSION['aprendizYaExiste'])) : ?>
        <div class='message is-danger '>
            <?= $_SESSION['aprendizYaExiste']; ?>
        </div>
        <?php endif; ?>

        <div class="mb-3">
        <?= isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'], 'aprendizYaExiste') : ""; ?>
        </div>

        <h1 class='panel-heading'>Agregar aprendiz a un instructor</h1>
            <form action="./php/guardar_datos_instructores_aprendices.php" method="POST" class='box'>
                <?php
                    $sql = "SELECT id_instructor, nombre FROM instructores";
                    $resultado = $db->query($sql);
                    if ($resultado->num_rows > 0) {
                        echo '<label for="instructor" class="label" >Seleccionar Instructor:</label>';
                        echo '<select name="instructor" id="instructor" class="my-select">';
                        while ($fila = $resultado->fetch_assoc()) {
                            echo '<option value="' . $fila['id_instructor'] . '">' . $fila['nombre'] . '</option>';
                        }
                        echo '</select>';
                    } else {
                        echo 'No hay instructores disponibles, ve a agregar un instructor </br>';
                    }
                ?>
            <label for="aprendices" class="label" >Agregar Aprendiz:</label>
            <input type="text" class="input" name="aprendiz" placeholder="Nombre del Aprendiz">
                <br><br>
                <div class="my-center-gap">
                <button id="botonEnviar" type="submit" class="my-button button-clr-verde">
                    <img src="images/iconos/save-icon-b.svg"  class="icon" alt="">Agregar aprendiz</button>
                </div>
            </form> 
</div>
<?php BorrarErrores(); ?>

<!-- ### SECCION PARA BUSCAR TITULADAS ### -->
<div class="modal" id="modal_titu">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <h3 class="modal-card-title my-center-gap">Buscar titulada</h3>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <!-- contenido del modal -->

                <div class="is-flex is-flex-direction-column">
                    <label for="buscar_titulada" class="label mr-4">Introduce nombre o # de ficha:</label>
                    <input type="text" class="input mb-4" id="texto-busqueda">
                </div>

                <div id="resultado-busqueda" class="mb-3"></div> 
            <form action="" method="POST" autocomplete="off" id="miFormulario">
                <input type="hidden" value="" name="id_titulada" id="mostrarInput">
                <button type="submit" class="button is-success title is-6" id="guardarBtn">Seleccionar</button>
        </form>
        </section>
    </div>
</div>
<!-- SE ACABA LA SECCION DEL MODAL -->

</div>

<script src="./js/funcion_select_tituladas.js"></script>
<script src="./js/modal.js"></script>