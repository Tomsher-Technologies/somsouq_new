<div class="ad-detail-spec">
    <ul>
        <li><span>Brand/ Make Name</span> <span>{{ $postDetail->brand_name ?? "" }} </li>
        <li><span>Model Year</span> <span>{{ $postDetail->model_year ?? "" }} </li>
    </ul>

    <ul>
        <li><span>Model</span> <span>{{ $postDetail->model_number ?? "" }} </li>
        <li><span>Km</span> <span>{{ $postDetail->km ?? "" }} </li>
    </ul>

    <ul>
        <li><span>Color</span> <span>{{ $postDetail->color_name ?? "" }} </li>
        <li><span>Fuel Type</span> <span>{{ $postDetail->fuel_type ? ucwords($postDetail->fuel_type) : "" }} </li>
    </ul>

    <ul>
        <li><span>Transmission</span> <span>{{ \App\Enums\Front\Transmissions::getTransmission()[$postDetail->transmission] ?? "" }} </li>
        <li><span>Body Type</span> <span>{{ $postDetail->body_type_name ?? "" }} </li>
    </ul>

    <ul>
        <li><span>Driver Side</span> <span>{{ $postDetail->driver_side ? ucfirst($postDetail->driver_side) : "" }} </li>
        <li><span>Seats</span> <span>{{ $postDetail->seat ?? "" }} </li>
    </ul>

    <ul>
        <li><span>Engine Capacity</span> <span>{{ $postDetail->engine_capacity ? $postDetail->engine_capacity . 'cc' : "" }} </li>
        <li><span>Engine Power</span> <span>{{ $postDetail->engine_power ? $postDetail->engine_power.'hp' : "" }} </li>
    </ul>

    <ul>
        <li><span>Cylinder</span> <span>{{ $postDetail->cylinder ?? "" }} </li>
        <li><span>Exchangeable</span> <span>{{ $postDetail->exchangeable ?? "" }} </li>
    </ul>

    <ul>
        <li><span>Condition</span> <span>{{ $postDetail->usage_condition ? ucwords($postDetail->usage_condition) : "" }} </li>
    </ul>
</div>
