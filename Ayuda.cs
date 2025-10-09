using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MVC
{
    internal class Ayuda
    {
        public static void comandos(string[] args)
        {
            if (args.Length == 2)
            {
                switch (args[1])
                {
                    case "activerecord":
                        activerecord();
                        break;
                    case "router":
                        ayudaRouter();
                        break;
                    case "config":
                        ayudaConfig();
                        break;
                    case "create":
                        ayudaCreate();
                        break;
                    case "list":
                        ayudaList();
                        break;
                    case "details":
                        ayudaDetails();
                        break;
                    case "add":
                        ayudaAdd();
                        break;
                    case "remove":
                        ayudaRemove();
                        break;
                    case "modify":
                        ayudaModifica();
                        break;
                    case "cookie":
                        ayudaCookie();
                        break;
                    case "session":
                        ayudaSession();
                        break;
                    case "css":
                        ayudaCSS();
                        break;
                    case "open":
                        ayudaOpen();
                        break;
                    default:
                        Console.WriteLine("No puedo ofrecer ayuda de eso. Los parámetros válidos para la ayuda son: activerecord, router, config, create, list, details");
                        break;
                }
            }
            else
            {
                Mensajes.lineaAyuda("Lima", " es un framework en PHP para crear webs usando MVC (modelo vista controlador) creado por David Martínez Leal (2025)\n");
                Console.WriteLine("A continuación se detalla una lista de parámetros:\n");
                Mensajes.lineaAyuda("\nversion\t\t", "Muestra la versión del programa\n");
                Mensajes.lineaAyuda("install\t\t", "Instala el framework.\n");

                Mensajes.lineaAyuda("config\t\t", "Se usa para hacer distintas configuraciones, para más ayuda teclear lima help config\n");
                Mensajes.lineaAyuda("create\t\t", "Se usa para crear modelos, controladores, rutas..., para más ayuda teclear lima help create\n");
                Mensajes.lineaAyuda("list\t\t", "Se usa para listar modelos, controladores, rutas..., para más ayuda teclear lima help list\n");
                Mensajes.lineaAyuda("details\t\t", "Se usa para ver detalles de modelos, controladores, rutas..., para más ayuda teclear lima help details\n");
                Mensajes.lineaAyuda("add\t\t", "Se usa para añadir a elementos ya creados, para más ayuda teclear lima help add\n");
                Mensajes.lineaAyuda("modify\t\t", "Se usa para modificar elementos ya creados, para más ayuda teclear lima help modify\n");
                Mensajes.lineaAyuda("remove\t\t", "Se usa para eliminar elementos ya creados, para más ayuda teclear lima help remove\n");
                Mensajes.lineaAyuda("open\t\t", "Se usa para abrir en el editor que tenga asignado el archivo seleccionado, para más ayuda teclear lima help open\n");
                Mensajes.lineaAyuda("seo [error]\t", "Muestra algunos errores básicos en el SEO de las vistas. Si se pone error, ignorará los warnings");
                Console.WriteLine("También puede ofrecer ayuda de las clases teclenado lima help activerecord o lima help router, lima help cookie, lima help session o lima help css");
            }
        }

        private static void ayudaOpen()
        {
            Console.WriteLine("Open se usa para abrir archivos en su IDE o editor. Los valores válidos son:");
            Mensajes.lineaAyuda("view nombre_vista\t\t", "Abre la vista especificada.\n");
            Mensajes.lineaAyuda("controller nombre_controlador\t", "Abre el controlador espeficado.\n");
            Mensajes.lineaAyuda("model nombre_modelo\t\t", "Abre el modelo especificado.\n");
            Mensajes.lineaAyuda("middleware\t\t", "Abre el archivo de la clase Middleware.\n");
            Mensajes.lineaAyuda("migrations\t\t", "Abre el archivo de la clase Migrations.\n");
            Mensajes.lineaAyuda("include\t\t\t\t", "Abre el archivo con los includes para cargar siempre un controlador.\n");
            Mensajes.lineaAyuda("route\t\t\t\t", "Abre el archivo con las definiciones de rutas.\n");
            Mensajes.lineaAyuda("define\t\t\t\t", "Abre el archivo con las definicioens de constantes.\n");
        }

        private static void ayudaModifica()
        {
            Console.WriteLine("Modify puede modificar elementos ya creados. Los valores válidos son:");
            Mensajes.lineaAyuda("route [URL] [nomiddleware]\t", "Modifica una definición de una ruta ya creada. \n\t\t\t\tSi se añado nomiddleware, elimina el middleware que tenga definido.\n");
            Mensajes.lineaAyuda("middleware [nombre]\t", "Modifica un Middleware ya creado.\n");
        }

        private static void ayudaRemove()
        {
            Console.WriteLine("Remove puede eliminar a elementos ya creados. Los valores válidos son:");
            Mensajes.lineaAyuda("route [URL]\t\t\t\t\t", "Elimina una ruta ya definida.\n");
            Mensajes.lineaAyuda("middleware [nombre] [controlador] [método]\t", "Elimina un middleware ya definido.\n");
        }

        private static void ayudaAdd()
        {
            Console.WriteLine("Add puede añadir a elementos ya creados. Los valores válidos son:");
            Mensajes.lineaAyuda("middleware [URL]\t", "Añade una llamada a middleware en una ruta que está previamente definida.\n");
            Mensajes.lineaAyuda("bootstrap\t\t", "Añade la librería de CSS Bootstrap.\n");
        }

        private static void ayudaConfig()
        {
            Console.WriteLine("Config puede configurar varios apartados del framework, hay que especificar en otro parámetro que es lo que vamos a confiurar. Los valores válidos son:");
            Mensajes.lineaAyuda("home404 true|false\t\t", "En un error 404 redirecciona a la home (true) o a la vista error404.php (false)\n");
            Mensajes.lineaAyuda("title\t\t\t\t", "Establece un título por defecto a la web\n");
            Mensajes.lineaAyuda("description\t\t\t", "Establece una descripción por defecto a la web\n");
            Mensajes.lineaAyuda("db\t\t\t\t", "Configura el acceso a la base de datos.\n");
            Mensajes.lineaAyuda("define [constante]\t\t", "Crea o modifica una constante del fichero de definiciones de constantes.\n");
            Mensajes.lineaAyuda("controller [controlador]\t", "Hace que el controlador se cargue siempre.\n");
            Mensajes.lineaAyuda("apache ruta\t\t\t", "Define la ruta de apache.\n");
        }
        private static void ayudaCreate()
        {
            Console.WriteLine("Create puede crear tanto modelos, controladores..., que hay que especificar en otro parámetro. Los valores válidos son:");
            Mensajes.lineaAyuda("project nombre [novrhost]\t", "Crea un nuevo proyecto, creando toda la estructura necesaria y host virtual (opcional).\n");
            Mensajes.lineaAyuda("vrhost\t\t\t", "Crea host virtual para acceder a la web en local.\n");
            Mensajes.lineaAyuda("model [nombre]\t\t", "Crea un modelo.\n");
            Mensajes.lineaAyuda("controller [nombre]\t", "Crea un controlador.\n");
            Mensajes.lineaAyuda("migration [tabla]\t", "Crea una migración de una tabla en la base de datos.\n");
            Mensajes.lineaAyuda("route [/direccion] [view]\t", "Crea una ruta válida y se la asigna a un método de un controlador o vista si incluye view.\n");
            Mensajes.lineaAyuda("middleware [nombre]\t", "Crea una Middleware de forma general.\n");
            Mensajes.lineaAyuda("form\t\t\t", "Crea un formulario en una vista.\n");
        }
        private static void ayudaList()
        {
            Console.WriteLine("list puede crear un lista de modelos o controladores. Los parámetros permitidos son:");
            Mensajes.lineaAyuda("models [busca]\t\t", "Listado de todos los modelos creados o los que contengan busca.\n");
            Mensajes.lineaAyuda("controllers [busca]\t", "Listado de todos los controladores creados.\n");
            Mensajes.lineaAyuda("views [busca]\t", "Listado de todas las vistas creadas.\n");
            Mensajes.lineaAyuda("route [middleware] [busca]\t", "Muestra las rutas creadas. Puede filtrarlas por buscar o por middleware.\n");
            Mensajes.lineaAyuda("middleware\t\t", "Muestra las Middleware creadas. \n");
            Mensajes.lineaAyuda("migrations\t\t", "Muestra un listado de las migraciones creadas. \n");
            Mensajes.lineaAyuda("functions\t\t", "Muestra un listado de las funciones globales disponibles. \n");
        }
        private static void ayudaDetails()
        {
            Console.WriteLine("details muestra los detalles sobre un modelo o un controlador. Los parámetros permitidos son:");
            Mensajes.lineaAyuda("model [nombre]\t\t", "Muestra detalles sobre la tabla de la base de datos del modelo.\n");
            Mensajes.lineaAyuda("controller [nombre]\t", "Muestra un listado de los métodos definidos en ese controlador.\n");
            Mensajes.lineaAyuda("view [nombre]\t\t", "Muestra el controlador y método que llaman a la vista, asi como su ruta.\n");
            Mensajes.lineaAyuda("middleware\t\t", "Muestra un listado de los métodos definidos en la clase Middleware.\n");
            Mensajes.lineaAyuda("migrations\t\t", "Muestra un listado e información de las migraciones creadas.\n");
        }

        private static void activerecord()
        {
            Mensajes.lineaAyuda("Modelo::limite(valor) [caduca] \t", "Establece el límite de resultados para las selecciones. Esteblecer a 0 para todos.\n\t\t\t\tSi caduca es true, tras la siguiente selección se elimina el límite y vuelve a 0. \n\t\t\t\tSi se omite se usará true\n");
            Mensajes.lineaAyuda("Modelo::all([orden]) \t\t", "Retorna todos los resultados de la tabla, ordenados por orden (atributo DESC o ASC)\n");
            Mensajes.lineaAyuda("Modelo::find(id)\t\t", "Retorna una búsqueda del registro que coincida con el id especificado por parámetro.\n");
            Mensajes.lineaAyuda("Modelo::where(cond., [orden])\t", "Realiza una búsqueda por condición. Orden debe poner el campo y ASC o DESC\n");
            Mensajes.lineaAyuda("Modelo::consultarSQL(SQL)\t", "Ejecuta una sentencia de SQL\n");
            Mensajes.lineaAyuda("Modelo::guardar()\t\t", "Guarda los datos que están en memoria en el modelo\n");
            Mensajes.lineaAyuda("Modelo::eliminar()\t\t", "Elimina el registro cuyo id  está en memoria en el modelo\n");
            Mensajes.lineaAyuda("Modelo::pagina(resultados)\t", "Activa la paginación con los resultados por parámetros de respuesta. 0 lo desactiva\n");
            Mensajes.lineaAyuda("Modelo::paginacion(limite, botones, inicio, delimita)\n\t\t\t\t", "Devuelve una cadena con el índice de páginas para imprimirlo en la vista.\n");
            Mensajes.lineaAyuda("\t\t\t\tlimite ", "-> resultados por página.\n", true);
            Mensajes.lineaAyuda("\t\t\t\tbotones ", "-> true o false si muestra o no botones de página anterior y siguiente\n", true);
            Mensajes.lineaAyuda("\t\t\t\tinicio", "-> carácter antes del número de página.\n", true);
            Mensajes.lineaAyuda("\t\t\t\tdelimita ", "-> carácter entre páginas.\n", true);
            Mensajes.lineaAyuda("Modelo::transaction(accion)\t", "Realiza una transacción. acción puede valor TR_BEGIN, TR_COMMIT o TR_ROLLBACK");
        }

        private static void ayudaRouter()
        {
            Mensajes.lineaAyuda("Router->render(vista, params)\t", "Visualiza la vista especificada pasándole el array variables params.\n");
            Mensajes.lineaAyuda("Router->countParams()\t\t", "Retorna el número de parámetros pasados por URI por medio de barras.\n");
            Mensajes.lineaAyuda("Router->getParam(num)\t\t", "Retorna el parámetro pasado por URI por medio de barras número num, siendo 1 el primero.\n");
            Mensajes.lineaAyuda("Router->getMethod()\t\t\t", "Retorna el método que se está ejecutando.\n");
            Mensajes.lineaAyuda("Router->getController()\t\t", "Retorna el controlador que se está ejecutando.\n");
        }

        private static void ayudaCookie()
        {
            Mensajes.lineaAyuda("Cookie::set($clave, $valor, $duracion, [$seguridad])\t", "Crea una cookie que caduca a los $duracion días.\n");
            Mensajes.lineaAyuda("Cookie::get($clave)\t\t\t\t\t", "Retorna el valor de una cookie.\n");
            Mensajes.lineaAyuda("Cookie:reset($clave)\t\t\t\t\t", "Elimina el valor de una cookie.\n");
        }

        private static void ayudaSession()
        {
            Mensajes.lineaAyuda("Session::set($clave, $valor, [$cifrado])\t", "Crea una variable de sesión.\n");
            Mensajes.lineaAyuda("Session::get($clave)\t\t\t\t", "Retorna el valor de una variable de sesión.\n");
            Mensajes.lineaAyuda("Session:clear()\t\t\t\t\t", "Elimina todas las variables de sesión.\n");
        }

        private static void ayudaCSS()
        {
            Mensajes.lineaAyuda(".ajuste\t\t\t", "Contenedor responsive.\n");
            Mensajes.lineaAyuda(".celdaMedia\t\t", "Celda para usar dentro de ajuste de media pantalla.\n");
            Mensajes.lineaAyuda(".celdaTercio\t\t", "Celda para usar dentro de ajuste de un tercio de pantalla.\n");
            Mensajes.lineaAyuda(".celdaDosTercios\t", "Celda para usar dentro de ajuste de dos tercios de pantalla.\n");
            Mensajes.lineaAyuda(".centrado\t\t", "Centra el texto.\n");
            Mensajes.lineaAyuda(".negrita\t\t", "Pone el texto en negrita.\n");
            Mensajes.lineaAyuda(".texto\t\t", "Ajusta el tamaño de la letra a tamaño normal.\n");
            Mensajes.lineaAyuda(".textoMini\t\t", "Ajusta el tamaño de la letra a tamaño reducido.\n");
            Mensajes.lineaAyuda(".textoDestacado\t", "Ajusta el tamaño de la letra a tamaño destacadol.\n");
            Mensajes.lineaAyuda(".textoTitulo\t\t", "Ajusta el tamaño de la letra a tamaño de título.\n");
            Mensajes.lineaAyuda(".textoSuper\t\t", "Ajusta el tamaño de la letra a tamaño Super.\n");
        }
    }
}
