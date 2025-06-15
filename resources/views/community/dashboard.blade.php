@extends('layouts.app-2')

@section('content')
<style>
    .mentor-card {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        margin-bottom: 20px;
        position: relative;
    }

    .mentor-header {
        background-color: #1e2a78;
        height: 130px;
        position: relative;
    }

    .mentor-header .profile-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 4px solid white;
        position: absolute;
        top: 65px;
        left: 30px;
        object-fit: cover;
        background-color: white;
    }

    .mentor-body {
        padding: 80px 30px 30px 30px;
        position: relative;
    }

    .mentor-body h2 {
        font-weight: 700;
        color: #1e2a78;
        margin-bottom: 2px;
    }

    .mentor-body p.subtext {
        color: #999;
        margin: 2px 0;
        font-size: 14px;
    }

    .edit-btn-profile {
        position: absolute;
        top: 20px;
        right: 20px;
        display: flex;
        align-items: center;
        background-color: #f0f0f0;
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 14px;
        color: #333;
        border: 1px solid #ccc;
        text-decoration: none;
        gap: 4px;
    }

    .edit-btn-profile img {
        width: 16px;
        height: 16px;
    }

    .mentor-university {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 8px;
        position: absolute;
        top: 50px;
        right: 20px;
    }

    .mentor-university img {
        width: 20px;
        height: 20px;
    }

    .about-section {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        padding: 20px 30px;
        position: relative;
    }


    .edit-btn-about {
        position: absolute;
        top: 20px;
        right: 20px;
        display: flex;
        align-items: center;
        background-color: #f0f0f0;
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 14px;
        color: #333;
        border: 1px solid #ccc;
        text-decoration: none;
        gap: 4px;
    }

    .edit-btn-about img {
        width: 16px;
        height: 16px;
    }

    .about-section h4 {
        font-weight: 600;
        margin-bottom: 10px;
    }

    .about-section p {
        font-size: 14px;
        color: #333;
        line-height: 1.6;
    }
    .edit-btn-profile {
    position: absolute;
    top: 20px;
    right: 20px;
    display: flex;
    align-items: center;
    background-color: #f0f0f0;
    padding: 2px 6px; /* Ukuran padding lebih kecil */
    border-radius: 4px;
    font-size: 12px; /* Ukuran teks lebih kecil */
    color: #333;
    border: 1px solid #ccc;
    text-decoration: none;
    gap: 4px;
}

.edit-btn-profile img {
    width: 14px; /* Ikon lebih kecil */
    height: 14px;
}
.edit-btn-about {
    position: absolute;
    top: 20px;
    right: 20px;
    display: flex;
    align-items: center;
    background-color: #f0f0f0;
    padding: 2px 6px; /* Ukuran padding lebih kecil */
    border-radius: 4px;
    font-size: 12px; /* Ukuran teks lebih kecil */
    color: #333;
    border: 1px solid #ccc;
    text-decoration: none;
    gap: 4px;
}
.edit-btn-about img {
    width: 14px;
    height: 14px;
}
.edit-btn-experience {
    position: absolute;
    top: 20px;
    right: 20px;
    display: flex;
    align-items: center;
    background-color: #f0f0f0;
    padding: 2px 6px; /* Ukuran padding lebih kecil */
    border-radius: 4px;
    font-size: 12px; /* Ukuran teks lebih kecil */
    color: #333;
    border: 1px solid #ccc;
    text-decoration: none;
    gap: 4px;
}
.edit-btn-experience img {
    width: 14px; /* Ikon lebih kecil */
    height: 14px;
}


</style>

