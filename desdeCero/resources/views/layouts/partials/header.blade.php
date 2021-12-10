<header>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>

            {{-- método que devuelve true si estoy en la ruta 'home' --}}
            {{-- @dump(request()->routeIs('home')) --}}

            {{-- cursos.* para que aplique la clase a cualquier ruta que empiece por cursos. --}}
            <li><a href="{{ route('cursos.index') }}"
                    class="{{ request()->routeIs('cursos.*') ? 'active' : '' }}">Cursos</a></li>
            <li><a href="{{ route('nosotros') }}"
                    class="{{ request()->routeIs('nosotros') ? 'active' : '' }}">Nosotros</a></li>
        </ul>
    </nav>
</header>
