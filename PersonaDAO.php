<?php
/**
Clase encargada de actualizar la información del objeto persona en la BBDD
*/

class PersonaDAO {
    public insert(Persona $p) {
        /* No insertamos el id, se supone que lo genera automáticamente la BBDD */
        SimpleQuery("insert into personas (nombre,apellidos,num_doc) values (" . $p->nombre . "," . $p->apellidos . "," . $p->num_doc . ")");
    }

    public update(Persona $p) {
        SimpleQuery("update personas (nombre,apellidos,num_doc) values ('" . $p->nombre . "','" . $p->apellidos . "','" . $p->num_doc . "') where id = '" . $p->id . "'");
    }

    public delete(Persona $p) {
        SimpleQuery("delete personas where id = '" . $p->id . "'");
    }

    public Persona getPersona($id) {

        $filas = SelectArray("select * from personas where id = '$id'");
        $fila = $filas[0];

        $p = new Persona();
        $p->nombre = $fila['nombre'];
        $p->apellidos = $fila['apellidos'];
        $p->num_doc = $fila['num_doc'];
        $p->id = $fila['id'];

        return $p;
    }
}?>
