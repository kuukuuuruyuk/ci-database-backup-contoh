<style>
    body {
        padding: 16px;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid;
    }
</style>

<h1>Pasar Online</h1>

<table>
<tr><td>Id</td><td>Username</td><td>Nama Lapak</td><td>Luas</td><td>Panjang</td></tr>
<?php
foreach ($userLapak->result_array() as $value) {
    $str = "<tr><td>{$value['id']}</td><td>{$value['username']}</td><td>{$value['nama']}</td><td>{$value['luas']}</td><td>{$value['panjang']}</td></tr>";

    echo $str;
}
?>
<table>

<form method="post">
    <button type="submit" name="is___backup_db" value="true">backup now!</button>
</form>
