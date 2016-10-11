<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show

<body class="skin-blue sidebar-mini">

<div class="wrapper">

    @include('layouts.partials.mainheader')

    @include('layouts.partials.sidebar')

    <div class="content-wrapper">

        @include('layouts.partials.contentheader')

        <section class="content">
            @yield('main-content')
        </section>

    </div>

    @include('layouts.partials.controlsidebar')

    @include('layouts.partials.footer')

</div>

@section('scripts')
    @include('layouts.partials.scripts')
@show
</body>
</html>
