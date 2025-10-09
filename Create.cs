using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.IO;
using System.Linq;
using System.Net;

namespace MVC
{
    internal class Create
    {
        const int CREAR = 0;
        const int MODIFICAR = 1;
        const int BORRAR = 2;
        const int NOMIDDLE = 3;

        public static void comandos(string[] args)
        {
            if (args.Length <= 1)
            {
                Console.WriteLine("Parámetros insuficientes, necesita especificar que quiere crear. Para más info teclear lima help create");
                return;
            }

            switch (args[1].ToLower())
            {
                case "model":
                    if (args.Length > 2)
                        modelo(args[2]);
                    else
                        modelo();
                    break;
                case "controller":
                    if (args.Length > 2)
                        controller(args[2]);
                    else
                        controller();
                    break;
                case "route":
                    if (args.Length > 2)
                        if (args.Length > 3)
                            if (args[3] == "view")
                                indexURL(CREAR, args[2], true);
                            else
                                indexURL(CREAR, args[2]);
                        else
                             indexURL(CREAR, args[2]);
                    else
                        indexURL(CREAR);
                    break;
                case "middleware":
                    if (args.Length > 2)
                        listaMiddle(CREAR, args[2]);
                    else
                        listaMiddle(CREAR);
                    break;
                case "migration":
                    if (args.Length > 2)
                        createMigration(args[2]);
                    else
                        createMigration();
                    break;
                case "form":
                    if (args.Length > 2)
                        formularios(args[2]);
                    else
                        formularios();
                    break;
                case "define":
                    if (args.Length > 2)
                        Config.defineVariable(args[2]);
                    else
                        Config.defineVariable();
                    break;
                case "project":
                    String nombre = "";
                    bool vrh = true;
                    if (args.Length > 2)
                    {
                        nombre = args[2];
                        if (args.Length > 3)
                            if (args[3] == "novrhost")
                                vrh = false;
                    }

                    createProject(nombre, vrh);
                    break;
                case "vrhost":
                    vrhost();
                    break;
                default:
                    Console.WriteLine("No puedo crear eso. Para más ayuda teclear lima help create");
                    break;
            }
        }

