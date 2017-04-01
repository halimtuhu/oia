<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">SISTEM AGREGASI DATA KEGIATAN INTERNASIONAL</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                  @if (Sentinel::getUser()->inRole('admin'))
                    <a href="/admin/user/{{Sentinel::getUser()->id}}/edit">{{Sentinel::getUser()->name}}</a>
                  @else
                    <a href="/profil/">{{Sentinel::getUser()->name}}</a>
                  @endif
                </li>
                <li>
                    <a href="#" onclick="logoutjs();">
                        <form action="/logout" method="POST" id="logout-form">
                            {{csrf_field()}}
                            Logout
                        </form>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script type="text/javascript">
  function logoutjs(){
    document.getElementById('logout-form').submit()
  }
</script>
