<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Saran</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-md-10 mt-3">
                <table class="table table-hover table-stripped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Saran</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saran as $s)
                        <tr>
                            <td>{{ $s->id }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>{{ $s->isi }}</td>
                            <td>
                                @if ($s->foto)
                                <a href="{{ asset('img/saran/' . $s->foto) }}">
                                    <img src="{{ asset('img/saran/' . $s->foto) }}" width="100px">
                                </a>
                                @else 
                                 tidak ada
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $saran->links() }}
            </div>
        </div>
    </div>
</body>
</html>