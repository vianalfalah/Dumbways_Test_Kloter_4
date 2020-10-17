<!DOCTYPE html>
<html>
<head>
<title>4B Dumbways Kloter 4</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body  style= " background-color : grey ;">

<div class="container " text-align="center" >
<br><h1 class="text-white float-left"> Dumbways Playlist </h1>
<a href="music.php" class="btn btn-success btn-lg float-right">Data Music </a>
<a href="singers.php" class="btn btn-success btn-lg float-right">Data Singers</a>
<a href="genre.php" class="btn btn-success btn-lg float-right">Data Genre </a><br><br><br><hr>
<?php 
include 'koneksi.php';
   		$tampil = mysqli_query($koneksi, "SELECT * from music INNER JOIN singers ON singers.id_sr = music.id_singers");
        while ($data = mysqli_fetch_array($tampil)) : ?>
          
          <div class="container">
              <div class="row" style=" background-color : ;">
                  <div class="col-md-3">
            
</div>
</div></div>
<div class="col-md-4 mt 5 float-left">
<div class="card" style="width: 18rem;">
  <img style="height: 225px; width: 100%; display: block;" src="img/<?=$data['photo']?>" class="card-img-top" >
  <div class="card-body">
    <h5 class="card-title"><?=$data['name_sr']?></h5>
    <p class="card-text"><b><?=substr($data['title'],0,25)?></b></p>
    <a href="<?=$data['deskripsi']?>" target='_blank' class="btn btn-danger">Play</a>
    <small class="text-dark"><?= $data['durasi']?></small> 
  </div>
</div>
        </div>
        
    <?php endwhile; ?>
    
    </div>
    
   
    
</body>
</html>
