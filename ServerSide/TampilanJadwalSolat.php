<?php 
include_once('include.php');
$data = new Jadwal_Solat();
?>
<h1>Dalam Bentuk Tabel</h1>
<table>
<thead><tr><td>No</td><td>Tanggal</td><td>Imsak</td><td>Subuh</td><td>Zuhur</td><td>Asar</td><td>Maghrib</td><td>Isya</td></tr></thead>
<tbody>
<?php 
$i = 0;
    WHILE ($d = $data::Baca()) {
?><tr>
    <td><?php echo ++$i; ?></td>
    <td><?php echo $d['tgl'] ?></td>
    <td><?php echo $d['i'] ?></td>
    <td><?php echo $d['s'] ?></td>
    <td><?php echo $d['z'] ?></td>
    <td><?php echo $d['a'] ?></td>
    <td><?php echo $d['m'] ?></td>
    <td><?php echo $d['y'] ?></td>
</tr><?php 
    }
?></tbody>
</table>


<hr />

<h1>Dalam Bentuk JSON</h1>
<?php 
$data2 = new Jadwal_Solat();
echo $data2::JSON();
?>