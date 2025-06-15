<div id="educationMentor" class="modal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5);">
    <div class="modal-content" style="background-color: #fff; margin: 4% auto; padding: 30px; border-radius: 12px; width: 95%; max-width: 700px; box-shadow: 0 5px 20px rgba(0,0,0,0.2);">
        <span class="close" onclick="closeEducationPopup()" style="float: right; font-size: 26px; font-weight: bold; cursor: pointer;">&times;</span>
        <h2 style="font-size: 22px; font-weight: bold; margin-bottom: 20px;">Add Education</h2>

        <form method="POST" action="*" style="display: flex; flex-direction: column; gap: 15px;">
            @csrf

            <div>
                <label style="display: block; font-weight: 600;">University</label>
                <input type="text" name="position" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
            </div>

            <div>
                <label style="display: block; font-weight: 600;">Title</label>
                <select name="type_of_work" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
                    <option value="">Select...</option>
                    <option value="fulltime">S1</option>
                    <option value="parttime">S2</option>
                    <option value="internship">S3</option>
                </select>
            </div>

            <div>
                <label style="display: block; font-weight: 600;">Field of study</label>
                <input type="text" name="company_name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
            </div>

            <div>
                <label style="display: block; font-weight: 600;">Location</label>
                <input type="text" name="location" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
            </div>

           <div style="display: flex; gap: 20px;">
                <!-- Input Bulan -->
                <div style="flex: 1;">
                    <label style="display: block; font-weight: 600;">Start Date</label>
                    <input type="text" name="dayMonth" pattern="^([0][1-9]|[12][0-9]|3[01])-(0[1-9]|1[0-2])$"
                        placeholder="DD-MM" required
                        title="Format harus DD-MM, contoh: 05-12"
                        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
                </div>

                <!-- Input Tahun -->
                <div style="flex: 1;">
                    <input type="number" name="Year" min="1900" max="2100"
                        placeholder="YYYY"
                        style="margin-top: 24px; width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
                </div>
            </div>



              <div style="display: flex; gap: 20px;">
                <!-- Input Bulan -->
                <div style="flex: 1;">
                    <label style="display: block; font-weight: 600;">End Date</label>
                    <input type="text" name="dayMonth" pattern="^([0][1-9]|[12][0-9]|3[01])-(0[1-9]|1[0-2])$"
                        placeholder="DD-MM" required
                        title="Format harus DD-MM, contoh: 05-12"
                        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
                </div>

                <!-- Input Tahun -->
                <div style="flex: 1;">

                    <input type="number" name="Year" min="1900" max="2100"
                        placeholder="YYYY"
                        style="margin-top: 24px; width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
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
