<div class="ad-detail-spec">
    <ul>
        <li><span>Parts Type</span> <span>{{ $postDetail->auto_part_name ?? "" }} </li>
        <li><span>Brand/ Make Name</span> <span>{{ $postDetail->brand_name ?? "" }} </li>
    </ul>

    <ul>
        <li><span>Model Year</span> <span>{{ $postDetail->model_year ?? "" }} </li>
        <li><span>Model</span> <span>{{ $postDetail->model_number ?? "" }} </li>
    </ul>

    <ul>
        <li><span>Color</span> <span>{{ $postDetail->color_name ?? "" }} </li>
        <li><span>Exchangeable</span> <span>{{ $postDetail->exchangeable ?? "" }} </li>
    </ul>

    <ul>
        <li><span>Condition</span> <span>{{ $postDetail->usage_condition ? ucwords($postDetail->usage_condition) : "" }} </li>
    </ul>
</div>
