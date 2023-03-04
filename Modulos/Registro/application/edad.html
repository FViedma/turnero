<!DOCTYPE html>

<html>

<meta charset="utf-8">

<head>

 

<script type="text/javascript">

/**

 * Funcion que devuelve true o false dependiendo de si la fecha es correcta.

 * Tiene que recibir el dia, mes y año

 */

function isValidDate(day,month,year)

{

    var dteDate;

 

    // En javascript, el mes empieza en la posicion 0 y termina en la 11 

    //   siendo 0 el mes de enero

    // Por esta razon, tenemos que restar 1 al mes

    month=month-1;

    // Establecemos un objeto Data con los valore recibidos

    // Los parametros son: año, mes, dia, hora, minuto y segundos

    // getDate(); devuelve el dia como un entero entre 1 y 31

    // getDay(); devuelve un num del 0 al 6 indicando siel dia es lunes,

    //   martes, miercoles ...

    // getHours(); Devuelve la hora

    // getMinutes(); Devuelve los minutos

    // getMonth(); devuelve el mes como un numero de 0 a 11

    // getTime(); Devuelve el tiempo transcurrido en milisegundos desde el 1

    //   de enero de 1970 hasta el momento definido en el objeto date

    // setTime(); Establece una fecha pasandole en milisegundos el valor de esta.

    // getYear(); devuelve el año

    // getFullYear(); devuelve el año

    dteDate=new Date(year,month,day);

 

    //Devuelva true o false...

    return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));

}

 

/**

 * Funcion para validar una fecha

 * Tiene que recibir:

 *  La fecha en formato ingles yyyy-mm-dd

 * Devuelve:

 *  true-Fecha correcta

 *  false-Fecha Incorrecta

 */

function validate_fecha(fecha)

{

    var patron=new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");

 

    if(fecha.search(patron)==0)

    {

        var values=fecha.split("-");

        if(isValidDate(values[2],values[1],values[0]))

        {

            return true;

        }

    }

    return false;

}

 

/**

 * Esta función calcula la edad de una persona y los meses

 * La fecha la tiene que tener el formato yyyy-mm-dd que es

 * metodo que por defecto lo devuelve el <input type="date">

 */

function calcularEdad()

{

    var fecha=document.getElementById("user_date").value;

    if(validate_fecha(fecha)==true)

    {

        // Si la fecha es correcta, calculamos la edad

        var values=fecha.split("-");

        var dia = values[2];

        var mes = values[1];

        var ano = values[0];

 

        // cogemos los valores actuales

        var fecha_hoy = new Date();

        var ahora_ano = fecha_hoy.getYear();

        var ahora_mes = fecha_hoy.getMonth()+1;

        var ahora_dia = fecha_hoy.getDate();

 

        // realizamos el calculo

        var edad = (ahora_ano + 1900) - ano;

        if ( ahora_mes < mes )

        {

            edad--;

        }

        if ((mes == ahora_mes) && (ahora_dia < dia))

        {

            edad--;

        }

        if (edad > 1900)

        {

            edad -= 1900;

        }

 

        // calculamos los meses

        var meses=0;

        if(ahora_mes>mes)

            meses=ahora_mes-mes;

        if(ahora_mes<mes)

            meses=12-(mes-ahora_mes);

        if(ahora_mes==mes && dia>ahora_dia)

            meses=11;

 

        // calculamos los dias

        var dias=0;

        if(ahora_dia>dia)

            dias=ahora_dia-dia;

        if(ahora_dia<dia)

        {

            ultimoDiaMes=new Date(ahora_ano, ahora_mes, 0);

            dias=ultimoDiaMes.getDate()-(dia-ahora_dia);

        }

 

        document.getElementById("result").innerHTML="Tienes "+edad+" años, "+meses+" meses y "+dias+" días";

    }else{

        document.getElementById("result").innerHTML="La fecha "+fecha+" es incorrecta";

    }

}

</script>

 

</head>

<body>

    <input type="date" name="user_date" id="user_date" />

    <input type="button" value="Calcular edad" onclick="javascript:calcularEdad();" />

 

    <!-- div donde mostraremos el resultado -->

    <div id="result"></div>

</body>

</html>