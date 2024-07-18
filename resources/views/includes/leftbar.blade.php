
    <div class="btn-group-vertical left-bar" role="group" aria-label="Vertical button group" style="#">
        <div class="left-content">
            
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-infor dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Category
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('category')}}">Add Category</a></li>
                <li><a class="dropdown-item" href="{{route('managecat')}}">Manage category</a></li>
              </ul>
            </div> <br>

            <div class="btn-group" role="group">
                <button type="button" class="btn btn-infor dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  Product
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('add product')}}">Add Product</a></li>
                  <li><a class="dropdown-item" href="{{route('manage products')}}">Manage product</a></li>
                </ul>
              </div> <br>
            
            
        </div>
    </div>
