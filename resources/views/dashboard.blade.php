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
                <div class="card-custom p-4 mb-4">
                    <div class="d-flex">
                        <input type="text" class="form-control me-3" placeholder="Belajar apa hari ini? ✨">
                        <button class="btn btn-post">Post</button>
                    </div>
                </div>

                <!-- Postingan List -->
                
                @foreach ($tweet as $a)
                    <div class="card-custom p-4 mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{asset('img/simulasi.png')}}" alt="Foto User" class="user-photo me-3">
                            <div>
                                <strong class="fs-5">{{$user->where('id', $a->id_user)->first()->name}}</strong><br>
                                <span class="small-text">Pukul 14:15 - 25 April 2025</span>
                            </div>
                        </div>
                        <p class="mb-0 fs-6">Belajar dasar-dasar Laravel migration dan database connection error.</p>
                    </div>
                @endforeach
                

            </div>

            <!-- Bagian kanan -->
            <div class="col-md-4">
                <div class="info-box">
                    <h5>Today:</h5>
                    <p>"Belajar Bootstrap Layout"</p>

                    <h5>Yesterday:</h5>
                    <p>"Belajar Migration & Seeding"</p>

                    <h5>Win Streak:</h5>
                    <p>🔥 3 Hari berturut-turut!</p>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>