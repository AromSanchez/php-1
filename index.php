<head>
    <style>
        body{
            padding: 0;
            margin: 0;
            background-color: black;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            outline: 3px solid red;
        }
        main{
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            img{
                border-radius: 10px;
            }
        }
        section{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            h3{
                text-align: center;
                font-size: 20px;
                font-weight: bold;
                height: 20px;
            }
            p{
                height: 10px;
            }
            .siguiente_peli{
                font-weight: 500;
                font-size: 17px;
            }
            footer{
                background-color: #0000ff;
                width: 100%;
            }
        }

    </style>
</head>
<?php 

const API = "https://whenisthenextmcufilm.com/api";

$curl = curl_init(API);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$respuesta = curl_exec($curl);

$data = json_decode($respuesta,true);

?>
<body>
    
    <main>
        <img src="<?= $data["poster_url"]; ?>" width="200px"> <br>
        <section>
            <h3><?= $data["title"] ?> se estrena en <?= $data["days_until"] ?> días</h3>
            <p>Fecha de estreno: <?= $data["release_date"]?> </p>
            <p class="siguiente_peli">La siguiente pelicula es: <?= $data["following_production"]["title"]?></p>
        </section>
    </main>
    
    <footer>
        <p>&copy; Arroz   2029</p>
    </footer>
</body>
