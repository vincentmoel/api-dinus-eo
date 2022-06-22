@extends('template.main_no_header_footer')

@section('container')

    <div class="card text-center py-4 make-middle" style="width: 20rem; max-height: 350px !important" >
        <a href="/">
            <img src="/assets/img/logo.svg" alt="" width="100px" class="mx-auto mb-3">
        </a>
        <div class="card-body">
            <form action="/login" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                
                <button type="submit" class="btn btn-success w-100">Login</button>
            </form>

        </div>
    </div>

    <style>
        .make-middle {
            
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;

            margin: auto;
        }

    </style>


    <script>

    </script>
@endsection
