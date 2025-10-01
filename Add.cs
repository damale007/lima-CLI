using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MVC
{
    internal class Add
    {
        public static void comandos(String[] args)
        {
            if (args.Length <= 1)
            {
                Console.WriteLine("Parámetros insuficientes, necesita especificar que quiere añadir. Para más info teclear lima help add");
                return;
            }

            switch (args[1].ToLower())
            {
                case "middleware":
                    if (args.Length > 2)
                        middleware(args[2]);
                    else
                        middleware();
                    break;
                case "bootstrap":
                    bootstrap();
                    break;
                default:
                    Console.WriteLine("No puedo añadir eso. Para más ayuda, teclear lima help add");
                    break;
            }
        }

        private static void bootstrap()
        {
            Ficheros.leeFichero("app\\vistas\\cabecera.php");
            Ficheros.inserta("\t<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB\" crossorigin=\"anonymous\">", "app.css");
            Ficheros.escribeFichero("app\\vistas\\cabecera.php");

            Ficheros.leeFichero("app\\vistas\\footer.php");
            Ficheros.inserta("<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI\" crossorigin=\"anonymous\"></script>", "</body>");
            Ficheros.escribeFichero("app\\vistas\\footer.php");
            Console.WriteLine("Bootstrap añadido, ahora puede usar sus funciones en la web.");
        }

        public static void middleware(String url = "")
        {
            if (!Ficheros.existe("public\\index.php"))
            {
                Mensajes.ponError("ERROR: No puedo abrir el archivo public\\index.php");
                return;
            }

            if (url == "")
            {
                Console.Write("Introduce URL: ");
                url = Console.ReadLine();
            }
            if (url.Substring(0, 1) != "/")
                url = "/" + url;

            Console.WriteLine("\nListado de middlewares:");
            Details.metodos("middleware", "");
            Console.WriteLine();

            Console.Write("Introduce nombre del middleware: ");
            String md = Console.ReadLine();

            Ficheros.addMiddleware("(\'" + url + "\'", md);
            Console.WriteLine("Middleware asignado.");
        }
    }
}
