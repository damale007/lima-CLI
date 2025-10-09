using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.IO;
using System.Net;

using static System.Net.WebRequestMethods;

namespace MVC
{
    internal class Program
    {
        private static int numErrors = 0;
        private static bool errores = false;

        static void Main(string[] args)
        {
            if (args.Length > 0)
            {
                switch (args[0].ToLower())
                {
                    case "list":
                        Lists.comandos(args);
                        break;
                    case "create":
                        Create.comandos(args);
                        break;
                    case "details":
                        Details.comandos(args);
                        break;
                    case "config":
                        Config.comandos(args);
                        break;
                    case "add":
                        Add.comandos(args);
                        break;
                    case "modify":
                        Modify.comandos(args);
                        break;
                    case "remove":
                        Remove.comandos(args);
                        break;
                    case "install":
                    case "instalar":
                        if (args.Length == 1)
                            instalar();
                        break;
                    case "help":
                    case "ayuda":
                        Ayuda.comandos(args);
                        break;
                    case "open":
                        openFile(args);
                        break;
                    case "version":
                        Mensajes.lineaAyuda("Lima versión 1.0", "\n(c)2025, creado por David Martínez Leal\n");
                        Console.WriteLine("Compilación 2025.10.8.1");
                        break;
                    case "seo":
                        if (args.Length > 1 && args[1] == "error")
                            seo("app\\vistas\\", true);
                        else
                            seo("app\\vistas\\", false);
                        break;
                    
                    default:
                        Console.WriteLine("Para obtener ayuda use lima help o lima ayuda");
                        break;
                }
            } else  Console.WriteLine("Para obtener ayuda use lima help");

            //Create.createMigration("usuario2");
            //Config.comandos(a);
            //seo("app\\vistas\\", false);
        }

        public static void openFile(String[] args)
        {
            String ruta = "";
            String archivo = "";

            if (args.Length < 2)
                Mensajes.ponError("No se ha especificado qué archivo abrir.");
            else
            {
                switch (args[1].ToLower())
                {
                    case "view":
                        if (args.Length < 3)
                            Mensajes.ponError("No se ha especificado qué archivo abrir.");
                        ruta = "app\\vistas\\";
                        break;
                    case "controller":
                        if (args.Length < 3)
                            Mensajes.ponError("No se ha especificado qué archivo abrir.");
                        ruta = "app\\controladores\\";
                        break;
                    case "model":
                        if (args.Length < 3)
                            Mensajes.ponError("No se ha especificado qué archivo abrir.");
                        ruta = "app\\modelos\\";
                        break;
                    case "define":
                        ruta = "app\\includes\\config\\";
                        archivo = "variables.php";
                        break;
                    case "route":
                        ruta = "app\\includes\\";
                        archivo = "routes.php";
                        break;
                    case "include":
                        ruta = "app\\includes\\";
                        archivo = "includes.php";
                        break;
                    case "middleware":
                        ruta = "app\\clases\\";
                        archivo = "Middleware.php";
                        break;
                    case "migrations":
                        ruta = "app\\clases\\";
                        archivo = "Migrations.php";
                        break;
                    case "routes":
                        ruta = "app\\includes\\";
                        archivo = "routes.php";
                        break;
                    default:
                        Mensajes.ponError("Debe especificar que tipo válido de archivo desea abrir. Para ayuda teclear lima help open");
                        return;
                }

                if (archivo == "")
                {
                    archivo = args[2];
                    if (archivo.Length > 4)
                        if (archivo.Substring(archivo.Length - 4, 4) != ".php")
                        {
                            archivo += ".php";
                        }
                        else
                            archivo += ".php";

                }

                try
                {
                    // Crea una nueva instancia de ProcessStartInfo
                    ProcessStartInfo startInfo = new ProcessStartInfo
                    {
                        FileName = ruta + archivo,
                        UseShellExecute = true // Esto permite que el sistema operativo determine qué aplicación usar para el archivo
                    };

                    // Inicia el proceso
                    Process.Start(startInfo);
                    Console.WriteLine("Abriendo...");

                }
                catch (Exception ex)
                {
                    Mensajes.ponError($"Ocurrió un error al intentar abrir el archivo: {ex.Message}");
                }
            }

        }

        public static void instalar()
        {

            String ruta = Ficheros.getUnit() + "Lima";
            
            if (!Directory.Exists(ruta)) 
                Directory.CreateDirectory(ruta);

            System.IO.File.Copy("lima.exe", ruta + "\\lima.exe", true);
            Create.descarga("https://limaframework.netlify.app/MVC/limaadmin.exe", ruta + "\\limaadmin.exe");

            string variableDeUsuario = Environment.GetEnvironmentVariable("PATH", EnvironmentVariableTarget.User);
            if (!variableDeUsuario.Contains("Lima"))
                variableDeUsuario += ";" + ruta;
            Environment.SetEnvironmentVariable("PATH", variableDeUsuario, EnvironmentVariableTarget.User);

            Mensajes.lineaAyuda("Instalación correcta.", "Puede borrar el archivo lima.exe que ha descargado.\n");
            Console.WriteLine("Para que la instalación surja efecto, reinicie la consola de comandos.\n");
            Console.Write("Para crear un proyecto sitúese en la carpeta que desee crearlo y teclee ");
            Mensajes.lineaAyuda("lima create project nombre_proyecto", ".\n", true);
            Console.WriteLine("Para más ayuda teclee lima help");
        }

