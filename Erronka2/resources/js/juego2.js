document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('pizarra').addEventListener('click', function(event) {
        // Obtén las coordenadas del clic en relación con la imagen
        var posX = event.clientX - event.target.offsetLeft;
        var posY = event.clientY - event.target.offsetTop;

        // Define las coordenadas de la parte específica que quieres hacer clic
        var areaTop = 46;     // 40% del alto de la imagen
        var areaLeft = 40;    // 66% del ancho de la imagen
        var areaWidth = 23;    // 9% del ancho de la imagen
        var areaHeight = 13;  // 27% del alto de la imagen

        // Calcula las coordenadas absolutas de la posición específica
        var areaTopAbs = (areaTop / 100) * event.target.height;
        var areaLeftAbs = (areaLeft / 100) * event.target.width;
        var areaWidthAbs = (areaWidth / 100) * event.target.width;
        var areaHeightAbs = (areaHeight / 100) * event.target.height;

        // Verifica si el clic está dentro de la parte específica
        if (posY >= areaTopAbs && posY <= areaTopAbs + areaHeightAbs &&
            posX >= areaLeftAbs && posX <= areaLeftAbs + areaWidthAbs) {
            // Realiza la acción deseada
            console.log('¡Has hecho clic en la parte específica!');
        }
    })
});
