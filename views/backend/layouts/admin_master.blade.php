<!DOCTYPE html>
<html lang="en">

@include('backend.partials.header')

<body class="no-skin">

    @include('backend.partials.navbar')

    <div class="main-container ace-save-state" id="main-container">

        @include('backend.partials.sidebar')



        @yield('content')
    
    </div>
</body>

</div>

@include('backend.partials.footer')