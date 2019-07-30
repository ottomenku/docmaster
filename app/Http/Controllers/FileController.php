<?php
namespace App\Http\Controllers;
use App\Doc;
use Illuminate\Http\Request;

class FileController extends Controller
{
   
    public function index()
    {
    	return view('file');
    }

    public function convert()
    { 
            $imagick = new \Imagick();
        // Reads image from PDF
        $imagick->readImage(resource_path('doc').'\naptar.pdf');
        // Writes an image or image sequence Example- converted-0.jpg, converted-1.jpg
      //  $imagick->writeImages(resource_path('doc/previews').'\converted.jpg', false);
  echo resource_path('doc').'/naptar.pdf';
//phpinfo();
  /*
       if (!extension_loaded('imagick')){
            echo 'imagick not installed';}
        
    
        
        //
      

    	$pdflib = new \ImalH\PDFLib\PDFLib();
//$pdflib->setPdfPath(resource_path('doc').'\naptar.pdf');
//$pdflib->setOutputPath(resource_path('doc/previews').'\naptar.png');
$pdflib->setPdfPath('resources\doc\naptar.pdf');
$pdflib->estOutputPath('resources\doc\previews\naptar.png');
$pdflib->setImageFormat(\ImalH\PDFLib\PDFLib::$IMAGE_FORMAT_PNG);
$pdflib->setDPI(300);
$pdflib->setPageRange(1,$pdflib->getNumberOfPages());
$pdflib->setFilePrefix('page-'); // Optional
$pdflib->convert();-*/
    }
   
    public function uploadImages(Request $request)
    {
        $this->validate($request, [

            'file' => 'required',

            'file.*' => 'mimes:doc,pdf,docx,zip'

    ]);

    $ext=$request->file->getClientOriginalExtension();
    $filename = rand(1111,9999).time().'.'.$ext;
    $OriginalName =$request->file->getClientOriginalName();
    if($ext='pdf'){

    }
    $docdata=[
    'filenamename'=> $filename,
    'name'=>$OriginalName,
    'originalname'=>$OriginalName,
    'ext'=>$ext,
    'sizekb'=>$request->file('file')->getSize()];
    Doc::create($docdata);
    	
        request()->file->move(resource_path('doc'), $OriginalName);
    	return response()->json(['uploaded' => '/doc/'.$OriginalName]);
    }
}