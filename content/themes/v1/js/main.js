$(function() {
    $('#opa').hover(
        function () {
            $('#tvinfo').val("Nota: El controlador de log-in se encuentra marcado como 'desactivado'");
        }, 
        function () {
            $('#tvinfo').val("");
        }
    );
    $('#opb').hover(
        function () {
            $('#tvinfo').val("Prueba con jQuery para");
        }, 
        function () {
            $('#tvinfo').val("");
        }
    );
});