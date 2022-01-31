<div class="pagination">
    <ul class="pagination--ul">
        @if ($current > 3)
            <li>
                <a href="{{ $url . '?page=' . 1 }}">
                    1
                </a>
            </li>
            <li>
                <span class="dots">
                    ...
                </span>
            </li>
        @endif

        @for ($i = $current - 2; $i < $current; $i++)
            @if ($i > 0)
                <li>
                    <a href="{{ $url . '?page=' . $i }}">
                        {{ $i }}
                    </a>
                </li>
            @endif
        @endfor

        <li class="active">
            <span>
                {{ $current }}
            </span>
        </li>

        @for ($i = $current + 1; $i < $current + 3; $i++)
            @if ($i <= $last)
                <li>
                    <a href="{{ $url . '?page=' . $i }}">
                        {{ $i }}
                    </a>
                </li>
            @endif
        @endfor

        @if ($current + 3 <= $last)
            <li>
                <span class="dots">
                    ...
                </span>
            </li>
            <li>
                <a href="{{ $url . '?page=' . $last }}">
                    {{ $last }}
                </a>
            </li>
        @endif

    </ul>
</div>