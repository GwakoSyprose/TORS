<html>

<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
</head>

<div class="container">
    <div class="row">
        
    </div>

    <div class="row-fluid">
        <select class="selectpicker" data-show-subtext="true" data-live-search="true">
            <option value="" disabled selected>Choose registration number</option>
           

        
        <?php 
        require_once '../includes/connection.php';
        $sql = "SELECT * FROM vehicles";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo  '<option data-subtext="Rep California" value="'.$row["vehicleID"].'" >'.$row["regNo"].'</option>';
            }
        } else {
        }
          ?>
          </select>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

</html>