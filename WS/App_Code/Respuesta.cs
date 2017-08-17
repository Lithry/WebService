using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// Descripción breve de Respuesta
/// </summary>
public class Respuesta {

    bool _respuesta;
    public bool Res { get { return _respuesta; } set { _respuesta = value; } }

    string _exp;
    public string Exp { get { return _exp; } set { _exp = value; } }

    public Respuesta() {
        _respuesta = false;
        _exp = "";
    }

    public Respuesta(bool res, string exp) {
        _respuesta = res;
        _exp = exp;
    }
}