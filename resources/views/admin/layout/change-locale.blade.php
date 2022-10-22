@php
    $current_locale = request()->get('locale', app()->getLocale());
@endphp

<div class="d-inline-block pr-3">
    <select id="locale" name="locale" type="select" class="custom-select" onchange="changeLocale(this)">
        @foreach(config('locale') as $locale)
            <option value="{{ $locale['code'] }}"
                {{ old('locale', $current_locale ?? null) == $locale['code'] ? 'selected' : null }}>
                {{ $locale['name'] }}
            </option>
        @endforeach
    </select>
</div>
@push('scripts')
    <script>
        function changeLocale(event) {
            let url = new URL(window.location.href);
            url.searchParams.set('locale', event.value);
            window.location.href = url;
        }
    </script>
@endpush
