using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// Descripción breve de Materia
/// </summary>
public class Materia {
    string _materia;
    public string Nombre { get { return _materia; } set { _materia = value; } }

    bool _aprobado;
    public bool Aprobado { get { return _aprobado; } set { _aprobado = value; } }

    public Materia(){}
    public Materia(string materia, bool aprobado) {
        _materia = materia;
        _aprobado = aprobado;
    }
}