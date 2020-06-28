<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Ramadhanku</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="jumbotron">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="icon">
                                <div class="background"></div>
                                <h6>Ramadhaku</h6>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 content-1 d-flex align-items-center justify-content-center">
                            <div class="isi">
                                <h1 class="moto">Jalani Hidupmu <br>Laksanakan Ibadahmu <br>dan Cintai Aku</h1>
                                <a href="#" class="btn btn-ramadhanku">ramadhanku</a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 content-2 d-flex align-items-center">
                            <div class="card m-card-fitur ml-auto">
                                <div class="card-header">FITUR RAMADHANKU</div>
                                <div class="card-body">
                                    <div class="item mb-4">
                                        <img src="{{ asset('img/quran-green-60.svg') }}" alt="quran">
                                        <p class="m-0">Baca Al Qur'an</p>
                                    </div>
                                    <div class="item mb-4">
                                        <img src="{{ asset('img/ibadah-green-60.svg') }}" alt="ibadah">
                                        <p class="m-0">Waktu Ibadah</p>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('img/doa-green-60.svg') }}" alt="doa">
                                        <p class="m-0">Kumpulan Doa-Doa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>