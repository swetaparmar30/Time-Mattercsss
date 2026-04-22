<div class="col-md-6 col-xl-4">
    <div class="card">
        <div class="card-body">
            <h6 class="mb-4">{{ $stTitle }}</h6>
            <div class="row d-flex align-items-center">
                <div class="col-9">
                    <h3 class="f-w-300 d-flex align-items-center m-b-0">
                        @if($stShowArrow)
                            <i
                                class="ph ph-{{ $stIncreased ? "arrow-up" : "arrow-down" }} text-{{ $stIncreased ? "success" : "danger" }} f-30 m-r-10"></i>
                        @endif
                        {{ $stvalue }}
                    </h3>
                </div>

                <div class="col-3 text-end">
                    <p class="m-b-0">
                        {{ str_ends_with($stPercentage, '%') ? $stPercentage : "$stPercentage%" }}
                    </p>
                </div>
            </div>
            <div class="progress m-t-30" style="height: 7px">
                <div class="progress-bar bg-brand-color-{{ rand(1, 3) }}" role="progressbar"
                    style="width: {{ str_ends_with($stPercentage, '%') ? $stPercentage : "$stPercentage%" }}"
                    aria-valuenow="{{ str_ends_with($stPercentage, '%') ? str_replace('%', '', $stPercentage) : $stPercentage }}"
                    aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
</div>
