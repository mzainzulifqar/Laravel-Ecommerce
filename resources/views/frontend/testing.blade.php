  @if(Cart::instance('saveforlater')->count() > 0)
                                <div class="table-responsive">    
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Products</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th colspan="2">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(Cart::instance('saveforlater')->content() as $row)

                                            <tr>
                                                <td>
                                                    <a href="{{route('main.single_product',$row->model->slug)}}">
                                                        <img width="60px" src="{{asset('public/images/'.$row->model->thumbnail)}}" alt="product">
                                                    </a>
                                                </td>
                                                <td>
                                                	
                                                    <h6 class="regular"><a href="{{route('main.single_product',$row->model->slug)}}">{{$row->name}}</a></h6>
                                                   <form action="{{route('main.cart.movetocart')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{$row->rowId}}" name="rowid">
                                                        <input type="hidden" value="{{$row->id}}" name="id">
                                                        <button type="submit" style="border:none;background:none;color:black;"><strong><b>Move to Cart</b></strong></button>
                                                    </form>

                                                    
                                                </td>
                                                <td>
                                                    {{-- <span>{{$row->model->presentPrice($row->price)}}</span> --}}
                                                </td>
                                                <td>
                                                    <span>{{$row->qty}}</span>
                                                <td>
                                                    <span class="text-primary">{{$row->subtotal}}</span>
                                                </td>
                                                <td>
                                            <form  action="{{route('main.cart.removefromsave')}}" method="post">
                                                            @csrf
                                                            @method('POST')
                                                            <input type="hidden" value="{{$row->rowId}}" name="id">
                                                        <button type="submit" class="close">×</button>
                                                    </form>
                                                        
                                                </td>
                                            </tr>
                                          
                                           @endforeach()
                                        </tbody>
                                    </table><!-- end table -->
                                </div><!-- end table-responsive -->
                                @else
                                <h2 class="text-center">Cart Is Empty</h2>
                                @endif