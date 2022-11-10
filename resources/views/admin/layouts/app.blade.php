<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0"> --}}

    <title>@yield('title')</title>

    @include('admin.layouts.partials.style')

</head>

<body>
    <div class="main-wrapper">

        {{-- header --}}
        @include('admin.layouts.partials.header')

        {{-- Sidebar --}}
        @include('admin.layouts.partials.sidebar')
        <div class="page-wrapper">
            <div class="content container-fluid">
                @yield('content')
            </div>
        </div>
    </div>


    @include('admin.layouts.partials.script')

</body>

</html>