using System;
using System.Collections;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Runtime.ConstrainedExecution;
using System.Security.Policy;
using System.Text;
using System.Threading.Tasks;

namespace MVC
{
    internal class Ficheros
    {
        private static List<String> lineasFile = new List<String>();
        private static List<string[]> modify = new List<string[]>();
        private static List<string[]> insert = new List<string[]>();
        private static List<string> remove = new List<string>();

        const int CREAR = 0;
        const int MODIFICAR = 1;
        const int BORRAR = 2;
        const int NOMIDDLE = 3;

        public static bool existe(String archivo)
        {
            return System.IO.File.Exists(archivo);
        }

        public static void inserta(List<String> lista, int posicion)
        {
            if (lineasFile.Count > 0)
            {
                foreach (String s in lista)
                {
                    lineasFile.Insert(++posicion, s);
                }
            } else
            {
                foreach (String s in lista)
                {
                    lineasFile.Add(s);
                }
            }
        }

        public static void inserta(String linea, String busca)
        {
            for (int i = 0; i < lineasFile.Count; i++)
            {
                if (lineasFile[i].Contains(busca))
                {
                    lineasFile.Insert(i +1, linea);
                }
            }
        }

        public static int posicion(String busca)
        {
            for (int i = 0; i<lineasFile.Count; i++)
            {
                if (lineasFile[i].Contains(busca))
                    return (i);
            }

            return -1;
        }

        public static int existeLinea(String busca)
        {
            int veces = 0;

            foreach(String linea in lineasFile)
            {
                if (linea.Contains(busca))
                    veces++;
            }

            return veces;
        }

        public static List<String> contiene(String busca)
        {
            List<String> lista = new List<String>();

            foreach (String linea in lineasFile)
            {
                if (linea.Contains(busca))
                    lista.Add(linea);
            }

            return lista;
        }

        private static void modificaLineas(List<String[]> modify, List<String[]> insert, List<String> remove)
        {
            for (int i = 0; i < lineasFile.Count; i++)
            {
                foreach (String[] m in modify)
                {
                    if (lineasFile[i].Contains(m[0])) 
                        if (m[1] == "$$$$nomiddle")
                        {
                            String[] division = lineasFile[i].Split('\'');

                            if (division.Length > 4)
                                lineasFile[i] = division[0] + "'" + division[1] + "'" + division[2] + "'" + division[3] + "']);";
                        }
                        else
                            if (m[1].Contains("ADD||"))
                            {
                                String md = m[1].Substring(5);
                                String[] partes = lineasFile[i].Split(',');
                                if (partes.Length > 3)
                                {
                                    int pos = partes[3].IndexOf(']');
                                    String mid = partes[3].Substring(1, pos);
                                    partes[3].Replace(mid, "\'" + md + "\'");
                                }
                                else
                                {
                                    int pos = partes[2].IndexOf(']');
                                    partes[2] = partes[2].Substring(0, pos) + ", \'" + md + "\']);";
                                }

                            lineasFile[i] = String.Join(",", partes);
                            }
                            else
                                lineasFile[i] = m[1];
                }

                for (int j=0; j<insert.Count; j++)
                {
                    if (lineasFile[i].Contains(insert[j][0]))
                    {
                        lineasFile.Insert(i, insert[j][1]);
                        insert[j][0] = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
                    }
                }

                foreach (String r in remove)
                {
                    if (lineasFile[i].Contains(r))
                        lineasFile.Remove(lineasFile[i]);
                }
            }
        }


        public static void addMiddleware(String busca, String md)
        {
            leeFichero("public\\index.php");

            modify.Clear();
            insert.Clear();
            remove.Clear();
            String[] b = { busca, "ADD||" + md };

            modify.Add(b);
            modificaLineas(modify, insert, remove);

            escribeFichero("public\\index.php");
        }


        /* -----------------------------------------------
        * Añade, modifica o elimina una URL de public/index.php
        * modif 0: Crear    1: Modificar     2:  Borrar
        * ----------------------------------------------- */