<div class="container-fluid">
    {{-- Profile Card --}}
    <div class="mentor-card">
        <div class="mentor-header">
            {{-- Profile Image --}}
            <img src="{{ asset('images/profil-mentor.png') }}" alt="Profile" class="profile-img">
        </div>
        <div class="mentor-body">
            {{-- Edit Button --}}
            <a href="#" class="edit-btn-profile">
                <img src="{{ asset('images/logo-pensil.png') }}" alt="Edit Icon"> Edit
            </a>

            {{-- University Info --}}
            <div class="mentor-university">
                <img src="{{ asset('images/logo-universitas.png') }}" alt="University Icon">
                <span class="text-sm text-gray-700">Universitas Trisakti, Jakarta Barat</span>
            </div>

            <h2 style="margin-bottom: 8px;">Agraditya Putra</h2>
            <p class="subtext" style="margin-bottom: 8px;"><strong style="color: black;">UI/UX Designer</strong></p>
            <p class="subtext">Jakarta Selatan, DKI Jakarta, Indonesia</p>

        </div>
    </div>

    {{-- About Section --}}
    <div class="about-section">
        {{-- Edit Button --}}
        <a href="#" class="edit-btn-about">
            <img src="{{ asset('images/logo-pensil.png') }}" alt="Edit Icon"> Edit
        </a>

        <h2 style="font-size: 24px; font-weight: bold; margin: 0;">About</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
            sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
            sunt in culpa qui officia deserunt mollit anim id est laboru
        </p>
    </div>


@include('community.addexperience')
    <div class="about-section" style="margin-top: 25px;">
        <div style="position: relative; display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="font-size: 24px; font-weight: bold; margin: 0;">Experience</h2>
            <div style="display: flex; align-items: center;">
                <button onclick="openExperiencePopup()" title="Add Experience" style="background: none; border: none; font-size: 24px; cursor: pointer; padding: 4px; margin-right: 80px; margin-top: 7px;">+</button>
                <a href="#" class="edit-btn-experience">
                    <img src="{{ asset('images/logo-pensil.png') }}" alt="Edit Icon"> Edit
                </a>
            </div>
        </div>

  <!-- Content Experience -->
  <div style="display: flex; gap: 16px;">
    <!-- Logo -->
    <img src="{{ asset('images/logo.png') }}" alt="MAXY Logo" style="width: 48px; height: 48px; object-fit: contain; margin-top: 10px;">
    <!-- Experience Info -->
    <div>
      <h5 style="font-weight: bold; margin-top: 20px;">MAXY Academy</h5>
      <p style="margin: 1px 0; color: #555;">1 year</p>
      <p style="margin: 1px 0; color: #888; font-size: 13px;">On Site</p>

      <!-- Timeline -->
      <div style="margin-top: 16px; padding-left: 10px; border-left: 2px solid #ccc;">
        <!-- Job 1 -->
        <div style="position: relative; margin-bottom: 24px;">
          <div style="width: 10px; height: 10px; background: black; border-radius: 50%; position: absolute; left: -16px; top: 4px;"></div>
          <p style="font-weight: bold; margin: 0;">Mentor UI/UX Designer</p>
          <p style="margin: 0; font-size: 14px;">Seasonal</p>
          <p style="margin: 0; font-size: 14px; color: #777;">Apr 2023 - Present. 1 year 7 mos</p>
          <p style="margin: 0; font-size: 14px; color: #777;">Jakarta Selatan-Jakarta-Indonesia</p>
        </div>

        <!-- Job 2 -->
        <div style="position: relative; margin-bottom: 24px;">
          <div style="width: 10px; height: 10px; background: black; border-radius: 50%; position: absolute; left: -16px; top: 4px;"></div>
          <p style="font-weight: bold; margin: 0;">Creative Designer</p>
          <p style="margin: 0; font-size: 14px;">Contract</p>
          <p style="margin: 0; font-size: 14px; color: #777;">Apr 2023 - Present. 1 year 7 mos</p>
          <p style="margin: 0; font-size: 14px; color: #777;">Jakarta Selatan-Jakarta-Indonesia</p>
        </div>

        <!-- Job 3 -->
        <div style="position: relative;">
          <div style="width: 10px; height: 10px; background: black; border-radius: 50%; position: absolute; left: -16px; top: 4px;"></div>
          <p style="font-weight: bold; margin: 0;">Creative Designer</p>
          <p style="margin: 0; font-size: 14px;">Contract</p>
          <p style="margin: 0; font-size: 14px; color: #777;">Apr 2023 - Present. 1 year 7 mos</p>
          <p style="margin: 0; font-size: 14px; color: #777;">Jakarta Selatan-Jakarta-Indonesia</p>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    function openExperiencePopup() {
        const modal = document.getElementById("experienceModal");
        if (modal) {
            modal.style.display = "block";
        }
    }

    function closeExperiencePopup() {
        const modal = document.getElementById("experienceModal");
        if (modal) {
            modal.style.display = "none";
        }
    }

    window.addEventListener("click", function(event) {
        const modal = document.getElementById("experienceModal");
        if (event.target === modal) {
            closeExperiencePopup();
        }
    });
