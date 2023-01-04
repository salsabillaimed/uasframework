    <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{request()->is('/') ? 'active' : ''}}"><a href="/"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li class="{{request()->is('dosen') ? 'active' : ''}}">><a href="/dosen"><i class="fa fa-book"></i> <span>Dosen</span></a></li>
            <li class="{{request()->is('kaprodi') ? 'active' : ''}}">><a href="/kaprodi"><i class="fa fa-book"></i> <span>Kaprodi</span></a></li>
            <li class="{{request()->is('mahasiswa') ? 'active' : ''}}">><a href="/mahasiswa"><i class="fa fa-book"></i> <span>Mahasiswa</span></a></li>
            <li class="{{request()->is('user') ? 'active' : ''}}">><a href="/user"><i class="fa fa-book"></i> <span>User</span></a></li>
            <li class="treeview">
            <a href="#">
                <i class="fa fa-share"></i> <span>Multilevel</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            </ul>
            </li>
            
        </ul>