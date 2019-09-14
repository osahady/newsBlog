@if (!isset($show) || $show)
    <strong class="badge badge-{{ $type ?? 'success' }}">
        {{ $slot }}
    </strong>
@endif
