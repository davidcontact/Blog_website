

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand item-logo" style="font-weight: 500; font-family: sans-serif; font-size: 25px;" href="{{ route('home') }}">Random New</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home')}}">All</a>
          </li> 
          @foreach ($categories as $category)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home', ['category_id' => $category->name ])}}">{{ $category->name }}</a>
          </li> 
          @endforeach
          
          @if (auth()->check())
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Manage
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="{{ route('category') }}"
                  >Category</a
                >
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('Tag') }}">Tag</a>
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li>
                <a class="dropdown-item" href="{{ route('Post')}}"
                  >Post</a
                >
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <td>
                <button
                  class="btn btn-danger nav-link"
                  style="color: white"
                  role="button"
                  >Logout</button
                >
              </td>
            </form>
          </li>
          @else
          
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('login') }}">Login</a>
          </li>
          @endif
          
          
        </ul>
      </div>
    </div>
  </nav>