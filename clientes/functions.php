<?php
require_once __DIR__ . '/../config/database.php';
function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));

}

function formatDate($date) {
    return $date->toDateTime()->format('Y-m-d');
}

function crearPocesos($nombre, $correo, $telefono, $direccion) {
    global $ClienteCollection;
    $resultado = $ClienteCollection->insertOne([
        'nombre' => sanitizeInput($nombre),
        'correo' => sanitizeInput($correo),
        'telefono' => sanitizeInput($telefono),
        'direccion' => sanitizeInput($direccion),
        
    ]);
    return $resultado->getInsertedId();
}

function obtenerProcesos() {
    global $ClienteCollection;
    return $ClienteCollection->find();
}

function obtenerProcesosPorId($_id) {
    global $ClienteCollection;
    return $ClienteCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($_id)]);
}

function actualizarProcesos($_id, $nombre, $correo, $telefono, $direccion) {
    global $ClienteCollection;
    $resultado = $ClienteCollection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($_id)],
        ['$set' => [
            'nombre' => sanitizeInput($nombre),
            'correo' => sanitizeInput($correo),
            'telefono' => sanitizeInput($telefono),
            'direccion' => sanitizeInput($direccion),
        ]]
    );
    return $resultado->getModifiedCount();
}

function eliminarProcesos($_id) {
    global $ClienteCollection;
    $resultado = $ClienteCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($_id)]);
    return $resultado->getDeletedCount();
}