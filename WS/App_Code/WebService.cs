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

    List<string> materias = new List<string>();

    public WebService()
    {
        //materias = new List<string>();
        materias.Add("Fisica");
        materias.Add("Programacion");
        materias.Add("Algebra");
        //Elimine la marca de comentario de la línea siguiente si utiliza los componentes diseñados 
        //InitializeComponent(); 
    }

    [WebMethod]
    public Respuesta CargarAlumno(string nombre, int dni)
    {
        // No existe -> agrega | Existe -> Error
        HttpContext context = HttpContext.Current;

        if (context.Application["List"] == null)
        {
            alumnos = new List<Alumno>();
        }
        else
        {
            alumnos = (List<Alumno>)context.Application["List"];
        }

        Respuesta res = new Respuesta();
        Alumno al = new Alumno(nombre, dni);

        foreach (Alumno alum in alumnos)
        {
            if (alum.Dni == al.Dni)
            {
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
    public Respuesta CargarExamen(int dniAlumno, int nota, string materia) {
        // Alumno existe -> agrega | Alumno no existe -> Error
        HttpContext context = HttpContext.Current;

        if (context.Application["List"] == null) {
            alumnos = new List<Alumno>();
        }
        else {
            alumnos = (List<Alumno>)context.Application["List"];
        }

        Respuesta res = new Respuesta();

        if (!materias.Contains(materia)) {
            res.Res = false;
            res.Exp = "No existe la materia";
            context.Application["List"] = alumnos;
            return res;

        }

        foreach (Alumno alum in alumnos) {
            if (alum.Dni == dniAlumno) {
                Examen nExamen = new Examen(nota, materia);
                res = alum.AgregarExamen(nExamen);
                context.Application["List"] = alumnos;
                return res;
            }
        }

        res.Res = false;
        res.Exp = "No existe alumno";
        context.Application["List"] = alumnos;
        return res;
    }

    [WebMethod]
    public string CerrarNotas() {
        HttpContext context = HttpContext.Current;

        if (context.Application["List"] == null)
        {
            alumnos = new List<Alumno>();
        }
        else
        {
            alumnos = (List<Alumno>)context.Application["List"];
        }
        Dictionary<Alumno, Dictionary<string, bool>> notasCerradas = new Dictionary<Alumno, Dictionary<string, bool>>();


        // Para cada alumno y cada materia
        // Devuelve lista alumnos con lista de sus materias con aprobado o reprovado
        return "Hola a todos";
    }

    [WebMethod]
    public List<string> ConsultarMaterias() {
        return materias;
    }
}
