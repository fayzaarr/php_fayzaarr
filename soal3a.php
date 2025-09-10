<?php
$host = "localhost";
$user = "root";  
$pass = "";       
$db   = "testdb"; 

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama   = $_GET['nama']   ?? '';
$alamat = $_GET['alamat'] ?? '';
$hobi   = $_GET['hobi']   ?? '';

$sql = "SELECT p.nama, p.alamat, h.hobi 
        FROM person p
        LEFT JOIN hobi h ON p.id = h.person_id
        WHERE 1=1";

if (!empty($nama)) {
    $sql .= " AND p.nama LIKE '%" . $conn->real_escape_string($nama) . "%'";
}
if (!empty($alamat)) {
    $sql .= " AND p.alamat LIKE '%" . $conn->real_escape_string($alamat) . "%'";
}
if (!empty($hobi)) {
    $sql .= " AND h.hobi LIKE '%" . $conn->real_escape_string($hobi) . "%'";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Soal 3</title>
    <h1>List Table</h1>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 6px 12px;
        }
        table {
            margin-bottom: 20px;
        }
        form {
            border: 1px solid #000;
            padding: 15px;
            width: 300px;
        }
        .form-row {
            margin-bottom: 10px;
        }
        label {
            display: inline-block;
            width: 70px;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Hobi</th>
    </tr>
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['alamat']) ?></td>
                <td><?php echo htmlspecialchars($row['hobi'] ?? ''); ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="3">Tidak ada data</td>
        </tr>
    <?php endif; ?>
</table>

<form method="get">
    <div class="form-row">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>">
    </div>
    <div class="form-row">
        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?= htmlspecialchars($alamat) ?>">
    </div>
    <div class="form-row">
        <label>Hobi:</label>
        <input type="text" name="hobi" value="<?= htmlspecialchars($hobi) ?>">
    </div>
    <button type="submit">SEARCH</button>
</form>

</body>
</html>
<?php
$conn->close();
?>
