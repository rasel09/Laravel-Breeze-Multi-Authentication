<!DOCTYPE html>
<html lang="en">
  <head>
  

  @include('seller.include.style')
  </head>

  <body>
    
    <form action="{{route('seller.login')}}" method="POST">
        @csrf
        <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
           
            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
              <div class="signin-logo tx-center tx-24 tx-bold tx-inverse mb-3"> Seller Login 
              </div>
                @if (Session('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{Session('error')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                
              <div class="form-group">
                <input type='email' class="form-control" name="email" placeholder="Enter your Email">
              </div><!-- form-group -->
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter your password">
                <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
              </div><!-- form-group -->
              <button type="submit" class="btn btn-info btn-block">Login</button>
      
            </div>
          </div>
    </form>
 

  </body>
</html>


            


