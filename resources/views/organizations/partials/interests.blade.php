@if (!$organization->sectors->isEmpty())
    <h3>{{ __('Types of regulated organizations') }}</h3>
    <ul class="tags" role="list">
        @foreach ($organization->sectors as $sector)
            <li class="tag">{{ $sector->name }}</li>
        @endforeach
    </ul>
@endif
@if (!$organization->impacts->isEmpty())
    <h3>{{ __('Areas of accessibility') }}</h3>
    <ul class="tags" role="list">
        @foreach ($organization->impacts as $impact)
            <li class="tag">{{ $impact->name }}</li>
        @endforeach
    </ul>
@endif
@if ($organization->sectors->isEmpty() && $organization->impacts->isEmpty())
    <p>{{ __('No interests listed.') }}</p>
@endif
