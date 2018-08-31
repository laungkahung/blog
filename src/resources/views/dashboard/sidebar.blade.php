<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(current_action_name(1) == 'IndexController') active @endif" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(current_action_name(1) == 'ArticleController') active @endif" href="/dashboard/article">
                    <span data-feather="file"></span>
                    Articles
                </a>
            </li>
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">--}}
                    {{--<span data-feather="shopping-cart"></span>--}}
                    {{--Products--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="nav-item">
                <a class="nav-link @if(current_action_name(1) == 'UserController') active @endif" href="/dashboard/user">
                    <span data-feather="users"></span>
                    Users
                </a>
            </li>
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">--}}
                    {{--<span data-feather="bar-chart-2"></span>--}}
                    {{--Reports--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">--}}
                    {{--<span data-feather="layers"></span>--}}
                    {{--Integrations--}}
                {{--</a>--}}
            {{--</li>--}}
        </ul>

        {{--<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">--}}
            {{--<span>Saved reports</span>--}}
            {{--<a class="d-flex align-items-center text-muted" href="#">--}}
                {{--<span data-feather="plus-circle"></span>--}}
            {{--</a>--}}
        {{--</h6>--}}
        {{--<ul class="nav flex-column mb-2">--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">--}}
                    {{--<span data-feather="file-text"></span>--}}
                    {{--Current month--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">--}}
                    {{--<span data-feather="file-text"></span>--}}
                    {{--Last quarter--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">--}}
                    {{--<span data-feather="file-text"></span>--}}
                    {{--Social engagement--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">--}}
                    {{--<span data-feather="file-text"></span>--}}
                    {{--Year-end sale--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    </div>
</nav>

<div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <h4 class="text-white">Collapsed content</h4>
            <span class="text-muted">Toggleable via the navbar brand.</span>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
</div>