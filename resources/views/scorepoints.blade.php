<?php
$mysqli = new mysqli('localhost','root','','ratings');
if(isset($_POST['rating'])) {
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];
    $query = "Insert into feedback (rating, feedback, email) VALUES (?,?,?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("iss", $rating, $feedback, $email);
    $stmt->execute();
    $msg = "<div class='alert alert-success'>Rating Successfully Added</div>";
    $stmt->close();
    $mysqli->close();
}
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Puntua</h2>
            <?php if(isset($msg)){echo $msg;} ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Rating</label>
                    <div id="rateYo"></div>
                </div>
                <div class="form-group">
                    <label for="">email:</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="">Comentario (opcional):</label>
                    <input type="text" class="form-control" name="feedback">
                    <input type="hidden" name="rating" id="rating">
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>
    $(function () {

        $("#rateYo").rateYo({
            fullStar:true,
            onSet:function(rating, rateYoInstance){
                $("#rating").val(rating);
            }
        });
    });
</script>
</body>
</html>
