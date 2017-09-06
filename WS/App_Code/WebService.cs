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

    public WebService() {
        materias.Add("Fisica");
        materias.Add("Programacion");
        materias.Add("Algebra");
    }

    [WebMethod]
    public Respuesta CargarAlumno(string nombre, string dni) {
        HttpContext context = HttpContext.Current;

        if (context.Application["List"] == null) {
            alumnos = new List<Alumno>();
        }
        else {
            alumnos = (List<Alumno>)context.Application["List"];
        }

        Respuesta res = new Respuesta();
        for (int i = 0; i < dni.Length; i++)
        {
            if (!char.IsDigit(dni[i]))
            {
                res.Res = false;
                res.Exp = "DNI Incorrecto";
                return res;
            }
        }

        Alumno al = new Alumno(nombre, int.Parse(dni));

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
    public List<NotasCerradas> CerrarNotas() {
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
        return notas;
    }

    [WebMethod]
    public List<string> ConsultarMaterias() {
        return materias;
    }
}
