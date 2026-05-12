<?php
// Konfigurace databáze
$host = "localhost";
$uzivatel = "root";
$heslo = "";
$db = "moje_databaze";

$conn = new mysqli($host, $uzivatel, $heslo, $db);
if ($conn->connect_error) { die("Spojení selhalo: " . $conn->connect_error); }

$zprava = "";

// Zpracování odeslání
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jmeno = $_POST['jmeno'];
    $telefon = $_POST['telefon'];
    $sluzba = $_POST['sluzba'];
    $datum = $_POST['datum'];
    $cas = $_POST['cas'];

    $stmt = $conn->prepare("INSERT INTO rezervace_barber (jmeno, telefon, sluzba, datum_rezervace, cas_rezervace) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $jmeno, $telefon, $sluzba, $datum, $cas);

    if ($stmt->execute()) {
        $zprava = "<div class='success'>Hotovo! Těšíme se na vás $datum v $cas.</div>";
    } else {
        $zprava = "<div class='error'>Chyba: " . $conn->error . "</div>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Barber Shop - Rezervace</title>
    <style>
        body { font-family: 'Arial', sans-serif; background: #1a1a1a; color: #eee; display: flex; justify-content: center; padding: 20px; }
        .card { background: #222; padding: 30px; border-radius: 15px; border: 1px solid #d4af37; width: 100%; max-width: 400px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
        h1 { color: #d4af37; text-align: center; text-transform: uppercase; letter-spacing: 2px; }
        label { display: block; margin-top: 15px; color: #d4af37; font-size: 0.9em; }
        input, select { width: 100%; padding: 12px; margin-top: 5px; background: #333; border: 1px solid #444; color: white; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 15px; margin-top: 25px; background: #d4af37; border: none; color: #1a1a1a; font-weight: bold; cursor: pointer; border-radius: 5px; text-transform: uppercase; }
        button:hover { background: #f1c40f; }
        .success { background: #27ae60; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center; }
        .error { background: #c0392b; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center; }
    </style>
</head>
<body>

<div class="card">
    <h1>Barber Shop</h1>
    <?php echo $zprava; ?>
    
    <form method="POST">
        <label>Jméno a příjmení</label>
        <input type="text" name="jmeno" required placeholder="Jan Novák">

        <label>Telefon</label>
        <input type="tel" name="telefon" required placeholder="+420 123 456 789">

        <label>Služba</label>
        <select name="sluzba">
            <option value="Střih">Střih (45 min)</option>
            <option value="Střih + Vousy">Střih + Vousy (60 min)</option>
            <option value="Junior">Junior střih (30 min)</option>
        </select>

        <label>Den</label>
        <input type="date" name="datum" required min="<?php echo date('Y-m-d'); ?>">

        <label>Čas</label>
        <select name="cas">
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="13:00">13:00</option>
            <option value="14:00">14:00</option>
            <option value="15:00">15:00</option>
            <option value="16:00">16:00</option>
        </select>

        <button type="submit">Rezervovat termín</button>
    </form>
</div>

</body>
</html>