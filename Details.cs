using System;
using System.Collections;
using System.Collections.Generic;
using System.ComponentModel;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MVC
{
    internal class Details
    {
        public static void comandos(string[] args)
        {
            if (args.Length <= 1)
            {
                Console.WriteLine("Parámetros insuficientes, necesita especificar de qué quiere ver detalles. Para más info teclear lima help details");
                return;
            }

            switch (args[1].ToLower())
            {
                case "model":
                    if (args.Length > 2)
                        baseDatos(args[2]);
                    else
                        baseDatos();
                    break;
                case "controller":
                    if (args.Length > 2)
                        metodos("controlador", args[2]);
                    else
                        metodos("controlador");
                    break;
                case "middleware":
                    if (args.Length > 2)
                        metodos("middleware", args[2]);
                    else
                        metodos("middleware");
                    break;
                case "migrations":
                    if (args.Length > 2)
                        Lists.listMigrations(true, args[2]);
                    else
                        Lists.listMigrations(true);
                    break;
                case "view":
                    if (args.Length > 2)
                        vista(args[2]);
                    else
                        vista();
                    break;
                default:
                    Console.WriteLine("No puedo mostrar detalles de eso. Para más ayuda teclear lima help details");
                    break;
            }
        }

        public static void vista(string nombreVista = "")
        {
            String nombreArchivo;
            int numMet = 0;

            if (nombreVista == "")
            {
                do
                {
                    Console.Write("Nombre de la vista: ");
                    nombreVista = Console.ReadLine();
                } while (nombreVista == "");

            }

            string[] files;
            String metodo = "";

            try
            {
                // Obtener todos los archivos del directorio
                files = Directory.GetFiles("app\\controladores\\");

                string nombre;
                string nombreEncontrado = "";
                String metodoEncontrado = "";
                List<String> lista;

                foreach (string f in files)
                {
                    nombre = Path.GetFileName(f);
                     lista= Ficheros.leeFichero("app\\controladores\\" + nombre);


                    foreach (String linea in lista)
                    {
                        if (linea.Contains("public static function"))
                        {
                            int pos = linea.IndexOf("function");
                            metodo = linea.Substring(pos + 9, linea.Length - pos - 11);
                        }

                        if (linea.Contains("->render(\'" + nombreVista + "\'"))
                        {
                            if (metodo.IndexOf("(") > 0)
                                metodo = metodo.Substring(0, metodo.IndexOf("("));

                            Console.WriteLine("Llamada por: " + nombre + " - " + metodo);
                            nombreEncontrado = nombre.Substring(0, nombre.Length -4);
                            metodoEncontrado = metodo;
                        }
                    }
                }

                Ficheros.leeFichero("app\\includes\\routes.php");
                lista = Ficheros.contiene("[" + nombreEncontrado + "::Class, \'" + metodoEncontrado);
                if (lista.Count > 0)
                {
                    foreach (string f in lista)
                    {
                        int inicio = f.IndexOf("(\'");
                        int fin = f.IndexOf("\'", inicio + 2);
                        Console.WriteLine("URL: " + f.Substring(inicio +2, fin - inicio -2));
                    }
                }
            }
            catch (Exception ex)
            {
                Console.WriteLine($"Error: {ex.Message}");
            }
        }

        public static void metodos(String nombre, string clase = "")
        {
            String nombreArchivo;
            int numMet = 0;

            if (clase == "" && nombre == "controlador")
            {
                Lists.listaArchivos("controladores");

                do
                {
                    Console.Write("Nombre del controlador: ");
                    clase = Console.ReadLine();
                } while (clase == "");

                clase = Create.iniciaClase(clase);
            }

            switch (nombre)
            {
                case "controlador":
                    nombreArchivo = "app\\controladores\\" + clase + ".php";
                    break;
                case "middleware":
                    nombreArchivo = "app\\clases\\Middleware.php";
                    break;
                case "modelo":
                    nombreArchivo = "app\\modelos\\" + clase + ".php";
                    break;
                case "funciones":
                    nombreArchivo = "app\\includes\\" + clase + ".php";
                    break;
                default:
                    nombreArchivo = "";
                    break;
            }

            Console.WriteLine("");

            if (!System.IO.File.Exists(nombreArchivo))
            {
                Console.Write("El archivo no existe ");
            }
            else
            {
                List<String> lista = Ficheros.leeFichero(nombreArchivo);
                List<String> urls = new List<String>();

                if (nombre == "controlador")
                    urls = Ficheros.leeFichero("app\\includes\\routes.php");

                int vistas = 0;
                bool inicio = true;
                bool comentarios = false;

                foreach(String s in lista) 
                {
                    String lineaDef ="";

                    if (!comentarios) 
                        lineaDef = s;

                    if (s.Contains("//") && !comentarios)
                        lineaDef = s.Substring(0, s.IndexOf("//"));

                    if (s.Contains("/*") && !comentarios)
                    {
                        if (s.IndexOf("/*") > 0)
                            lineaDef = s.Substring(0, s.IndexOf("/*"));
                        else
                            lineaDef = "";

                        comentarios = true;
                    }

                    if (s.Contains("*/") && comentarios)
                    {
                        if (s.IndexOf("*/") > 0)
                            lineaDef = s.Substring(s.IndexOf("*/"), s.Length - s.IndexOf("*/"));
                        else
                            lineaDef = "";

                        comentarios = false;
                    }



                    if (lineaDef.Contains("function"))
                    {
                        if (!inicio)
                        {
                            if (vistas == 0 && nombre == "controlador")
                                Console.WriteLine("No llama a ninguna vista");
                        }

                        int index = lineaDef.IndexOf("function");
                        String recorte = lineaDef.Substring(index + 9);

                        if (!recorte.Contains("__construct"))
                        {
                            inicio = false;
                            vistas = 0;

                            if (nombre != "middleware")
                            {
                                Mensajes.lineaAyuda(recorte.Substring(0, recorte.Length - 1), "\n", true);

                                String metodo = recorte.Substring(0, recorte.IndexOf("("));
                                foreach (String linea in urls)
                                {
                                    if (linea.Contains(clase) && linea.Contains(metodo))
                                        if (linea.Contains("->route"))
                                            Lists.muestraURL(linea);
                                }

                            }
                            else
                                Console.WriteLine(recorte.Substring(0, recorte.Length - 1));

                            numMet++;
                        }
                    }

                    if (lineaDef.Contains("render") && nombre == "controlador")
                    {
                        vistas++;
                        string[] partes;
                        if (lineaDef.IndexOf("\'") > 0)
                            partes = lineaDef.Split('\'');
                        else
                            partes = lineaDef.Split('\"');

                        Console.WriteLine("Llama a la vista: " + partes[1]);
                    }

                }
                if (vistas == 0 && nombre == "controlador")
                    Console.WriteLine("No llama a ninguna vista");
            }
            if (nombre != "funciones")
                Console.WriteLine(numMet + " métodos.");
            else
                Console.WriteLine(numMet + " funciones.");
        }

        public static void baseDatos(string archivo = "")
        {
            if (archivo == "")
            {
                Console.Write("Introduce Modelo: ");
                archivo = Console.ReadLine();
            }

            if (!Ficheros.existe("app\\modelos\\" + archivo + ".php"))
            {
                Mensajes.ponError("ERROR: No puedo abrir el modelo " + archivo + ".");
                return;
            }

            Ficheros.leeFichero("app\\modelos\\" + archivo + ".php");

            List<String> linea = Ficheros.contiene("$tabla");
            int fin = linea[0].Length - 2;
            int inicio = linea[0].IndexOf("=") + 3;
            Mensajes.lineaAyuda("Tabla: " + linea[0].Substring(inicio, fin - inicio), "\n", true);

            linea = Ficheros.contiene("protected static $columnasDB");
            string[] atributos = linea[0].Split('\'');
            foreach (string atributo in atributos)
            {
                if (!atributo.Contains(",") && !atributo.Contains("[") && atributo != "];")
                    Console.WriteLine(atributo);
            }

            Console.Write("\nMétodos del modelo:");
            metodos("modelo", archivo);
        }
    }
}
