        <!-- **** CONTENIDOS **** -->
        <div class="main-container">
            <div class="main wrapper clearfix">

                <article>
                    <header>
                        <h1>Artículo de ejemplo</h1>
                        <p>Este es un artículo de ejemplo, ingresado a la base de datos el 9/12/13 para realizar pruebas con el modelo database.php.</p>
                    </header>
                    <footer>
                        <h3>Sub-título o sección</h3>
                        <p>Cada subsección es procesada por el modelo de contenidos antes de ser ubicada en la base de datos y almacenada en propia columna dentro de la tabla de artículos. La idea tras esto, es por ejemplo si se quiere implementar un sitio que tenga distintos niveles de acceso, como lo es el de administración de un laboratorio, se le pueda dar distinto nivel de información a los usuarios según sea el nivel de su ID de acceso. </p>
                    </footer>
                </article>

                <aside>
                    <h3>Mapa de ejemplo</h3>
                    <p>La función de este mapa es demostrar los recuadros <i>aside</i> dinámicos que se pueden inyectar en el controlador de artículos.</p>
                    <div id="map"></div>
                </aside>

                <article>
                    <header>
                        <h1>Segundo artículo de ejemplo</h1>
                        <p>Por ahora el despliegue de artículos es sequencial, es decir se publica primero el más antiguo en la base de datos, por lo que este, al ser el segundo ingresado debería aparecer detrás del primer artículo en el orden de publicación.</p>
                        <p>En el futuro se implementaran nuevas funcionalidades de despliegue.</p>
                    </header>
                </article>                
            </div> <!-- #main -->
        </div> <!-- #main-container -->