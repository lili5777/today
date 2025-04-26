<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Today</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-header h2 {
            color: #4d65ee;
            font-weight: bold;
        }

        .profile-card {
            max-width: 800px;
            margin: 0 auto;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        .profile-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .profile-info {
            padding: 30px;
        }

        .activity-card {
            max-width: 450px;
            margin: 40px auto;
            position: relative;
            border-radius: 15px;
            border: 2px solid #1534e3;
            padding: 20px;
            background: #fff;
        }

        .status-badge {
            background-color: #1534e3;
            color: white;
            border-radius: 7px;
            padding: 5px 15px;
            font-size: 14px;
            position: absolute;
            top: 100%;
            left: 20px;
            transform: translateY(-50%);
        }

        /* .activity {
            margiin-top: 20px;
            background-color: : 'red';
        } */
    </style>
</head>

<body>

    <div class="profile-header">
        <h2>Profil</h2>
    </div>

    <!-- Profile Card -->
    <div class="card profile-card">
        <div class="row g-0">
            <div class="col-md-4 p-4">
                <img src="{{ asset('img/profil.png') }}" alt="Foto Profil" class="profile-image rounded-circle">
            </div>
            <div class="col-md-8">
                <div class="card-body profile-info">
                    <h5 class="card-title">{{$user->name}}</h5>
                    <p class="card-text mb-2">{{$user->email}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Activity Card -->
    <p class="activity"
        style="margin-top: 20px; margin-bottom: -20px; margin-left: 390px; font-weight: bold; font-size: 20px;">Activity
    </p>
    @foreach ($belajar as $a)
        <div class="activity-card">
            <h4 class="mb-2">{{$a->topik}}</h4>
            <p>{{$a->jam}} {{$a->tanggal}}</p>
            <div class="status-badge">Public</div>
        </div>
    @endforeach
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>

</body>

</html>
