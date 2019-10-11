<?php

namespace App\Http\Controllers;

use App\Category;
use App\Doc;
use App\Roletime;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

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
        $data['categories'] = Category::all();
        return view('cristal.index', compact('data'));
    }
    public function category(Request $request, $id)
    {
        $data['categories'] = Category::all();
        $data['catname'] = Category::find($id)->name;
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $data['list'] == Doc::where('category_id', '=', $id)
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('originalname', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $data['list'] = Doc::where('category_id', '=', $id)->latest()->paginate($perPage);
        }
        return view('cristal.category', compact('data'));
    }
    public function directdownload($id)
    {
        \Auth::check() ;
        $userid=\Auth::id();

        if ( $userid > 0 && Roletime::hasRole($userid, 3)) {
            $fileNeve = Doc::find($id)->filename ?? '';
           // $filepath = resource_path(config('app.doc_path')) . '/' . $fileNeve;
           $filepath = resource_path('doc') . '/' . $fileNeve;
            return response()->download($filepath); // a fájl nevét kell megadni és annak tartalma bele lesz csatornázva a válaszba

        }

    }
    public function download($id)
    {
        //$user = Auth::user();
       // $userid = $user->id ?? 0; // ajax kérésben nem azonosít
      \Auth::check() ;
        if (\Auth::id() < 1) {
          return response()->json(['html' => view('cristal.needlogin')->render()]);
          // return response()->json(['html' => 'erzherzhzhzhrt']);
        } else {
            if (Roletime::hasRole(\Auth::id(), 3)) {
                $fileNeve = Doc::find($id)->filename ?? '';
              //  $filepath = resource_path(config('app.doc_path')) . '/' . $fileNeve;
               $filepath = resource_path('doc') . '/' . $fileNeve;
                if (is_file($filepath)) {
                    return response()->json(['filedownload' => url('directdownload/' . $id), 'html' => '<h4>File letöltés</h4><span>Ha nem indul el automatikusan kattintson <span>
             <a href="/directdownload/' . $id . '" > ide </a>',
                    ]);

                } else {
                    return response()->json(['html' => '<h4>Nemlétező file</h4>']);
                }
            } else {
                return response()->json(['html' => view('cristal.pricingModal')->render()]);
            }
        }

    }
}
