<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilkan Data</title>
</head>
<body>
    <h1>Data produk</h1>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead style="background-color: #f2f2f2;">
            <tr>
                <th style="padding: 10px; border: 1px solid #dddddd;">No</th>
                <th style="padding: 10px; border: 1px solid #dddddd;">Nama produk</th>
                <th style="padding: 10px; border: 1px solid #dddddd;">Harga</th>
                <th style="padding: 10px; border: 1px solid #dddddd;">Gambar produk</th>
                <th style="padding: 10px; border: 1px solid #dddddd;">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require './config/db.php';

                $products = mysqli_query($db_connect, "SELECT * FROM products");
                $no = 1;

                while ($row = mysqli_fetch_assoc($products)) {
            ?>
                <tr>
                    <td style="padding: 10px; border: 1px solid #dddddd;"><?= $no++; ?></td>
                    <td style="padding: 10px; border: 1px solid #dddddd;"><?= $row['name']; ?></td>
                    <td style="padding: 10px; border: 1px solid #dddddd;"><?= $row['price']; ?></td>
                    <!-- <td><img src="<?= $row['image']; ?>" width="100"></td> -->
                    <td style="padding: 10px; border: 1px solid #dddddd;"><a href="<?= $row['image']; ?>" target="_blank">Unduh</a></td>
                    <td style="padding: 10px; border: 1px solid #dddddd;">
                        <a href="edit.php?id=<?= $row['id']; ?>" style="margin-right: 5px;">Edit</a>
                        <a href="backend/delete.php?id=<?= $row['id']; ?>" style="color: red;">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
