using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;


/// <summary>
/// Descripción breve de WebService
/// </summary>
[WebService(Namespace = "http://tempuri.org/")]
[WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
// Para permitir que se llame a este servicio web desde un script, usando ASP.NET AJAX, quite la marca de comentario de la línea siguiente. 
// [System.Web.Script.Services.ScriptService]
public class WebService : System.Web.Services.WebService
{
    List<Alumno> alumnos;

    public WebService()
    {
        //Elimine la marca de comentario de la línea siguiente si utiliza los componentes diseñados 
        //InitializeComponent(); 
    }

    [WebMethod]
    public Respuesta CargarAlumno(string nombre, int dni) {
        // No existe -> agrega | Existe -> Error
        HttpContext context = HttpContext.Current;

        if (context.Application["List"] == null) {
            alumnos = new List<Alumno>();
        }
        else {
            alumnos = (List<Alumno>)context.Application["List"];
        }

        Respuesta res = new Respuesta();
        Alumno al = new Alumno(nombre, dni);

        foreach (Alumno alum in alumnos)
        {
            if (alum.Dni == al.Dni) {
                res.Res = false;
                res.Exp = "Alumno Duplicado";
                return res;
            }
        }
        alumnos.Add(al);
        res.Res = true;
        res.Exp = "Alumno Cargado";
        context.Application["List"] = alumnos;
        return res;
    }

    [WebMethod]
    public Respuesta CargarExamen() {
        // Alumno existe -> agrega | Alumno no existe -> Error


        Respuesta res = new Respuesta(false, "Test");
        return res;
    }

    [WebMethod]
    public string CerrarNotas()
    {
        // Para cada alumno y cada materia
        // Devuelve lista alumnos con lista de sus materias con aprobado o reprovado
        return "Hola a todos";
    }

}
