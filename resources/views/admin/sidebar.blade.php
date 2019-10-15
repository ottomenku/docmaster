@php             
    $menuT=[
    'superadmin'=>[
    ['/admin/pages' ,' Pages'],                                                                              
    ['/admin/generator' ,' Generátor'],
    ['/admin/permissions' ,'Permission'],
    ['admin/activitylogs' ,'Activitylogs'],
    ['/admin/settings' ,'Settings'],
    ['/admin/roles', 'jogok'],

    ],
    
    'admin'=>[  
     ['/admin/pays', ' befizetések'],
    ['/admin/roletimes' , 'Előfizetések'],
    ['/admin/users' ,  'Felhasználók'],
     ['/admin/customers', ' Vevő adatok'],
    ['/admin/howcat','Tudástár Kategóriák'],
    ['/admin/howto', 'tudástár'],
    ['/admin/category','Dokumentum kategóriák'],
    ['/admin/post', 'Cikkek'],
    ['/admin/text', 'nyitólap'],
   // ['admin/doc/create', 'Dok feltöltés'], 
   
    ],
    
    ];
 @endphp 

<div class="col-md-3">
@if (Auth::user()->hasRole('admin'))  

    <div class="card">     
        <div class="card-header">
            Admin nenü
        </div>

        <div class="card-body">
            <ul class="nav flex-column" role="tablist">
                @foreach($menuT['admin'] as $menu)
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ url($menu[0]) }}">
                        {{ $menu[1] }}
                    </a>
                </li>
            @endforeach
            </ul>

        </div>
    </div>                 
@endif   

@if (Auth::user()->hasRole('superadmin')) 

    <div class="card">
        <div class="card-header">
            Szuperadmin menü
        </div>

        <div class="card-body">
            <ul class="nav flex-column" role="tablist">
                @foreach($menuT['superadmin'] as $menu)
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ url($menu[0]) }}">
                        {{ $menu[1]}}
                    </a>
                </li>
            @endforeach
            </ul>
    
        </div>  
    </div>
        
        
@endif 
</div>
        
