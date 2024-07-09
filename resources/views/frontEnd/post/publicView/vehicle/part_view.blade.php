<div class="row mt-5">
    <div class="col-md-12">
        <h4 class="mb-3">Item overview</h4>
        <div class="item-overview">
            <div class="card border-0">
                <div class="card-body p-0">
                    <ul>
                        <li>
                            <h4>{{ $postDetail->brand_name ?? "" }}</h4>
                            <h5>Brand Name</h5>
                        </li>
                        <li>
                            <h4>{{ $postDetail->color_name ?? "" }}</h4>
                            <h5>Color</h5>
                        </li>
                        <li>
                            <h4>{{ $postDetail->model_year ?? "" }}</h4>
                            <h5>Model Year</h5>
                        </li>
                        <li>
                            <h4>{{ $postDetail->model_number ?? "" }}</h4>
                            <h5>Model</h5>
                        </li>
                        <li>
                            <h4>{{ $postDetail->usage_condition ? ucwords($postDetail->usage_condition) : "" }}</h4>
                            <h5>Condition</h5>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <h4 class="mb-3">Additional Details</h4>
        <div class="additional-details">
            <div class="card product-card">
                <div class="card-body p-0">
                    <ul>
                        <li><strong>Parts Type:</strong> <span>{{ $postDetail->auto_part_name ?? "" }}</span></li>
                        <li><strong>Brand/ Make Name:</strong> <span>{{ $postDetail->brand_name ?? "" }}</span></li>
                        <li><strong>Model Year</strong> <span>{{ $postDetail->model_year ?? "" }}</span></li>
                        <li><strong>Model</strong> <span>{{ $postDetail->model_number ?? "" }}</span></li>
                        <li><strong>Color:</strong> <span>{{ $postDetail->color_name ?? "" }}</span></li>
                        <li><strong>Exchangeable:</strong> <span>{{ $postDetail->exchangeable ?? "" }}</span></li>
                        <li><strong>Condition:</strong> <span>{{ $postDetail->usage_condition ? ucwords($postDetail->usage_condition) : "" }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>














