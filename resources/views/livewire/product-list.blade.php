<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="product-list" style="height: 400px;">
        @foreach($products as $product)
            <div class="product-item">
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show">{{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                @endif
                <img src="{{$product->imageUrl}}" alt="{{ $product->product_name }}" style="height: 200px; width:200px;">
                <h2>{{ $product->product_name}}</h2>
                <p>{{ $product->price }} RWF</p>
                @if ($cart->where('id',$product->id)->count())
                    In Cart
                @else
                                        
                        {{-- <form  action="{{route('cart.store')}}" method="POST" style="border: none;  margin-top: -20px;">
                            @csrf
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="name" value="{{ $product->product_name }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
    
                            <button class="btn btn-primary">Add to Cart</button>
                        </form> --}}
                        @if (auth()->user())
                            <a class="btn btn-primary" href="{{route('cart.store',$product->id)}}">Add To Cart</a>

                        @else
                         <a class="btn btn-primary" href="{{route('login')}}">Add To Cart</a>

                        @endif
                   
                        <button type="button" style=" " class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  

                        
                    
                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fa fa-eye" aria-hidden="true"></i></button> --}}

                @endif
                
                {{-- <a href="#" class="more-info" data-description="{{ $product->description }}">More Info</a> --}}

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">More Information</h1>
                    </div>
                    <div class="modal-body" style="margin-top: -90px;">
                        <form>
                            <div class="row" >
                                
                                <div class="col" style="padding-left: 30px;">
                                    <img src="{{$product->imageUrl}}" alt="{{ $product->product_name }}" style="height: 200px; width:200px;">

                                </div>
                                <div class="col">
                                    {{$product->description}}
                                </div>
                              </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        {{-- <button type="button" class="btn btn-primary">Send message</button> --}}
                    </div>
                    </div>
                </div>
                </div>
            </div>

            
        @endforeach
    </div>
</div>


