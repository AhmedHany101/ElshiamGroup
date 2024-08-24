<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <link href="{{asset('user_pages/images/using_iamge/logo.png')}}" rel="icon">

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SM SCIENCE</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <style>
    body, html {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }
</style>
    <body>
  

<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="text-center row">
        <div class="col-md-6">
            <img src="https://cdn.pixabay.com/photo/2017/03/09/12/31/error-2129569__340.jpg" alt=""
                class="img-fluid">
        </div>
        <div class="col-md-6 mt-5">
            <p class="fs-3"> <span class="text-danger">Opps!</span> Page not found.</p>
            <p class="lead">
                The page you’re looking for doesn’t exist.
            </p>
            <a href="{{url('/')}}" class="btn btn-primary">Go Home</a>
        </div>
    </div>
</div>
    </body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-aN8WxP+4eWZpI4c0EZI1hvu+7tJ4wD5gV6bYjZsX+0UpOyK0tLkPpFEjpQ6LXqfC" crossorigin="anonymous"></script>

</html>