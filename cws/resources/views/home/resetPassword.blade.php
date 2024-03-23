
@if($errors->any())

    <ul>
        @foreach ($errors->all as $error)
        <li class="text-red-500">{{$error}}</li>            
        @endforeach
    </ul>

@endif

<form method="POST">

    @csrf


    @if($user)
        <input type="hidden" name="id" value="{{ $user->id }}">
    @endif

    <input type="password" name="password" placeholder="New Password">
    <br> <br>
    <input type="password" name="password_confirmation" placeholder="Confirm New Password">
    <br> <br>
    <input type="submit">


</form>