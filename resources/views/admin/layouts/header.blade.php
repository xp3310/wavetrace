<a href="{{ route('admin') }}" class="logo">
    <span class="logo-lg"><b>{{ trans('m.header') }}</b></span>
</a>
<nav class="navbar navbar-static-top">

    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="hidden-xs"> <i class="fa fa-sign-out"></i> {{ trans('m.signout') }}</span> 
                </a>
            </li>
        </ul>
    </div>
</nav>
