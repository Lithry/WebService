using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// Descripción breve de NotasCerradas
/// </summary>
public class NotasCerradas {
    string _photo;
    public string Photo { get { return _photo; } set { _photo = value; } }

    string _alumno;
    public string Alumno { get { return _alumno; } set { _alumno = value; } }

    int _dni;
    public int Dni { get { return _dni; } set { _dni = value; } }

    List<Materia> _materias = new List<Materia>();
    public List<Materia> Materias { get { return _materias; } set { _materias = value; } }


    public NotasCerradas() {}
}