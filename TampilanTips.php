<?php 
include_once('include.php');
if(!isset($_GET['data'])){
$data = new Tips();
?><h1>Dalam Bentuk Tabel</h1>
<table>
<thead><tr><td>Judul</td><td>Isi</td><td>Tanggal</td></thead>
<tbody>
<?php WHILE ($k = $data::Baca()) : ?>
<tr>
    <td><?php echo $k['judul'] ?></td>
    <td><?php echo $k['isi'] ?></td>
    <td><?php echo $k['waktu'] ?></td>
</tr>

<?php ENDWHILE?>
</tbody>
</table>


<hr />

<h1>Dalam Bentuk JSON</h1>
<pre>
<?php 
$data2 = new Tips();
echo $data2::JSON();
?></pre><?php
}else{
$data2 = new Tips();
echo $data2::JSON();
}
?>