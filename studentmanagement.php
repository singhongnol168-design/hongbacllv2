<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: white;
        }

        .container {
            width: 440px;
            margin: 80px auto;
            padding: 30px;
            background-color: #f3e8df;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            font-family: Georgia, serif;
            font-size: 24px;
            margin-bottom: 30px;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
        }

        label {
            width: 140px;
            font-size: 14px;
        }

        input {
            flex: 1;
            height: 36px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #555;
        }

        .button {
            text-align: center;
            margin-top: 25px;
        }

        button {
            padding: 10px 30px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            background-color: #555;
        }

        .result {
            margin-top: 30px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .result h2 {
            text-align: center;
            margin-top: 0;
        }

        .result p {
            margin: 8px 0;
        }

        .pass {
            color: green;
            font-weight: bold;
        }

        .fail {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php
$student_id = $student_name = "";
$cisco = $php = $database = $pb = $csharp = 0;
$total = 0;
$average = 0;
$grade = "";
$result = "FAIL";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = trim($_POST["student_id"] ?? "");
    $student_name = trim($_POST["student_name"] ?? "");
    $cisco = (float) ($_POST["cisco"] ?? 0);
    $php = (float) ($_POST["php"] ?? 0);
    $database = (float) ($_POST["database"] ?? 0);
    $pb = (float) ($_POST["pb"] ?? 0);
    $csharp = (float) ($_POST["csharp"] ?? 0);

    $total = $cisco + $php + $database + $pb + $csharp;
    $average = $total / 5;

    if ($average >= 80) {
        $grade = "A";
    } elseif ($average >= 70) {
        $grade = "B";
    } elseif ($average >= 60) {
        $grade = "C";
    } elseif ($average >= 50) {
        $grade = "D";
    } else {
        $grade = "F";
    }

    $result = ($average >= 50) ? "PASS" : "FAIL";
}
?>

<div class="container">
    <h1>Welcome To Student Management</h1>

    <form method="POST" action="">
        <div class="form-group">
            <label>Enter Student ID</label>
            <input type="text" name="student_id" value="<?php echo htmlspecialchars($student_id); ?>" required>
        </div>

        <div class="form-group">
            <label>Enter Student Name</label>
            <input type="text" name="student_name" value="<?php echo htmlspecialchars($student_name); ?>" required>
        </div>

        <div class="form-group">
            <label>Enter Cisco Score</label>
            <input type="number" name="cisco" value="<?php echo htmlspecialchars((string) $cisco); ?>" min="0" max="100" required>
        </div>

        <div class="form-group">
            <label>Enter PHP Score</label>
            <input type="number" name="php" value="<?php echo htmlspecialchars((string) $php); ?>" min="0" max="100" required>
        </div>

        <div class="form-group">
            <label>Enter Database Score</label>
            <input type="number" name="database" value="<?php echo htmlspecialchars((string) $database); ?>" min="0" max="100" required>
        </div>

        <div class="form-group">
            <label>Enter PB Score</label>
            <input type="number" name="pb" value="<?php echo htmlspecialchars((string) $pb); ?>" min="0" max="100" required>
        </div>

        <div class="form-group">
            <label>Enter C# Score</label>
            <input type="number" name="csharp" value="<?php echo htmlspecialchars((string) $csharp); ?>" min="0" max="100" required>
        </div>

        <div class="button">
            <button type="submit">Submit</button>
        </div>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class="result">
            <h2>Student Result</h2>

            <p>
                <strong>Student ID:</strong>
                <?php echo htmlspecialchars($student_id); ?>
            </p>

            <p>
                <strong>Student Name:</strong>
                <?php echo htmlspecialchars($student_name); ?>
            </p>

            <p>
                <strong>Total Score:</strong>
                <?php echo $total; ?> / 500
            </p>

            <p>
                <strong>Average:</strong>
                <?php echo number_format($average, 2); ?>%
            </p>

            <p>
                <strong>Grade:</strong>
                <?php echo $grade; ?>
            </p>

            <p>
                <strong>Result:</strong>
                <?php if ($result == "PASS"): ?>
                    <span class="pass">PASS</span>
                <?php else: ?>
                    <span class="fail">FAIL</span>
                <?php endif; ?>
            </p>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
