<div id="experienceModal" class="modal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5);">
    <div class="modal-content" style="background-color: #fff; margin: 4% auto; padding: 30px; border-radius: 12px; width: 95%; max-width: 700px; box-shadow: 0 5px 20px rgba(0,0,0,0.2);">
        <span class="close" onclick="closeExperiencePopup()" style="float: right; font-size: 26px; font-weight: bold; cursor: pointer;">&times;</span>
        <h2 style="font-size: 22px; font-weight: bold; margin-bottom: 20px;">Add Experience</h2>

        <form method="POST" action="*" style="display: flex; flex-direction: column; gap: 15px;">
            @csrf

            <div>
                <label style="display: block; font-weight: 600;">Position</label>
                <input type="text" name="position" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
            </div>

            <div>
                <label style="display: block; font-weight: 600;">Type of work</label>
                <select name="type_of_work" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
                    <option value="">Select...</option>
                    <option value="fulltime">Full-time</option>
                    <option value="parttime">Part-time</option>
                    <option value="internship">Internship</option>
                </select>
            </div>

            <div>
                <label style="display: block; font-weight: 600;">Company name</label>
                <input type="text" name="company_name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
            </div>

            <div>
                <label style="display: block; font-weight: 600;">Location</label>
                <input type="text" name="location" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
            </div>

            <div style="display: flex; gap: 20px;">
                <div style="flex: 1;">
                    <label style="display: block; font-weight: 600;">Start Date</label>
                    <input type="date" name="start_date" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
                </div>
                <div style="flex: 1;">
                    <label style="display: block; font-weight: 600;">End Date</label>
                    <input type="date" name="end_date" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
                </div>
            </div>

            <div>
                <label style="display: block; font-weight: 600;">Description</label>
                <textarea name="description" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;"></textarea>
            </div>

            <button type="submit" style="margin-top: 12px; background-color: #1e2a78; color: white; border: none; padding: 12px; border-radius: 6px; font-weight: bold; cursor: pointer;">
                Save
            </button>
        </form>
    </div>
</div>
