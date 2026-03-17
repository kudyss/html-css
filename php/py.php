<?php
$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) { mkdir($uploadDir, 0777, true); }

$message = "";

// --- 1. VYTVOŘENÍ NOVÉHO SOUBORU ---
if (isset($_POST['create_file'])) {
    $filename = preg_replace('/[^a-zA-Z0-9\._-]/', '', $_POST['new_filename']);
    $content = $_POST['file_content'];
    if (!empty($filename)) {
        file_put_contents($uploadDir . $filename . ".txt", $content);
        $message = "Soubor {$filename}.txt byl vytvořen.";
    }
}

// --- 2. NAHRÁNÍ EXISTUJÍCÍHO SOUBORU ---
if (isset($_FILES['fileToUpload'])) {
    $target = $uploadDir . basename($_FILES['fileToUpload']['name']);
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target)) {
        $message = "Soubor nahrán.";
    }
}

// --- 3. SMAZÁNÍ JEDNOHO SOUBORU ---
if (isset($_GET['delete'])) {
    $file = $uploadDir . basename($_GET['delete']);
    if (file_exists($file)) { unlink($file); header("Location: index.php"); exit; }
}

// --- 4. FORMÁTOVÁNÍ (SMAZÁNÍ VŠEHO) ---
if (isset($_POST['format_all'])) {
    $files = glob($uploadDir . '*'); 
    foreach($files as $file) { if(is_file($file)) unlink($file); }
    $message = "Všechny soubory byly smazány (složka vyčištěna).";
}

// --- 5. STAŽENÍ ---
if (isset($_GET['download'])) {
    $file = $uploadDir . basename($_GET['download']);
    if (file_exists($file)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        readfile($file); exit;
    }
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>PHP File Master</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f0f2f5; padding: 20px; 
        }
        .card { 
            background: white; max-width: 800px; margin: 0 auto; padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); 
        }
        .grid { 
            display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; 
        }
        section { 
            padding: 15px; border: 1px solid #eee; border-radius: 8px; 
        }
        input[type="text"], textarea { 
            width: 100%; margin-bottom: 10px; padding: 8px; box-sizing: border-box; 
        }
        table { 
            width: 100%; border-collapse: collapse; 
        }
        th, td { 
            padding: 12px; border-bottom: 1px solid #eee; text-align: left; 
        }
        .btn { 
            padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; color: white; font-size: 14px; 
        }
        .btn-create { 
            background: #007bff; 
        }
        .btn-upload { 
            background: #28a745; 
        }
        .btn-delete { 
            background: #dc3545; 
        }
        .btn-format { 
            background: #6c757d; width: 100%; margin-top: 10px; 
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Správa souborů</h2>
    <?php if($message) echo "<p style='color: green;'>$message</p>"; ?>

    <div class="grid">
        <section>
            <h3>Vytvořit nový .txt</h3>
            <form method="post">
                <input type="text" name="new_filename" placeholder="Název souboru (bez přípony)" required>
                <textarea name="file_content" placeholder="Obsah souboru..."></textarea>
                <button type="submit" name="create_file" class="btn btn-create">Vytvořit a uložit</button>
            </form>
        </section>

        <section>
            <h3>Nahrát soubor z PC</h3>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" required>
                <button type="submit" class="btn btn-upload">Nahrát na server</button>
            </form>
            <hr>
            <form method="post" onsubmit="return confirm('Opravdu smazat úplně všechno?')">
                <button type="submit" name="format_all" class="btn btn-format">Formátovat složku (Smazat vše)</button>
            </form>
        </section>
    </div>

    <h3>Seznam souborů</h3>
    <table>
        <thead>
            <tr>
                <th>Název</th>
                <th>Akce</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $files = array_diff(scandir($uploadDir), array('.', '..'));
            foreach ($files as $file): ?>
            <tr>
                <td><?php echo $file; ?></td>
                <td>
                    <a href="?download=<?php echo $file; ?>" style="color: green;">Stáhnout</a> | 
                    <a href="?delete=<?php echo $file; ?>" style="color: red;" onclick="return confirm('Smazat?')">Smazat</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>