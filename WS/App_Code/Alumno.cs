﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;


public class Alumno {
    string _name;
    public string Name { get { return _name; } set { _name = value; } }

    int _dni;
    public int Dni { get { return _dni; } set { _dni = value; } }

    string _photo;
    public string Photo { get { return _photo; } set { _photo = value; } }

    string _photoFileType;
    public string PhotoFileType { get { return _photoFileType; } set { _photoFileType = value; } }

    //List<Examen> _examenes;
    Dictionary<string, List<int>> _examenes = new Dictionary<string, List<int>>();
    public Dictionary<string, List<int>> Examenes { get { return _examenes; } set { _examenes = value; } }
    //public List<Examen> Examenes { get { return _examenes; } set { _examenes = value; }}

    public Alumno() {}

    public Alumno(string name, int dni, string photo, string photoType) {
        _name = name;
        _dni = dni;
        _photo = photo;
        _photoFileType = photoType;
    }

    public string AgregarExamen(Examen nExamen){
        string res = "";
        if (_examenes.ContainsKey(nExamen.Materia)) {
            _examenes[nExamen.Materia].Add(nExamen.Nota);
            res = "se agrego la nota (" + nExamen.Nota + ") a la lista de notas del alumno de la materia " + nExamen.Materia;
        }
        else {
            List<int> notas = new List<int>();
            notas.Add(nExamen.Nota);
            _examenes.Add(nExamen.Materia, notas);
            res = "Se agrego la materia " + nExamen.Materia + " y la nota (" + nExamen.Nota + ") con su lista al alumno";
        }
        return res;

    }

    public void CerrarNotas(ref Dictionary<string, bool> notas) {
        int promedio;
        foreach (string materia in _examenes.Keys) {
            promedio = 0;
            for (int i = 0; i < _examenes[materia].Count; i++)
            {
                promedio += _examenes[materia][i];
            }
            promedio /= _examenes[materia].Count;
            if (promedio > 8)
                notas.Add(materia, true);
            else
                notas.Add(materia, false);
        }
    }
}