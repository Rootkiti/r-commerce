
    <div class="btn-group-vertical left-bar" role="group" aria-label="Vertical button group" style="#">
        <div class="left-content">
            {{-- <div class="btn-group" role="group">
                <button type="button" class="btn btn-infor">Button</button>
            </div> <br>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-infor">Button</button>
            </div> <br> --}}
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-infor dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Category
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('category')}}">Add Category</a></li>
                <li><a class="dropdown-item" href="#">Manage category</a></li>
              </ul>
            </div> <br>
            <div class="btn-group dropstart" role="group">
              <button type="button" class="btn btn-infor dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
              </ul>
            </div> <br>
            <div class="btn-group dropend" role="group">
              <button type="button" class="btn btn-infor dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
              </ul>
            </div>
            <div class="btn-group dropup" role="group">
              <button type="button" class="btn btn-infor dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
              </ul>
            </div>
        </div>
    </div>
