$("#checkAll").click(function() {
    $(".check").prop('checked', $(this).prop('checked'));
});

function limpiarFormulario() {
    document.getElementById("resetear").reset();
}