<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="reportModalLabel">Report this ad</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('report.submit') }}" method="post" id="reportFormId">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ webUser()->id ?? "" }}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <select class="form-select" aria-label="Default select example" name="report_type_id" required>
                                <option value="">Report Type</option>
                                @foreach(\App\Enums\Front\ReportType::getReportType() as $key => $data)
                                    <option value="{{ $key }}">{{ $data }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message" placeholder="Message" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100">Report Ad</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
