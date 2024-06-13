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
<div id="map" style="height: 500px; width: 100%;"></div>

<script>
// Inicializar el mapa centrado en Argentina
var map = L.map('map').setView([-38.4161, -63.6167], 5);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Coordenadas de las capitales de las provincias argentinas
var provinces = [
    { name: 'Buenos Aires', lat: -34.6118, lng: -58.4173 },
    { name: 'Catamarca', lat: -28.4696, lng: -65.7852 },
    { name: 'Chaco', lat: -27.4512, lng: -58.9865 },
    { name: 'Chubut', lat: -43.2983, lng: -65.1000 },
    { name: 'Córdoba', lat: -31.4135, lng: -64.1811 },
    { name: 'Corrientes', lat: -27.4692, lng: -58.8300 },
    { name: 'Entre Ríos', lat: -31.7456, lng: -60.5186 },
    { name: 'Formosa', lat: -26.1849, lng: -58.1731 },
    { name: 'Jujuy', lat: -24.1858, lng: -65.2995 },
    { name: 'La Pampa', lat: -36.6167, lng: -64.2833 },
    { name: 'La Rioja', lat: -29.4135, lng: -66.8558 },
    { name: 'Mendoza', lat: -32.8908, lng: -68.8272 },
    { name: 'Misiones', lat: -27.3627, lng: -55.8960 },
    { name: 'Neuquén', lat: -38.9516, lng: -68.0591 },
    { name: 'Río Negro', lat: -39.0333, lng: -67.5833 },
    { name: 'Salta', lat: -24.7829, lng: -65.4232 },
    { name: 'San Juan', lat: -31.5375, lng: -68.5364 },
    { name: 'San Luis', lat: -33.2950, lng: -66.3356 },
    { name: 'Santa Cruz', lat: -51.6226, lng: -69.2181 },
    { name: 'Santa Fe', lat: -31.6247, lng: -60.6850 },
    { name: 'Santiago del Estero', lat: -27.7834, lng: -64.2669 },
    { name: 'Tierra del Fuego', lat: -54.8019, lng: -68.3029 },
    { name: 'Tucumán', lat: -26.8083, lng: -65.2176 }
];

// Agregar marcadores para cada provincia
provinces.forEach(function(province) {
    L.marker([province.lat, province.lng]).addTo(map)
        .bindPopup(province.name);
});
</script>

</body>
</html>
