<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Today is Learning - Estetik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .card-custom {
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            background: white;
        }

        .user-photo {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #dee2e6;
        }

        .small-text {
            font-size: 0.8rem;
            color: #6c757d;
        }

        .btn-post {
            background: linear-gradient(135deg, #6c63ff, #48c6ef);
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 10px;
            transition: 0.3s;
        }
        .btn-hapus {
            background: linear-gradient(135deg, #ba0808, #062029);
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 10px;
            transition: 0.3s;
        }

        .btn-post:hover {
            opacity: 0.9;
            transform: scale(1.03);
        }

        .info-box {
            background: #ffffff;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .info-box h5 {
            font-weight: bold;
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }
        .btn-profil {
    background: linear-gradient(135deg, #6c63ff, #48c6ef);
    border: none;
    color: white;
    font-weight: bold;
    border-radius: 10px;
    /* padding: 10px; */
    transition: 0.3s;
    text-align: center;
    display: inline-block;
    text-decoration: none;
}

.btn-profil:hover {
    opacity: 0.9;
    transform: scale(1.05);
}
.btn-hapus:hover {
    opacity: 0.9;
    transform: scale(1.05);
}


        .info-box p {
            margin-bottom: 1rem;
            color: #495057;
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <div class="row g-4">
            <!-- Bagian kiri -->
            <div class="col-md-8">

                <!-- Form Posting -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <!-- Alert Error -->
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-custom p-4 mb-4">
                    <form action="{{route('posting')}}" method="post">
                    <div class="d-flex">
                        
                            @csrf
                            <input type="text" class="form-control me-3" placeholder="Belajar apa hari ini? ✨" name="postingan">
                            <button type="submit" class="btn btn-post">Post</button>
                        
                        
                    </div>
                    </form>
                </div>

                <!-- Postingan List -->
                
                @foreach ($tweet as $a)
                    <div class="card-custom p-4 mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{asset('img/simulasi.png')}}" alt="Foto User" class="user-photo me-3">
                            <div>
                                <strong class="fs-5">{{$user->where('id', $a->id_user)->first()->name}}</strong><br>
                                <span class="small-text">Pukul {{$a->jam}} {{$a->tanggal}}</span>
                            </div>
                        </div>
                        <p class="mb-0 fs-6">{{$a->topik}}</p>
                    </div>
                @endforeach
                

            </div>

            <!-- Bagian kanan -->
            <div class="col-md-4">
                <div class="info-box">
                    <h5>Today:</h5>
                    @if ($todayPost)
                        <p>"{{ $todayPost->topik }}"</p>
                    @else
                        <p>Belum ada postingan hari ini 🌧️</p>
                    @endif
                    
                    <h5>Yesterday:</h5>
                    @if ($yesterdayPost)
                        <p>"{{ $yesterdayPost->topik }}"</p>
                    @else
                        <p>Belum ada postingan kemarin 🌧️</p>
                    @endif
                    
                    <h5>Win Streak:</h5>
                    @if ($streak >= 3)
                        <p>🔥 {{ $streak }} Hari berturut-turut!</p>
                    @else
                        <p>Belum Win Streak 😔</p>
                    @endif
                </div>
                <a href="{{route('profil')}}" class="btn btn-profil w-100 mt-4">Profil</a>
                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="btn btn-hapus w-100">Logout 🚪</button>
                </form>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>