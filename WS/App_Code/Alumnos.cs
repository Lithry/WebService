using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// Descripción breve de Alumnos
/// </summary>
public class Alumnos
{
    List<Alumno> _alumnosList;
    public List<Alumno> AlumnosList { get { return _alumnosList; } set { _alumnosList = value; }}

    public Alumnos() { }

}