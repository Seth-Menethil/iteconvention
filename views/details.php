<?php
require_once('../connection/connection.php');
session_start();


if (isset($_POST['program_id'])) {
    $_SESSION['program_id'] = $_POST['program_id'];
}

$program_id = $_SESSION['program_id'];

$query = "SELECT * FROM program WHERE program_id = '$program_id'";
$res2 = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/cropped-GCU-Logo-circle.png">
    <link rel="shortcut icon" href="../assets/icons/logo-spup.png" type="image/x-icon">
    <title>Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
body {

    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    text-align: center;
    background-color: #f0f0f0;
}

.all {
    position: relative;
    width: 80%;
    max-width: 800px;
    margin: 50px auto;
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: center;
    transition: transform 0.3s ease;
}

.all:hover {
    transform: scale(1.05);
}

.admin-img {
    width: 100%;
    max-width: 400px;
    height: auto;
    border-radius: 10px;
    margin-bottom: 20px;
}

.text-details {
    font-size: 16px;
    margin-bottom: 10px;
}

.heading {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.register_form {
    text-align: center;
    margin-top: auto;
}

.btn {
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: #3498db;
    color: #fff;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #2980b9;
}

.close-button {
    position: absolute;
    top: 1px;
    right: 18px;
    cursor: pointer;
    font-size: 40px;
    color: #333;
    transition: 0.5s ease;
}

.close-button:hover {
    transform: scale(1.5);
}

@media (max-width: 535px) {
    .all {
        width: 90%;
    }
}

    </style>
</head>
<!-- <span id="closeModal">&times;</span> -->

<body>
    <span id="closeModal" class="close-button">&times;</span>
    <div class="all">
        <?php
        $count = 0; // Initialize count to track cards in a row
        while ($row = mysqli_fetch_assoc($res2)) {
            ?>
            <!-- Card image -->
            <?php
            $user_id = $row['program_id'];
            $query = "SELECT image FROM program WHERE program_id = $user_id";
            $result = mysqli_query($con, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $row0 = mysqli_fetch_assoc($result);
            }
            ?>
            <img class="admin-img" src="../<?php echo $row['image']; ?>" alt="image"></a>

            <div class="text-center">
                <h2 class="text-center" style="font-weight:bold">
                    <?php echo $row['name']; ?>
                </h2>
                <!-- <?php echo $row['program_id']; ?> <br> -->
                <?php echo $row['date']; ?> &nbsp;
                <?php echo $row['time']; ?> <br>
                Venue :
                <?php echo $row['venue']; ?> <br>


                <?php
                $user_id = $row['user_id'];
                $query = "SELECT username FROM user WHERE user_id = '$user_id'";
                $res = mysqli_query($con, $query);

                ?>
            </div>
            <div class="button-container">
                <form action="./register.php" method="POST" class="register_form text-center">
                    <input type="hidden" name="program_id" value="<?php echo $row['program_id']; ?>">
                    <button type="submit" value="Submit" name="register"
                        class="btn btn-primary program_register">Register</button>
                </form>
            </div>
            <?php
        }
        ?>
    </div>
    <script>
        const closeModal = document.getElementById('closeModal');
        closeModal.addEventListener('click', () => {
            window.location.href = '../index.php';

        });
    </script>
</body>

</html>