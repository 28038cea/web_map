
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maps error</title>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

    <link href="<?=base_url()?>assets/css/BootSideMenu.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/leaflet/leaflet.css" rel="stylesheet">

    <style type="text/css">
    .user{
        padding:5px;
        margin-bottom: 5px;
    }
    #mapid { height: 480px; }
    </style>
</head>
<body>
    <!--Test -->
    <div id="test">
        <a href="<?=base_url('home')?>"><h2>LOGO</h2>
        <div class="list-group">
            <a href="#" class="list-group-item">1</a>
            <a href="#" class="list-group-item">2</a>
        </div>
    </div>
    <!--/Test -->

    <!--Normale contenuto di pagina-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Error Maps</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="mapid">
                </div>
            </div>
        </div>
    </div>
    <!--Normale contenuto di pagina-->

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/BootSideMenu.js"></script>
    <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>

    <script type="text/javascript">
    $('#test').BootSideMenu({side:"left", autoClose:false});

    var map = L.map('mapid').setView([-8.337392, 115.182068], 13);
    var base_url="<?=base_url()?>";

    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    }).addTo(map);

    $.getJSON(base_url+"assets/geojson/map.geojson", function(data){
        geoLayer = L.geoJson(data,{
            style : function(feature) {
                return{
                    fillOpacity: 0.8,
                    weigh: 1,
                    opacity: 1,
                    color:"#58c5d1"
                };
            },
            onEachFeature: function(feature, layer){
                var latt = parseFloat(feature.properties.latitude);
                layer.on({
                    click: whenClicked
                });
            }
            
        }).addTo(map);
    });

    function whenClicked(e) {
        console.log(e);
    }
    </script>
</body>
</html>