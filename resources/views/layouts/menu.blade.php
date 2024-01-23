@if ($user->level == 1)
    <li class="nav-item">
        <a href="/home" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('balita.index') }}" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
                Data Balita
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('ibuhamil.index')}}" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
                Data Ibu Hamil
            </p>
        </a>
    </li>
@elseif($user->level == 2)
    <li class="nav-item">
        <a href="/home" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('imunisasi.index')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Imunisasi
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('timbangan.index')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Cek Kesehatan Balita
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('kesehatanibu.index')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Cek Kesehatan Ibu Hamil
            </p>
        </a>
    </li>
@endif