        public static void createProject(String nombre, bool vrh)
        {
            string respuesta;

            if (nombre == "")
            {
                Console.Write("Nombre del proyecto: ");
                nombre = Console.ReadLine().ToLower();
            }

            if (!Directory.Exists(nombre))
            {
                Directory.CreateDirectory(nombre);
                Directory.CreateDirectory(nombre + "\\app");
                Directory.CreateDirectory(nombre + "\\app\\clases");
                Directory.CreateDirectory(nombre + "\\app\\controladores");
                Directory.CreateDirectory(nombre + "\\app\\includes");
                Directory.CreateDirectory(nombre + "\\app\\includes\\config");
                Directory.CreateDirectory(nombre + "\\app\\modelos");
                Directory.CreateDirectory(nombre + "\\public");
                Directory.CreateDirectory(nombre + "\\public\\imagenes");
                Directory.CreateDirectory(nombre + "\\public\\js");
                Directory.CreateDirectory(nombre + "\\public\\css");
                Directory.CreateDirectory(nombre + "\\app\\vistas");

                Console.WriteLine("Creadas las carpetas necesarias");

                String contenido = "RewriteEngine On\r\nRewriteCond %{REQUEST_FILENAME} !-f\r\nRewriteRule ^ index.php [QSA,L]";
                Ficheros.escribeFichero(nombre + "\\public\\.htaccess", contenido);

                Ficheros.escribeFichero(nombre + "\\app\\includes\\funciones.php", "<?php\r\n//Crea aquí las funciones globales que desee usar en cualquier parte.");

                descarga("https://limaframework.netlify.app/MVC/index.php", nombre + @"\public\index.php");
                descarga("https://limaframework.netlify.app/MVC/routes.php", nombre + @"\app\includes\routes.php");
                descarga("https://limaframework.netlify.app/MVC/Session.php", nombre + @"\app\clases\Session.php");
                descarga("https://limaframework.netlify.app/MVC/Cookie.php", nombre + @"\app\clases\Cookie.php");
                descarga("https://limaframework.netlify.app/MVC/Error.php", nombre + @"\app\clases\Error.php");
                descarga("https://limaframework.netlify.app/MVC/Middleware.php", nombre + @"\app\clases\Middleware.php");
                descarga("https://limaframework.netlify.app/MVC/Migrations.php", nombre + @"\app\clases\Migrations.php");
                descarga("https://limaframework.netlify.app/MVC/initMigrations.php", nombre + @"\public\initMigrations.php");
                descarga("https://limaframework.netlify.app/MVC/Router.php", nombre + "\\Router.php");
                descarga("https://limaframework.netlify.app/MVC/systemFunc.php", nombre + @"\app\includes\systemFunc.php");
                descarga("https://limaframework.netlify.app/MVC/variables.php", nombre + @"\app\includes\config\variables.php");
                descarga("https://limaframework.netlify.app/MVC/app.php", nombre + @"\app\includes\app.php");
                descarga("https://limaframework.netlify.app/MVC/includes.php", nombre + @"\app\includes\includes.php");
                descarga("https://limaframework.netlify.app/MVC/autoload.php", nombre + @"\app\includes\autoload.php");
                descarga("https://limaframework.netlify.app/MVC/DataBase.php", nombre + @"\app\clases\DataBase.php");
                descarga("https://limaframework.netlify.app/MVC/layout.php", nombre + @"\app\vistas\layout.php");
                descarga("https://limaframework.netlify.app/MVC/cabecera.php", nombre+ @"\app\vistas\cabecera.php");
                descarga("https://limaframework.netlify.app/MVC/footer.php", nombre + @"\app\vistas\footer.php");
                descarga("https://limaframework.netlify.app/MVC/ActiveRecord.php", nombre + @"\app\modelos\ActiveRecord.php");
                descarga("https://limaframework.netlify.app/MVC/HomeController.php", nombre + @"\app\controladores\HomeController.php");
                descarga("https://limaframework.netlify.app/MVC/home.php", nombre + @"\app\vistas\home.php");
                descarga("https://limaframework.netlify.app/MVC/error404.php", nombre + @"\app\vistas\error404.php");
                descarga("https://limaframework.netlify.app/MVC/errorMiddl.php", nombre + @"\app\vistas\errorMiddl.php");
                descarga("https://limaframework.netlify.app/MVC/mvc.css", nombre + @"\public\css\mvc.css");
                descarga("https://limaframework.netlify.app/MVC/variables.css", nombre + @"\public\css\variables.css");
                descarga("https://limaframework.netlify.app/MVC/favicon.ico", nombre + @"\public\favicon.ico");

                FileStream fichero = new FileStream(nombre + @"\public\css\app.css", FileMode.Create, FileAccess.Write);
                fichero.Close();

                Mensajes.lineaAyuda("\nInstalación correcta.", "teclee cd " + nombre + "\n");
                
                if (vrh)
                    vrhost(nombre);

                Console.WriteLine("\nPara obtener ayuda escriba lima help");
                Console.Write("No olvide configurar la base dedatos. \nPuede hacerlo con el comando ");
                Mensajes.lineaAyuda("lima config bd", ".\n");
            }
            else
                Mensajes.ponError("Ese proyecto ya existe.");
        }


        public static void vrhost(String nombre = "")
        {
            String contenido;
            String ruta = Ficheros.getPath();

            if (nombre == "")
            {
                int indiceUltimaBarra = ruta.LastIndexOf('\\') +1;
                nombre = ruta.Substring(indiceUltimaBarra, ruta.Length - indiceUltimaBarra);
            }

            ProcessStartInfo startInfo = new ProcessStartInfo();

            startInfo.FileName = "limaadmin.exe";
            startInfo.Arguments = "vrhost " + nombre;

            try
            {
                // Iniciar el proceso
                Process.Start(startInfo);
            }
            catch (Exception ex)
            {
                Mensajes.ponError($"Ocurrió un error al crear el host virtual: {ex.Message}");
                Console.Write("\nPara crear un host virtual debe incluir la línea: ");
                Mensajes.lineaAyuda("127.0.0.1 " + nombre + ".test ", "en el archivo", true);
                Mensajes.lineaAyuda("C:\\Windows\\System32\\Drivers\\etc\\hosts ", "\n");
            }

            String rutaApache = "";
            if (!Ficheros.existe("C:\\Lima\\lima.cfg"))
            {
                Console.Write("Introduce ruta de Apache: ");
                rutaApache = Console.ReadLine();
                Config.apache(rutaApache);
            } else
            {
                Ficheros.leeFichero("c:\\Lima\\lima.cfg");
                List<String> conten= Ficheros.contiene("Apache=");
                rutaApache = conten[0].Substring(8, conten[0].Length - 8);
                rutaApache = rutaApache.Trim();
            }

            if (rutaApache.Substring(rutaApache.Length - 1, 1) != "\\")
                rutaApache += "\\";

            String conf = "conf\\extra\\httpd-vhosts.conf";
            contenido = "<VirtualHost " + nombre + ".test:80>\n";
            contenido += "\tDocumentRoot \"" + ruta + "\\" + nombre + "\\public\"\n";
            contenido += "\tServerName " + nombre + ".test\n";
            contenido += "\tServerAlias www." + nombre + ".test\n";
            contenido += "\t<Directory \"" + ruta + "\\public\">\n";
            contenido += "\t\tOptions All\n";
            contenido += "\t\tAllowOverride All\n";
            contenido += "\t\tRequire all granted\n";
            contenido += "\t</Directory>\n";
            contenido += "</VirtualHost>";
            if (!Ficheros.anadeFichero(rutaApache + conf, contenido))
                Mensajes.ponError("Error al crear el host virtual. Para hacerlo manualmente teclear lima create vrhost nombre_host");

            Console.Write("Para que el host virtual tenga efecto deberá reiniciar Apache.\nPuede acceder a la web escribiendo en el navegador: ");
            Mensajes.lineaAyuda(nombre + ".test", "\n", true);
            Console.Write("También puede acceder tecleando ");
            Mensajes.lineaAyuda("localhost/" + nombre + "/public", "\n", true);
        }
        public static void descarga(String url, String archivo)
        {
            try
            {
                using (WebClient client = new WebClient())
                {
                    client.DownloadFile(url, archivo);
                    Console.WriteLine("Archivo descargado con éxito en: " + archivo);
                }
            }
            catch (Exception ex)
            {
                Mensajes.ponError("Error al descargar el archivo: " + ex.Message);
            }
        }

