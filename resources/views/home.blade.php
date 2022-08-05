@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                      <div class="row">
                        @foreach($products as $key => $product)
                        <div class="col-sm py-5">
                          <p><b>Product Name:</b> {{ $product->name }}</p>
                          <p><b>Price:</b> {{ $product->price }}</p>
                          <p><b>Description:</b> {{ $product->description }}</p>
                          <img src="{{ $product->image }}" width="200" height="200"/><br/>
                          <a href="{{ url('show') }}/{{ $product->id }}"><button type="button" class="btn btn-primary">BUY NOW</button></a>
                        </div>
                        @if($loop->iteration % 2 == 0)
                        </div>
                        <div class="row">
                        @endif
                        @endforeach
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
