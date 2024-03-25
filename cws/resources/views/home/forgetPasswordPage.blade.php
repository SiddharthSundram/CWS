@extends('home.layout')

@section('title')
    <title>  CWS | Forget Password </title>
@endsection

@section('content')

<div class="container mt-20">
    <h1 >
        Forget Password
    </h1>
    
    <form id="forgetForm" class="mt-5 mb-2">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter Your Email required">
        <br><br>
        <input type="submit" value="Forget Password" class="text-white p-2 rounded-lg bg-blue-600">
    </form>
    
    
    <div class="result mb-20 mt-4"></div>
</div>



<script>
    $(document).ready(function(){
        $("#forgetForm").submit(function(e){
            e.preventDefault();

            let formData = $(this).serialize();

            $.ajax({
                url:"/api/forget-password",
                type: "POST",
                data:formData,
                success:function(data){
                    if(data.success == true){
                        $(".result").text(data.message)                    }
                    else{
                        $(".result").text(data.message)
                    }
                }
            });
        })
    })
</script>


@endsection