        public static void formularios(String vista = "")
        {
            String modelo = "";

            //Pregunta nombre de la vista
            if (vista == "")
            {
                Console.Write("Introduce vista donde crear el formulario: ");
                vista = Console.ReadLine();
            }

            //Si no existe la ruta, la crea
            string[] carpetas = vista.Split('\\');
            string ruta = "vistas";

            if (carpetas.Length > 1)
            {
                for (int i = 0; i < carpetas.Length - 1; i++)
                {
                    ruta += "\\" + carpetas[i];
                    if (!Directory.Exists(ruta))
                        Directory.CreateDirectory(ruta);
                }
            }

            //Pregunta nombre del modelo
            Lists.listaArchivos("modelos");
            Boolean existe = false;
            do
            {
                Console.Write("\nModelo en el que se basa (intro para salir): ");
                modelo = Console.ReadLine();
                if (modelo == "") return;
                if (System.IO.File.Exists("app\\modelos\\" + modelo + ".php")) existe = true;
            } while (!existe);

            //Controlador
            Console.Write("Lista de controladores:");
            Lists.listaArchivos("controladores");
            Console.Write("\nNombre del controlador ");
            Mensajes.lineaAyuda("(intro si es igual al modelo)", ": ", true);
            String controlador = Console.ReadLine();
            if (controlador == "")
                controlador = modelo + "Controller";

            if (!System.IO.File.Exists("app\\controladores\\" + controlador + ".php"))
            {
                string contenido = "<?php\r\nnamespace Controlador;\r\n\nuse MVC\\Router;\r\nuse Modelo\\" + modelo + ";\n\nClass " + controlador + "{\n}";
                Ficheros.escribeFichero("app\\controladores\\" + controlador + ".php", contenido);
            } 

              //Pregunta método que llama a la vista
            Console.Write("Nombre del método del controlador: ");
            String metodo = Console.ReadLine();

            //Añade o modifica el método
            metodoFormulario(controlador, modelo, vista, metodo);

            //Pregunta URL de destino
            String url = Ficheros.obtieneURL(controlador, metodo);

            if (url == "")
            {
                Console.Write("\nNo existe url a ese método, introduce una: ");
                url = Console.ReadLine();
                indexURL(CREAR, url, false, "a", controlador, metodo);
            }

            //Abre los ficheros
            vistaFormulario(vista, url, modelo);
        }

