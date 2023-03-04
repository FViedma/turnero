$(document).ready(function () {
    $.ajax({
        method: "POST",
        url: "cie10.php",
        data: {
            llenar_diag: true
        },
    })
        .done(function (msg){
            if (msg == "") {
                console.log("vacio")
            } else {
                var parsed = JSON.parse(msg);
                var select = $(".diagnostico")
                select.append($("<option/>").val(JSON.stringify({ "id": 0, "cie": 0 })).text("--Escoger Diagnostico segun CIE 10--"));
                parsed.forEach(element => {
                    var data = JSON.stringify({
                        "id": element['0'],
                        "cie": element['1'].replace(/\s/g, '')
                    })
                    select.append($("<option />").val(data).text(element['2']));
                });
            }
        });

    $.ajax({
        url: "functionBD.php",
    })
        .done(function (msg) {
            if (msg == "") {
                console.log("vacio")
            } else {
                var parsed = JSON.parse(msg);
                var establecimiento = $(".establecimiento")
                var municipio = $(".municipio")
                parsed.forEach(element => {
                    establecimiento.append($("<option />").val(element['1']).text(element['3']));
                    municipio.append($("<option />").val(element['0']).text(element['2']));
                });
            }
        });

    $('#diag_ingr1').on('change', function (e) {
        var valueSelected = JSON.parse(this.value)
        $('#cie1').val(valueSelected['cie']);
        $('#diagnostico_ingr1').val($("#diag_ingr1 option:selected").text());
    });
    $('#diag_ingr2').on('change', function (e) {
        var valueSelected = JSON.parse(this.value)
        $('#cie2').val(valueSelected['cie']);
        $('#diagnostico_ingr2').val($("#diag_ingr2 option:selected").text());
    });
    $('#diag_egr1').on('change', function (e) {
        var valueSelected = JSON.parse(this.value)
        $('#cie5').val(valueSelected['cie']);
        $('#diagnostico_egr1').val($("#diag_egr1 option:selected").text());
    });
    $('#diag_egr2').on('change', function (e) {
        var valueSelected = JSON.parse(this.value)
        $('#cie6').val(valueSelected['cie']);
        $('#diagnostico_egr2').val($("#diag_egr2 option:selected").text());
    });

    $('#cie1').on('change', function (e) {
        var cie = $('#cie1').val();
        var diag_cie = $("#diag_ingr1 option");
        $.each(diag_cie, function (index, value) {
            if (cie == JSON.parse(value.value).cie) {
                $(this).attr("selected", "selected");
                return false;
            }
        });
    })
    $('#cie2').on('change', function (e) {
        var cie = $('#cie2').val();
        var diag_cie = $("#diag_ingr2 option");
        $.each(diag_cie, function (index, value) {
            if (cie == JSON.parse(value.value).cie) {
                $(this).attr("selected", "selected");
                return false;
            }
        });
    })
    $('#cie5').on('change', function (e) {
        var cie = $('#cie5').val();
        var diag_cie = $("#diag_egr1 option");
        $.each(diag_cie, function (index, value) {
            if (cie == JSON.parse(value.value).cie) {
                $(this).attr("selected", "selected");
                return false;
            }
        });
    })
    $('#cie6').on('change', function (e) {
        var cie = $('#cie6').val();
        var diag_cie = $("#diag_egr2 option");
        $.each(diag_cie, function (index, value) {
            if (cie == JSON.parse(value.value).cie) {
                $(this).attr("selected", "selected");
                return false;
            }
        });
    })

    $('#establecimiento_salud_h').on('change', function (e) {
        var valueSelected = this.value
        $('#establecimiento_salud').val($("#establecimiento_salud_h option:selected").text());
        autofill(valueSelected, "#municipio_h", "#municipio")
    });
    $('#estable_salud_b').on('change', function (e) {
        var valueSelected = this.value
        $('#estable_salud').val($("#estable_salud_b option:selected").text());
        autofill(valueSelected, "#municipio_name_b", "#municipio2")
    });
    $('#estable_salud_refer').on('change', function (e) {
        $('#estable_salud').val($("#estable_salud_refer option:selected").text());
    });

    $('#btn-verificar').on('click', function (e) {
        e.preventDefault();
        var ci = $('#ci').val();
        $.ajax({
            method: "POST",
            url: "establecimientoSelect.php",
            data: {
                verificar: true,
                ci: ci
            }
        })
            .done(function (msg) {
                if (msg == "") {
                    console.log("vacio")
                } else {
                    var parsed = JSON.parse(msg);
                    $('#paciente').val(parsed.HCL_NOMBRE);
                    $('#histclini').val(parsed.HCL_CODIGO);
                    $('#domicilio').val(parsed.HCL_DIRECC);
                    $('#tel_cel').val(parsed.HCL_TELDOM);
                    $('#edad').val(parsed.EDAD);
                    if (parsed.HCL_SEXO == 1) {
                        $('#sexo').val("Masculino").change();
                    } else {
                        $('#sexo').val("Femenino").change();
                    }
                    if ($('#fecha_nacimiento') !== null) {
                        $('#fecha_nacimiento').val(parsed.HCL_FECNAC)
                    }
                }
            });
    });

    $(".phone").on("input", function (e) {
        if (this.value.length > 8) {
            Swal.fire({
                title: "Caracteres maximos exedidos!",
                text: "Solo se permiten 8 digitos en los números telefónicos.",
                icon: "error"
            });
            this.value = this.value.slice(0, 8);
        }
    });

    $("#otros_anexos").change(function(e) {
        var selectedOption = $("#otros_anexos option:selected").val();
        if (selectedOption == "Si") {
            var currentHTML = $("#cuales_label").html();
            var currentHMLTrimmed = currentHTML.slice(0,6);
            $("#cuales_label").html(currentHMLTrimmed + "<span style='color:red'>*</span>:");
            $("#cuales").attr("required", true);           
        } else if(selectedOption == "No") {
            var currentHTML = $("#cuales_label").html();
            var currentHMLTrimmed = currentHTML.slice(0,6);
            $("#cuales_label").html(currentHMLTrimmed + ":");
            $("#cuales").attr("required", false);           
        }
    });

    $("#internado").change(function(e) {
        var selectedOption = $("#internado option:selected").val();
        if (selectedOption == "Si") {
            var currentHTML = $("#dias_inter_label").html();
            var currentHMLTrimmed = currentHTML.slice(0,currentHTML.length-1);
            $("#dias_inter_label").html(currentHMLTrimmed + "<span style='color:red'>*</span>:");
            $("#dias_inter").attr("required", true);           
            var currentHTML = $("#fecha_ingr_label").html();
            var currentHMLTrimmed = currentHTML.slice(0,currentHTML.length-1);
            $("#fecha_ingr_label").html(currentHMLTrimmed + "<span style='color:red'>*</span>:");
            $("#fecha_ingreso").attr("required", true);           
        } else if(selectedOption == "No") {
            var currentHTML = $("#dias_inter_label").html();
            var currentHMLTrimmed = currentHTML.slice(0,currentHTML.length-33);
            $("#dias_inter_label").html(currentHMLTrimmed + ":");
            $("#dias_inter").attr("required", false);           
            var currentHTML = $("#fecha_ingr_label").html();
            var currentHMLTrimmed = currentHTML.slice(0,currentHTML.length-33);
            $("#fecha_ingr_label").html(currentHMLTrimmed + ":");
            $("#fecha_ingreso").attr("required", false);           
        }

    });

    $("#per_disc").change(function(e) {
        var selectedOption = $("#per_disc option:selected").val();
        if (selectedOption == "Si") {
            var currentHTML = $("#tipo_disc_label").html();
            var currentHMLTrimmed = currentHTML.slice(0,currentHTML.length-1);
            $("#tipo_disc_label").html(currentHMLTrimmed + "<span style='color:red'>*</span>:");
            $("#tipo_disc").attr("required", true);           
            var currentHTML = $("#grad_disc_label").html();
            var currentHMLTrimmed = currentHTML.slice(0,currentHTML.length-1);
            $("#grad_disc_label").html(currentHMLTrimmed + "<span style='color:red'>*</span>:");
            $("#grado_disc").attr("required", true);           
        } else if(selectedOption == "No") {
            var currentHTML = $("#tipo_disc_label").html();
            var currentHMLTrimmed = currentHTML.slice(0,currentHTML.length-33);
            $("#tipo_disc_label").html(currentHMLTrimmed + ":");
            $("#tipo_disc").attr("required", false);           
            var currentHTML = $("#grad_disc_label").html();
            var currentHMLTrimmed = currentHTML.slice(0,currentHTML.length-33);
            $("#grad_disc_label").html(currentHMLTrimmed + ":");
            $("#grado_disc").attr("required", false);           
        }
    });

    $('#btn_verif').on('click', function (e) {
        e.preventDefault();
        var tipo_form = $('#tipo_form').val();
        var ci = $('#ci').val();
        var fecha = $('#fecha_formulario').val();
        if (ci == "" || fecha == "") {
            alert("Llene todos los campos")
        } else {
            $.ajax({
                method: "POST",
                url: "establecimientoSelect.php",
                data: {
                    verif: "true",
                    ci: ci,
                    fecha: fecha,
                    form: tipo_form,
                }
            })
                .done(function (msg) {
                    $("#text_msg").remove();
                    if (msg == "") {
                        var mensaje = $("#mensaje");
                        mensaje.append("<div id='text_msg' name='text_msg' class='alert alert-danger'>No existen formularios con esos datos</div>");
                    } else {
                        var parsed = JSON.parse(msg);
                        var mensaje = $("#mensaje");
                        mensaje.append("<div id='text_msg' name='text_msg' class='alert alert-success'>Formulario válido, puede realizar la reimpresión</div>");
                        $("#btn_imprimir").prop("disabled", false);
                    }
                });
        }

    });
});

function getAction(form) {
    var tipo_form = $('#tipo_form').val();
    switch (tipo_form) {
        case "1":
            form.action = "reporte_formulario.php";
            break;
        case "2":
            form.action = "reporte_transfe.php";
            break;
        case "3":
            form.action = "reporte_refere.php";
            break;
    }
}

function autofill(id_establ, id_select, id_hidden) {
    $.ajax({
        method: "POST",
        url: "establecimientoSelect.php",
        data: {
            value: id_establ
        }
    })
        .done(function (msg) {
            console.log(msg)
            if (msg == "") {
                console.log("vacio")
            } else {
                var parsed = JSON.parse(msg);
                $(id_select).val(parsed)
                $(id_hidden).val($(id_select + " option:selected").text())
            }
        });
}
