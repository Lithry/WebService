using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// Descripción breve de Examen
/// </summary>
public class Examen {
    int _nota;
    public int Nota { get { return _nota; } set { _nota = value; } }

    string _materia;
    public string Materia { get { return _materia; } set { _materia = value; } }

    public Examen() {}

    public Examen(int nota, string materia) {
        _nota = nota;
        _materia = materia;
    }
}