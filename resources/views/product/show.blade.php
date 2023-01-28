@extends('layouts.app')
@section('content')

    <div class="container ">
        <div class="row ">
            <div class ="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ Storage::url($advertisement->feature_image) }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ Storage::url($advertisement->first_image) }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ Storage::url($advertisement->second_image) }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div>
                    {!! $advertisement->displayVideoFromLink() !!}
                </div>
                <div class = "card">
                <div class = "card-header">
                    <div class = "card-header"><h5>Description</h5></div>
                        <div class = "card-body">
                            {!! $advertisement->description !!}
                        </div>
                    </div> 
                </div>
            </div>
            <div class ="col-md-6">
                <div class = "card">
                    <div class = "card-header"> <h3>{{$advertisement->name}}</h3></div>
                    <div class = "card-body" style = "text-align:center, text-color:blue" >
                   
                        <p>Price: NGN {{$advertisement->price}} ({{$advertisement->price_status}}) |
                         Status: {{$advertisement->product_status}} |</p><p>Posted: {{$advertisement->created_at->diffForHumans()}}
                        </p>
                        <p>Country: {{$advertisement->country->name??''}} |
                            State: {{$advertisement->state->name??''}} |
                            City: {{$advertisement->city->name??''}} |
                        </p>
                        <p>
                                                <span>
                                                    @if (Session::has('message'))
                                                        <div class="alert alert-success">
                                                            {{ Session::get('message') }}
                                                        </div>
                                                    @endif
                                                    <a href="" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="mdi mdi-thumb-down"></i>
                                                        Report this ad</a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <form action="{{ route('report.ad') }}" method="post">@csrf
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Something wrong with this ads ?
                                                                        </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label>Select reason</label>
                                                                            <select class="form-control" name="reason" required>
                                                                                <option value="">select</option>
                                                                                <option value="Fraud">Fraud</option>
                                                                                <option value="Duplicate">Duplicate</option>
                                                                                <option value="Spam">Spam</option>
                                                                                <option value="Wrong-category">Wrong Category</option>
                                                                                <option value="Offesnsive">Offensive</option>
                                                                                <option value="other">Other</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Your Email</label>
                                                                            @if (Auth::check())
                                                                                <input type="email" name="email" class="form-control"
                                                                                    value="{{ Auth::user()->email }}" readonly>
                                                                            @else
                                                                                <input type="email" name="email" class="form-control" required>
                                                                            @endif

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Your Message</label>
                                                                            <textarea name="message" class="form-control" required></textarea>
                                                                        </div>
                                                                        <input type="hidden" name="ad_id" value="{{ $advertisement->id }}">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-danger">Report this ad</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <p><a href = "{{route('ads.create')}}">Click here to create your own advertisement</a></p>
                                                </span>
                                                </p>
                        <hr>
                        <div class = container>
                            <div class = "row">
                                <div class = "col-md-4">
                                    <div class = "card">
                                        <div class = "card-header"><p><b>Posted by:</b></h5></p></div>
                                            <div class = "card-body">
                                            <a href="{{route('show.user.ads',[$advertisement->user_id])}}">
                                                @if(!$advertisement->user->avatar)
                                                    <img src ="/man.jpg" width = "100"></img>
                                                @else
                                                    <img src = "{{Storage::url($advertisement->user->avatar)}}" width = "100"></img>
                                                @endif
                                                    <p>{{$advertisement->user->name}}</p>
                                                    <hr style="border:2px solid red;">
                                                    Click to see all ads by posted {{$advertisement->user->name}}
                                            </a>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "col-md-8">
                                    <div class = "card">
                                        <div class = "card-header"><p><b>Contact info:</b></p></div>
                                            <div class = "card-body">
                                                <p>Address: {{$advertisement->listing_address}}</p> 
                                               <span>
                                                @if(Auth()->check())
                                                @if(Auth()->user()->id!=$advertisement->user_id)
                                                <message seller-name="{{ $advertisement->user->name }}"
                                                         :user-id="{{Auth()->user()->id}}"
                                                         :receiver-id="{{$advertisement->user->id}}"
                                                         :ad-id="{{$advertisement->id}}"
                                                ></message>
                                                @endif
                                                @endif
                                               </span>
                                               <p>
                                                    @if($advertisement->phone_number)
                                                        <show-phone-number :phone-number="{{$advertisement->phone_number}}"></show-phone-number>
                                                    @endif
                                               </p>
                                               @if(Auth::check())
                                               @if(!$advertisement->didUserSavedAd() && auth()->user()->id != $advertisement->user_id)
                                               <save-ad :ad-id = "{{$advertisement->id}}"
                                                        :user-id = "{{auth()->user()->id}}"
                                               ></save-ad>
                                               @endif
                                               @endif
                                                </div>                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div id="disqus_thread"></div>
                    <script>
                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://digitalmarketplaceng.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                </div>
            </div>
        </div>
    </div>
    
    </div>
    
@endsection