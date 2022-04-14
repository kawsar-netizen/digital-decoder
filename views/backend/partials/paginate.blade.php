@if (count($sliders) > 0)
    <span class="pull-right">
        <ul class="pagination">
            <li class=" @if ($sliders->appends(request()->query())->currentPage() == 1) disabled @endif">
                <a class="" href=" {{ $sliders->appends(request()->query())->url(1) }}">← First</a>
            </li>

            <li class=" @if ($sliders->appends(request()->query())->currentPage() == 1) disabled @endif">
                <a class="" href=" {{ $sliders->appends(request()->query())->previousPageUrl() }}"><i
                        class="fa fa-angle-double-left"></i></a>
            </li>
            @foreach(range(1, $sliders->appends(request()->query())->lastPage()) as $i)
            @if ($i >= $sliders->appends(request()->query())->currentPage() - 4 && $i <= $sliders->appends(request()->query())->currentPage() + 4)
                @if ($i == $sliders->appends(request()->query())->currentPage())
                    <li class="active"><span>{{ $i }}</span></li>
                @else
                    <li><a href="{{ $sliders->appends(request()->query())->url($i) }}">{{ $i }}</a></li>
                @endif
            @endif
@endforeach

<li class=" @if ($sliders->appends(request()->query())->lastPage() == $sliders->appends(request()->query())->currentPage()) disabled @endif">
    <a class="" href=" {{ $sliders->appends(request()->query())->nextPageUrl() }}"><i
            class="fa fa-angle-double-right"></i></a>
</li>
<li class=" @if ($sliders->appends(request()->query())->lastPage() == $sliders->appends(request()->query())->currentPage()) disabled @endif">
    <a class="" href=" {{ $sliders->appends(request()->query())->url($sliders->lastPage()) }}">Last
        →</a>
</li>
</ul>
</span>
@endif
