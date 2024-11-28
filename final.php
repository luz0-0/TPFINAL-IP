<?php

// Trabajo práctico obligatorio - Introducción a la programación
// María Luz Pucheta FAI-5525



// A) Realizar una carga automática de la matriz de temperaturas con los datos propuestos por la cátedra.
// Función que realiza una carga automática de la matriz

function cargaAutomatica() {
    $temperaturas = array(
        2014 => array("enero" => 30, "febrero" => 28, "marzo" => 26, "abril" => 22, "mayo" => 18, "junio" => 12, "julio" => 10, "agosto" => 14, "septiembre" => 17, "octubre" => 20, "noviembre" => 25, "diciembre" => 29),
        2015 => array("enero" => 33, "febrero" => 30, "marzo" => 27, "abril" => 22, "mayo" => 19, "junio" => 13, "julio" => 11, "agosto" => 15, "septiembre" => 18, "octubre" => 21, "noviembre" => 26, "diciembre" => 31),
        2016 => array("enero" => 34, "febrero" => 32, "marzo" => 29, "abril" => 21, "mayo" => 18, "junio" => 14, "julio" => 12, "agosto" => 16, "septiembre" => 18, "octubre" => 21, "noviembre" => 27, "diciembre" => 32),
        2017 => array("enero" => 33, "febrero" => 31, "marzo" => 28, "abril" => 22, "mayo" => 18, "junio" => 13, "julio" => 11, "agosto" => 14, "septiembre" => 17, "octubre" => 22, "noviembre" => 26, "diciembre" => 31),
        2018 => array("enero" => 32, "febrero" => 30, "marzo" => 28, "abril" => 22, "mayo" => 17, "junio" => 12, "julio" => 9, "agosto" => 13, "septiembre" => 16, "octubre" => 20, "noviembre" => 24, "diciembre" => 30),
        2019 => array("enero" => 32, "febrero" => 30, "marzo" => 27, "abril" => 23, "mayo" => 19, "junio" => 14, "julio" => 12, "agosto" => 11, "septiembre" => 17, "octubre" => 23, "noviembre" => 25, "diciembre" => 29),
        2020 => array("enero" => 31, "febrero" => 29, "marzo" => 28, "abril" => 21, "mayo" => 19, "junio" => 13, "julio" => 10, "agosto" => 12, "septiembre" => 16, "octubre" => 22, "noviembre" => 27, "diciembre" => 29),
        2021 => array("enero" => 30, "febrero" => 28, "marzo" => 26, "abril" => 20, "mayo" => 16, "junio" => 12, "julio" => 11, "agosto" => 13, "septiembre" => 17, "octubre" => 21, "noviembre" => 28, "diciembre" => 30),
        2022 => array("enero" => 31, "febrero" => 29, "marzo" => 27, "abril" => 21, "mayo" => 17, "junio" => 12, "julio" => 11, "agosto" => 15, "septiembre" => 18, "octubre" => 22, "noviembre" => 26, "diciembre" => 30),
        2023 => array("enero" => 32, "febrero" => 30, "marzo" => 27, "abril" => 20, "mayo" => 16, "junio" => 13, "julio" => 13, "agosto" => 15, "septiembre" => 19, "octubre" => 23, "noviembre" => 28, "diciembre" => 31)
    );
    return $temperaturas;
}

// B) Realizar una carga manual de la matriz de temperaturas.
// Función que realiza una carga manual de temperaturas
function cargaManual() {
    $anios = [2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023];
    $meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
    $temperaturas = array();

    foreach ($anios as $anio) {
        foreach ($meses as $mes) {
            echo "Ingrese la temperatura de $mes de $anio: ";
            $temperatura = trim(fgets(STDIN));
            $temperaturas[$anio][$mes] = $temperatura;
        }
    }

    return $temperaturas;
}


// C) Mostrar el contenido de la matriz por filas y columnas.
// Función que muestra el contenido de la matriz como una tabla

function mostrarFilasColumnas($temperaturas)
{
    $anios = array_keys($temperaturas);
    $meses = array_keys($temperaturas[$anios[0]]);

    echo "Año\t";
    foreach ($meses as $mes) {
        echo $mes . "\t";
    }
    echo "\n";

    foreach ($anios as $anio) {
        echo $anio . "\t";
        foreach ($temperaturas[$anio] as $temperatura) {
            echo $temperatura . "\t";
        }
        echo "\n";
    }
}


// D) Mostrar, dado un año y un mes, el valor de temperatura correspondiente.
function mostrarTemperaturaAnioMes($temperaturas, $anio, $mes) {
    if (isset($temperaturas[$anio]) && isset($temperaturas[$anio][$mes])) {
        echo "La temperatura en $mes de $anio es: " . $temperaturas[$anio][$mes] . "\n";
    } else {
        echo "Los datos recibidos no son válidos. ";
    }
}

