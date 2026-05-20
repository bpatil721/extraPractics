<html> 
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        </head>
    <form method="post" class='ajax-form' action="{{ route('login') }}" data-redirect="{{ url('dashboard') }}" >
        @csrf   
        <div class="form-control">
                    <input name="email" type="text" placeholder="email" value='a@a.com'>
            </div>
             <div class="form-control">
                    <input name="password" type="text" placeholder="password" value='123'>
            </div>
             <div class="form-control">
                    <button name="submit" type="submit" class="submit" >Sumbit</button>
            </div>
    </form>
     <script src="{{url('assets/js/common.js')}}"></script>
     
</html>