<!DOCTYPE html>
<html lang="en">
<head>
  <title>Singers</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body style="background-color : grey ";>
<?php
include 'koneksi.php';

  //Perintah Untuk Memasukkan Ke Data Base
  
  if(isset($_POST['submit'])){
        
    $simpan = mysqli_query($koneksi, "INSERT INTO singers (name_sr) VALUES
                          ('$_POST[name_sr]')");

    if (mysqli_affected_rows($koneksi)>0){
        echo    "<script>
            alert('INPUT SUKSES');
            document.location= 'singers.php';
        </script>";
    } else {
        echo    "<script>
            alert('INPUT GAGAL !');
            document.location= 'singers.php';
        </script>";
    }}

    if (isset($_GET['hal']))
    {
        if ($_GET['hal'] == "hapus_singers")
        {
            $hapus = mysqli_query($koneksi, "DELETE FROM singers WHERE id_sr = '$_GET[id_sr]' ");
            if (mysqli_affected_rows($koneksi)>0){
                echo    "<script>
                    alert('HAPUS SUKSES');
                    document.location= 'singers.php';
                </script>";
            }
        }}

    
  ?>

  <div class="container" text-align="center">
  <br>
  	<div class="card-header bg-danger text-center text-white">
    Data Singers </div><hr>
    <a href="#" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal"> Tambah Data + </a>
    <a href="home.php" type="button" class="btn btn-danger btn-xs"> Kembali </a><hr>
    <div class="card text-center mt-3">
   	<div class="card md-3  ">
		<table class="table table-hover table-striped table-bordered table-success">
		<thead>
			<tr>
				<th>ID Penyanyi</th>
				<th>Nama Penyanyi</th>
        <th>OPSI</th>	
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
   		  <td>
         <a href="#" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit<?php echo $data['name_sr']; ?>">Edit</a>
   			<a onclick="return confirm('Anda Yakin?');" href="singers.php?hal=hapus_singers&id_sr=<?=$data['id_sr']?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      <div class="modal fade" id="edit<?php echo $data['name_sr']; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Data </h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="" method="get">
                        <?php
                        $id = $data['id_sr']; 
                        $query_edit = mysqli_query($koneksi, "SELECT * FROM singers WHERE id_sr='$id'");
                        while ($row = mysqli_fetch_array($query_edit)) :  
                        ?>
                        <input type="hidden" name="id_sr" value="<?php echo $row['id_gr']; ?>">
                        <div class="form-group">
                          <label>Nama Singers</label>
                          <input type="text" name="name_sr" class="form-control" value="<?php echo $row['name_sr']; ?>">      
                        </div>
                        
                        <div class="modal-footer">  
                          <button type="submit" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <?php 
                        endwhile;
                        ?>        
                      </form>
                  </div>
                </div>
              </div>
            </div>
		  <?php endwhile; ?>
		</tbody>
	  </table>
   
	  </div></div>
           
            <!-- Input Singers -->
            <div class="modal fade" id="myModal"  data-backdrop="static" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Isikan Data Sesuai Keterangan</h4>
                  </div>
            <div class="modal-body">
              <form role="form" action="" method="post">
                <input type="hidden" name="id_sr" value="">
                  <div class="form-group">
                    <label>Nama Penyanyi</label>
                    <input type="text" name="name_sr"   class="form-control" placeholder="Input Nama Penyanyi" required="" value="<?=@$vname_sr?>">      
                  </div>
                  <div class="modal-footer">  
                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
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