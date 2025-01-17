<?php 
    include("database.php");
    $query = " SELECT * from HealthcareProvider ";
    $result = mysqli_query($connection,$query);
    $query1 = " SELECT * from Doctor ";
    $result1 = mysqli_query($connection,$query1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project 329</title>
    <link rel="icon" href="images/logo.png" sizes="16x16" type="image/png">
    <link rel="icon" href="images/logo.png" sizes="32x32" type="image/png">
    <link rel="apple-touch-icon" href="images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="cost.css">
</head>
<body>
    <header>
        <div class="logo">Project 329</div>
        <nav>
            <ul><li><a href="index.html">Home</a></li></ul>
        </nav>
    </header>

    <section>
        <div class="form-container">
            <form id="dataForm" method="post" action="input.php">
                <div class="form-row">
                    <label for="hospital_type">Hospital Type:</label>
                    <select name="hospital_type" id="hospital_type">
                        <option value="hospital_1">Government</option>
                        <option value="hospital_2">Private</option>
                        <option value="hospital_3">Chamber/Clinic</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="speciality">Speciality:</label>
                    <select name="speciality" id="speciality">
                        <option value="speciality_1">Cardiology</option>
                        <option value="speciality_2">Urology</option>
                        <option value="speciality_3">Dermatology</option>
                        <option value="speciality_4">Radiologist</option>
                        <option value="speciality_5">Pediatrician</option>
                        <option value="speciality_6">Nuerologist</option>
                        <option value="speciality_7">Gynacologist</option>

                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="form-row">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" min="0">
                </div>
                <div class="form-row">
                    <input type="submit" value="Show Prices">
                </div>
            </form>
        </div>

        <!-- New table section -->
        <div class="table-container" style="padding: 20px;">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Hospital ID</th>
                        <th>Hospital Name</th>
                        <th>Hospital Address</th>
                        <th>Hospital Type</th>
                        <th>Hospital Bill</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <?php 
                                    
                        while($row=mysqli_fetch_assoc($result)){
                            $HID = $row['ID'];
                            $HName = $row['Name'];
                            $HAddress = $row['Address'];
                            $HType = $row['Type'];
                            $HPrice = $row['Price'];

                    ?>
                    <tr>
                        <td><?php echo $HID ?></td>
                        <td><?php echo $HName ?></td>
                        <td><?php echo $HAddress?></td>
                        <td><?php echo $HType ?></td>
                        <td><?php echo $HPrice ?></td>
                    </tr>        
                   <?php 
                        }  
                    ?>
                </tbody>
            </table>
        </div>
    </section>

        <div class="table-container" style="padding: 20px;">
            <table class="data-table">
                <thead>
                        <tr>
                            <th>Doctor ID</th>
                            <th>Hospital ID</th>
                            <th>Doctor Name</th>
                            <th>Doctor Specialization </th>
                            <th>Cost of Visit </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        while($row1=mysqli_fetch_assoc($result1)){
                                $DID = $row1['DID'];
                                $HID = $row1['HID'];
                                $DName = $row1['Name'];
                                $DSpecialization = $row1['Specialization'];
                                $DPrice = $row1['Price'];
                        ?>        
                        <tr>
                            <td><?php echo $DID ?></td>
                            <td><?php echo $HID ?></td>
                            <td><?php echo $DName?></td>
                            <td><?php echo $DSpecialization ?></td>
                            <td><?php echo $DPrice ?></td>
                        </tr>
                        <?php 
                            }  
                        ?>        
                    </tbody>
                </table>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <p>Project 329</p>
            <p>©2023 Group 38</p>
        </div>
    </footer>
</body>
</html>