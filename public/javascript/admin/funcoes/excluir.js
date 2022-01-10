$("#btExcluir").bind("click", function(event) {
    $("#modal_delete").modal();
});

//delete padrão-----
$("#btExcluirConfirmar").bind("click", function(event) {
    console.log('vai excluir');
    
    var c = $("input[name = id]")[0].value;
    console.log(c);
    if ($("#base_url").val() != undefined &&
        $("#controlador").val() != undefined &&
        $("input[name = id]")[0].value != undefined) {
        window.location.href = ($("#base_url").val() + "admin/" + $("#controlador").val() + "/deleteyes/" + $("input[name = id]")[0].value);
    }
});

//delete etapa-----
$("#btExcluiretapa").bind("click", function(event) {
    if ($("#base_url").val() != undefined &&
        $("#controlador").val() != undefined &&
        $("input[name = id]")[0].value != undefined) {
        window.location.href = ($("#base_url").val() + "admin/" + $("#controlador").val() + "/deletapa/" + $("input[name = id]")[0].value);
    }
});

//delete arquivo----
$("#btExcluirarquivo").bind("click", function(event) {
    if ($("#base_url").val() != undefined &&
        $("#controlador").val() != undefined &&
        $("input[name = id]")[0].value != undefined) {
        window.location.href = ($("#base_url").val() + "admin/" + $("#controlador").val() + "/apagararquivoetapa/" + $("input[name = id]")[0].value);
    }
});

//delete tipo-----
$("#btExcluirtipo").bind("click", function(event) {
    if ($("#base_url").val() != undefined &&
        $("#controlador").val() != undefined &&
        $("input[name = id]")[0].value != undefined) {
        window.location.href = ($("#base_url").val() + "admin/" + $("#controlador").val() + "/deletyes/" + $("input[name = id]")[0].value);
    }
});
