<?php

class Peleador {
    var $identificacion = "";
    var $nombre = "";
    var $apellido = "";
    var $fecha_nacimiento = "";
    var $foto = "";
    var $habilidades= "";
    var $tipo="";
    var $nivel="";

    function edad() {
        $fecha_n = strtotime($this->fecha_nacimiento);
        $fecha_actual = time();
        $edad = ($fecha_actual - $fecha_n) / (60 * 60 * 24 * 365.25);
        return floor($edad);
    }
    function obtener_signo_zodiacal($fecha_nacimiento) {
        $fecha = new DateTime($fecha_nacimiento);
        $mes = (int) $fecha->format('m');
        $dia = (int) $fecha->format('d');
    
        $zodiaco = [
            ['signo' => 'Aries', 'inicio' => [3, 21], 'fin' => [4, 19]],
            ['signo' => 'Tauro', 'inicio' => [4, 20], 'fin' => [5, 20]],
            ['signo' => 'Géminis', 'inicio' => [5, 21], 'fin' => [6, 20]],
            ['signo' => 'Cáncer', 'inicio' => [6, 21], 'fin' => [7, 22]],
            ['signo' => 'Leo', 'inicio' => [7, 23], 'fin' => [8, 22]],
            ['signo' => 'Virgo', 'inicio' => [8, 23], 'fin' => [9, 22]],
            ['signo' => 'Libra', 'inicio' => [9, 23], 'fin' => [10, 22]],
            ['signo' => 'Escorpio', 'inicio' => [10, 23], 'fin' => [11, 21]],
            ['signo' => 'Sagitario', 'inicio' => [11, 22], 'fin' => [12, 21]],
            ['signo' => 'Capricornio', 'inicio' => [12, 22], 'fin' => [1, 19]],
            ['signo' => 'Acuario', 'inicio' => [1, 20], 'fin' => [2, 18]],
            ['signo' => 'Piscis', 'inicio' => [2, 19], 'fin' => [3, 20]],
        ];
    
        foreach ($zodiaco as $signo) {
            $inicio = $signo['inicio'];
            $fin = $signo['fin'];
    
            if (($mes == $inicio[0] && $dia >= $inicio[1]) || ($mes == $fin[0] && $dia <= $fin[1]) || ($mes > $inicio[0] && $mes < $fin[0])) {
                return $signo['signo'];
            }
        }
    
        return 'Desconocido';
    }
    
}


?>
