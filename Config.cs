using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace MVC
{
    internal class Config
    {
        public static void comandos(String[] args)
        {
            if (args.Length <= 1)
            {
                muestraConfig();
                Console.WriteLine("\nPara más info sobre config, teclear lima help config");
                return;
            }

            switch (args[1].ToLower())
            {
                case "home404":
                    if (args.Length > 2)
                        redireccion(args[2]);
                    else
                        Console.WriteLine("Debe especificar con true o false si desea activar la redirección a la home");
                    break;
                case "title":
                    if (args.Length > 2)
                        titulo(args[2]);
                    else
                        titulo();
                    break;
                case "description":
                    if (args.Length > 2)
                        descripcion(args[2]);
                    else
                        descripcion();
                    break;
                case "db":
                    configbd();
                    break;
                case "controller":
                    if (args.Length > 2)
                        controller(args[2]);
                    else
                        controller();
                    break;
                case "define":
                    if (args.Length > 2)
                        defineVariable(args[2]);
                    else
                        defineVariable();
                    break;
                case "apache":
                    if (args.Length > 2)
                        apache(args[2]);
                    else
                        apache();
                    break;
                default:
                    Console.WriteLine("No puedo configurar eso. Para más ayuda teclear lima help config");
                    break;
            }
        }

        public static void apache(String ruta = "")
        {
            if (ruta == "")
            {
                Console.Write("Introduce la ruta de Apache: ");
                ruta = Console.ReadLine();
            }

            Ficheros.escribeFichero("c:\\Lima\\lima.cfg", "Apache=" + ruta);
            Console.WriteLine("Configuración guardada.");
        }

        public static void controller(String cadena = "")
        {
            if (cadena == "")
            {
                Lists.listaArchivos("controladores");
                Console.Write("Nombre del controlador: ");
                cadena = Console.ReadLine();
            }

            Ficheros.anadeFichero("app\\includes\\includes.php", "include \"../app/controladores/" + cadena + "\"");
            Console.WriteLine("El controlador se cargará siempre.");
        }

        public static void defineVariable(String cadena = "")
        {
            String valor = "";

            if (cadena == "")
            {
                Console.Write("Nombre de la variable: ");
                cadena = Console.ReadLine();
            }


            if (cadena == "LLAVESECRETA")
            {
                Console.Write("¿Desea generar una automática? ");
                Mensajes.lineaAyuda("(s/n)", ": ", true);
                do
                {
                    valor = Console.ReadLine().ToLower();
                } while (valor != "s" && valor != "n");
                if (valor == "s")
                {
                    string caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()-_|?";
                    const int longitud = 32;
                    StringBuilder cadenaAleatoria = new StringBuilder();
                    Random random = new Random();

                    for (int i = 0; i < longitud; i++)
                    {
                        int indice = random.Next(caracteres.Length);
                        cadenaAleatoria.Append(caracteres[indice]);
                    }

                    valor = cadenaAleatoria.ToString();
                    Console.WriteLine("Valor de la variable: " + valor);
                }
                else valor = "";

            }

            if (valor == "")
            {
                Console.Write("Valor de la variable ");
                if (cadena == "LLAVESECRETA")
                    Console.Write("(debe tener 32 caracteres): ");

                Mensajes.lineaAyuda("(si es cadena debe ir entre \'\')", ": ", true);
                valor = Console.ReadLine();
            }
            Ficheros.leeFichero("app\\includes\\config\\variables.php");
            if (Ficheros.existeLinea("define(\'" + cadena + "\'") > 0)
                Ficheros.reemplazaArchivo("app\\includes\\config\\variables.php", "define(\'" + cadena + "\'", "\tdefine(\'" + cadena + "\', " + valor + ");");
            else
                Ficheros.anadeFichero("app\\includes\\config\\variables.php", "\tdefine(\'" + cadena + "\', " + valor + ");");

            Console.WriteLine("Constante definida correctamente.");
        }

        public static void configbd()
        {
            Console.Write("Introduce host: ");
            String host = Console.ReadLine();
            Console.Write("Introduce usuario: ");
            String user = Console.ReadLine();
            Console.Write("Introduce contraseña: ");
            String password = readPassword();
            Console.Write("\nIntroduce base de datos: ");
            String bd = Console.ReadLine();

            Ficheros.reemplazaArchivo("app\\includes\\config\\variables.php", "define(\'DB_HOST\',", "\tdefine('DB_HOST', \'" + host + "');");
            Ficheros.reemplazaArchivo("app\\includes\\config\\variables.php", "define(\'DB_USER\',", "\tdefine('DB_USER', \'" + user + "');");
            Ficheros.reemplazaArchivo("app\\includes\\config\\variables.php", "define(\'DB_PASSWORD\',", "\tdefine('DB_PASSWORD', \'" + password + "');");
            Ficheros.reemplazaArchivo("app\\includes\\config\\variables.php", "define(\'DATABASE\',", "\tdefine('DATABASE', \'" + bd + "');");

            Console.WriteLine("Conexión a la base de datos configurada.");
        }

        private static String readPassword()
        {
            List<string> lstClave = new List<string>();
            int currentLineCursor = Console.CursorTop;

            while (true)
            {
                var tecla = Console.ReadKey(true);
                if (tecla.Key == ConsoleKey.Enter)
                {
                    break;
                }
                if (tecla.Key == ConsoleKey.Backspace)
                {
                    if (lstClave.Count > 0)
                    {
                        Console.SetCursorPosition(0, currentLineCursor);
                        // Sobrescribe con espacios para "borrar"
                        Console.Write(new string(' ', Console.WindowWidth));
                        Console.SetCursorPosition(0, currentLineCursor);
                        // Escribe algo nuevo
                        lstClave.RemoveAt(lstClave.Count - 1);
                        Console.Write("Introduce contraseña: " + new string('*', lstClave.Count));
                    }
                }
                else
                {
                    lstClave.Add(Convert.ToString(tecla.KeyChar));
                    Console.Write("*");
                }
            }
            string strDato = "";

            for (int i = 0; i < lstClave.Count(); i++)
            {
                strDato += lstClave[i];
            }
            return strDato;
        }

        public static void descripcion(String desc = "")
        {
            if (!Ficheros.existe("app\\includes\\config\\variables.php"))
            {
                Mensajes.ponError("ERROR: No puedo abrir el archivo app\\includes\\config\\variables.php");
                return;
            }

            if (desc == "")
            {
                Console.Write("Introduce una descripcion: ");
                desc = Console.ReadLine();
            }
            Ficheros.reemplazaArchivo("app\\includes\\config\\variables.php", "define(\'DESCRIPTION\'", "\tdefine(\'DESCRIPTION\', \'" + desc + "\');");
            Console.WriteLine("Descripción establecida.");
        }

        private static void titulo(String titulo = "")
        {
            if (!Ficheros.existe("app\\includes\\config\\variables.php"))
            {
                Mensajes.ponError("ERROR: No puedo abrir el archivo app\\includes\\config\\variables.php");
                return;
            }

            if (titulo == "")
            {
                Console.Write("Introduce un título: ");
                titulo = Console.ReadLine();
            }
            Ficheros.reemplazaArchivo("app\\includes\\config\\variables.php", "define(\'TITLE\'", "\tdefine(\'TITLE\', \'" + titulo + "\');");
            Console.WriteLine("Título establecido.");
        }

        public static void redireccion(String activa)
        {
            if (!Ficheros.existe("app\\includes\\config\\variables.php"))
            {
                Mensajes.ponError("ERROR: No puedo abrir el archivo app\\includes\\config\variables.php");
                return;
            }

            if (activa != "true") activa = "false";
            Ficheros.reemplazaArchivo("app\\includes\\config\\variables.php", "define(\'ERROR404\' =", "\tdefine(\'ERROR404\'," + activa + ");");
            if (activa == "true")
                Console.WriteLine("Configurada redirección a la home en caso de error 404.");
            else
                Console.WriteLine("Configurada vista error404.php en caso de error 404.");
        }

        private static void muestraConfig()
        {
            List<String> linea = new List<String>();
            String respuesta = "";

            Ficheros.leeFichero("app\\includes\\config\\variables.php");

            linea = Ficheros.contiene("define(\'ERROR404\'");
            if (linea[0].Contains("true"))
                respuesta = "verdadero. Redireccionará la home en caso de error 404.";
            else
                respuesta = "falso. Redireccionará la vista error404.php.";

            Mensajes.lineaAyuda("home404 ", "está configurado a " + respuesta + "\n");

            List<String> variables = Ficheros.leeFichero("app\\includes\\config\\variables.php");

            linea = Ficheros.contiene("define(\'TITLE\'");
            if (linea.Count > 0)
            {
                String[] inicio = linea[0].Split('\'');
                Console.Write("El título de la web es: ");
                if (inicio[3] == "")
                    Mensajes.ponError("Título no definido");
                else
                    Console.WriteLine(inicio[3]);
            }

            linea = Ficheros.contiene("define(\'DESCRIPTION\'");
            if (linea.Count > 0)
            {
                String[] inicio = linea[0].Split('\'');
                Console.Write("La descripción de la web es: ");
                if (inicio[3] == "")
                    Mensajes.ponError("Descripción no definida");
                else
                    Console.WriteLine(inicio[3]);
            }

            linea = Ficheros.contiene("define(\'DB_HOST\'");
            Console.WriteLine("\nConfiguración de la base de datos:");
            if (linea.Count > 0)
                muestraValorBD(linea[0], "Host de la base de datos: ", "");
            else
                Mensajes.ponError("No definida constante del host de la base de datos. Reinstale el framework");

            linea = Ficheros.contiene("define(\'DB_USER\'");
            if (linea.Count > 0)
                muestraValorBD(linea[0], "Usuario: ", "cambiar por usuario");
            else
                Mensajes.ponError("No definida constante del usuario. Reinstale el framework");

            linea = Ficheros.contiene("define(\'DB_PASSWORD\'");
            if (linea.Count > 0)
                muestraValorBD(linea[0], "Contraseña: ", "cambiar por contraseña");
            else
                Mensajes.ponError("No definida constante de la constaseña. Reinstale el framework");

            linea = Ficheros.contiene("define(\'DATABASE\'");
            if (linea.Count > 0)
                muestraValorBD(linea[0], "Base de datos: ", "cambiar por base de datos");
            else
                Mensajes.ponError("No definida constante de la base de datos. Reinstale el framework");

            Console.WriteLine("\nControladores que se cargan siempre:");
            List<String> controladores = Ficheros.leeFichero("app\\includes\\includes.php");

            if (controladores.Count > 0)
            {
                foreach (String l in controladores)
                {
                    if (l.Contains("app/controladores/"))
                    {
                        String[] strings = l.Split('/');
                        Console.WriteLine(strings[3].Substring(0, strings[3].Length - 6));
                    }
                }
            }
            else
            {
                Console.WriteLine("Ninguno.");
            }

            Console.WriteLine("\nLista de constantes:");
            String llaveSecreta = "";
            foreach (String line in variables)
            {
                if (line.Contains("define") && !line.Contains("TEMPLATES_URL") && 
                    !line.Contains("FUNCIONES_URL") && !line.Contains("CARPETA_IMAGENES") &&
                    !line.Contains("TR_BEGIN") && !line.Contains("TR_COMMIT") && !line.Contains("TR_ROLLBACK"))
                {
                    char comilla = '\'';
                    if (line.Contains('\"'))
                        comilla = '\"';
                    String[] partes = line.Split(comilla);
                    if (partes.Length < 4)
                    {
                        if (partes[1].Contains("LLAVESECRETA"))
                            llaveSecreta = partes[2];
                        
                        Mensajes.lineaAyuda(partes[1] + " ", partes[2].Substring(2, partes[2].Length - 4) + "\n", true);
                    }
                    else
                    {
                        if (partes[1].Contains("LLAVESECRETA"))
                            llaveSecreta = partes[3];
                     
                        Mensajes.lineaAyuda(partes[1] + " ", partes[3] + "\n", true);
                    }

                }
            }
            if (llaveSecreta.Length != 32)
            {
                Mensajes.ponError("LLAVESECRETA debe tener 32 caracteres y tiene " + llaveSecreta.Length);
                Console.WriteLine("En el framework funcionará bien, pero puede dar problemas en otros lenguajes de apps móviles.");
            }

        }

        private static void muestraValorBD(String busca, String texto, String comprueba)
        {
            String [] valores = busca.Split('\'');
            Console.Write(texto);
            if (valores[3] == comprueba)
            {
                Console.ForegroundColor = ConsoleColor.Red;
                Console.WriteLine("no definido aun");
                Console.ResetColor();
            }
            else
                Console.WriteLine(valores[3]);
        }
    }
}
