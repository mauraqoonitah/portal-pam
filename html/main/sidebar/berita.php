
 
<h3>Form Pencarian Dengan PHP - WWW.MALASNGODING.COM</h3>
 
<form action="berita.php" method="get">
    <label>Cari :</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>
 
<?php 
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
 
<table border="1">
    <tr>
        
        <th>Nama</th>
    </tr>
    <?php 
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $data = mysql_query("select * from news where nama like '%".$cari."%'");             
    }else{
        $data = mysql_query("select * from news");       
    }
    $no = 1;
    while($d = mysql_fetch_array($data)){
    ?>
    <tr>
       <td><?php echo $d['title_alias']; ?></td>
        <td><?php echo $d['title']; ?></td>
    </tr>
    <?php } ?>
</table>