        public static void seo(String rutaInicio, bool showErrors)
        {
            string[] carpetas = Directory.GetDirectories(rutaInicio);
            List<String> imagenes = new List<String>();

            if (rutaInicio == "app\\vistas\\")
            {
                Ficheros.leeFichero("app\\includes\\config\\variables.php");

                imagenes = Ficheros.contiene("define(\'TITLE\'");
                if (imagenes.Count > 0)
                {
                    String[] inicio = imagenes[0].Split('\'');
                    if (inicio[3] == "")
                    {
                        Mensajes.ponError("No ha definido un título general en la web.");
                        numErrors++;
                    }
                }

                imagenes = Ficheros.contiene("define(\'DESCRIPTION\'");
                if (imagenes.Count > 0)
                {
                    String[] inicio = imagenes[0].Split('\'');
                    if (inicio[3] == "")
                    {
                        Mensajes.ponError("No hay descripción general definida en la web.");
                        numErrors++;
                    }
                    else
                    {
                        if (inicio[3].Length < 100 || inicio[3].Length > 160)
                        {
                            Mensajes.ponError("La longitud de la descripción general debe estar entre 100 y 160 caracteres, y tiene " + inicio[3].Length + ".");
                            numErrors++;
                        }
                    }
                }
            }

            foreach (string carpeta in carpetas)
            {
                seoCarpetas(carpeta, showErrors);
            }

            seoInFiles(rutaInicio, showErrors);

            Console.WriteLine(numErrors + " Problemas detectados.");
        }

        private static void seoCarpetas(String carpeta, bool showErrors) {

            string[] carpetas = Directory.GetDirectories(carpeta);

            if (carpetas.Length > 0)
            {
                foreach (string cp in carpetas)
                {
                    seoInFiles(cp + "\\", showErrors);
                    seoCarpetas(cp, showErrors);
                }
            }
            else
                seoInFiles(carpeta, showErrors);
        }

        private static void seoInFiles(String rutaInicio, bool showErrors) { 
            string[] files;
            List<String> imagenes = new List<String>();
            bool visualiza = false;

            if (rutaInicio.Substring(rutaInicio.Length - 1, 1) != "\\")
                rutaInicio += "\\";
            try
            {
                // Obtener todos los archivos del directorio
                files = Directory.GetFiles(rutaInicio);
                String rutaVis = rutaInicio.Substring(11, rutaInicio.Length - 11);

                string nombre;

                foreach (string f in files)
                {
                    nombre = Path.GetFileName(f);
                    visualiza = false;

                    if (nombre.ToLower().Contains(".php"))
                    {
                        Ficheros.leeFichero(rutaInicio + nombre);
                        
                        imagenes = Ficheros.contiene("<h1");
                        if (imagenes.Count != 1)
                        {
                            if (!visualiza)
                                Mensajes.lineaAyuda("\nVista: " + rutaVis + nombre, "\n");
                            Mensajes.ponError("La vista debe tener un <h1>");
                            errores = true;
                            visualiza = true;
                            numErrors++;
                        }

                        imagenes = Ficheros.contiene("<img");
                        foreach (string s in imagenes)
                        {
                            String sSin = s.Replace(' ', '\0');
                            String muestra = s.Replace('\t', '\0');
                            muestra = muestra.Trim();
                            bool impreso = false;

                            if (!sSin.Contains("alt="))
                            {
                                if (!visualiza)
                                    Mensajes.lineaAyuda("\nVista: " + rutaVis + nombre, "\n");
                                Console.WriteLine("Linea: " + muestra);
                                Mensajes.ponError("La imagen no contiene un atributo alt");
                                impreso = true;
                                errores = true;
                                visualiza = true;
                                numErrors++;
                            }

                            if (!sSin.Contains("loading="))
                            {
                                if (!visualiza)
                                    Mensajes.lineaAyuda("\nVista: " + rutaVis + nombre, "\n");
                                if (!impreso)
                                    Console.WriteLine("Linea: " + muestra);

                                Mensajes.ponError("La imagen no contiene el atributo loading=\"lazy\"");
                                errores = true;
                                visualiza = true;
                                numErrors++;
                            }
                        }

                        imagenes = Ficheros.contiene("$title");
                        if (imagenes.Count == 0 && !showErrors)
                        {
                            if (!visualiza)
                                Mensajes.lineaAyuda("\nVista: " + rutaVis + nombre, "\n");
                            Mensajes.lineaAyuda("No ha definido un título particular en la vista.", "\n", true);
                            visualiza = true;
                        }

                        imagenes = Ficheros.contiene("$description");
                        if (imagenes.Count == 0 && !showErrors)
                        {
                            if (!visualiza)
                                Mensajes.lineaAyuda("\nVista: " + rutaVis + nombre, "\n");
                            Mensajes.lineaAyuda("No ha definido una descripción particular en la vista.", "\n", true);
                            visualiza = true;
                        }

                        if (imagenes.Count >0)
                        {
                            int pos = imagenes[0].IndexOf('=');
                            String desc = imagenes[0].Substring(pos + 2, imagenes[0].Length - pos-2);
                            if (desc.Length < 100 ||  desc.Length >160)
                            {
                                if (!visualiza)
                                    Mensajes.lineaAyuda("\nVista: " + rutaVis + nombre, "\n");
                                Mensajes.ponError("La longitud de la descripción debe estar entre 100 y 160 caracteres, y tiene " + desc.Length + ".");
                                numErrors++;
                                visualiza= true;
                            }
                        }

                        if (!errores && rutaInicio == "app\\vistas\\")
                        {
                            Console.WriteLine("Sin problemas.");
                        }
                    }
                }
            }
            catch (Exception ex)
            {
                Console.WriteLine($"Error: {ex.Message}");
            }
        }
    }
}