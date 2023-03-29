<div class="ml-4">
    @if(is_iterable($item) || is_object($item))
        <details>
            <summary>{{ $name }}</summary>
        @foreach($item as $key => $sub)
                <x-tree-list :item="$sub" :name="$key"/>
        @endforeach
        </details>
    @else
        [{{ $name }}] -> {{ $item }}
    @endif
</div>
