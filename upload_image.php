<?php

$data = json_decode(file_get_contents("php://input"), true);

$base64Image = $data['image'];
$imageName = $data['name'];

$imageData = base64_decode($base64Image);
$imagePath = __DIR__ . "\images\\" . $imageName;

$result = file_put_contents($imagePath, $imageData);

if ($result !== false) {
    echo json_encode(
        array(
            "message" => "Image upload done",
            "url" => $imagePath
        )
    );
} else {
    echo json_encode(
        array(
            "message" => "Image not uploaded",
            "url" => "error"
        )
    );
}

?>