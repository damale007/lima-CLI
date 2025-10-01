using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MVC
{
    internal class Mensajes
    {
        /*--------------------------------------------
         * Pone un mensaje en rojo. Usado para errores
         * ------------------------------------------- */
        public static void ponError(String mensaje)
        {
            Console.ForegroundColor = ConsoleColor.Red;
            Console.WriteLine(mensaje);
            Console.ResetColor();
        }

        /*--------------------------------------------
         * Pone un mensaje en verde o amarillo y parte en blanco. 
         * ------------------------------------------- */
        public static void lineaAyuda(string line, String line2, Boolean amarillo = false)
        {
            if (amarillo)
                Console.ForegroundColor = ConsoleColor.DarkYellow;
            else
                Console.ForegroundColor = ConsoleColor.Green;

            Console.Write(line);
            Console.ResetColor();
            Console.Write(line2);
        }
    }
}
