<?php include_once 'header.php'  ?>

<?php 
$con = mysqli_connect('localhost', 'root', '', 'trpl');

$sql = "SELECT * FROM  permintaan p, rs r, stokdarah s WHERE p.idDarah = s.idDarah and p.idRS = r.idRS ";
$result = mysqli_query($con, $sql);
$no=1;
?>
<div class="container">
    <h3 class="text-center">Data HTC</h3>
    <div class="table-responsive">          
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>nama</th>
            <th>email</th>
            <th>nim</th>
            <th>jenis kelamin</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['Tanggal'] ?></td>
                <td><?php echo $row['namaRumahSakit'] ?></td>
                <td><?php echo $row['Darah A'] ?></td>
                <td><?php echo $row['Darah B'] ?></td>
                <td><?php echo $row['Darah AB'] ?></td>
                <td><?php echo $row['Darah O'] ?></td>
                <a href="edit.php?id=<?php echo $row['id'] ?>">edit</a>
                |
                <a href="aksi/delete.php?id=<?php echo $row['id']?>">delete</a>
                <!-- <?php if ($row['status']==0){?>
                |
                <a href="aksi/verif.php?id=<?php echo $row['id'] ?>">verif</a>
                <?php } ?> -->
            </td>
        </tr>
    <?php } ?>