using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MVC
{
    internal class Remove
    {
        const int CREAR = 0;
        const int MODIFICAR = 1;
        const int BORRAR = 2;
        const int NOMIDDLE = 3;

        public static void comandos(String[] args)
        {
            if (args.Length <= 1)
            {
                Console.WriteLine("Parámetros insuficientes, necesita especificar que quiere eliminar. Para más info teclear lima help remove");
                return;
            }

            switch (args[1].ToLower())
            {
                case "route":
                    Modify.modificaURL(true, args);
                    break;
                case "middleware":
                    String ar1 = "";
                    String ar2 = "";
                    String ar3 = "";

                    if (args.Length > 2)
                        ar1 = args[2];
                    if (args.Length > 3)
                        ar2 = args[3];
                    if (args.Length > 4)
                        ar3 = args[4];

                    borraMiddl(ar1, ar2, ar3);
                    break;
                default:
                    Console.WriteLine("No puedo modificar eso. Para más ayuda teclear lima help remove");
                    break;
            }
        }

        public static void borraMiddl(String nombre = "", String controlador = "", String metodo = "")
        {
            if (nombre == "")
            {
                Console.Write("Nombre: ");
                nombre = Console.ReadLine();
            }
            if (controlador == "")
            {
                Console.Write("Controlador: ");
                controlador = Console.ReadLine();
            }

            if (metodo == "")
            {
                Console.Write("Método: ");
                metodo = Console.ReadLine();
            }

            Ficheros.escribeURL(BORRAR, "", "", controlador + "', '" + metodo + "', '" + nombre);
        }
    }
}
