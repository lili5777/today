<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="mb-4 mt-3" style="color: #161618;">Profil</h2>
      </div>
      
      <hr style="height: 2px; background-color: #323233; border: none;">
      
      <div class="card rounded-circle" style="width: 18rem; height: 18rem; overflow: hidden;">
        <div class="card-body p-0 bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 100%; height: 100%;">
          <img src="{{ asset('img/profil.png') }}" alt="Foto Profil" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
        </div>
      </div>
      
      
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>