        private static void vistaFormulario(String vista, String url, String modelo)
        {
            List<String> lista = new List<String>();

            Ficheros.leeFichero("app\\modelos\\" + modelo + ".php");
            List<String> atributosFichero = Ficheros.contiene("protected static $columnasDB = ");

            lista.Add("<?php foreach ($alertas as $alerta) { ?>");
            lista.Add("\t<p><?= $alerta; ?></p>");
            lista.Add("<?php } ?>\n");
            lista.Add("<form action = \"" + url + "\" method = \"POST\">");
            lista.Add("\t<?php createFormToken(); ?>");

            string[] atributos = atributosFichero[0].Split('\'');
            foreach (string atributo in atributos)
            {
                String tipo = "";

                if (!atributo.Contains(",") && !atributo.Contains("[") && atributo != "];")
                {
                    Console.Write("Tipo de datos para ");
                    Mensajes.lineaAyuda(atributo, " ");
                    Mensajes.lineaAyuda("(Intro saltar)", ": ", true);
                    Mensajes.lineaAyuda("h: ", "oculto ", true);
                    Mensajes.lineaAyuda("t: ", "texto ", true);
                    Mensajes.lineaAyuda("n: ", "número ", true);
                    Mensajes.lineaAyuda("e:", "email ", true);
                    Mensajes.lineaAyuda("d:", "fecha: ", true);
                    do
                    {
                        tipo = Console.ReadLine().ToLower();
                    } while (tipo != "h" && tipo != "t" && tipo != "n" && tipo != "e" && tipo != "d" && tipo != "");
                    switch (tipo)
                    {
                        case "h":
                            tipo = "hidden";
                            break;
                        case "t":
                            tipo = "text";
                            break;
                        case "n":
                            tipo = "number";
                            break;
                        case "e":
                            tipo = "email";
                            break;
                        case "d":
                            tipo = "date";
                            break;
                    }

                    if (tipo != "")
                    {
                        if (atributo.ToLower() != "id")
                            lista.Add("\t<label for = \"" + atributo + "\">" + atributo + "</label>");
                        
                        lista.Add("\t<input");
                        lista.Add("\t\tid = \"" + atributo + "\"");
                        lista.Add("\t\tname = \"" + atributo + "\"");
                        
                        if (atributo != "id")
                            lista.Add("\t\ttype = \"" + tipo + "\"");
                        else
                            lista.Add("\t\ttype = \"hidden\"");

                        lista.Add("\t\tplaceholder = \"" + atributo + "\"");
                        lista.Add("\t\tvalue = \"<?= $" + modelo.ToLower() + "->" + atributo + "; ?>\">");
                    }
                }
            }

            lista.Add("\t\t<input type='submit' value='Enviar'>");
            lista.Add("</form>");

            Ficheros.leeFichero("app\\vistas\\" + vista + ".php");

            Ficheros.inserta(lista, 0);
            Ficheros.escribeFichero("app\\vistas\\" + vista + ".php");

        }

        public static void metodoFormulario(String controlador, string modelo, String vista, String metodo)
        {
            List<String> code = new List<String>();

            Ficheros.leeFichero("app\\controladores\\" + controlador + ".php");
            int posicion = Ficheros.posicion("use Modelo\\" + modelo + ";");
            if (posicion == -1)
            {
                posicion = Ficheros.posicion("use MVC\\Router;");
                
                code.Add("use Modelo\\" + modelo + ";");
                Ficheros.inserta(code, posicion);
            }


            code.Clear();
            code = retornaMetodo(metodo, modelo, vista);

            posicion = Ficheros.posicion("class " + controlador + " {");
            Ficheros.inserta(code, posicion);
            Ficheros.escribeFichero("app\\controladores\\" + controlador + ".php");
        }

