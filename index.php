<?php
    $parcheggio = $_GET["parcheggio"];
    $star=$_GET["star"];
    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $newhotels=null;

$i=0;
$j=0;
    if($parcheggio == '' && $star == ''){
        $newhotels=$hotels;
        // mostra tutta la lista
    
    }elseif($parcheggio == '' && $star != ''){
        
        // solo il voto
        foreach($hotels as $value){
            if($value['vote'] >= $star){
            $newhotels[$j]=$hotels[$i];
            $j++;
        }
        $i++;
    }
    }elseif($parcheggio != '' && $star ==''){
        // solo il parcheggio
        foreach($hotels as $value){
            if($value['parking'] == filter_var($parcheggio, FILTER_VALIDATE_BOOLEAN) ){
            $newhotels[$j]=$hotels[$i];
            $j++;
        }
        $i++;
        }
    }else{
        // sia parcheggio che voto
        foreach($hotels as $value){
            if($value['parking'] == filter_var($parcheggio, FILTER_VALIDATE_BOOLEAN) &&  $value['vote'] >= $star){
            $newhotels[$j]=$hotels[$i];
            $j++;
        }
        $i++;
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Hotel</title>
</head>
<body>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">description</th>
      <th scope="col">parking</th>
      <th scope="col">vote</th>
      <th scope="col">distance_to_center</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach( $hotels as $value){ ?>
        
        <tr>
      <td><?php echo $value['name']?></td>
      <td><?php echo $value['description']?></td>
      <td><?php echo $value['parking']== true ? "true": "false"?></td>
      <td><?php echo $value['vote'] ?></td>
      <td><?php echo $value['distance_to_center']?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

        <form action="./index.php" method="GET" >
        <label for="parcheggio">parcheggio</label>
            <select name="parcheggio">
            <option value="">null</option>
                <option value="true">true</option>
                <option value="false">false</option>
            </select>
            <label for="star">star</label>
            <input type="text" name="star">
            
            <button>premi</button>
        </form>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">description</th>
      <th scope="col">parking</th>
      <th scope="col">vote</th>
      <th scope="col">distance_to_center</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach( $newhotels as $value){ ?>
        
        <tr>
      
      <td><?php echo $value['name']?></td>
      <td><?php echo $value['description']?></td>
      <td><?php echo $value['parking'] == true ? "true" : "false"?></td>
      <td><?php echo $value['vote'] ?></td>
      <td><?php echo $value['distance_to_center']?></td>
    </tr>

    <?php } ?>    
       
        
    
  </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>