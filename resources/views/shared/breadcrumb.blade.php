<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <?php $segments = ''; ?>
    @for($i = 1; $i <= count(Request::segments()); $i++)
        <?php $segments .= '/'. Request::segment($i); ?>
        @if($i < count(Request::segments()))
            <li class="breadcrumb-item">{{ ucwords( str_replace('-', ' ', Request::segment($i))) }}</li>
        @else
            <li class="breadcrumb-item active">{{ ucwords( str_replace('-', ' ', Request::segment($i))) }}</li>
        @endif
    @endfor
</ol>