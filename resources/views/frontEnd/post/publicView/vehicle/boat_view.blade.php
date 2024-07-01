<ul>
    <li>Boat Type: {{ $postDetail->boat_type_name ?? "" }}</li>
    <li>Brand/ Make Name: {{ $postDetail->brand_name ?? "" }}</li>
    <li>Model Year: {{ $postDetail->model_year ?? "" }}</li>
    <li>Model: {{ $postDetail->model_number ?? "" }}</li>
    <li>Fuel Type: {{ $postDetail->fuel_type ? ucwords($postDetail->fuel_type) : "" }}</li>
    <li>Transmission: {{ \App\Enums\Front\Transmissions::getTransmission()[$postDetail->transmission] ?? "" }}</li>
    <li>Condition: {{ $postDetail->usage_condition ? ucwords($postDetail->usage_condition) : "" }}</li>

    <li>Description: {{ $postDetail->description ?? "" }}</li>
</ul>
