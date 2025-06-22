<!-- Modal -->
<div class="modal fade" id="addEducationModal" tabindex="-1" aria-labelledby="addEducationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h4 class="modal-title fw-bold" id="addEducationModalLabel">Add Education</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="{{ route('education.store') }}" method="POST">
      @csrf
      <div class="modal-content rounded-4">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="addEducationModalLabel">Add Education</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label fw-semibold">University</label>
            <input type="text" class="form-control" name="university" required>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Title</label>
            <input type="text" class="form-control" name="title">
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Field of study</label>
            <input type="text" class="form-control" name="field_of_study">
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Location</label>
            <input type="text" class="form-control" name="location">
          </div>

          <div class="row">
            <label class="form-label fw-semibold">Start Date</label>
            <div class="col">
              <select class="form-select" name="start_date_month">
                <option value="" selected disabled>Month</option>
                @foreach(['January','February','March','April','May','June','July','August','September','October','November','December'] as $month)
                  <option value="{{ $month }}">{{ $month }}</option>
                @endforeach
              </select>
            </div>
            <div class="col">
              <select class="form-select" name="start_date_year">
                <option value="" selected disabled>Year</option>
                @for($i = date('Y'); $i >= 1950; $i--)
                  <option value="{{ $i }}">{{ $i }}</option>
                @endfor
              </select>
            </div>
          </div>

          <div class="row mt-3">
            <label class="form-label fw-semibold">End Date</label>
            <div class="col">
              <select class="form-select" name="end_date_month">
                <option value="" selected disabled>Month</option>
                @foreach(['January','February','March','April','May','June','July','August','September','October','November','December'] as $month)
                  <option value="{{ $month }}">{{ $month }}</option>
                @endforeach
              </select>
            </div>
            <div class="col">
              <select class="form-select" name="end_date_year">
                <option value="" selected disabled>Year</option>
                @for($i = date('Y'); $i >= 1950; $i--)
                  <option value="{{ $i }}">{{ $i }}</option>
                @endfor
              </select>
            </div>
          </div>

          <div class="mb-3 mt-3">
            <label class="form-label fw-semibold">Grade</label>
            <input type="text" class="form-control" name="grade">
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Activities and social activities</label>
            <input type="text" class="form-control" name="activities">
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer border-0 px-4">
          <button type="submit" class="btn btn-dark rounded-3">Save</button>
        </div>
        </div>
      </form>
    </div>
  </div>
  </div>

