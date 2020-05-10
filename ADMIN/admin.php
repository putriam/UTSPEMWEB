<?php
require 'addadmin.php';

$admn = query("SELECT * FROM admin ORDER BY id_admin DESC");

?>
<html>
    <link rel="stylesheet" href="admin.css">
    <div class="table-semua">
        <a class="tambah-berita-link"href="tambah.php">Tambah Admin</a>
        <table border="1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; ?>
            <?php foreach($admn as $row):?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?=$row["user_admin"];?></td>
                    <td><?=$row["pass_admin"];?></td>
                    <td>
                       
                        <a href="hapus.php?id=<?=$row["id_admin"];?>"onclick="return confirm('yakin?');">Delete</a>
                    </td>
                </tr>
            <?php $i++ ?>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
    
</html>