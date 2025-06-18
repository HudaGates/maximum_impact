<div id="skillsModul" class="modul" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5);">
    <div class="modul-content" style="background-color: #fff; margin: 4% auto; padding: 30px; border-radius: 12px; width: 95%; max-width: 700px; box-shadow: 0 5px 20px rgba(0,0,0,0.2);">
        <span class="close" onclick="closeSkillsPopup()" style="float: right; font-size: 26px; font-weight: bold; cursor: pointer;">&times;</span>
        <h2 style="font-size: 22px; font-weight: bold; margin-bottom: 20px;">Add Skills</h2>
        <form onsubmit="saveSkills(event)" style="display: flex; flex-direction: column; gap: 15px;">
            @csrf
            <label for="skills" style="font-weight: bold;">Skills</label>
           <input type="text" name="skills" id="skillsInput" style="padding: 10px; border-radius: 6px; border: 1px solid #ccc;" placeholder="Type a skill...">
            <div style="background-color: #f1f8f4; padding: 15px; border-radius: 8px; margin-top: 10px;">
                <p style="font-weight: 500; margin-bottom: 10px; color: #666;">Recommended Based on Your Profile</p>
                <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                    @php
                        $recommended = ['Project Management', 'Research', 'Marketing', 'Training', 'Communication', 'Sale', 'Microsoft Excel', 'Customer Service'];
                    @endphp

                    @foreach ($recommended as $skill)
                        <button type="button" class="recommended-skill" data-skill="{{ $skill }}"
                            style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 6px; background-color: #fff; cursor: pointer;">
                            {{ $skill }}
                        </button>
                    @endforeach
                </div>
            </div>

            <button type="submit" style="margin-top: 20px; background-color: #1d274d; color: white; padding: 10px 20px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;">
                Save
            </button>
        </form>
         <form id="skillsForm" method="POST" action="{{ route('skills.store') }}" style="display: flex; flex-direction: column; gap: 15px;">
            @csrf
        </form>

    </div>
</div>
