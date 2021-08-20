<aside class="main-sidebar sidebar-dark-primary elevation-2">
    <!-- Brand Logo -->
    <a href="#" class="brand-link navbar-primary">
        <img src="{{asset('images/lg-menu.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">CONTR. ASISTENCIA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('theme/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}} 
      <!-- Sidebar Menu nav.nav-child-indent-->
      <nav class="mt-4">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
            @foreach ($menuFull as $key=>$items)
                @if (isset($items['sub_menu']))
                <li class="nav-item {{request()->is($items['menu_open']) ? 'menu-open': ''}}">
                    <a href="#" class="nav-link {{request()->is($items['menu_open']) ? 'active': ''}}">
                        <i class="nav-icon {{$items['icon']}}"></i>
                        <p>
                            {{$items['title']}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    @foreach ($items['sub_menu'] as $item)
                        @if (isset($item['sub_menu']))
                        <li class="nav-item {{request()->is($item['menu_open']) ? 'menu-open': ''}}">
                            <a href="#" class="nav-link {{request()->is($item['menu_open']) ? 'active': ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    {{$item['title']}}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach ($item['sub_menu'] as $item_r)
                                <li class="nav-item">
                                    <a href="/{{$item_r['route_name']}}" class="nav-link {{request()->is($item_r['route_name']) ? 'active': ''}}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>{{$item_r['title']}}</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>   
                        @else
                        <li class="nav-item">
                            <a href="/{{$item['route_name']}}" class="nav-link {{request()->is($item['route_name']) ? 'active': ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{$item['title']}}</p>
                            </a>
                        </li>
                        @endif
                    @endforeach
                    </ul>
                </li> 
                @else
                <li class="nav-item">
                    <a href="/{{$items['route_name']}}" class="nav-link {{request()->is($items['route_name']) ? 'active': ''}}">
                    <i class="nav-icon {{$items['icon']}}"></i>
                    <p>
                        {{$items['title']}}
                    </p>
                    </a>
                </li>
                @endif 
            @endforeach
            {{-- <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{request()->routeIs('dashboard') ? 'active': ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard 
                </p>
                </a>
            </li>
            <li class="nav-item {{request()->routeIs('users.*') ? 'menu-open': ''}}">
                <a href="#" class="nav-link {{request()->routeIs('users.*') ? 'active': ''}}">
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>
                        Usuarios/Locales
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('users.users')}}" class="nav-link {{request()->routeIs('users.users') ? 'active': ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Usuarios</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('users.locales')}}" class="nav-link {{request()->routeIs('users.locales') ? 'active': ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Locales</p>
                        </a>
                    </li> 
                </ul>
            </li>  --}}


            {{-- PRODUCTS --}}
            {{-- <li class="nav-item {{isActive('products','menu-open')}} {{isActive('categories','menu-open')}} {{isActive('brands','menu-open')}}">
                <a href="#" class="nav-link  {{isActive('products','active')}} {{isActive('categories','active')}} {{isActive('brands','active')}}">
                    <i class="nav-icon fab fa-product-hunt"></i>
                    <p>
                        Productos
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="products" class="nav-link {{isActive('products','active')}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Productos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="categories" class="nav-link {{isActive('categories','active')}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Categorias</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="brands" class="nav-link {{isActive('brands','active')}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Marcas</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- CUSTOMERS --}}
            {{-- <li class="nav-item {{isActive('customers-list','menu-open')}} {{isActive('customers-type','menu-open')}}">
                <a href="#" class="nav-link {{isActive('customers-list','active')}} {{isActive('customers-type','active')}}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Clientes
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="customers-list" class="nav-link {{isActive('customers-list','active')}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Listado</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="customers-type" class="nav-link {{isActive('customers-type','active')}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tipo</p>
                        </a>
                    </li> 
                </ul>
            </li>  --}}
            {{-- PROVIDERS --}}
            {{-- <li class="nav-item {{isActive('providers-list','menu-open')}}">
                <a href="#" class="nav-link {{isActive('providers-list','active')}}">
                    <i class="nav-icon fas fa-building"></i>
                    <p>
                        Proveedores
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="providers-list" class="nav-link {{isActive('providers-list','active')}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Listado</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tipo</p>
                        </a>
                    </li> 
                </ul>
            </li>  --}}
            {{-- <li class="nav-item">
                <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Widgets
                    <span class="right badge badge-danger">New</span>
                </p>
                </a>
            </li>
         
            <li class="nav-header">ECOMMERCE</li>
            <li class="nav-item">
                <a href="calendar.html" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Calendar
                    <span class="badge badge-info right">2</span>
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="gallery.html" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                    Gallery
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="kanban.html" class="nav-link">
                <i class="nav-icon fas fa-columns"></i>
                <p>
                    Kanban Board
                </p>
                </a>
            </li>
          
          
            <li class="nav-header">MULTI LEVEL EXAMPLE</li>
            
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                    Level 1
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Level 2</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Level 2
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Level 3</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Level 3</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Level 3</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Level 2</p>
                        </a>
                    </li>
                </ul>
            </li>
          --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>