// E) Mostrar para un determinado año, las temperaturas de todos los meses
function mostrarTemperaturasAnio($temperaturas, $anio) {
    if (isset($temperaturas[$anio])) {
        echo "Temperaturas de $anio:\n";
        foreach ($temperaturas[$anio] as $mes => $temperatura) {
            echo "$mes: $temperatura\n";
        }
    } else {
        echo "El año recibido no es válido.";
    }
}

// F) Mostrar para un mes determinado, las temperaturas de todos los años y el promedio.
function mostrarTemperaturasMes($temperaturas, $mes) {
    $total = 0;
    $contTemp = 0;
    echo "Temperaturas para el mes de $mes:\n";
    foreach ($temperaturas as $anio => $datosMes) {
        if (isset($datosMes[$mes])) {
            $temperatura = $datosMes[$mes];
            echo "$anio: $temperatura\n";
            $total += $temperatura;
            $contTemp++;
        } else {
            echo "El mes ingresado no es válido";
        }
    }
    if ($contTemp > 0) {
        $promedio = $total / $contTemp;
        echo "Promedio: $promedio\n";
    }
}

// G) Hallar las temperaturas máximas y mínimas, indicando año y mes a los que corresponden. Si el máximo o mínimo se repite, mostrar el primero encontrado.
// Función que muestra las temperaturas máximas y mínimas de cada año
function hallarMaxMin($temperaturas) {
    foreach ($temperaturas as $anio => $datosMes) {
        $temperaturaMax = 0;
        $temperaturaMin = 9999;
        $mesMax = "";
        $mesMin = "";

        foreach ($datosMes as $mes => $temperatura) {
            if ($temperatura > $temperaturaMax) {
                $temperaturaMax = $temperatura;
                $mesMax = $mes;
            }
            if ($temperatura < $temperaturaMin) {
                $temperaturaMin = $temperatura;
                $mesMin = $mes;
            }
        }

        echo "Año $anio:\n";
        echo "  Temperatura máxima: $temperaturaMax (Mes: $mesMax)\n";
        echo "  Temperatura mínima: $temperaturaMin (Mes: $mesMin)\n";
    }
}

// H) Crear y mostrar un arreglo bidimensional con los datos de primavera (oct-nov-dic) de todos los años.
// Función que genera un arreglo que almacena los datos de primavera
function datosPrimavera($temperaturas) {
    $datosPrimavera = [];

    foreach ($temperaturas as $anio => $datosMes) {
        foreach (["octubre", "noviembre", "diciembre"] as $mes) {
            if (isset($datosMes[$mes])) {
                $datosPrimavera[$anio][$mes] = $datosMes[$mes];
            }
        }
    }

    return $datosPrimavera;
}

// Función que muestra el arreglo datosPrimavera
    function mostrarDatosPrimavera($datosPrimavera) {
        foreach ($datosPrimavera as $anio => $datosMes) {
            echo "Año: $anio\n";
            foreach ($datosMes as $mes => $temperatura) {
                echo "Mes: $mes. Temperatura: $temperatura \n";
            }
            echo "\n";
        }
}

// I) Crear y mostrar un arreglo bidimensional con los datos de los últimos 5 años de invierno (jul-ago-sep).
// Función que genera un arreglo que almacena los datos de invierno de los últimos cinco años


function datosInvierno($temperaturas)
{
    $mesesInvierno = ["julio", "agosto", "septiembre"];
    $aniosInvierno = [2019, 2020, 2021, 2022, 2023];
    $datosInvierno = [];

    foreach ($aniosInvierno as $anio) {
        if (isset($temperaturas[$anio])) {
            foreach ($mesesInvierno as $mes) {
                $datosInvierno[$anio][$mes] = $temperaturas[$anio][$mes];
            }
        }
    }

    return $datosInvierno;
}

// Función que muestra el arreglo datosInvierno
function mostrarDatosInvierno($datosInvierno) {
    foreach ($datosInvierno as $anio => $datosMes) {
        echo "Año: $anio\n";
        foreach ($datosMes as $mes => $temperatura) {
            echo "Mes: $mes. Temperatura: $temperatura";
        }
        echo "\n";
    }
}

