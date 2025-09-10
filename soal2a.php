<?php

$step = isset($_POST['step']) ? (int)$_POST['step'] : 1;
$nama = $_POST['nama'] ?? '';
$umur = $_POST['umur'] ?? '';
$hobi = $_POST['hobi'] ?? '';

?>

<style>
    .box {
        border: 2px solid #333;     
        padding: 15px;               
        margin: 20px 0;              
        border-radius: 8px;          
        width: 300px;                
        background-color: #ffffffff;   
    }

    .box h3 {
        margin: 0 0 10px 0;
    }
</style>

<?php if ($step == 1): ?>
    <form method="POST" class="box">
        Nama Anda:<br>
        <input type="text" name="nama" required><br><br>
        <input type="hidden" name="step" value="2">
        <input type="submit" name="Submit">
    </form>

<?php elseif ($step == 2): ?>
    <form method="POST" class="box">
        Umur Anda:<br>
        <input type="text" name="umur" required><br><br>
        <input type="hidden" name="nama" value="<?= $nama ?>">
        <input type="hidden" name="step" value="3">
        <input type="submit" name="Submit">
    </form>

<?php elseif ($step == 3): ?>
    <form method="POST" class="box">
        Hobi Anda:<br>
        <input type="text" name="hobi" required><br><br>
        <input type="hidden" name="nama" value="<?= $nama ?>">
        <input type="hidden" name="umur" value="<?= $umur ?>">
        <input type="hidden" name="step" value="4">
        <input type="submit" name="Submit">
    </form>

<?php else: ?>
    <div class="box">
        <h3>Hasil Input:</h3>
        Nama: <?= htmlspecialchars($nama) ?><br>
        Umur: <?= htmlspecialchars($umur) ?><br>
        Hobi: <?= htmlspecialchars($hobi) ?><br>
    </div>
<?php endif; ?>