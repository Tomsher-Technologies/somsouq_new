<div class="ad-detail-spec">
    <ul>
        <li><span>Boat Type</span> <span>{{ $postDetail->boat_type_name ?? "" }} </li>
        <li><span>Brand/ Make Name</span> <span>{{ $postDetail->brand_name ?? "" }} </li>
    </ul>

    <ul>
        <li><span>Model Year</span> <span>{{ $postDetail->model_year ?? "" }} </li>
        <li><span>Model</span> <span>{{ $postDetail->model_number ?? "" }} </li>
    </ul>

    <ul>
        <li><span>Fuel Type</span> <span>{{ $postDetail->fuel_type ? ucwords($postDetail->fuel_type) : "" }} </li>
        <li><span>Transmission</span> <span>{{ \App\Enums\Front\Transmissions::getTransmission()[$postDetail->transmission] ?? "" }} </li>
    </ul>

    <ul>
        <li><span>Condition</span> <span>{{ $postDetail->usage_condition ? ucwords($postDetail->usage_condition) : "" }} </li>
    </ul>
</div>
