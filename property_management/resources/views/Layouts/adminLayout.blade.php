
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>
<body>
    <div class="container  mx-auto bg-white">

   @include('Layouts.sideBar')

    <!-- Main content -->
    <main class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
        {{ $slot }}
    </main>

    </div>
        

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/property.js')}}"></script>
<script src="{{asset('js/owner.js')}}"></script>
<script src="{{asset('js/tenant.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    
</body>
</html>