        private static List<String> retornaMetodo(string metodo, string modelo, String vista)
        {
            String variable = modelo.ToLower();
            List<String> code = new List<String>();

            code.Add("\tpublic static function " + metodo.ToLower() + "(Router $router){");
            code.Add("\t\t$alertas = [];");
            code.Add("\t\t$" + variable + " = new " + modelo + ";");
            code.Add("\t\tif ($_SERVER['REQUEST_METHOD'] === 'POST') {");
            code.Add("\t\t\tif (getFormToken($_POST)) {");
            code.Add("\t\t\t\t$" + variable + "->sincronizar($_POST);");
            code.Add("\t\t\t\t$alertas = $" + variable + "->validar();");
            code.Add("\t\t\t\tif (empty($alertas)) {");
            code.Add("\t\t\t\t\t$resultado = $" + variable + "->guardar();");
            code.Add("\t\t\t\t}");
            code.Add("\t\t\t}");
            code.Add("\t\t}");

            code.Add("");
            code.Add("\t\t$router->render('" + vista + "', [");
            code.Add("\t\t\t'" + variable + "' => $" + variable + ",");
            code.Add("\t\t\t'alertas' => $alertas");
            code.Add("\t\t]);");
            code.Add("\t}\n");

            return code;
        }
        public static void createMigration(String tabla = "")
        {
            String cadena;
            String atrib;
            String tipo;
            bool primero = true;

            if (tabla == "")
            {
                Console.Write("Introduce nueva tabla: ");
                tabla = Console.ReadLine();
            }

            cadena = "\t\t$" + tabla + " = [\n";

            //BUsca si hay algún modelo con esa tabla
            string[] files;
            string modelo = "";

            if (!System.IO.Directory.Exists("app\\modelos"))
            {
                Mensajes.ponError("ERROR: No existe la carpeta app\\modelos");
                return;
            }

            try
            {
                // Obtener todos los archivos del directorio
                files = Directory.GetFiles("app\\modelos\\");

                foreach (string f in files)
                {
                    String nombre = Path.GetFileName(f);
                    String nombreArchivo = nombre.Substring(0, nombre.Length - 4);

                    if (nombreArchivo.ToLower() != "activerecord")
                    {
                        Ficheros.leeFichero("app\\modelos\\" + nombreArchivo + ".php");
                        if (Ficheros.existeLinea("protectedstatic$tabla=\"" + tabla + "\";", true) > 0)
                        {
                            modelo = nombreArchivo + ".php";
                            break;
                        }
                    }
                }

            }
            catch (Exception ex)
            {
                Console.WriteLine($"Error: {ex.Message}");
            }


            if (modelo != "")
            {
                String resp = "";
                do
                {
                    Console.Write("Ya existe un modelo con esa tabla ¿desea improtar la estructura a la migración ");
                    Mensajes.lineaAyuda("(s/n)", "? ", true);
                    resp = Console.ReadLine().ToLower();
                } while (resp != "s" && resp != "n");

                if (resp == "s")
                {
                    importaMigracion(modelo, tabla);
                    return;
                }
            }

            do
            {
                do
                {
                    Console.Write("Introduce nombre de atributo ");
                    Mensajes.lineaAyuda("(Intro para salir)", ": ", true);
                    atrib = Console.ReadLine();
                    if (atrib == "id")
                        Mensajes.ponError("No se puede crear un atributo id, ya que se generará de forma automática.");
                } while (atrib == "id");

                if (atrib != "")
                {
                    if (!primero)
                        cadena += ",\n";
                    else
                        primero = false;

                    cadena += "\t\t\t'" + atrib + "' => [";
                    cadena += preguntaTipo(atrib);
                }
            } while (atrib != "");
            cadena += "\n\t\t];\n";
            cadena += "\t\t$this::createTable('" + tabla + "', $" + tabla + ");\n";

            List<String> contenido = Ficheros.leeFichero("app\\clases\\Migrations.php");
            Ficheros.inserta("\n" + cadena, "}", true);
            Ficheros.escribeFichero("app\\clases\\Migrations.php");

            Mensajes.lineaAyuda("Migración creada.", "\n");
        }

        public static void importaMigracion(String archivo, String tabla)
        {
            String cadena = "\t\t$" + tabla + " = [\n";

            Ficheros.leeFichero("app\\modelos\\" + archivo);
            List<String> lineas = Ficheros.contiene("$columnasDB");

            if (lineas == null || lineas.Count == 0)
            {
                Mensajes.ponError("Error en el modelo, no se puede importar.");
                return;
            }
            else
            {
                String linea = lineas[0];
                char caracter = '\'';
                String atrib = "";
                bool primero = true;

                if (linea.Contains("\""))
                    caracter = '\"';

                String[] campos = linea.Split(caracter);
                for (int i = 1; i<campos.Count() -1; i += 2)
                {
                    atrib = campos[i];
                    if (atrib != "id")
                    {
                        if (primero)
                            primero = false;
                        else
                            cadena += ",\n";


                        cadena += "\t\t\t'" + atrib + "' => [";
                        Console.Write("Atributo: ");
                        Mensajes.lineaAyuda(atrib, ":\n");
                        cadena += preguntaTipo(atrib);
                    }
                }
                cadena += "\n\t\t];\n";
                cadena += "\t\t$this::createTable('" + tabla + "', $" + tabla + ");\n";

                List<String> contenido = Ficheros.leeFichero("app\\clases\\Migrations.php");
                Ficheros.inserta("\n" + cadena, "}", true);
                Ficheros.escribeFichero("app\\clases\\Migrations.php");

                Mensajes.lineaAyuda("Migración importada de modelo corrrectamente.", "\n");
            }
        }

