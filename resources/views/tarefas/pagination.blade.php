@php
    $currentPage = (int) request()->query('page', 1);
    $backParams = array_merge(request()->query(), ['page' => max(1, $currentPage - 1)]);
    $nextParams = array_merge(request()->query(), ['page' => $currentPage + 1]);
@endphp
@if(isset($numPages) && $numPages > 1)
<div class="pagination">
    @if($currentPage > 1)
        <a href="{{ route($routeName, $backParams) }}" class="back">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg>
            <span>Anterior</span>
        </a>
    @endif

    <div class="pages">
        @php
        $end_page = $currentPage <= 2 ? min($currentPage + 5 - $currentPage, $numPages) : min($currentPage + 2, $numPages);
        $start_page = $currentPage <= 2 ? 1 : min($numPages, $currentPage + 2) - 4;
        @endphp
        @for($i = $start_page; $i <= $end_page; $i++)
            @php
                $params = array_merge(request()->query(), ['page' => $i]);
            @endphp
            @if($i == $currentPage)
                <span class="current">{{ $i }}</span>
            @else
                <a href="{{ route($routeName, $params) }}">{{ $i }}</a>
            @endif
        @endfor
    </div>

    @if($currentPage < $numPages)
        <a href="{{ route($routeName, $nextParams) }}" class="next">
            <span>Próxima</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg>
        </a>
    @endif
</div>
@endif
@push('styles')
<link rel="stylesheet" href="{{ asset('css/tarefas/pagination.css') }}">
@endpush