
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | Admin</title>
    <link rel="icon" type="image/png" href="{{asset('imgs/logo.png')}}"/>
    <!-- links -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
    </head>
<body>
    <div >
        
   @include('Layouts.navbar')
   
   <!-- Main content -->
   <main>
       {{ $slot }}
    </main>
    
</div>

    <script src="{{asset('js/login.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>


</body>
</html>