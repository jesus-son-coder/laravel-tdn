<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <style>
        .bling {
            background-color: #a6e1ec;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            <h1>Events Space</h1>
            <h2>{{ $events->count() }} évènements</h2>
        </div>
        <div class="contents">
            @foreach($events as $event)
                <article>
                    <h3>{{ $event->name }}</h3>
                    <p>{{ $event->description }}</p>
                    <p>{{ $event->price }} €</p>
                    <p>Lieu : {{ $event->location }}</p>
                    <p>Date : {{ (new DateTime($event->starts_at))->format('d/m/Y H:i') }}</p>
                </article>
                @if(! $loop->last)
                    <hr>
                @endif
            @endforeach
        </div>

    </div>
</div>
</body>
</html>