        private static String preguntaTipo(String atrib)
        {
            String tipo = "";
            String cadena = "";

            do
            {
                Mensajes.lineaAyuda("(s)", " Cadena de caracteres.\n", true);
                Mensajes.lineaAyuda("(t)", " Texto grande.\n", true);
                Mensajes.lineaAyuda("(i)", " Número entero 32 bits.\n", true);
                Mensajes.lineaAyuda("(is)", " Número entero de 16 bits\n", true);
                Mensajes.lineaAyuda("(ib)", " Número entero de 64 bits\n", true);
                Mensajes.lineaAyuda("(d)", " Número decimal.\n", true);
                Mensajes.lineaAyuda("(db)", " Número decimal grande.\n", true);
                Mensajes.lineaAyuda("(f)", " Fecha\n", true);
                Mensajes.lineaAyuda("(fh)", " Fecha y Hora.\n", true);
                Console.Write("Elige un tipo: ");
                tipo = Console.ReadLine().ToLower();
            } while (tipo != "s" && tipo != "t" && tipo != "i" && tipo != "is" && tipo != "ib" && tipo != "d" && tipo != "db" && tipo != "f" && tipo != "fh");

            switch (tipo)
            {
                case "s":
                    cadena += "'string";
                    break;
                case "t":
                    cadena += "'text";
                    break;
                case "i":
                    cadena += "'integer";
                    break;
                case "is":
                    cadena += "'integer:small";
                    break;
                case "ib":
                    cadena += "'integer:big";
                    break;
                case "d":
                    cadena += "'float";
                    break;
                case "db":
                    cadena += "'float:big";
                    break;
                case "f":
                    cadena += "'date";
                    break;
                case "fh":
                    cadena += "'datetime";
                    break;
            }

            if (tipo == "s")
            {
                Console.Write("tamaño en caracteres ");
                Mensajes.lineaAyuda("(intro ninguno)", ": ");
                String tam = Console.ReadLine();
                if (tam != "")
                    cadena += ":" + tam;
            }
            cadena += "'";

            do
            {
                Console.Write("Restricciones ");
                Mensajes.lineaAyuda("(intro - ninguna)", " - ", true);
                Mensajes.lineaAyuda("(fk) ", "Clave foránea - ", true);
                Mensajes.lineaAyuda("(u)", " Único - ", true);
                Mensajes.lineaAyuda("(nn)", " No nulo: ", true);
                tipo = Console.ReadLine().ToLower();
            } while (tipo != "fk" && tipo != "u" && tipo != "nn" && tipo != "");

            if (tipo != "")
            {
                switch (tipo)
                {
                    case "fk":
                        cadena += ", 'fk:";
                        Console.Write("Tabla a enlazar: ");
                        String tb = Console.ReadLine();
                        cadena += tb;
                        break;
                    case "u":
                        cadena += ", 'unique";
                        break;
                    case "nn":
                        cadena += ", 'notnull";
                        break;
                }
                cadena += "']";
            }
            else
                cadena += "]";

            return cadena;
        }

        public static void listaMiddle(int tipo, String nombre = "")
        {
            String controlador;
            String metodo;

            if (!Ficheros.existe("public\\index.php"))
            {
                Mensajes.ponError("No existe el fichero de asignaciones de ruta. ¿está correctamente instalado el framework?");
                return;
            }

            Lists.listaArchivos("controladores");
            do
            {
                Console.Write("\nControlador afectado ");
                Mensajes.lineaAyuda("(* -> todos)", ": ", true);
                controlador = Console.ReadLine();
            } while (controlador != "*" && !System.IO.File.Exists("app\\controladores\\" + controlador + ".php"));

            if (controlador != "*")
            {
                Console.WriteLine("\nListado de métodos en " + controlador + ":");
                Details.metodos("controlador", controlador);
                Console.WriteLine();
            }

            Console.Write("Método afectado: ");
            Mensajes.lineaAyuda("(* -> todos)", ": ", true);
            metodo = Console.ReadLine();

            String cadena = "\t$router->middleware('" + controlador + "', '" + metodo + "', '" + nombre + "');";
            Ficheros.escribeURL(tipo, cadena, controlador, "");
        }

