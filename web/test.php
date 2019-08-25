<?php
require 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

function subirArchivo($archivo)
{
    $storage = new StorageClient(
        ['keyFilePath' => 'credential.json']
    );
    $bucket = $storage->bucket('misegemnto64');
    
    // Upload a file to the bucket.
    // $bucket->upload(
    //     fopen('fupload.txt', 'r')
    // );
    
    // Using Predefined ACLs to manage object permissions, you may
    // upload a file and give read access to anyone with the URL.
    $bucket->upload(
        fopen($archivo, 'r'),
        [
            'predefinedAcl' => 'publicRead'
        ]
    );
}

// // Download and store an object from the bucket locally.
// $object = $bucket->object('darling.pdf');
// print_r($object);
// $object->downloadToFile('testing.pdf');
// echo 'Exito';
?>