<!DOCTYPE html>
<html lang="en">
<head>
    <title>Electoral Roll</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            text-align: center;
        }

        header {
            background-color: #A3DFE6;
            color: black;
            padding: 20px 0;
            border-bottom: 2px solid #005793;
        }

        header h1, header h2, header h3 {
            margin: 5px 0;
        }

        .main-div {
            text-align: center;
            margin: 20px auto;
            max-width: 65%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .main-div h1 {
            text-align: center;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 15px;
            border: 1px solid #ccc;
        }

        .table th:not(:first-child),
        .table td:not(:first-child) {
            border-left: none;
        }

        .cell.serial {
            width: 10%;
        }

        .cell.name {
            width: 40%;
        }

        .cell.symbol {
            width: 20%;
        }

        .cell img {
            max-height: 50px;
            max-width: 50px;
        }

        /* Responsive styles */
        @media screen and (max-width: 768px) {
            header img {
                display: none;
            }

            .main-div {
                max-width: 90%;
            }

            .cell {
                font-size: 14px;
            }
        }

        @media screen and (max-width: 480px) {
            .main-div {
                padding: 10px;
            }

            .cell {
                padding: 5px;
            }
        }

        /* Center the table */
        .center-div {
            display: flex;
            justify-content: center;
        }

        .table-responsive {
            max-width: 100%;
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <header id="header">
        <img src="https://upload.wikimedia.org/wikipedia/en/6/6f/Cochin_University_of_Science_and_Technology_Logo.png" height="100px" width="100px" align="left" alt="logo">
        <img src="https://upload.wikimedia.org/wikipedia/en/6/6f/Cochin_University_of_Science_and_Technology_Logo.png" height="100px" width="100px" align="right" alt="logo">    
        <h1>COLLEGE ELECTIONS</h1>
        <h2>SCHOOL OF ENGINEERING</h2>
        <h3>(COCHIN UNIVERSITY OF SCIENCE AND TECHNOLOGY)</h3>
    </header>

    <div class="main-div">
        <h1>ELECTORAL ROLL</h1>
        <form action="" method="post">
            <input type="text" placeholder="Register Number" name="search" size="30" height="40px">
            <button name="submit" style="background-color: black; color: white;">Search</button>
            <div>
                <?php
                include 'connection.php';
                if(isset($_POST['submit']))
                {
                    $search=$_POST['search'];
                    $sql="select * from info where regno='$search' ";
                    $resul=mysqli_query($con,$sql);
                    if($resul)
                    {
                        if(mysqli_num_rows($resul)>0)
                        {
                            ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Register Number</th>
                                        <th>Name</th>
                                        <th>Semester</th>
                                        <th>Department</th>
                                    </tr>
                                </thead>
                                <?php
                                $row=mysqli_fetch_assoc($resul);
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['regno']   ?></td>
                                        <td><?php echo $row['name']   ?></td>
                                        <td><?php echo $row['semester']  ?></td>
                                        <td><?php  echo$row['department']?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                        }
                    }
                    else
                    echo "Voter not exist";
                }
                ?>
            </div>
        </form>
        <br>
        <div class="center-div">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Register Number</th>
                            <th>Name</th>
                            <th>Semester</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'connection.php';
                        $selectquery="select * from info ";
                        $query=mysqli_query($con,$selectquery);
                        $num=mysqli_num_rows($query);
                        while($res=mysqli_fetch_array($query))
                        {
                            ?>
                            <tr>
                                <td><?php echo $res['regno']   ?></td>
                                <td><?php echo $res['name']   ?></td>
                                <td><?php echo $res['semester']  ?></td>
                                <td><?php  echo$res['department']?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>