</script>

<!-- Container putih Education Box -->
@include('community.addeducation')
    <div style="background-color: #ffffff; padding: 24px; border-radius: 12px; margin-top: 20px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
        <!-- Header -->
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2 style="font-size: 24px; font-weight: bold; margin: 0;">Education</h2>

            <!-- Tombol tambah dan edit -->
            <div style="display: flex; align-items: center; gap: 12px;">
                <button onclick="openEducationPopup()" title="Add Education"
                    style="background: none; border: none; font-size: 24px; cursor: pointer; padding: 4px; margin-top: 4px;">
                    +
            </button>
                <a href="#"
                    style="
                        display: inline-flex;
                        align-items: center;
                        gap: 2px;
                        text-decoration: none;
                        color: #333;
                        font-weight: 500;
                        font-size: 10px;
                        background-color: #f3f3f3;
                        padding: 2px 6px;
                        border: 1px solid #ccc;
                        border-radius:2px;
                        transition: background-color 0.2s, box-shadow 0.2s;
                    "
                    onmouseover="this.style.backgroundColor='#e0e0e0'; this.style.boxShadow='0 2px 6px rgba(0,0,0,0.1)'"
                    onmouseout="this.style.backgroundColor='#f3f3f3'; this.style.boxShadow='none'"
                    >
                        <img src="{{ asset('images/logo-pensil.png') }}" alt="Edit Icon" style="width: 16px; height: 16px;">
                        Edit
                 </a>
            </div>
        </div>

        <!-- Isi -->
        <div style="display: flex; align-items: center; margin-top: 20px;">
            <!-- Logo bulat -->
            <div style="width: 60px; height: 60px; border-radius: 50%; background-color: #E9D8FD; display: flex; align-items: center; justify-content: center; margin-right: 16px;">
                <img src="{{ asset('images/logo-universitas.png') }}" alt="University Logo" style="width: 28px; height: 28px;">
            </div>

            <!-- Informasi -->
            <div>
                <div style="font-weight: 600; font-size: 16px;">Universitas Trisakti</div>
                <div style="color: #666; font-size: 14px;">2021 – 2025</div>
            </div>
        </div>
    </div>




<script>
    function openEducationPopup() {
        const modal = document.getElementById("educationMentor");
        if (modal) {
            modal.style.display = "block";
        }
    }

    function closeEducationPopup() {
        const modal = document.getElementById("educationMentor");
        if (modal) {
            modal.style.display = "none";
        }
    }

    window.addEventListener("click", function(event) {
        const modal = document.getElementById("educationMentor");
        if (event.target === modal) {
            closeEducationPopup();
        }
    });
</script>

