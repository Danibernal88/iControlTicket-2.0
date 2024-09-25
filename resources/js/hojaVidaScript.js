document.addEventListener('DOMContentLoaded', function() {
    const selectElement1 = document.getElementById('tercero-select');
    if (selectElement1) {
        $(selectElement1).select2({
            placeholder: "Selecciona una opción",
            allowClear: true
        });
    }

    const selectElement2 = document.getElementById('jefe-select');
    if (selectElement2) {
        $(selectElement2).select2({
            placeholder: "Selecciona una opción",
            allowClear: true
        });
    }
});