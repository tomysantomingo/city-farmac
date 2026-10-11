<section class="contacto">

    <h2>Contactanos</h2>

    <p class="contacto-descripcion">
        ¿Tenés alguna consulta o sugerencia?
        Completá el siguiente formulario para comunicarte
        con nosotros.
    </p>

    <?php

        $mensajeAviso = $_SERVER['REQUEST_METHOD'] === 'POST'
            ? 'Formulario de demostración: tu mensaje no fue enviado.'
            : '';

        require __DIR__ . '/../components/aviso.php';
        
    ?>

    <form
        class="contacto-formulario"
        method="POST"
        action="<?= BASE_URL ?>/index.php?page=contacto"
    >

        <div class="contacto-fila">

            <div class="contacto-campo">
                <label for="nombre">Nombre</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    placeholder="Ingresá tu nombre"
                    autocomplete="given-name"
                    required
                >
            </div>

            <div class="contacto-campo">
                <label for="apellido">Apellido</label>
                <input
                    type="text"
                    id="apellido"
                    name="apellido"
                    placeholder="Ingresá tu apellido"
                    autocomplete="family-name"
                    required
                >
            </div>

        </div>

        <div class="contacto-fila">

            <div class="contacto-campo">
                <label for="email">Correo electrónico</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="ejemplo@correo.com"
                    autocomplete="email"
                    required
                >
            </div>

            <div class="contacto-campo">
                <label for="telefono">Teléfono</label>
                <input
                    type="tel"
                    id="telefono"
                    name="telefono"
                    placeholder="Ingresá tu teléfono"
                    autocomplete="tel"
                    minlength="6"
                    maxlength="20"
                    required
                >
            </div>

        </div>

        <div class="contacto-campo">

            <label for="area">Área de la empresa</label>

            <select id="area" name="area" required>
                <option value="">Seleccioná un área</option>
                <option value="atencion">Atención al cliente</option>
                <option value="ventas">Ventas</option>
                <option value="administracion">Administración</option>
                <option value="rrhh">Recursos Humanos</option>
            </select>

        </div>

        <div class="contacto-campo">

            <label for="comentario">Comentario</label>

            <textarea
                id="comentario"
                name="comentario"
                rows="6"
                placeholder="Escribí tu consulta..."
                required
            ></textarea>

        </div>

        <button type="submit" class="contacto-boton">
            Enviar mensaje
        </button>

    </form>

</section>