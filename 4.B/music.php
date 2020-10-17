<!DOCTYPE html>
<html lang="en">
<head>
  <title>Musik</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body style="background-color : grey ";>
<?php
include 'koneksi.php';

  //Perintah Untuk Memasukkan Ke Data Base
  
  if(isset($_POST['simpan'])){
    
    $id_ms = $_POST['id_ms'];
    $title = $_POST['title']; 
    $durasi = $_POST['durasi'];
    $id_genre = $_POST['id_genre'];
    $id_singers = $_POST['id_singers'];
    $photo = $_FILES['photo']['name'];
    $deskripsi = $_POST['deskripsi'];
    $source = $_FILES['photo']['tmp_name'];
    $folder = './img/';
    
    
    move_uploaded_file($source, $folder.$photo);
    $simpan = mysqli_query($koneksi, "INSERT INTO music VALUES ('$id_ms','$title','$durasi','$id_genre','$id_singers','$photo','$deskripsi')");

    if($simpan){
        echo    "<script>
            alert('INPUT SUKSES');
            document.location= 'music.php';
        </script>";
    } else {
        echo    "<script>
            alert('INPUT GAGAL !');
            document.location= 'music.php';
        </script>";
    
    }
     }
     if (isset($_GET['hal']))
    {
        if ($_GET['hal'] == "hapus_music")
        {
            $hapus = mysqli_query($koneksi, "DELETE FROM music WHERE id_ms = '$_GET[id_ms]' ");
            if (mysqli_affected_rows($koneksi)>0){
                echo    "<script>
                    alert('HAPUS SUKSES');
                    document.location= 'music.php';
                </script>";
            }
        }}
  ?>
  <br>
 <table align="left" class="  bg-light  table-hover table-striped table-bordered  ">
           
           <thead>
             
             <tr>
               <th>ID Genre</th>
               <th>Nama Genre</th>
             </tr>
           </thead>
           <tbody>
             <?php 
             $tampil = mysqli_query($koneksi, "SELECT * from genre  ");
              while ($data = mysqli_fetch_array($tampil)) :
             ?>
              <tr>
              <th><?=$data['id_gr']?></th>
             <th><?=$data['name_gr']?></th>
             </tr>
             <?php endwhile; ?>
              
           </tbody>
           </table>
              
           
           
           <table align="right" class=" table-hover table-striped table-bordered table-success">
             
           <thead>
             <tr>
               <th>ID Singers</th>
               <th>Nama Penyanyi</th>
               
             </tr>
           </thead>
           <tbody>
             <?php 
             $tampil = mysqli_query($koneksi, "SELECT * from singers");
              while ($data = mysqli_fetch_array($tampil)) :
             ?>
              <tr>
                <th><?=$data['id_sr']?></th>
               <th><?=$data['name_sr']?></th>
             </tr>
             <?php endwhile; ?>
           </tbody>
           </table>
             
  <div class="container" text-align="center">
  <br>
  	<div class="card-header bg-danger text-center text-white">
    DATA MUSIK </div><br>
    

    <a href="#" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal"> Tambah Data + </a>
    <a href="home.php" type="button" class="btn btn-danger btn-xs"> Kembali </a>
    <div class="card text-center mt-3">
   	<div class="card md-3  ">
		<table class="table table-hover table-striped table-bordered table-success">
		<thead>
			<tr>
				<th>ID </th>
				<th>Title</th>
        <th>Durasi</th>	
        <th>ID GENRE</th>
        <th>ID SINGERS</th>
        <th>FOTO</th>
        <th>Deskripsi</th>
        <th>OPSI</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$tampil = mysqli_query($koneksi, "SELECT * from music");
       while ($data = mysqli_fetch_array($tampil)) :
      ?>
   	  <tr>
   		<th><?=$data['id_ms']?></th>
        <th><?=$data['title']?></th>
        <th><?=$data['durasi']?></th>
        <th><?=$data['id_genre']?></th>
        <th><?=$data['id_singers']?></th>
        <th><img src="img/<?=$data['photo']; ?>" width="70" height="90"></th>
        <th><a href="<?=$data['deskripsi']?>" target='_blank'> <?=$data['deskripsi']?></a></th>
   		<td>
         <a href="#" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit<?php echo $data['title']; ?>">Edit</a>
   			<a onclick="return confirm('Anda Yakin Menghapus Data Ini ? ', <?=$data['id_ms']?>);" href="music.php?hal=hapus_music&id_ms=<?=$data['id_ms']?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      <div class="modal fade" id="edit<?php echo $data['title']; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    
                    <h4 class="modal-title">Edit Data </h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="" method="get">
                        <?php
                        $id = $data['id_ms']; 
                        $query_edit = mysqli_query($koneksi, "SELECT * FROM music WHERE id_ms='$id'");
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>
                        <input type="hidden" name="id_ms" value="<?php echo $row['id_ms']; ?>">
                        <div class="form-group">
                          <label>Title</label>
                          <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Durasi</label>
                          <input type="text" name="durasi" class="form-control" value="<?php echo $row['durasi']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>ID Genre</label>
                          <input type="text" name="id_genre"   class="form-control"  value="<?php echo $row['id_genre']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>ID Singers</label>
                          <input type="text" name="id_singers"   class="form-control" value="<?php echo $row['id_singers']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Foto</label>
                          <input type="file" name="photo" value="<?php echo $row['photo']['name']; ?>">      
                        </div>                  
                        <div class="form-group">
                          <label>Deskripsi</label><br>
                          <input type="text"   name="deskripsi"   class="form-control" value="<?php echo $row['deskripsi']; ?>"></textarea>
                        </div>

                        
                        <div class="modal-footer">  
                          <button type="submit" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <?php 
                        }
                        ?>        
                      </form>
                  </div>
                </div>
              </div>
            </div>
		  <?php endwhile; ?>
		</tbody>
	  </table>
   
    </div></div><br>
    

    <!-- Input Music -->
    <div class="modal fade" id="myModal"  data-backdrop="static" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Isikan Data Sesuai Keterangan</h4>
                  </div>
            <div class="modal-body">
              <form role="form" action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_ms" value="<?php echo $row['id_ms']; ?>">
                
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title"   class="form-control" placeholder="Input Title" required="" value="<?=@$vtitle?>">      
                  </div>
                  <div class="form-group">
                    <label>Durasi</label>
                    <input type="text" name="durasi"   class="form-control" placeholder="Masukan Lama Durasi" required="" value="<?=@$vdurasi?>">      
                  </div>
                  <div class="form-group">
                    <label>ID Genre</label>
                    <input type="text" name="id_genre"   class="form-control" placeholder="Input ID Genre" required="" value="<?=@$vid_genre?>">      
                  </div>
                  <div class="form-group">
                    <label>ID Singers</label>
                    <input type="text" name="id_singers"   class="form-control" placeholder="Input ID Singers" required="" value="<?=@$vid_singers?>">      
                  </div>
                  <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="photo" required="">      
                  </div>                  
                  <div class="form-group">
                    <label>Deskripsi</label><br>
                    <textarea rows="5" cols="50"  name="deskripsi"   class="form-control" placeholder="Masukkan Deskripsi Musik" required="" value="<?=@$vdeskripsi?>"></textarea>
                  </div>

                  <div class="modal-footer">  
                    <button type="submit" class="btn btn-success" name="simpan">Submit</button>
                    <button type="reset" class="btn btn-danger" name="reset">Clear</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                       
              </form>
                  </div>
                </div>
               </div>
              </div>
            </div>
              
		        
           
</body>
  
 
</html>