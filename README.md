
# Sistema CONCO

El **Sistema CONCO** es una aplicación desarrollada para la gestión de información del Consejo Comunal Prados de Occidente. Este sistema sigue el patrón MVC (Modelo-Vista-Controlador) y utiliza una variedad de tecnologías y enfoques para garantizar la seguridad y la eficiencia en la manipulación de datos.

## Tecnologías y enfoques utilizados

- **Patrón MVC**: El sistema sigue el patrón de diseño Modelo-Vista-Controlador para organizar el código de manera eficiente y mantener una separación clara de las responsabilidades.

- **Programación Orientada a Objetos (POO)**: Se utiliza POO para estructurar el código en clases y objetos, lo que facilita la reutilización y el mantenimiento.

- **PDO (PHP Data Objects)**: Se utiliza PDO para interactuar con la base de datos, lo que garantiza una comunicación segura y eficiente.

- **ORM (Mapeo Objeto-Relacional)**: Se implementa un ORM para mapear objetos PHP a tablas de base de datos, simplificando la interacción con la base de datos.

- **Seguridad AES y RSA**: Se aplican técnicas de cifrado AES y RSA para proteger la información sensible almacenada en el sistema.

- **Cifrado de URL**: Se implementa un cifrado de URL para proteger los datos transmitidos a través de las URL.

- **Seguridad Anti Inyecciones SQL**: Se adoptan medidas de seguridad para prevenir las inyecciones SQL y garantizar la integridad de los datos.

- **Validación de Backend**: Se realiza una validación exhaustiva en el backend para garantizar la integridad y la consistencia de los datos.

## Estructura de carpetas

- `app`
  - Contiene varios archivos relacionados con la aplicación.
- `config`
  - `css`
  - `img`
  - `js`
  - `plugins` (Frameworks como jQuery, Bootstrap, etc.)
  - `scss`
- `controlador`
  - Contiene controladores de la aplicación.
  - `backend`
    - Contiene archivos de validación específicos para la parte posterior.
- `modelo`
  - `BD`
    - Contiene archivos relacionados con la base de datos.
- `phpunit.xml`
- `tests`
  - Contiene archivos relacionados con pruebas.
- `traits`
  - Contiene archivos de traits.
- `vendor`
  - Directorio de paquetes de terceros.
- `vista`
  - `privado` Archivos privados del sistema
  - `publico` Archivos publicos
 
