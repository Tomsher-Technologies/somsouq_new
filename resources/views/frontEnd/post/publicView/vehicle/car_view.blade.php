<ul>
    @if($sub_category_id == 19)
        <li>Price per-day: {{ $postDetail->price ?? "" }}</li>
        <li>Price per-month: {{ $postDetail->price_per_month ?? "" }}</li>
    @endif
    <li>Brand/ Make Name: {{ $postDetail->brand_name ?? "" }}</li>
    <li>Model Year: {{ $postDetail->model_year ?? "" }}</li>

    <li>Model: {{ $postDetail->model_number ?? "" }}</li>
    <li>Km: {{ $postDetail->km ?? "" }}</li>

    <li>Color: {{ $postDetail->color_name ?? "" }}</li>
    <li>Fuel Type: {{ $postDetail->fuel_type ? ucwords($postDetail->fuel_type) : "" }}</li>

    <li>Transmission: {{ \App\Enums\Front\Transmissions::getTransmission()[$postDetail->transmission] ?? "" }}</li>
    <li>Body Type: {{ $postDetail->body_type_name ?? "" }}</li>

    <li>Driver Side: {{ $postDetail->driver_side ? ucfirst($postDetail->driver_side) : "" }}</li>
    <li>Seats: {{ $postDetail->seat ?? "" }}</li>

    <li>Engine Capacity: {{ $postDetail->engine_capacity ? $postDetail->engine_capacity . 'cc' : "" }}</li>
    <li>Engine Power: {{ $postDetail->engine_power ? $postDetail->engine_power.'hp' : "" }}</li>

    <li>Cylinder: {{ $postDetail->cylinder ?? "" }}</li>
    @if($sub_category_id == 26)
    <li>Exchangeable: {{ $postDetail->exchangeable ?? "" }}</li>
    <li>Condition: {{ $postDetail->usage_condition ? ucwords($postDetail->usage_condition) : "" }}</li>
    @endif
    <li>Description: {{ $postDetail->description ?? "" }}</li>
</ul>

