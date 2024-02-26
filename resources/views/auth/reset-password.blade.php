<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <label>Hola fomra </label>
    <form  method="POST" action="{{ route('password.update') }}" >
        @csrf 
    

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <label>Ingresa el Email</label>
        <input placeholder="email" name="email" type="email" />
        <input  name="password"/>
        <input name="password_confirmation" />
        <input type="hidden" name="token" value = "{{request()->route('token')}}"/>
    
        <button type="submit"> Enviar</button>
    </form>
</body>
</html>