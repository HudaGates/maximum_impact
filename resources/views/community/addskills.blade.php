<!-- Modal -->
<div class="modal fade" id="addSkillModal" tabindex="-1" aria-labelledby="addSkillModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h4 class="modal-title fw-bold" id="addSkillModalLabel">Add Skills</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="{{ route('skills.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label fw-semibold">Skills</label>
            <input type="text" class="form-control" name="skill_name" placeholder="Type a skill..." required>
          </div>

          <!-- Recommended Skills -->
          <div class="bg-light p-3 rounded-3 border">
            <p class="fw-semibold text-muted mb-2">Recommended Based on Your Profile</p>
            <div class="d-flex flex-wrap gap-2">
              @php
                $suggestedSkills = ['Project Management', 'Research', 'Marketing', 'Training', 'Communication', 'Sale', 'Microsoft Excel', 'Customer Service'];
              @endphp
              @foreach($suggestedSkills as $skill)
                <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill" onclick="document.querySelector('input[name=skill_name]').value = '{{ $skill }}'">
                  {{ $skill }}
                </button>
              @endforeach
            </div>
          </div>
        </div>

        <div class="modal-footer border-0 px-4">
          <button type="submit" class="btn btn-dark rounded-3">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
