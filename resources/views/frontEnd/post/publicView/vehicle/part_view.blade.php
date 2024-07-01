<ul>
    <li>Parts Type: {{ $postDetail->auto_part_name ?? "" }}</li>
    <li>Brand/ Make Name: {{ $postDetail->brand_name ?? "" }}</li>

    <li>Model Year: {{ $postDetail->model_year ?? "" }}</li>
    <li>Model: {{ $postDetail->model_number ?? "" }}</li>

    <li>Color: {{ $postDetail->color_name ?? "" }}</li>

    <li>Exchangeable: {{ $postDetail->exchangeable ?? "" }}</li>
    <li>Condition: {{ $postDetail->usage_condition ? ucwords($postDetail->usage_condition) : "" }}</li>

    <li>Description: {{ $postDetail->description ?? "" }}</li>
</ul>




