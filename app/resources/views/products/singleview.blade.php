@extends('layouts.app')

@section('title','products')

@section('content')

    @if(Session::has('status'))

        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top: 40px;">
                <div class="panel panel-success">
                    <div class="panel-heading">{{ Session::get('status') }}</div>
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row page black">
            <div class="panel panel-default panel-product">
                <div class="panel-heading text-center">
                    <div class="row">
                        <div class="col-md-8 text-left">
                            <h1>Some features of the product...</h1>
                            @if($product->users()->count())
                            <p class="lime">Already voted by {{$product->users()->count()}} users! <i class="fa fa-smile-o"></i></p>
                            @endif
                        </div>
                        <div class="col-md-4 text-right hidden-xs hidden-sm">
                            {{ Form::open(array('url' => route('my.product.add', $product->id))) }}
                            {{ csrf_field() }}
                                <button class="btn btn-primary my-btn btn-start my-btn-dropdown my-btn-border"><i
                                            class="fa fa-save"></i> Save for later
                                </button>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="col-md-3">
                        <a href="{{$product->image_url or 'http://via.placeholder.com/300x400?text=No+picture'}}" class="<thumbnail></thumbnail>"> <img class="media-object" src="{{ $product->image_url or 'http://via.placeholder.com/300x400?text=No+picture'}}"
                                                             style="width:100%;"> </a>
                        <h3 class="text-center">Views: {{ $product->views }}</h3>
                        <h3>Offers</h3>
                        @forelse ($product->offers as $offer)
                          <div class="panel-group col-md-12">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" href="#collapse_{{$offer->id}}">{{ $offer->merchant }}</a>
                                </h4>
                              </div>
                              <div id="collapse_{{$offer->id}}" class="panel-collapse collapse">
                              <div class="panel-body">
                              <ul>
                                @if($offer->domain)
                                <li><b>Domain:</b> {{$offer->domain}}</li>
                                @endif
                                @if($offer->title && 0)
                                <li><b>Title:</b> {{$offer->title}}</li>
                                @endif
                                @if($offer->currency)
                                <li><b>Currency:</b> {{$offer->currency}}</li>
                                @endif
                                @if($offer->shipping)
                                <li><b>Shipping:</b> {{$offer->shipping}}</li>
                                @endif
                                @if($offer->condition)
                                <li><b>Condition:</b> {{$offer->condition}}</li>
                                @endif
                                @if($offer->availability)
                                <li><b>Availability:</b> {{$offer->availability}}</li>
                                @endif
                                @if($offer->remote_updated_at)
                                <li><b>Last updated:</b> {{ \Carbon\Carbon::createFromTimestamp((int)trim($offer->remote_updated_at))->diffForHumans() }}</li>
                                @endif
                                </ul>
                                @if($offer->shop_link)
                                <a href="{{$offer->shop_link}}" class="btn btn-primary my-btn btn-start my-btn-dropdown my-btn-border">Shop NOW</a>
                                @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        @empty
                            <h5> None </h5>
                        @endforelse
                    </div>

                    <div class="col-md-9">
                        <h4>{{ $product->name }}</h4>
                        <h5>by {{ $product->brand }} </h5>
                        <h4>Description</h4>
                        <h5>{{ $product->description }}</h5>
                        <h4>Product category</h4>
                        <h5>{{ $product->category->name }}</h5>
                        <h4>Characteristics of the product:</h4>
                        @forelse ($product->characteristics as $characteristic)
                            {{-- {{ Form::open(array('url'=>route('my.preferences.add', ['id' => $characteristic->id], ['value' => $characteristic->pivot->cvalue]))) }}
                            {{ csrf_field() }} --}}

                            <button id="vote_characteristic_{{$characteristic->id}}" class="btn btn-danger btn-circle" data-toggle="tooltip"
                                    title="Add me to your preferences!"><span class="fa fa-heart"></span></button> {{ $characteristic->name }} :
                                {{ $characteristic->pivot->cvalue }} (<span id="vote_characteristic_value_{{$characteristic->id}}">{{ $characteristic->pivot->cvotes }}</span> votes)<br>

                            {{-- {{ Form::close() }} --}}
                        @empty
                            <h5> None </h5>
                        @endforelse
                        <br />
                    </div>

                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <style>

    .btn-circle {
        /*width: 57%;
        height: 35px;
        */
        margin: 1px;
        text-align: center;
        font-size: 14px;
        line-height: 1.428571429;
        border-radius: 50px;
    }

    button.btn.btn-primary.my-btn.my-btn-border, a.btn.btn-primary.my-btn.my-btn-border {
        margin: 15px;
        border: 1px solid #2F937B;
    }

    button.btn.btn-primary.my-btn.my-btn-border:hover, a.btn.btn-primary.my-btn.my-btn-border:hover {
        border: 1px solid #fff;
    }

    .panel-product {
        /*text-align: center;*/
        border-color: #85144b;
    }

    .panel-product h1 {
        margin: 10px 0;
        font-size: 25px;
    }

    h4 {
        margin-bottom: 7px;
        font-size: 21px;
        font-weight: 700;
        color: #2F937B;
    }

    h5 {
        margin-bottom: 25px;
        font-size: 16px;
    }

    .panel-product > .panel-heading {
        color: white;
        background-color: #85144B;

    }

    .btn-danger {
        color: #fff;
        background-color: #85144B;
        border-color: #85144B;
    }

    .btn-danger:hover {
        color: white;
        background-color: #2F937B;
        border-color: #2F937B;
    }
    .panel-group .panel {
      color: #2F937B;
      border: 2px solid;
      border-radius: 4px;
    }
    a {
      word-wrap: break-word;
    }
    </style>
    @endpush

    @push('scripts')
    <script>
    $(document).ready(function(){
      @foreach ($product->characteristics as $characteristic)
      $("#vote_characteristic_{{$characteristic->id}}").click(function(){
          $.post("/ajax/vote_characteristic",
           {
            characteristic_id: "{{$characteristic->id}}",
            characterizable_id: "{{$product->id}}",
            characterizable_type: "{{addslashes(get_class($product))}}"
           },
           function(){
              // alert("You have just voted this preference!");
              var count = document.getElementById('vote_characteristic_value_{{$characteristic->id}}').innerHTML;
              document.getElementById('vote_characteristic_value_{{$characteristic->id}}').innerHTML = ++count;
          });
      });
      @endforeach
    });
    </script>
  @endpush


@endsection
