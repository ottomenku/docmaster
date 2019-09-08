<?php

       // $image = new Imagick($pdfPath.'[0]'); // o az első oldalt jelzi
       $image = new \Imagick('pelda.pdf[0]');
        //$image->setImageFormat('jpeg'); //nem kell a jpeghez
        $image->writeImage('page_one.jpg'); 
        header("Content-Type: image/" . $image->getImageFormat());
echo $image;