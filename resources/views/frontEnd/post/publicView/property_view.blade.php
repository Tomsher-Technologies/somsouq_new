<ul>
    <li>Size: {{ $postDetail->size ?? "" }} <sub>M</sub> 2</li>
    <li>Age of Building: {{ $postDetail->age_of_building ?? "" }}</li>
    <li>Number of Room: {{ $postDetail->number_of_room ?? "" }}</li>
    <li>Number of Washroom: {{ $postDetail->number_of_washroom ?? "" }}</li>
    <li>Number of Flor: {{ $postDetail->number_of_floor ?? "" }}</li>
    <li>Flor Number: {{ $postDetail->floor_number ?? "" }}</li>
    <li>Furniture Status: {{ \App\Enums\Front\FurnitureStatus::getFurnitureStatus()[$postDetail->furniture_status] ?? "" }}</li>
    <li>Elevator: {{ $postDetail->elevator ?? "" }}</li>
    <li>Usage of Status: {{ $postDetail->usage_status ?? "" }}</li>
    <li>Condition: {{ \App\Enums\Front\ConditionStatus::getConditionStatus()[$postDetail->condition_status] ?? "" }}</li>
    <li>Description: {{ $postDetail->description ?? "" }}</li>
</ul>
