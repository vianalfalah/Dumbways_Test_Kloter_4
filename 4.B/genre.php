<!DOCTYPE html>
<html lang="en">
<head>
  <title>Genre</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body style="background-color : grey ";>
<?php
include 'koneksi.php';

  //Perintah Untuk Memasukkan Ke Data Base
  
  if(isset($_POST['simpan'])){
    if ($_GET['hal'] == "edit_user"){
      $hapus = mysqli_query($koneksi, "UPDATE news SET
      name_u = '$_POST[name_u]',
      role_u = '$_POST[role_u]',
      email_u = '$_POST[email_u]'
      WHERE id_n = '$_GET[idu]'    
      

      ");
      if (mysqli_affected_rows($koneksi)>0){
          echo    "<script>
              alert('EDIT SUKSES');
              document.location= '4.php';
          </script>";
          
      } else {
          echo    "<script>
              alert('EDIT GAGAL');
              document.location= '4.php';
          </script>";
      }
      }else {
        
    $simpan = mysqli_query($koneksi, "INSERT INTO genre (name_gr) VALUES
                          ('$_POST[name_gr]')");

    if (mysqli_affected_rows($koneksi)>0){
        echo    "<script>
            alert('INPUT SUKSES');
            document.location= 'genre.php';
        </script>";
    } else {
        echo    "<script>
            alert('INPUT GAGAL !');
            document.location= 'genre.php';
        </script>";
    }}}
    if (isset($_GET['hal']))
    {
        if ($_GET['hal'] == "hapus_genre")
        {
            $hapus = mysqli_query($koneksi, "DELETE FROM genre WHERE id = '$_GET[id_gr]' ");
            if (mysqli_affected_rows($koneksi)>0){
                echo    "<script>
                    alert('HAPUS SUKSES');
                    document.location= 'genre.php';
                </script>";
            }
        }}
  ?>

  <div class="container" text-align="center">
  <br>
  	<div class="card-header bg-info text-center text-white">
    JENIS GENRE </div><hr>
    <a href="#" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal"> Tambah Data + </a>
    <a href="home.php" type="button" class="btn btn-danger btn-xs"> Kembali </a><hr>
    <div class="card text-center mt-3">
   	<div class="card md-3  ">
		<table class="table table-hover table-striped table-bordered table-success">
		<thead>
			<tr>
				<th>ID Genre</th>
				<th>Nama Genre</th>
        <th>OPSI</th>
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
      <td>

         <a href="genre.php?hal=edit_user&idu=<?=$data['name_gr']?>" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit<?php echo $data['name_gr']; ?>">Edit</a>
   			<a onclick="return confirm('Anda Yakin?');" href="genre.php?hal=hapus_genre&id_gr=<?=$data['id']?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      <div class="modal fade" id="edit<?php echo $data['name_gr']; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    
                    <h4 class="modal-title">Edit Data </h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="" method="get">
                        <?php
                        $id = $data['id_gr']; 
                        $query_edit = mysqli_query($koneksi, "SELECT * FROM genre WHERE id_gr='$id'");
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>
                        <input type="hidden" name="id_gr" value="<?php echo $row['id_gr']; ?>">
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="name_gr" class="form-control" value="<?php echo $row['name_gr']; ?>">      
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
   
	  </div></div>
           
            <!-- Input Content -->
            <div class="modal fade" id="myModal"  data-backdrop="static" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Isikan Data Sesuai Keterangan</h4>
                  </div>
            <div class="modal-body">
              <form role="form" action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_gr" value="<?php echo $row['id_gr']; ?>">
                
                  <div class="form-group">
                    <label>Nama Content</label>
                    <input type="text" name="name_gr"   class="form-control" placeholder="Input Nama Course" required="" value="<?=@$vname_gr?>">      
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