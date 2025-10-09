using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Security.Policy;
using System.Text;
using System.Threading;
using System.Threading.Tasks;

namespace MVC
{
    internal class Lists
    {
        const int URL = 0;
        const int MIDDLEWARE = 1;
        static int archivos = 0;

        public static void comandos(string[] args) {
            if (args.Length <= 1)
            {
                Console.WriteLine("Parámetros insuficientes, necesita especificar que quiere listar. Para más info teclear lima help list");
                return;
            }

            switch (args[1].ToLower())
            {
                case "models":
                    if (args.Length > 2)
                        listaArchivos("modelos", args[2]);
                    else
                        listaArchivos("modelos");
                    break;
                case "controllers":
                    if (args.Length > 2)
                        listaArchivos("controladores", args[2]);
                    else
                        listaArchivos("controladores");
                    break;
                case "routes":
                    listaURL(URL, args);
                    break;
                case "middleware":
                    listaURL(MIDDLEWARE, args);
                    break;
                case "migrations":
                    listMigrations();
                    break;
                case "functions":
                    Console.Write("Funciones del framwork:");
                    Details.metodos("funciones", "systemFunc");
                    Console.Write("\nFunciones del usuario:");
                    Details.metodos("funciones", "funciones");
                    break;
                case "views":
                    listaVistas(args);
                    break;
                default:
                    Console.WriteLine("No puedo listar eso. Para más ayuda teclear lima help list");
                    break;
            }
        }

        public static void listMigrations(bool details = false, String tabla = "")
        {
            List<String> tablas = new List<String>();
            List<String> variables = new List<String>();
            char caracter = '\"';
            String[] partes;
            int numTablas = 0;
            String tablaActual = "";

            List<String> codigo = Ficheros.leeFichero("app\\clases\\Migrations.php");
            List<String> definiciones = Ficheros.contiene("$this::createTable(");

            //Guarda las tablas y las variables que la definen en listas
            foreach (String definicion in definiciones)
            {
                if (definicion.Contains("'"))
                    caracter = '\'';
                partes = definicion.Split(caracter);
                if (partes.Count() > 0)
                    tablas.Add(partes[1]);

                if (partes.Count() > 1)
                {
                    int pos = partes[2].IndexOf("$");
                    variables.Add(partes[2].Substring(pos, partes[2].Length - pos-2));
                }
            }

            bool begin = false;

            foreach (String code in codigo)
            {
                caracter = '"';

                if (begin && details && (tablaActual == tabla || tabla == ""))
                {
                    if (code.Contains("'"))
                        caracter = '\'';

                    partes = code.Split(caracter);
                    if (partes.Count() > 1)
                        Mensajes.lineaAyuda(partes[1] + " => ", "", true);

                    if (partes.Count() > 3)
                        Console.Write("Tipo " + partes[3]);

                    if (partes.Count() > 5)
                    {
                        Console.Write(" - Restricciones: ");
                        for (int i = 5; i < partes.Count(); i += 2)
                            Console.Write(partes[i] + " ");
                    }
                    Console.WriteLine();

                }

                for (int i =0; i < variables.Count; i++) 
                {
                    String codeNoSpace = code.Replace(" ", "");

                    if (codeNoSpace.Contains(variables[i] + "=["))
                    {
                        if (!details || (details && (tabla == tablas[i] || tabla == ""))) { 
                            Mensajes.lineaAyuda("Tabla: " + tablas[i], "\n");
                            tablaActual = tablas[i];
                            begin = true;
                            numTablas++;
                        }
                    }
                }

                if (code.Contains("];"))
                {
                    begin = false;
                }
            }
            Console.WriteLine("Listadas " + numTablas + " migraciones.");
        }

        public static void listaVistas(String[] args)
        {
            string busca = "";

            if (args.Length > 2)
                busca = args[2];
            string[] carpetas = Directory.GetDirectories("app\\vistas\\");
            archivos = 0;

            foreach (string carpeta in carpetas)
            {
                listaCarpetas(carpeta, busca);
            }

            listFiles("app\\vistas\\", busca);

            Console.WriteLine(archivos + " Vistas.");
        }

        private static void listaCarpetas(String carpeta, String busca)
        {

            string[] carpetas = Directory.GetDirectories(carpeta);

            if (carpetas.Length > 0)
            {
                foreach (string cp in carpetas)
                {
                    listFiles(cp + "\\", busca);
                    listaCarpetas(cp, busca);
                }
            }
            else
                listFiles(carpeta, busca);
        }