        public static void escribeURL(int modif, string linea, String controlador, String url)
        {
            List<String> definiciones = new List<String>();
            List<String> middles = new List<String>();
            List<String> uses = new List<String>();
            Boolean contenido = false;


            if (!Ficheros.existe("public\\index.php"))
            {
                Mensajes.ponError("No existe archivo de definiciones de URLs. Ese fichero es indispensable para funcionar.");
                return;
            }

            leeFichero("public\\index.php");

            for (int i=0; i<lineasFile.Count; i++)
                //while ((registro = sr.ReadLine()) != null)
            {
                if (lineasFile[i].Contains("use "))
                {
                    uses.Add(lineasFile[i]);
                    if (lineasFile[i].Contains(controlador))
                        contenido = true;
                }

                if (lineasFile[i].Contains("$router->get") || lineasFile[i].Contains("$router->post"))
                    definiciones.Add(lineasFile[i]);

                if (lineasFile[i].Contains("$router->middleware"))
                    middles.Add(lineasFile[i]);
            }

            if (!contenido && modif == CREAR && controlador != "*")
                inserta("use Controlador\\" + controlador + ";", "use MVC\\Router;");

            modify.Clear();
            insert.Clear();
            remove.Clear();
            String[] b = { "'" + url + "'", linea};

            switch (modif)
            {
                case CREAR:
                    b[0] = "$router->comprobarRutas();";
                    insert.Add(b);
                    break;
                case MODIFICAR:
                    modify.Add(b);
                    break;
                case BORRAR:
                    remove.Add("'" + url + "'");
                    break;
                case NOMIDDLE:
                    b[1] = "$$$$nomiddle";
                    modify.Add(b);
                    break;
            }

            modificaLineas(modify, insert, remove);

            escribeFichero("public\\index.php");

            switch (modif)
            {
                case MODIFICAR:
                    Console.WriteLine("URL modificada correctamente.");
                    break;
                case BORRAR:
                    Console.WriteLine("URL eliminada correctamente.");
                    break;
                case CREAR:
                    Console.WriteLine("URL creada correctamente.");
                    break;
            }
        }

        public static void reemplazaArchivo(String archivo, String busca, String modifica)
        {
            leeFichero(archivo);
            
            for (int i=0; i<lineasFile.Count; i++) { 
                if (lineasFile[i].Contains(busca))
                    lineasFile[i] = modifica;
            }
            escribeFichero(archivo);
            lineasFile.Clear(); 
        }

        public static string obtieneURL(String controlador, String metodo)
        {
            String url = "";

            if (!Ficheros.existe("public\\index.php"))
            {
                Mensajes.ponError("ERROR: No puedo abrir el archivo public\\index.php");
                return "";
            }

            FileStream file = new FileStream("public\\index.php", FileMode.Open, FileAccess.Read);
            StreamReader sr = new StreamReader(file);

            string registro = "";

            while ((registro = sr.ReadLine()) != null)
            {
                if (registro.Contains("[" + controlador + "::Class, '" + metodo + "'"))
                {
                    int inicio = registro.IndexOf("('") + 2;
                    int fin = registro.IndexOf("',");
                    url = registro.Substring(inicio, fin - inicio);
                }
            }

            sr.Close();
            file.Close();

            return url;
        }

        //Devuelve true o false si existe o no una cadena en un fichero
        public static bool existeEnFichero(String fichero, String busca)
        {
            bool ret = false;

            if (!Ficheros.existe(fichero))
            {
                Mensajes.ponError("ERROR: No puedo arbir el archivo " + fichero);
                return false;
            }

            return File.ReadLines(fichero).Any(linea => linea.Contains(busca));
        }

        //Guarda el fichero con el contenido pasado por parámetros
        public static void escribeFichero(string fichero, string contenido)
        {
            String[] cont = new string[1];
            cont[0] = contenido;

            File.WriteAllLines(fichero, cont);
        }

        //Guarda el fichero con el contenido en memoria
        public static void escribeFichero(string fichero)
        {
            File.WriteAllLines(fichero, lineasFile);
        }

        // Añade un contenido al final del archivo 
        public static bool anadeFichero(String fichero, String contenido)
        {
            if (!File.Exists(fichero))
                return false;

            File.AppendAllText(fichero, contenido + Environment.NewLine);
            return true;
        }

        //Lee un archivo y devuelve una lista con todas las líneas del fichero. Además esa lista se queda en memoria en la clase
        public static List<String> leeFichero(String archivo)
        {
            if (!File.Exists(archivo))
            {
                Mensajes.ponError("No se encontró el archivo: " + archivo);
                return null;
            }

            string[] lines = File.ReadAllLines(archivo);
            lineasFile = new List<string>(lines);

            return lineasFile;
        }

        public static String getPath()
        {
            return System.IO.Directory.GetCurrentDirectory();
        }

        public static String getUnit() {
            return getPath().Substring(0, 3);
        }
    }
}
