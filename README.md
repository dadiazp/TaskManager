# TaskManager

Proyecto compuesto de los distintos desafios propuestos para el mismo.

En la estructura del mismo se encuentran las respuestas a los desafios 1, 3 y 5.

* [InvoiceController.php] -> Desafios 1 y 3
* [Tasks.php] -> Desafio 5

## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local._

### Pre-requisitos 📋

_Para ejecutar localmente en primer lugar clone este repositorio y obtenga los ultimos cambios._

_No olvides crear tu .env y generar una key._

```
php artisan key:generate
```

_Crea tu base de datos locaL. Este proyecto en particular usó postgress como Sistema gestor de base de datos, pero perfectamente es funcional
con cualquier otro sistema relacional_.

_Una vez creada tu base de datos recuerda añadir las credenciales en el .env al igual que cambiar el nombre de la conexión en config/database.php segun tu manejador de base de datos._

_Finalmente, ya solo queda correr las migraciones y seeds._

```
php artisan migrate:refresh --seed
```

## Despliegue 📦

_Para correr el proyecto inicia el servidor de tu preferencia, bien sea Laragon, Wamp, Xamp, Mamp, etc._

## Construido con 🛠️

* [Laravel 8.12](https://laravel.com/docs/8.x) - El framework web usado
* [Livewire 2.5](https://laravel-livewire.com/docs/2.x/quickstart) - Scaffolding utilizado para este proyecto
* [Bootstrap 4.6](https://getbootstrap.com/docs/4.6/getting-started/introduction/) - Framework CSS
* [MySQL](https://dev.mysql.com/doc/) - Manejador de Base de datos


## Autores ✒️

* **Daniel Díaz** - [dadiazp](https://github.com/dadiazp)

---
⌨️ con ❤️ por [dadiazp](https://github.com/dadiazp) 😊