        private static void listFiles(String rutaInicio, String busca)
        {
            string[] files;
            bool sistema = false;

            if (rutaInicio.Substring(rutaInicio.Length - 1, 1) != "\\")
                rutaInicio += "\\";
            try
            {
                // Obtener todos los archivos del directorio
                files = Directory.GetFiles(rutaInicio);

                string nombre;

                foreach (string f in files)
                {
                    nombre = Path.GetFileName(f);
                    if (nombre == "cabecera.php" && rutaInicio == "app\\vistas\\") sistema = true;
                    if (nombre == "error404.php" && rutaInicio == "app\\vistas\\") sistema = true;
                    if (nombre == "errorMiddl.php" && rutaInicio == "app\\vistas\\") sistema = true;
                    if (nombre == "footer.php" && rutaInicio == "app\\vistas\\") sistema = true;
                    if (nombre == "layout.php" && rutaInicio == "app\\vistas\\") sistema = true;

                    if (!sistema)
                    {
                        if ((busca != "" && nombre.Contains(busca)) || busca == "")
                        {
                            String ruta = rutaInicio.Substring(11, rutaInicio.Length - 11);
                            Mensajes.lineaAyuda(ruta, nombre + "\n", true);
                            archivos++;
                        }
                    }
                }
            }
            catch (Exception ex)
            {
                Console.WriteLine($"Error: {ex.Message}");
            }
        }


        /* ------------------------------------
        * Realiza el listado de todas las URL
        * ------------------------------------ */
        private static void listaURL(int tipo, String[] args)
        {
            String method = "";
            String busca = "";

            if (args.Length > 2)
                if (args[2] == "middleware")
                {
                    method = args[2];
                    if (args.Length > 3)
                        busca = args[3];
                }
                else
                    busca = args[2];

            if (!Ficheros.existe("public\\index.php"))
            {
                Mensajes.ponError("ERROR: No puedo abrir archivo public\\index.php");
                return;
            }

            int numero = 0;

            List<String> contenido = Ficheros.leeFichero("app\\includes\\routes.php");

            foreach(String linea in contenido)
            {
                if (tipo == URL)
                {
                    if (linea.Contains("$router->route"))
                    {
                        if (method != "middleware")
                        {
                            if (busca == "")
                            {
                                muestraURL(linea);
                                numero++;
                            }
                            else
                            {
                                if (linea.Contains(busca))
                                {
                                    muestraURL(linea);
                                    numero++;
                                }
                            }
                        }
                     
                        String[] division = linea.Split('\'');

                        if (method == "middleware" && division.Length > 5)
                        {
                            if (linea.Contains("->route"))
                            {
                                muestraURL(linea);
                                numero++;
                            }

                        }
                    }
                }
                else if (tipo == MIDDLEWARE)
                {
                    if (linea.Contains("$router->middleware"))
                    {
                        muestraMiddl(linea);
                        numero++;
                    }
                }
            }

            if (tipo == URL)
                Mensajes.lineaAyuda(numero + " rutas .", "\n");
            else
                Mensajes.lineaAyuda(numero + " Middlewares.", "\n");
        }

        private static void muestraMiddl(String linea)
        {
            String[] valores = linea.Split('\'');
            Console.ForegroundColor = ConsoleColor.Green;
            Console.Write(valores[5] + " - ");
            Console.ResetColor();
            Console.WriteLine(valores[1] + " - " + valores[3]);
        }

        public static void muestraURL(String linea)
        {
            String[] valores = linea.Split('\'');

           /* if (tipo != "MIDDLEWARE" || (tipo == "MIDDLEWARE" && valores.Length > 5))
            {*/
                Console.ForegroundColor = ConsoleColor.Green;
                Console.Write(valores[1] + " - ");
                Console.ForegroundColor = ConsoleColor.DarkYellow;
                Console.ResetColor();
                Console.Write("\t--> " + valores[2].Substring(3, valores[2].Length - 12) + " - " + valores[3]);

                if (valores.Length > 5)
                    Mensajes.lineaAyuda(" - Middleware: ", valores[5] + "\n", true);
                else
                    Console.WriteLine();
            //}
        }

        public static void listaArchivos(String carpeta, String busca = "")
        {
            string[] files;

            if (!System.IO.Directory.Exists("app\\" + carpeta))
            {
                Mensajes.ponError("ERROR: No existe la carpeta app\\" + carpeta);
                return;
            }

            try
            {
                // Obtener todos los archivos del directorio
                files = Directory.GetFiles("app\\" + carpeta + "\\");

                // Mostrar los archivos en la consola
                Console.WriteLine("Listado de " + carpeta + " existentes:");
                int numC = 0;
                string nombre;
                foreach (string f in files)
                {
                    nombre = Path.GetFileName(f);
                    String nombreArchivo = nombre.Substring(0, nombre.Length - 4);

                    if (nombreArchivo.ToLower() != "activerecord")
                        if ((busca != "" && nombreArchivo.ToLower().Contains(busca.ToLower())) || busca == "")
                            Console.WriteLine(nombreArchivo); // Muestra solo el nombre del archivo
                    numC++;
                }

                if (numC == 0)
                    Mensajes.ponError("No hay ninguno creado.");
            }
            catch (Exception ex)
            {
                Console.WriteLine($"Error: {ex.Message}");
            }
        }
    }
}
