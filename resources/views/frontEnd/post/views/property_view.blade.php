<div class="ad-detail-spec">
    <ul>
        <li><span>Size</span> <span>{{ $postDetail->size ?? "" }} <sub>M</sub> 2</span> </li>
        <li><span>Age of Building</span> <span>{{ $postDetail->age_of_building ?? "" }}</li>
    </ul>
    <ul>
        <li><span>Number of Room</span> <span>{{ $postDetail->number_of_room ?? "" }} </li>
        <li><span>Number of Washroom</span> <span>{{ $postDetail->number_of_washroom ?? "" }} </li>
    </ul>
    <ul>
        <li><span>Number of Flor</span> <span>{{ $postDetail->number_of_floor ?? "" }}</li>
        <li><span>Flor Number</span> <span>{{ $postDetail->floor_number ?? "" }} </li>
    </ul>
    <ul>
        <li><span>Furniture Status</span> <span>{{ \App\Enums\Front\FurnitureStatus::getFurnitureStatus()[$postDetail->furniture_status] ?? "" }} </li>
        <li><span>Elevator</span> <span>{{ $postDetail->elevator ?? "" }} </li>
    </ul>
    <ul>
        <li><span>Usage of Status</span> <span>{{ $postDetail->usage_status ?? "" }} </li>
        <li><span>Condition</span> <span>{{ \App\Enums\Front\ConditionStatus::getConditionStatus()[$postDetail->condition_status] ?? "" }} </li>
    </ul>
</div>