// J) Crear un arreglo asociativo que contenga en la primera posición con clave “completa” la matriz completa de temperaturas, en la segunda posición con clave “primavera” la matriz creada en el inciso h., y en la tercera posición con clave “invierno” la matriz creada en el inciso i.
// Función que crea un arreglo asociativo con los datos completos, datosPrimavera y datosInvierno
function crearArreglo($temperaturas) {

    $datosPrimavera = [];
    $datosInvierno = [];

    $arregloAsociativo = [
        "completa" => $temperaturas,
        "primavera" => $datosPrimavera,
        "invierno" => $datosInvierno
    ];
    return $arregloAsociativo;
}
// Función que muestra el arreglo asociativo
function mostrarArregloAsociativo($arregloAsociativo) {
    echo "Datos completos:\n";
    foreach ($arregloAsociativo['completa'] as $anio => $datosMes) {
        echo "Año: $anio\n";
        foreach ($datosMes as $mes => $temperatura) {
            echo "Mes: $mes. Temperatura: $temperatura";
        }
        echo "\n";
    }

    echo "Datos de primavera:\n";
    foreach ($arregloAsociativo['primavera'] as $anio => $datosMes) {
        echo "Año: $anio\n";
        foreach ($datosMes as $mes => $temperatura) {
            echo "Mes: $mes. Temperatura: $temperatura";
        }
        echo "\n";
    }

    echo "Datos de invierno:\n";
    foreach ($arregloAsociativo['invierno'] as $anio => $datosMes) {
        echo "Año: $anio\n";
        foreach ($datosMes as $mes => $temperatura) {
            echo "Mes: $mes. Temperatura: $temperatura";
        }
        echo "\n";
    }
}

//Programa principal TEMPERATURAS

do {
    echo "Menú de opciones: \n";
    echo "1. Cargar matriz automática. \n";
    echo "2. Cargar matriz manual. \n";
    echo "3. Mostrar el contenido de la matriz por filas y columnas. \n";
    echo "4. Mostrar temperatura dado un año y un mes. \n";
    echo "5. Mostrar para un determinado año, las temperaturas de todos los meses. \n";
    echo "6. Mostrar para un mes determinado, las temperaturas de todos los años y el promedio. \n";
    echo "7. Mostrar las temperaturas máximas y mínimas. \n";
    echo "8. Mostrar un arreglo con los datos de primavera. \n";
    echo "9. Mostrar un arreglo con los datos de invierno de los últimos 5 años. \n";
    echo "10. Mostrar arreglo. \n";
    echo "0. Salir\n";
    echo "*********************************************************************** \n";
    echo "IMPORTANTE: el programa no funcionará a menos que se cargue una matriz. \n";
    echo "*********************************************************************** \n";


    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1:
            $temperaturas = cargaAutomatica();
            echo "Temperaturas cargadas.\n";
            break;
        case 2:
            $temperaturas = cargaManual();
            echo "Temperaturas cargadas.\n";
            break;
        case 3:
            if (isset($temperaturas)) {
                mostrarFilasColumnas($temperaturas);
            } else {
                echo "No hay datos cargados. \n";
            }
            break;
        case 4:
            if (isset($temperaturas)) {
            echo "Ingrese el año: ";
            $anio = trim(fgets(STDIN));
            echo "Ingrese el mes: ";
            $mes = trim(fgets(STDIN));
            mostrarTemperaturaAnioMes($temperaturas, $anio, $mes);
            } else {
                echo "No hay datos cargados. \n";
            }
            break;
        case 5:
            if (isset($temperaturas)) {
                echo "Ingrese el año: ";
                $anio = trim(fgets(STDIN));
                mostrarTemperaturasAnio($temperaturas, $anio);
            } else {
                echo "No hay datos cargados. \n";
            }
            break;
        case 6:
            if (isset($temperaturas)) {
                echo "Ingrese el mes: ";
                $mes = trim(fgets(STDIN));
                mostrarTemperaturasMes($temperaturas, $mes);
            } else {
                echo "No hay datos cargados. \n";
            }
            break;
        case 7:
            if (isset($temperaturas)) {
                hallarMaxMin($temperaturas);
            } else {
                echo "No hay datos cargados. \n";
            }
                break;
        case 8:
            if (isset($temperaturas)) {
                $datosPrimavera = datosPrimavera($temperaturas);
                echo "Arreglo creado.  \n";
                echo "Datos primavera: ";
                mostrarDatosPrimavera($datosPrimavera);
            } else {
                echo "No hay datos cargados. \n";
            }
            break;
        case 9:
            if (isset($temperaturas)) {
                $datosInvierno = datosInvierno($temperaturas);
                echo "Arreglo creado.  \n";
                echo "Datos invierno: ";
                mostrarDatosInvierno($datosInvierno);
            } else {
                echo "No hay datos cargados. \n";
            }
            break;
        case 10:
            if (isset($temperaturas)) {
                if (isset($datosPrimavera) && isset($datosInvierno)) {
                    $arregloAsociativo = crearArreglo($temperaturas);
                    echo "Arreglo creado.  \n";
                    mostrarArregloAsociativo($arregloAsociativo);
                } else {
                    echo "Los arreglos no fueron creados. \n";
                }
            } else {
                echo "No hay datos cargados. \n";
            }
            break;
        case 0:
            echo "Fin programa ^__^ \n";
            break;
    }

} while ($opcion != 0);
