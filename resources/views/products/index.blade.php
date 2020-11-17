@extends('layouts.app')


@section('content')
{{--    <div class="row">--}}
{{--        <div class="col-lg-12 margin-tb">--}}
{{--            <div class="pull-left">--}}
{{--                <h2>Posts</h2>--}}
{{--            </div>--}}
{{--            <div class="pull-right">S--}}
{{--                    <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Post</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Post</a>
    </div>


    <table class="table table-bordered">
        <tr>
            <th>Post Nummer</th>
            <th>Naam</th>
            <th>Omschrijving</th>
            <th>Foto</th>
            <th>Prijs</th>
            <th>link</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id  }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td><img src=" {{ asset('storage/' . $product->image) }}"alt="" class="img-thumbnail"></td>
                <td>{{ $product->prijs }}</td>
                <td>{{ $product->link }}</td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>



                        @csrf
                        @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>

                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    {!! $products->links() !!}



@endsection
