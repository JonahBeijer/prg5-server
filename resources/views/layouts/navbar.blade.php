
<link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <a href="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net">
        <img src="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/storage/images/logo%20spinshare.png" alt="SpinShare Logo" style="width: 150px; height: auto;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/albums">Albums</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/albums/create">Create post</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/admin/albums">Admin Dashboard</a>
            </li>
            <li class="nav-item d-flex align-items-center">
                <a href="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/profile" class="d-flex align-items-center" style="text-decoration: none;">
                    <img src="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/storage/profile_images/1729865802.jpg"
                         alt="Profielafbeelding"
                         class="rounded-circle"
                         style="width: 30px; height: 30px; margin-right: 8px;">
                    <span class="navbar-text" style="color: #333;">Jonah Beijer</span>
                </a>
            </li>
            <li class="nav-item">
                <form action="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/logout" method="POST">
                    <input type="hidden" name="_token" value="s9dDOiSeuWDr3LbfCYW0ThVDayiUQA1GlUr9o0cr" autocomplete="off">
                    <button type="submit" class="btn btn-link nav-link" style="display: inline; cursor: pointer;">Uitloggen</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
