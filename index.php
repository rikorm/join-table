 <?php
// panggil koneksinya
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html>
  <title>Menampilkan Data Tabel MySQL Dengan mysqli_fetch_array </title>
</head>
<body>
   <style>
         body {font-family:tahoma, arial}
         table {border-collapse: collapse}
         th, td {font-size: 12px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030}
         th {background: #CCCCCC; font-size: 12px; border-color:#B0B0B0}
      </style>
   </head>
   <body>
      <h3>TABEL BARANG (mysqli_fetch_array)</h3>
      <table>
         <thead>
            <tr>
               <th>id barang</th>
               <th>nama barang</th>
               <th>jenis barang</th>
               <th>Stok Barang</th>
               <th>harga</th>
            </tr>
         </thead>
         <?php
            include 'koneksi.php';     
            $sql = 'SELECT  * FROM barang';
            $query = mysqli_query($conn, $sql);    
            while ($row = mysqli_fetch_array($query))
            {
               ?>
         <tbody>
            <tr>
               <td><?php echo $row['id_barang'] ?></td>
               <td><?php echo $row['nama_barang'] ?></td>
               <td><?php echo $row['jenis_barang'] ?></td>
               <td><?php echo $row['Stok_Barang'] ?></td>
               <td><?php echo $row['harga'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      <h3>TABEL CUSTOMER (mysqli_fetch_row)</h3>
      <table>
         <thead>
            <tr>
               <th>id_costumer</th>
               <th>nama_costumer</th>
               <th>jenis_kelamin</th>
               <th>alamat</th>
               <th>nomor_hp</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT  * FROM customer';
            $query = mysqli_query($conn, $sql);    
            while ($row = mysqli_fetch_array($query))
            {
               ?>
         <tbody>
            <tr>
               <td><?php echo $row[0] ?></td>
               <td><?php echo $row[1] ?></td>
               <td><?php echo $row[2] ?></td>
               <td><?php echo $row[3] ?></td>
               <td><?php echo $row[4] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      <h3>Inner Join (mysqli_fetch_assoc)</h3>
      <h4> (Menampilkan semua data transaksi dari tabel customer yang melakukan pemesanan barang)</h4>
      <table>
         <thead>
            <tr>
               <th>id costumer</th>
               <th>nama costumer </th>
               <th>tanggal transaksi</th>
               <th>total transaksi</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT cs.id_costumer, nama_costumer, tanggal_transaksi, total_transaksi
            FROM customer cs
            JOIN transaksi ts USING (id_costumer)';
            $query = mysqli_query($conn, $sql);    
            while ($row = mysqli_fetch_assoc($query))
            {
               ?>
         <tbody>
            <tr>
               <td><?php echo $row['id_costumer'] ?></td>
               <td><?php echo $row['nama_costumer'] ?></td>
               <td><?php echo $row['tanggal_transaksi'] ?></td>
               <td><?php echo $row['total_transaksi'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      </table>
      <h3>left outer Join </h3>
      <h4> (Menampilkan semua data transaksi dari tabel customer beserta data transaksinya dari tabel transaksi )</h4>
      <table>
         <thead>
            <tr>
               <th>id costumer</th>
               <th>nama costumer </th>
               <th>tanggal transaksi</th>
               <th>total transaksi</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT cs.id_costumer, nama_costumer, tanggal_transaksi, total_transaksi
            FROM customer cs
            JOIN transaksi ts USING (id_costumer)';
            $query = mysqli_query($conn, $sql);    
            while ($row = mysqli_fetch_assoc($query))
            {
               ?>
         <tbody>
            <tr>
               <td><?php echo $row['id_costumer'] ?></td>
               <td><?php echo $row['nama_costumer'] ?></td>
               <td><?php echo $row['tanggal_transaksi'] ?></td>
               <td><?php echo $row['total_transaksi'] ?></td> 
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
   </body>
</html>