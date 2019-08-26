<?php
namespace App\Http\Controllers;
use App\Doc;
use App\Roletime;
use  App\Http\Controllers\Admin\DocController;
use Illuminate\Http\Request;

class FileController extends Controller
{
   
    public function index()
    {
    	return view('file');
    }
  public function download($id)
    {
$basepath=config('moconf.docpath') ?? 'resources/doc';
        $user = Auth::user();
        if($user->id<1)
        { return redirect('/login');}
        else{
            if(Roletime::hasRole($user->id,3))
            {
                $fileNeve=Doc::find($id)->filename;

                return response()->download($basepath.'/'.$fileNeve); // a fájl nevét kell megadni és annak tartalma bele lesz csatornázva a válaszba

                //return response()->download($fileNeve, $kivantNev, $headers); // második paraméterként megadhatunk neki egy nevet, amivel menti alapértelmezetten, valamint egyéb headeröket is felvehetünk
            }
            else{
                return redirect('#pricing');
                }
        }        
        
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

        $path= DocController::getDocFolder();
        $this->validate($request, [

            'file' => 'required',

            'file.*' => 'mimes:doc,pdf,docx,txt,xls'

    ]);
    $prev_image_array=['pdf','doc','text'];
    $ext=$request->file->getClientOriginalExtension();
    $filename = rand(1111,9999).time().'.'.$ext;
    $OriginalName =$request->file->getClientOriginalName();

    if(in_array($ext, $prev_image_array)){$prev=$ext.'png';}else{$prev='file.png';}

    $docdata=[
    'filename'=> $filename,
    'name'=>$OriginalName,
    'originalname'=>$OriginalName,
    'type'=>$ext,
    'prev'=>$prev,
    'sizekb'=>$request->file('file')->getSize()];
    Doc::create($docdata);
    	
       // request()->file->move(resource_path('doc'), $OriginalName);
       request()->file->move($path, $OriginalName);
    	return response()->json(['uploaded' => $OriginalName]);
    }
}