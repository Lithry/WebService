using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// Descripción breve de Alumno
/// </summary>
public class Alumno {

    string _name;
    public string Name { get { return _name; } set { _name = value; } }

    int _dni;
    public int Dni { get { return _dni; } set { _dni = value; } }

    List<Examen> _examenes;
    public List<Examen> Examenes { get { return _examenes; } set { _examenes = value; }}

    public Alumno() {}

    public Alumno(string name, int dni) {
        Name = name;
        _dni = dni;
    }
}