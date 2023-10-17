<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>

<body>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>

        <div class="container">
            {{-- <h2>Categories <a class="btn btn-info" href="/category-create">New Category</a></h2> --}}
            <h2>Categories <a class="btn btn-info" href="{{ url('category/create') }}">New Category</a></h2>
            

            @if (session()->has('success'))
                <div class="alert alert-info" role="alert">
                    <strong>{{ session()->get('success') }}</strong>
                </div>
            @endif

            <table class="table">
                <a class="btn btn-info float-right" href="{{ url('logout') }}">Logout</a>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>name</th>
                        <th>address</th>
                        <th>contact</th>
                        <th>email</th>
                        <th>product</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp

                    @foreach ($categories as $info)
                        <tr>
                            <td>{{ ++$i }}</td>
                            {{-- <td>{{$info->id}}</td> --}}
                            <td>{{ $info->title }}</td>
                            <td>{{ $info->name }}</td>
                            <td>{{ $info->address }}</td>
                            <td>{{ $info->contact }}</td>
                            <td>{{ $info->email }}</td>
                            <td><img src="images/{{ $info['product'] }}" width="80px" height="80px" alt="">
                            </td>

                            {{-- <td><a href="/category-edit/{{$info->id}}" class="btn btn-sm btn-info">Edit</a>
            <a href="/category-delete/{{$info->id}}" class="btn btn-sm btn-danger">Delete</button>
        </td> --}}

                            {{-- <td><a href="/category/{category}/edit/{{$info->id}}" class="btn btn-sm btn-info">Edit</a>
          <a href="/category-delete/{{$info->id}}" class="btn btn-sm btn-danger">Delete</button>
      </td> --}}

                            <td><a href="{{ route('category.edit', $info->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('category.destroy', $info->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>

    </body>

</html>
