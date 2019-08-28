<?php

namespace App\Http\Controllers;
Use App\Category;
Use App\Doc;
Use App\Roletime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['categories']=Category::all();
        return view('cristal.index', compact('data'));
    }
    public function category(Request $request,$id)
    {
        $data['categories']=Category::all();
        $data['catname']=Category::find($id)->name;
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $data['list']== Doc::where('category_id', '=', $id)
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('originalname', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $data['list']= Doc::where('category_id', '=', $id)->latest()->paginate($perPage);
        }
        return view('cristal.category', compact('data'));
    }

    public function download($id)
    {
        $user = Auth::user();
        $userid=$user->id?? 0;
        if ($userid< 1) {      
                    return view('cristal.needlogin');
        } else {
            if (Roletime::hasRole($user->id, 3)) {
                $fileNeve = Doc::find($id)->filename ?? '';
                if($fileNeve!='')
                {
                return response()->download(self::getDocPrevpath() . $fileNeve); // a fájl nevét kell megadni és annak tartalma bele lesz csatornázva a válaszba
                }else{
                    $data=[];
                    $data['err']='Nemlétező file';
                    return view('cristal.error', compact('data'));
                }
                

                //return response()->download($fileNeve, $kivantNev, $headers); // második paraméterként megadhatunk neki egy nevet, amivel menti alapértelmezetten, valamint egyéb headeröket is felvehetünk
            } else {
                return view('cristal.needrole');
            }
        }

    }
}

  