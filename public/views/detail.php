<?php
require_once "../../app/classes/VehicleManager.php";

$vehicleManager = new VehicleManager("","","","");


$id = $_GET['id'] ?? null;
// var_dump($id);
// exit;

if($id === null){
    header("Location: ../index.php");
    exit;
}

$vehicles = $vehicleManager->getVehicles();
$vehicle = $vehicles[$id]?? null;

if (!$vehicle) {
    header("Location: ../index.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $vehicleManager = new VehicleManager("","","","");
    $vehicleManager->editVehicle($id,[
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image'],
    ]);

    header("Location: ../index.php");

    exit;
}
include './header.php';
?>

<div class="container my-4">
    <h1>Vehicle Detail: </h1>
    <form method="POST">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-8">
                        <img src="<?= $vehicle['image'] ?>" class="card-img-top" style="height: 400px; object-fit: fill;">
                    </div>
                    <div class="col-md-4">
                        <div class="md-3">
                            <br>
                            <label class="form-label"> <b>Detail</b> </label>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Vehicle Name: </label>
                            <label><?= htmlspecialchars($vehicle['name']) ?></label>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Vehicle Type: </label>
                            <label><?= htmlspecialchars($vehicle['type']) ?></label>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Price: </label>
                            <label><?= htmlspecialchars($vehicle['price']) ?></label>
                        </div>
                        <div class="col-md-12">
                            <a href="../index.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </form>
</div>

</body>
</html>