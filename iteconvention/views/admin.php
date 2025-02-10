<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update the session variable based on the submitted form data
    $disableSubmitButton = isset($_POST['disable_submit_button']);
    $_SESSION['disable_submit_button'] = $disableSubmitButton;

    // Store the value in a cookie for persistent storage
    setcookie('disable_submit_button', $disableSubmitButton ? '1' : '0', time() + (86400 * 30), "/"); // 86400 = 1 day
}

// Retrieve the current value of $disableSubmitButton from session or cookie
$disableSubmitButton = (isset($_SESSION['disable_submit_button']) && $_SESSION['disable_submit_button']) ||
                       (isset($_COOKIE['disable_submit_button']) && $_COOKIE['disable_submit_button'] === '1');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/icons/logo-spup.png" type="image/x-icon">
    <title>Admin Panel</title>

    <!-- Add Montserrat font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #EDEDED; /* Adjusted background color */
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .popup-container {
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        form {
            background-color: #F7F7F7; /* Adjusted form background color */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s ease;
            max-width: 400px;
            margin: auto;
            transform: scale(1);
        }

        form:hover {
            transform: scale(1.05);
        }

        h2 {
            color: #333; /* Adjusted text color */
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-size: 16px;
            color: #555; /* Adjusted text color */
            text-align: left;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        button {
            background-color: #333; /* Adjusted button color */
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #222; /* Adjusted button color */
        }

        p.status {
            font-weight: 700;
            margin-top: 10px;
            color: #000000; /* Bright blue color */
        }

        p {
            margin-top: 20px;
            color: #bbb;
            font-size: 14px;
            text-align: center;
            margin-bottom: 10px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="popup-container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2>Admin Panel</h2>
            <label for="disable_submit_button">
                <input type="checkbox" id="disable_submit_button" name="disable_submit_button"
                    <?php echo $disableSubmitButton ? 'checked' : ''; ?>>
                Disable Submit Button
            </label>
            <br>
            <button type="submit">Save</button>
            <button type="button" onclick="window.location.href='admindash.php'">Close</button>
            <!-- The above button uses JavaScript to redirect to admindash.php on click -->
            <p class="status">Current Status: <?php echo $disableSubmitButton ? 'Submit Button is Disabled' : 'Submit Button is Enabled'; ?>
            </p>
        </form>
    </div>
</body>

</html>