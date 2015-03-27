<html>
<head>
    <meta charset="UTF-8" />
    <style type="text/css">
        body {
            background: url(img/bg.jpg);
        }

        ul {
            padding: 0;
        }

        h1 {
            margin: 30px 0 50px;
            font-family: "Comic Sans MS";
        }

        li{
            list-style: none;
            display: inline;
        }

        #tickets li img{
            transform: rotate(-45deg);
        }

        #tags {
            margin-top: 50px;
        }

        #tags li{
            margin: 0 10px;
            padding: 2px 5px;
            background: rgba(0,0,0, 0.2);
            border-radius: 8px;
        }

        #container {
            width: 600px;
            margin: 0 auto;
            text-align: center;
        }
    </style>
</head>
<body>

    <div id="container">
        <h1>
            <?php echo $resto['nom']; ?>

            <?php if ($resto['a_emporter']) : ?>
                <img src="img/bag.png" />
            <?php endif; ?>

            <?php if ($resto['sur_place']) : ?>
                <img src="img/cutlery.png" />
            <?php endif; ?>

        </h1>

        <ul id="tickets">
            <?php for ($i = 0; $i < $resto['ticketResto']; $i++) : ?>
                <li>
                    <img width="50" src="img/ticket_resto.jpg" />
                </li>
            <?php endfor; ?>
        </ul>

        <ul id="tags">
            <?php foreach ($resto['tags'] as $tag) : ?>
                <li><?php echo $tag; ?></li>
            <?php endforeach; ?>
        </ul>

        <div id="map" style="width: 100%; height: 400px"></div>
    </div>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript">
        var latlong = new google.maps.LatLng(
            <?php echo $resto['coordonnee']['latitude'] ?>,
            <?php echo $resto['coordonnee']['longitude'] ?>
        );

        var mapOptions = {
            center: latlong,
            zoom: 16
        };

        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        var marker = new google.maps.Marker({
            position: latlong,
            map: map
        });

        var infowindow = new google.maps.InfoWindow({
            content: '<div><?php echo $resto['adresse'] ?></div>'
        });
        infowindow.open(map,marker);
    </script>
</body>
</html>