<!-- Container putih Skills Box -->
@include('community.addskills')
    <div style="background-color: #ffffff; padding: 24px; border-radius: 12px; margin-top: 20px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
        <!-- Header -->
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2 style="font-size: 24px; font-weight: bold; margin: 0;">Skills</h2>

            <!-- Tombol tambah dan edit -->
            <div style="display: flex; align-items: center; gap: 12px;">
                <button onclick="openSkillsPopup()" title="Add Skills"
                    style="background: none; border: none; font-size: 24px; cursor: pointer; padding: 4px; margin-top: 4px;">
                    +
                </button>
              <a href="#"
                    style="
                        display: inline-flex;
                        align-items: center;
                        gap: 2px;
                        text-decoration: none;
                        color: #333;
                        font-weight: 500;
                        font-size: 10px;
                        background-color: #f3f3f3;
                        padding: 2px 6px;
                        border: 1px solid #ccc;
                        border-radius:2px;
                        transition: background-color 0.2s, box-shadow 0.2s;
                    "
                    onmouseover="this.style.backgroundColor='#e0e0e0'; this.style.boxShadow='0 2px 6px rgba(0,0,0,0.1)'"
                    onmouseout="this.style.backgroundColor='#f3f3f3'; this.style.boxShadow='none'"
                    >
                        <img src="{{ asset('images/logo-pensil.png') }}" alt="Edit Icon" style="width: 16px; height: 16px;">
                        Edit
                 </a>


            </div>
        </div>

       <!-- Isi -->
        <div style="display: flex; flex-direction: column; align-items: start; margin-top: 20px;" id="skillsBox">
            <!-- Informasi -->
            <div id="skillsInfoText" style="font-size: 16px;">
                Tell us about your suitability for finding new opportunities - 50% of recruiters use skills data to fill positions
            </div>

            <!-- Skills yang disimpan -->
            <div id="skillsDisplay" style="margin-top: 10px; display: flex; flex-wrap: wrap; gap: 8px;"></div>
        </div>

           <!-- Daftar Skills yang Dipilih -->
            <div id="selectedSkills" style="margin-top: 20px; display: flex; flex-wrap: wrap; gap: 10px;"></div>
        </div>
    </div>

 <script>
    function openSkillsPopup() {
        document.getElementById('skillsModul').style.display = 'block';
    }

    function closeSkillsPopup() {
        document.getElementById('skillsModul').style.display = 'none';
    }

    function saveSkills(event) {
        event.preventDefault();

        const skillsInput = document.getElementById('skillsInput');
        const inputSkills = skillsInput.value.split(',').map(s => s.trim()).filter(s => s !== '');

        // Tampilkan skill hanya di tampilan utama (mentor.blade.php)
        const skillsDisplay = document.getElementById('skillsDisplay');
        const skillsInfoText = document.getElementById('skillsInfoText');

        if (skillsDisplay && skillsInfoText) {
            skillsInfoText.textContent = 'Your skills:';
            skillsDisplay.innerHTML = '';

            inputSkills.forEach(skill => {
                const skillTag = document.createElement('div');
                skillTag.textContent = skill;
                skillTag.style.cssText = `
                    padding: 6px 12px;
                    background-color: #e0f0e9;
                    color: #333;
                    border-radius: 20px;
                    font-size: 14px;
                    border: 1px solid #bcdac8;
                    margin: 5px;
                    display: inline-block;
                `;
                skillsDisplay.appendChild(skillTag);
            });
        }

        // Tutup popup & reset input
        closeSkillsPopup();
        skillsInput.value = '';
    }

    document.addEventListener('DOMContentLoaded', function () {
        const skillButtons = document.querySelectorAll('.recommended-skill');
        const skillsInput = document.getElementById('skillsInput');

        skillButtons.forEach(button => {
            button.addEventListener('click', () => {
                const skill = button.getAttribute('data-skill') || button.textContent.trim();
                let currentSkills = skillsInput.value.split(',').map(s => s.trim()).filter(s => s !== '');

                if (!currentSkills.includes(skill)) {
                    currentSkills.push(skill);
                    skillsInput.value = currentSkills.join(', ');
                }
            });
        });

        // Pasangkan tombol Save
        const saveButton = document.getElementById('saveSkillsBtn');
        if (saveButton) {
            saveButton.addEventListener('click', saveSkills);
        }
    });
</script>



@endsection
