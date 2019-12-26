@inject('date', 'App\Utilities\Date')

@if($date::isWeekend())
    {{ "va t'amuser :)" }}
@elseif(! $date->isWeekend())
    {{ "va travailler !" }}
@else
    {{ "va dormir..." }}
@endif