        public static void indexURL(int modif, string direccion = "", bool vista = false, string method = "", string controllerP = "", string methodController = "")
        {
            string[] files;
            string folderPath = "app\\controladores"; // Cambia esto por el path de tu carpeta
            String middle = "";

            if (!Ficheros.existe("app\\includes\\routes.php"))
            {
                Mensajes.ponError("No existe el fichero de asignaciones de ruta. ¿está correctamente instalado el framework?");
            }
            else
            {
                if (direccion == "")
                {
                    do
                    {
                        Console.Write("Dirección de url ");
                        Mensajes.lineaAyuda("(debe empezar por /)", ": ", true);
                        direccion = Console.ReadLine();
                    } while (direccion == "");
                }
                if (direccion[0].ToString() != "/") direccion = "/" + direccion;

                if (modif == CREAR && Ficheros.existeEnFichero("app\\includes\\routes.php", direccion))
                {
                    Mensajes.ponError("ERROR: esa URL ya existe.");
                    return;
                }

                Boolean existe = false;

                if (vista)
                {
                    Console.Write("Introduce la vista a llamar: ");
                    methodController = Console.ReadLine();
                }
                else
                {
                    if (controllerP == "")
                    {
                        Lists.listaArchivos("controladores");
                        do
                        {
                            Console.Write("\nControlador al que accede ");
                            Mensajes.lineaAyuda("(Intro -> salir)", ": ", true);
                            controllerP = Console.ReadLine();
                        } while (controllerP != "" && !System.IO.File.Exists("app\\controladores\\" + controllerP + ".php"));

                        if (controllerP == "") return;
                    }

                    if (methodController == "")
                    {
                        Console.WriteLine("\nListado de métodos en el controlador:");
                        Details.metodos("controlador", controllerP);
                        Console.WriteLine();
                        do
                        {
                            Console.Write("Método que ejecuta: ");
                            methodController = Console.ReadLine();
                        } while (methodController == "");
                    }

                    Console.WriteLine("\nListado de middlewares:");
                    Details.metodos("middleware", controllerP);
                    Console.WriteLine();

                    Console.Write("Middleware ");
                    Mensajes.lineaAyuda("(intro -> ninguno)", ":", true);
                    middle = Console.ReadLine();
                }

                String cadena = "\t$router->route('" + direccion + "', "; ;
                String cadena2 = "";

                if (!vista)
                    cadena += "[" + controllerP + "::Class, '" + methodController + "'";
                else
                    cadena += "'" + methodController + "'";

                if (middle != "")
                {
                    cadena += ", '" + middle + "'";
                    if (cadena2 != "")
                        cadena2 += ", '" + middle + "'";
                }

                if (!vista)
                    cadena += "]);";
                else
                    cadena += ");";

                if (cadena2 != "")
                {
                    cadena += "\r\n" + cadena2 + "]);";
                }

                Ficheros.escribeURL(modif, cadena, controllerP, direccion);

                if (!vista)
                {
                    string valor;
                    if (!Ficheros.existe(folderPath + "\\" + controllerP + ".php"))
                    {
                        Console.Write("El controlador no existe desea crearlo ");
                        Mensajes.lineaAyuda("(s/n)", ": ", true);
                        valor = Console.ReadLine().ToLower();

                        if (valor == "s") controller(controllerP);
                    }
                }
            }
        }

        public static void modelo(string clase = "")
        {
            string cadena;
            string tabla;
            List<string> atributos = new List<String>();
            List<string> defecto = new List<String>();
            int numero = 0;

            if (clase == "")
            {
                do
                {
                    Console.Write("Nombre de la clase: ");
                    clase = Console.ReadLine();
                } while (clase == "");
            }

            clase = iniciaClase(clase);
            String nombreArchivo = "app\\modelos\\" + clase + ".php";

            if (Ficheros.existe(nombreArchivo))
            {
                Console.Write("El archivo ya existe y se sobreescribirá ¿está seguro ");
                Mensajes.lineaAyuda("(s/n)", "? ", true);
                cadena = Console.ReadLine();

                if (cadena.ToLower() != "s") return;
            }

            Console.Write("Nombre de la tabla: ");
            Console.Write("(Intro para " + clase.ToLower() + ") ");
            tabla = Console.ReadLine();
            if (tabla == "") tabla = clase.ToLower();

            List<String> codigo = Ficheros.leeFichero("app\\clases\\Migrations.php");
            List<String> lineas = Ficheros.contiene("$this::createTable('" + tabla + "'");

            string valor1, valor2;
            bool begin = false;
            numero = 0;
            if (lineas.Count() >0)
            {
                String linea = lineas[0];
                int pos = linea.IndexOf(",") + 1;
                int posFinal = linea.IndexOf(")");
                String variable = linea.Substring(pos, posFinal - pos).Trim();

                foreach (String code in codigo)
                {
                    char caracter = '"';

                    if (begin)
                    {
                        if (code.Contains("'"))
                            caracter = '\'';

                        String[] partes = code.Split(caracter);
                        if (partes.Count() > 1)
                        {
                            atributos.Add(partes[1]);
                            Console.Write("Valor por defecto para " + partes[1]);
                            Mensajes.lineaAyuda(" (intro o null -> nulo)", " ", true);
                            valor2 = Console.ReadLine();

                            if (valor2 != "" && !esNumero(valor2))
                            {
                                if (valor2.Substring(0, 1) != "'")
                                    valor2 = "'" + valor2;

                                if (valor2.Substring(valor2.Length - 1, 1) != "'")
                                {
                                    valor2 += "'";
                                }
                            }
                            defecto.Add(valor2);
                        }

                    }

                    String codeNoSpace = code.Replace(" ", "");

                    if (codeNoSpace.Contains(variable + "=["))
                        begin = true;

                    if (code.Contains("];"))
                        begin = false;
                }
            }
            else
            {
                

                do
                {
                    Console.Write("Introduce atributo ");
                    Mensajes.lineaAyuda("(intro para salir)", " ", true);
                    valor1 = Console.ReadLine();

                    if (valor1 != "")
                    {
                        Console.Write("Valor por defecto ");
                        Mensajes.lineaAyuda("(intro o null -> nulo)", " ", true);
                        valor2 = Console.ReadLine();

                        atributos.Add(valor1);
                        if (valor2 != "" && !esNumero(valor2))
                        {
                            if (valor2.Substring(0, 1) != "'")
                                valor2 = "'" + valor2;

                            if (valor2.Substring(valor2.Length - 1, 1) != "'")
                            {
                                valor2 += "'";
                            }
                        }
                        defecto.Add(valor2);
                    }
                } while (valor1 != "");
            }

            // Escritura del archivo
            FileStream fichero = new FileStream(nombreArchivo, FileMode.Create, FileAccess.Write);
            StreamWriter fs = new StreamWriter(fichero);
            fs.WriteLine("<?php");
            fs.WriteLine("namespace Modelo;\n");
            fs.WriteLine("class " + clase + " extends ActiveRecord {");
            fs.WriteLine("\tprotected static $tabla = \"" + tabla + "\";");
            fs.Write("\tprotected static $columnasDB = [");

            for (int i = 0; i < atributos.Count(); i++)
            {
                fs.Write("'" + atributos[i] + "'");
                if (i < atributos.Count() - 1) fs.Write(", ");
            }

            fs.WriteLine("];\n");

            foreach (String attr in atributos)
            {
                fs.WriteLine("\tpublic $" + attr + ";");
            }

            fs.WriteLine("\n\tpublic function __construct($args = []) {");

            for (int i = 0; i < atributos.Count(); i++)
            {
                fs.Write("\t\t$this->" + atributos[i] + " = $args['" + atributos[i] + "'] ?? ");
                if (defecto[i] == "null" || defecto[i] == "")
                    fs.WriteLine("null;");
                else if (esNumero(defecto[i]))
                    fs.WriteLine(defecto[i] + ";");
                else fs.WriteLine(defecto[i] + ";");
            }

            fs.WriteLine("\t}");
            fs.WriteLine("}");

            fs.Close();
            fichero.Close();

            Mensajes.lineaAyuda("\nModelo creado correctamente.", "\n");
            Console.Write("\n¿Desea crear también el controlador ");
            Mensajes.lineaAyuda("(s/n)", " ", true);
            cadena = Console.ReadLine();

            if (cadena.ToLower() == "s")
            {
                controller(clase);
            }
        }

