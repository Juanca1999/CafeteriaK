Pasos para ejecutar la prueba

Interfaz

1. Instalar xampp

2. Abrir xampp y ejecutar("start") el servicio de apache y el servicio de mysql

3. Cuando los dos servicios esten activos ingresar a local http://localhost/dashboard/ para validar que todo esté correctamente instalado

4. Despues de haber instalado xampp y ejecutado los servicios entramos al disco local C, luego entramos a la carpeta xampp que se crea al momento de instalar xampp y despues entramos a htdocs que es la carpeta donde se alojara la prueba

ejemplo de ruta: "C:\xampp\htdocs\(aqui se alojará la prueba)"

5. Descargamos la prueba cafeteriak.rar descomprimimos el archivo y la carpeta que descromprime la ponemos dentro de htdocs segun el paso 4

6. Luego de poner la prueba en la carpeta htdocs en el navegador abrimos: "http://localhost/cafeteriak/" al principio aparecerán errores o en otro caso sin datos y es por que falta crear la base de datos


Base de datos

7. Dentro de la carpeta cafeteriak hay una carpeta llamada "DATABASE" donde se aloja la base de datos que es "cafeteria.sql" lo que hay que hacer es entrar a http://localhost/phpmyadmin/

8. Luego darle al boton de "importar" y luego a seleccionar archivo ahi escogemos la base de datos "cafeteria.sql" y le damos en importar

9. Una vez tengamos ya la base de datos lista ya solo seria a entrar a "http://localhost/cafeteriaK/index.php" y ya se ejecutaria la prueba sin problemas

NOTA: Ya con todo esto deberia de correr la prueba si al seguir todos estos pasos sigue sin funcionar la prueba por favor hacermelo saber que estaré dispuesto a revisarlo
