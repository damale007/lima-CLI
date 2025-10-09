using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MVC
{
    internal class Modify
    {
        const int CREAR = 0;
        const int MODIFICAR = 1;
        const int BORRAR = 2;
        const int NOMIDDLE = 3;

        public static void comandos(String[] args)
        {
            if (args.Length <= 1)
            {
                Console.WriteLine("Parámetros insuficientes, necesita especificar que quiere modificar. Para más info teclear lima help modify");
                return;
            }

            switch (args[1].ToLower())
            {
                case "route":
                    modificaURL(false, args);
                    break;
                case "middleware":
                    if (args.Length > 2)
                        Create.listaMiddle(MODIFICAR, args[2]);
                    else
                        Create.listaMiddle(MODIFICAR);
                    break;
                default:
                    Console.WriteLine("No puedo modificar eso. Para más ayuda teclear lima help modify");
                    break;
            }
        }

        public static void modificaURL(bool borra, String[] args)
        {
            String url = "";

            if (args.Length > 2)
                url = args[2];

            if (url == "")
            {
                Console.Write("URL: ");
                url = Console.ReadLine();
            }

            if (!borra)
                if (args.Length > 3)
                    if (args[3] == "nomiddleware")
                    {
                        Ficheros.escribeURL(NOMIDDLE, "", "", url);
                        Console.WriteLine("Se han eliminado los middleware de la URL seleccionada.");
                    }
                    else
                    {
                        Create.indexURL(MODIFICAR, url);
                    }
                else
                {
                    Create.indexURL(MODIFICAR, url);
                }
            else
            {
                Ficheros.escribeURL(BORRAR, "", "", url);
            }
        }
    }
}
