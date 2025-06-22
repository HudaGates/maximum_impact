<!-- Modal -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Modal -->


<div class="modal fade" id="addExperienceModal" tabindex="-1" aria-labelledby="addExperienceLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 border-0">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="addExperienceLabel">Add Experience</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="{{ route('experience.store') }}" method="POST">
        @csrf
        <div class="modal-body px-4">

          <!-- Position -->
          <div class="mb-3">
            <label class="form-label">Position</label>
            <input type="text" name="position" class="form-control rounded-3 border-secondary" required>
          </div>

          <!-- Type of Work -->
          <div class="mb-3">
            <label class="form-label">Type of work</label>
            <select name="type" class="form-select rounded-3 border-secondary" required>
              <option disabled selected>-- Select type --</option>
              <option value="Full-time">Full-time</option>
              <option value="Part-time">Part-time</option>
              <option value="Internship">Internship</option>
              <option value="Freelance">Freelance</option>
            </select>
          </div>

          <!-- Company Name -->
          <div class="mb-3">
            <label class="form-label">Company name</label>
            <input type="text" name="company" class="form-control rounded-3 border-secondary" required>
          </div>

          <!-- Location -->
          <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control rounded-3 border-secondary">
          </div>

          <!-- Start & End Date -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Start Date</label>
              <input type="date" name="start_date" class="form-control rounded-3 border-secondary" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">End Date</label>
              <input type="date" name="end_date" class="form-control rounded-3 border-secondary">
            </div>
          </div>

          <!-- Description -->
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control rounded-3 border-secondary" rows="3"></textarea>
          </div>

          <!-- Submit Button -->
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary rounded-3 px-4">Save</button>
          </div>
          
        </div>
      </form>
    </div>
  </div>
</div>
