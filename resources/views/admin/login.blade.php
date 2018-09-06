
@if(Session::get('login')==true)
  <script>window.location = "/admin";</script>
@endif

<!DOCTYPE html>
<html>
<head>
    <title>Admin login</title>
    <link rel="stylesheet" href="{{asset('bhind/assets/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <h1 class="card-title">Admin login</h1>
                        @if(session('msg'))
                            <div class="alert alert-success">
                                <h1>{{session('msg')}}</h1>
                            </div>
                        @endif
                        
                        <form method="post" action="{{route('loginpanel')}}">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <div class=" form-group">
                                    
                                    <input type="submit" value="Submit" class="btn btn-sm btn-info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div> 
</body>
</html>

