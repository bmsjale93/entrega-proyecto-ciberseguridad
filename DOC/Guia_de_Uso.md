
# Guía de Uso de la Aplicación de Simulación de Phishing

## Introducción
Esta guía proporciona una visión general de cómo utilizar la aplicación de simulación de phishing, diseñada para ayudar a las organizaciones a entrenar a sus empleados en la detección de intentos de phishing. 

La aplicación permite crear campañas de phishing simuladas, enviarlas a los usuarios y analizar los resultados para mejorar las medidas de seguridad en empresas o diferentes apartados.

## Configuración Inicial
1. **Configuración del Ambiente**: Asegúrese de que su servidor web y MySQL estén funcionando. Importe el archivo `phishing_simulator.sql` en su base de datos para crear las tablas necesarias.

2. **Configuración de la Aplicación**: Modifique el archivo `config.sample.php` en la carpeta `assets/database` para incluir los detalles de conexión a su base de datos MySQL. Además, deberás conseguir algún medio para poder enviar los correos. Por mi parte utilice Brevo, la cual no necesita ningún tipo de pago.

## Gestión de Usuarios
- **Acceso y Registro**: Los usuarios pueden registrarse e iniciar sesión a través de `index.php`. Las contraseñas se guardarán en la base de datos de forma hasheada para evitar la filtración de datos sensibles.

- **Perfil de Usuario**: Los usuarios pueden gestionar su información personal a través de `usuario.php`, donde pueden actualizar su información de perfil haciendo click en el botón Editar Información.

## Crear Campañas de Phishing
1. **Acceder a la Creación de Campañas**: Para iniciar el proceso de creación de una campaña sólo debe pulsar encima de `Crear Nueva Campaña`.

2. **Detalles de la Campaña**: Aqui podrás seleccionar entre dos opciones: `Personalizada` y `Predefinida`.

    2.1 *Personalizada*: Deberás rellenar cada campo manualmente para la maquetación del correo que servirá de Simulación de Phishing.

    2.2 *Predefinida*: Podrás seleccionar hasta 5 tipos de campaña diferentes que podrás utilizar para realizar la simulación. Se han escogido casos comunes para el desarrollo de este tipo de campaña.

        Aunque en ambas puedes modificar los diferentes datos que aparecen en los campos del formulario, el link de la URL donde se enviará al usuario viene predefinido en ambos casos para prevenir el uso fraudulento de la aplicación.

3. **Envío de la Campaña**: Una vez hayas rellenado todos los campos podrás enviar la campaña a aquellos usuarios a los que quieras concienciar de los peligros del phishing. Para ello, podrás ingresar manualmente los correos electrónicos (separado por comas) o subir un archivo con formato CSV con los diferentes correos (límite hasta 5MB de peso).

4. **Guardar Campaña**: Finalmente, para guardar la campaña y realizar la simulación de phishing sólo deberás hacer click en `Guardar Campaña` y quedará registrada, así como se realizarán todos los envíos a los correos que has proporcionado.

## Listar y Gestionar Campañas
- **Mis Campañas de Phishing**: En este apartado podrás visualizar cada una de las campañas que has realizado, incluyendo el nombre de la Campaña, una descripción (se sugiere siempre añadir una descripción para entender el concepto de la campaña que se estaba realizando) y la fecha y hora en la que se realizó la campaña para llevar un registro de las mismas.

## Análisis de Resultados
La aplicación recopila datos sobre cómo los usuarios interactúan con los correos electrónicos de phishing, incluyendo si abrieron el correo o hicieron clic en enlaces. Esta información está disponible en el perfil del usuario y ayuda a identificar áreas de mejora en la concienciación sobre seguridad.

- **Usuarios que han recibido la Campaña**: En este apartado se verificará que los correos se han enviado correctamente, apuntando cada email que se ha procesado y el estado de la entrega para verificar que el envio no haya sido fallido.

- **Usuarios en Riesgo de Phishing**: Aqui recogeremos los usuarios que han hecho click en la URL de engaño proporcionada en el correo, pudiendo tomar medidas con este usuario y concienciarlo del peligro de las campañas de Phishing.

- **Estadísticas de la Campaña**: Para una mayor percepción visual, se ofrecen las estadísticas en formato de gráfica para ver el *Total de Envíos*, *Entregados* y los *Clicks* que hayan realizado los usuarios.

## Seguridad y Buenas Prácticas
- **Protección de Datos**: Todos los datos sensibles estén cifrados y protegidos contra accesos no autorizados, además de realizar diferentes validaciones en el código para insertar diferentes datos de forma correcta y la prevención de inyección SQL para impedir accesos no autorizados en la base de datos. 

- **Educación Continua**: Utilice los resultados de las campañas para educar continuamente a los usuarios sobre las amenazas de phishing y cómo evitarlas.

## Próximas Mejoras de la Aplicación
- **Mejora de la Interfaz**: Uno de los próximos pasos a realizar en la aplicación es la mejora de la interfaz, ofreciendo un diseño más avanzado y profesional de la aplicación para su futuro uso en empresas o a nivel usuario. 

- **Ver detalles de las Campañas**: La idea sería abrir cada una de las campañas realizadas y comprobar directamente los envios que se han realizado en dicha campaña, los clicks que se realizaron y poder ver cada campaña de forma individual. 

- **Personalizar aún más los correos**: En este punto, para mejorar este tipo de simulaciones podríamos optar por maquetas predefinidas más avanzadas, mencionando los nombres de los usuarios a los que se les está enviando el correo o añadiendo el logotipo de la empresa que estamos intentando simular. 

- **Otros tipos de simulaciones**: Además de mejorar lo que hay actualmente, podríamos configurar diferentes tipos de campañas de phishing, ya sea por SMS o por voz, por ejemplo. 
##