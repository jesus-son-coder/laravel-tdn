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
<div class="flex-cent er position-ref full-height">
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
                    <p>Contribution : {{ $event->price }} €</p>
                    <p>Coût total : {{ $event->fake_price }} €</p>
                    <p>Lieu : {{ $event->location }}</p>
                    <p>Date : {{ format_date($event->starts_at) }}</p>
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