        public static void controller(string clase = "")
        {
            if (clase == "")
            {
                do
                {
                    Console.Write("Nombre del controlador: ");
                    clase = Console.ReadLine();
                } while (clase == "");

                clase = iniciaClase(clase);
            }

            String nombreArchivo = "app\\controladores\\" + clase;
            String claseSimple = "";

            if (!clase.Contains("Controller"))
            {
                nombreArchivo += "Controller.php";
                claseSimple = clase;
                clase += "Controller";
            }
            else
            {
                claseSimple = clase.Replace("Controller", "");
                nombreArchivo += ".php";
            }

            if (System.IO.File.Exists(nombreArchivo))
            {
                Console.Write("El archivo ya existe y se sobreescribirá ¿está seguro ");
                Mensajes.lineaAyuda("(s/n)", "? ", true);
                string cadena = Console.ReadLine();

                if (cadena.ToLower() != "s")
                {
                    nombreArchivo = "app\\controladores\\" + clase + DateTime.Now + "Controller.php";
                    nombreArchivo = limpia(nombreArchivo);
                }
            }

            string use = "";
            if (System.IO.File.Exists("app\\modelos\\" + claseSimple + ".php"))
            {
                use = "use Modelo\\" + claseSimple + ";\r\n";
            }

            string contenido = "<?php\r\nnamespace Controlador;\r\nuse MVC\\Router;\r\n" + use + "\nClass " + clase + "{\r\n\tpublic static function index(Router $router) {\r\n\t\t//Código\r\n\t\t$router->render('nombre_de_la_vista', [\r\n\t\t\t'variable a vista' => $variable\r\n\t\t]);\r\n\t}\r\n}";
            Ficheros.escribeFichero(nombreArchivo, contenido);

            Console.WriteLine("\nControlador creado correctamente con el nombre y un sólo método index {0}.", nombreArchivo);
        }

        public static string iniciaClase(string clase)
        {
            string retorno = "";
            string inicial = clase[0].ToString().ToUpper();

            retorno = inicial + clase.Substring(1);

            return retorno;
        }

        private static Boolean esNumero(String numero)
        {
            if (int.TryParse(numero, out int result))
            {
                return true;
            }

            return false;
        }

        private static string limpia(string nombre)
        {
            nombre = nombre.Replace("/", "");
            nombre = nombre.Replace(" ", "");
            nombre = nombre.Replace(":", "");

            return nombre;
        }
    }
}
