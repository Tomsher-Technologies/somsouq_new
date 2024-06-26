<div class="ad-detail-spec">
    <ul>
        <li><span>Heavy Equipment Type</span> <span>{{ $postDetail->heavy_equipment_type_name ?? "" }} </li>
        <li><span>Brand/ Make Name</span> <span>{{ $postDetail->brand_name ?? "" }} </li>

    </ul>

    <ul>
        <li><span>Model Year</span> <span>{{ $postDetail->model_year ?? "" }} </li>
        <li><span>Model</span> <span>{{ $postDetail->model_number ?? "" }} </li>
    </ul>

    <ul>
        <li><span>Km</span> <span>{{ $postDetail->km ?? "" }} </li>
        <li><span>Color</span> <span>{{ $postDetail->color_name ?? "" }} </li>
    </ul>

    <ul>
        <li><span>Fuel Type</span> <span>{{ $postDetail->fuel_type ? ucwords($postDetail->fuel_type) : "" }} </li>
        <li><span>Transmission</span> <span>{{ \App\Enums\Front\Transmissions::getTransmission()[$postDetail->transmission] ?? "" }} </li>
    </ul>

    <ul>
        <li><span>Engine Capacity</span> <span>{{ $postDetail->engine_capacity ? $postDetail->engine_capacity . 'cc' : "" }} </li>
        <li><span>Engine Power</span> <span>{{ $postDetail->engine_power ? $postDetail->engine_power.'hp' : "" }} </li>
    </ul>

    <ul>
        <li><span>Cylinder</span> <span>{{ $postDetail->cylinder ?? "" }} </li>
        <li><span>Capacity/ Weight</span> <span>{{ $postDetail->carriage_capacity ?? "" }} </li>
    </ul>

    <ul>
        <li><span>Exchangeable</span> <span>{{ $postDetail->exchangeable ?? "" }} </li>
        <li><span>Condition</span> <span>{{ $postDetail->usage_condition ? ucwords($postDetail->usage_condition) : "" }} </li>
    </ul>
</div>
