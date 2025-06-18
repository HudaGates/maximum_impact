@extends('layouts.app')

@section('content')
<style>
    .btn-primary {
    background-color: #2C317D;
    border-color: #2C317D;
    color: white;
    font-weight: 500;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
}

.btn-primary:hover {
    background-color: #23275e;
    border-color: #23275e;
}
    .custom-select {
        background-color: #1E266D !important;
        color: #fff !important;
        border: none;
        border-radius: 8px;
        font-weight: 500;
        padding: 8px 12px;
    }

    .custom-select option {
        color: #ffffff;
    }

    .custom-select:focus {
        box-shadow: none;
        border: 2px solid #151a52;
    }
    .upload-box {
    border: 1.5px solid #1E266D;
    border-radius: 10px;
    padding: 40px 20px;
    cursor: pointer;
    transition: 0.3s;
}

.upload-box:hover {
    background-color: #f5f5f5;
}

.upload-icon {
    font-size: 32px;
    margin-bottom: 10px;
    color: #666;
}

.upload-text {
    color: #666;
    font-size: 14px;
    line-height: 1.4;
}

</style>
<div class="container py-5">
    <h2 class="fw-bold mb-4">Register New Project</h2>
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            {{-- Left Column --}}
            <div class="col-md-6">
                <h5 class="fw-bold mb-3">Basic Project Information</h5>

                <div class="mb-3">
                    <label class="form-label">Project Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Input your project name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Project Description</label>
                    <textarea name="description" class="form-control" rows="2" placeholder="Input your project description"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Project Goals</label>
                    <input type="text" name="goals" class="form-control" placeholder="Input your project goals">
                </div>

                <div class="mb-3">
                    <label class="form-label">Target Market</label>
                    <input type="text" name="market" class="form-control" placeholder="Input your target market">
                </div>

                <div class="mb-3">
    <label class="form-label d-block">Tag</label>
    <div class="border rounded p-3">
        <button type="button" class="btn btn-primary px-4 py-2" style="border-radius: 8px;">
            Choose Tag
        </button>
    </div>
</div>


                <div class="mb-3">
    <label class="form-label">Start Date</label>
    <div class="d-flex gap-2">
        <select name="start_day" class="form-select custom-select w-25">
            @for ($i = 1; $i <= 31; $i++)
                <option>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
            @endfor
        </select>
        <select name="start_month" class="form-select custom-select w-50">
            @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                <option>{{ $month }}</option>
            @endforeach
        </select>
        <select name="start_year" class="form-select custom-select w-25">
            @for ($i = 2024; $i <= 2030; $i++)
                <option>{{ $i }}</option>
            @endfor
        </select>
    </div>
</div>

<div class="mb-3">
    <label class="form-label">End Date</label>
    <div class="d-flex gap-2">
        <select name="end_day" class="form-select custom-select w-25">
            @for ($i = 1; $i <= 31; $i++)
                <option>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
            @endfor
        </select>
        <select name="end_month" class="form-select custom-select w-50">
            @foreach (['January','February','March','April','May','June','July','August','September','October','November','December'] as $month)
                <option>{{ $month }}</option>
            @endforeach
        </select>
        <select name="end_year" class="form-select custom-select w-25">
            @for ($i = 2024; $i <= 2030; $i++)
                <option>{{ $i }}</option>
            @endfor
        </select>
    </div>
</div>


                <h5 class="fw-bold mt-4">Supporting Materials</h5>

                <div class="mb-4">
    <label class="form-label fw-bold">Pitch Deck</label>
    <label for="pitch_deck" class="upload-box w-100 text-center">
        <div class="upload-icon bi-upload"></div>
        <div class="upload-text">Upload your PDF pitch deck outlining your project and investment needs.</div>
        <input type="file" name="pitch_deck" id="pitch_deck" accept=".pdf" hidden>
    </label>
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Video Presentation</label>
    <label for="video" class="upload-box w-100 text-center">
        <div class="upload-icon bi-upload"></div>
        <div class="upload-text">Upload a short video presenting your project and its key highlights.</div>
        <input type="file" name="video" id="video" accept="video/*" hidden>
    </label>
</div>

            </div>

            {{-- Right Column --}}
            <div class="col-md-6">
                <h5 class="fw-bold mb-3">Investment Details</h5>

                <div class="mb-3">
                    <label class="form-label">Business Category</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="category" value="New Business">
                            <label class="form-check-label">New Business</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="category" value="Existing Business">
                            <label class="form-check-label">Existing Business</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Investment Needs</label>
                    <input type="text" name="investment_needs" class="form-control" placeholder="Input your investment needs">
                </div>

                <div class="mb-3">
                    <label class="form-label">Project Roadmap</label>
                    <textarea name="roadmap" class="form-control" rows="2" placeholder="Input your project roadmap"></textarea>
                </div>

                <h5 class="fw-bold mt-4">Impact and Metrics</h5>

                <div class="mb-3">
                    <label class="form-label">SDGs Categories, Indicators, and Metrics</label>
                    <input type="text" name="sdgs" class="form-control" placeholder="Add SDGs, Indicators, Metric">
                </div>

                <h5 class="fw-bold mt-4">Maps</h5>
                <div class="mb-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.552635770284!2d106.8234437153706!3d-6.199812362488262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e99d234b33%3A0x47fae9e749d57fa2!2sMonas!5e0!3m2!1sen!2sid!4v1628162947959!5m2!1sen!2sid"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary px-5 py-2">Save and Continue</button>
        </div>
            </div>
        </div>


    </form>
</div>
@endsection
