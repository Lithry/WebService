using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;
using System.Web.Script.Serialization;


/// <summary>
/// Descripción breve de WebService
/// </summary>
[WebService(Namespace = "http://tempuri.org/")]
[WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
// Para permitir que se llame a este servicio web desde un script, usando ASP.NET AJAX, quite la marca de comentario de la línea siguiente. 
[System.Web.Script.Services.ScriptService]
public class WebService : System.Web.Services.WebService
{
    List<Alumno> alumnos;

    List<string> materias = new List<string>();

    public WebService() {
        materias.Add("Fisica");
        materias.Add("Programacion");
        materias.Add("Algebra");
    }

    [WebMethod]
    public string testAssignment(string inputData)
    {
        return inputData;
    }

    [WebMethod]
    public string CargarAlumno(string nombre, string dni) {
        HttpContext context = HttpContext.Current;

        if (context.Application["List"] == null) {
            alumnos = new List<Alumno>();
        }
        else {
            alumnos = (List<Alumno>)context.Application["List"];
        }

        string respond = "";
        //Respuesta res = new Respuesta();
        for (int i = 0; i < dni.Length; i++)
        {
            if (!char.IsDigit(dni[i]))
            {
                //res.Res = false;
                respond = "DNI Incorrecto";
                return respond;
            }
        }

        Alumno al = new Alumno(nombre, int.Parse(dni));

        foreach (Alumno alum in alumnos)
        {
            if (alum.Dni == al.Dni)
            {
                //res.Res = false;
                respond = "Alumno Duplicado";
                return respond;
            }
        }
        alumnos.Add(al);
        //res.Res = true;
        respond = "Alumno Cargado";
        context.Application["List"] = alumnos;
        return respond;
    }

    [WebMethod]
    public string CargarExamen(string dni, string nota, string materia) {
        // Alumno existe -> agrega | Alumno no existe -> Error
        HttpContext context = HttpContext.Current;

        if (context.Application["List"] == null) {
            alumnos = new List<Alumno>();
        }
        else {
            alumnos = (List<Alumno>)context.Application["List"];
        }

        string respond = "";
        //Respuesta res = new Respuesta();

        if (dni == null)
        {
            respond = "DNI Nulo";
            return respond;
        }

        if (!materias.Contains(materia)) {
            //res.Res = false;
            respond = "No existe la materia";
            context.Application["List"] = alumnos;
            return respond;

        }

        foreach (Alumno alum in alumnos) {
            if (alum.Dni == int.Parse(dni)) {
                Examen nExamen = new Examen(int.Parse(nota), materia);
                respond = alum.AgregarExamen(nExamen);
                context.Application["List"] = alumnos;
                return respond;
            }
        }

        //res.Res = false;
        respond = "No existe alumno";
        context.Application["List"] = alumnos;
        return respond;
    }

    [WebMethod]
    public string CerrarNotas() {
        HttpContext context = HttpContext.Current;

        if (context.Application["List"] == null) {
            alumnos = new List<Alumno>();
        }
        else {
            alumnos = (List<Alumno>)context.Application["List"];
        }

        List<NotasCerradas> notas = new List<NotasCerradas>();

        foreach(Alumno al in alumnos) {
            NotasCerradas nota = new NotasCerradas();
            nota.Alumno = al.Name;
            nota.Dni = al.Dni;

            foreach (string materia in al.Examenes.Keys) {
                Materia mat = new Materia();
                mat.Nombre = materia;
                int promedio = 0;
                for (int j = 0; j < al.Examenes[materia].Count; j++)
                {
                    promedio += al.Examenes[materia][j];
                }
                promedio /= al.Examenes[materia].Count;
                mat.Aprobado = (promedio >= 7);

                nota.Materias.Add(mat);
            }
            notas.Add(nota);
        }

        JavaScriptSerializer serializer = new JavaScriptSerializer();
        string json = serializer.Serialize(notas);
        return json;
    }

    [WebMethod]
    public List<string> ConsultarMaterias() {
        return materias;
    }
}
