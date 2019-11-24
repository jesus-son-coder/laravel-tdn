<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            <h1>Events Space</h1>
            <h2>{{count($events)}} évènements</h2>
        </div>
        <div class="contents">
            @foreach($events as $event)
                <article>
                    <h3>{{ $event->name }}</h3>
                    <p>{{ $event->description }}</p>
                    <p>{{ $event->price }} €</p>
                    <p>Lieu : {{ $event->location }}</p>
                </article>
                <hr>
            @endforeach
        </div>

    </div>
</div>
</body>
</html>





