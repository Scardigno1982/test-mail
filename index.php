<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Mapa de Provincias Argentinas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

</head>

<body>
<div id="map" style="height: 500px; width: 50%;"></div>

<script>
// Inicializar el mapa centrado en Argentina
var map = L.map('map').setView([-38.4161, -63.6167], 5);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Coordenadas de las capitales de las provincias argentinas con imágenes y descripciones
var provinces = [
    { 
        name: 'Buenos Aires', 
        lat: -34.6118, 
        lng: -58.4173, 
        image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzEBkGm_1w3qZCYNN53TSqNIKeYjo_SCZYKA&s', // URL de la imagen
        description: 'Buenos Aires es la capital de Argentina.'
    },
    { 
        name: 'Catamarca', 
        lat: -28.4696, 
        lng: -65.7852, 
        image: 'https://example.com/catamarca.jpg', 
        description: 'Catamarca es conocida por su belleza natural.'
    },
    // Agrega más provincias aquí con sus respectivas imágenes y descripciones
];

// Agregar marcadores para cada provincia
provinces.forEach(function(province) {
    var popupContent = `
        <div>
            <h3>${province.name}</h3>
            <img src="${province.image}" alt="${province.name}" style="width:100%;height:auto;">
            <p>${province.description}</p>
        </div>
    `;

    L.marker([province.lat, province.lng]).addTo(map)
        .bindPopup(popupContent);
});
</script>

</body>
</html>

