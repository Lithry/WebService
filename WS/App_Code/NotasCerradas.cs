using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// Descripción breve de NotasCerradas
/// </summary>
public class NotasCerradas {
    string _alumno;
    public string Alumno { get { return _alumno; } set { _alumno = value; } }

    int _dni;
    public int Dni { get { return _dni; } set { _dni = value; } }

    List<Materia> _materias = new List<Materia>();
    public List<Materia> Materias { get { return _materias; } set { _materias = value; } }


    public NotasCerradas() {}

    /*public void CerrarNotas()
    {
        if (_alumno != null)
        {
            int promedio;
            foreach (string materia in _alumno.Examenes.Keys)
            {
                promedio = 0;
                for (int i = 0; i < _alumno.Examenes[materia].Count; i++)
                {
                    promedio += _alumno.Examenes[materia][i];
                }
                promedio /= _alumno.Examenes[materia].Count;
                if (promedio > 8)
                    notas.Add(materia, true);
                else
                    notas.Add(materia, false);
            }
        }
    }*/

}