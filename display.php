<?php
include("connection.php");
session_start();

$fim = $_SESSION['username'];

if (!$fim) {
    echo '<script>alert("First login");</script>';
    header("Location: login.php");
}

$query = "SELECT * FROM orderINFO where `logi`='$fim'";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if ($total != 0) {
    ?>
    <html>
    <head>
        <title>Order Information</title>
        <style>
            table {
                margin: 0 auto; /* Center the table horizontally */
                background-color: #f2f2f2; /* Set the background color */
            }

            th, td {
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #555555; /* Set the header background color */
                color: white; /* Set the header text color */
            }

            tr:nth-child(even) {
                background-color: #dddddd; /* Set the alternate row background color */
            }

            .btn {
                float: right;
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .btn-group {
                margin-top: 20px;
                margin-bottom: 20px;
                float: right;
            }

            .btn-group button {
                background-color: #4CAF50; /* Green background */
                border: none;
                color: white; /* White text */
                padding: 10px 20px; /* Some padding */
                cursor: pointer; /* Pointer/hand icon */
                float: right; /* Float the buttons side by side */
            }

            .btn-group button:not(:last-child) {
                border-right: none; /* Prevent double borders */
            }

            .btn-group button:hover {
                background-color: #3e8e41;
            }
        </style>
    </head>
    <body>
    <div class="btn-group">
        <form action="excel.php" method="post">
            <button type="submit" class="btn">Export</button>
        </form>
        <form action="logout.php" method="post">
            <button type="submit" class="btn">Logout</button>
        </form>
        <form action="index.php" method="post">
            <button type="submit" class="btn">Back</button>
        </form>
    </div>

    <table>
        <tr>
            <th>Order Date</th>
            <th>Company</th>
            <th>Owner</th>
            <th>ITEM</th>
            <th>Count</th>
            <th>Weight</th>
            <th>REQUEST</th>
        </tr>

        <?php
        while ($result = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
                <td><?php echo $result['orderdate']; ?></td>
                <td><?php echo $result['company']; ?></td>
                <td><?php echo $result['orderowner']; ?></td>
                <td><?php echo $result['item']; ?></td>
                <td><?php echo $result['count']; ?></td>
                <td><?php echo $result['weight']; ?></td>
                <td><?php echo $result['req']; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    </body>
    </html>
    <?php
}
?>