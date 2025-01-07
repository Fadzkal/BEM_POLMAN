<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #e0d4ff, #f4f2ff);
      color: #333;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #6a0dad;
      color: white;
      padding: 1rem 2rem;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .navbar a {
      color: white;
      text-decoration: none;
      padding: 0 15px;
      font-weight: bold;
    }

    .navbar a:hover {
      text-decoration: underline;
    }

    .dashboard-content {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 80vh;
      text-align: center;
      padding: 2rem;
    }

    .dashboard-content h2 {
      color: #6a0dad;
      margin-bottom: 0.5rem;
      font-size: 2rem;
    }

    .welcome-message {
      font-size: 1.1rem;
      color: #555;
      margin-bottom: 2rem;
      max-width: 500px;
      line-height: 1.6;
    }

    .btn {
      display: inline-block;
      margin-top: 1rem;
      padding: 0.8rem 1.5rem;
      background: #6a0dad;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      box-shadow: 0 4px 8px rgba(128, 0, 128, 0.3);
      transition: background 0.3s;
      font-weight: bold;
    }

    .btn:hover {
      background: #5a0cac;
    }

    .biodata {
      display: none;
      background: #fff;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 8px 16px rgba(128, 0, 128, 0.2);
      max-width: 400px;
      margin-top: 2rem;
    }

    #profilePhoto {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      margin-bottom: 10px;
      box-shadow: 0 4px 8px rgba(128, 0, 128, 0.2);
    }

    .members-list {
      margin-top: 2rem;
      text-align: left;
      max-width: 500px;
      width: 100%;
      display: none;
      background-color: #fff;
      padding: 1.5rem;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .members-list ul {
      list-style: none;
      padding: 0;
    }

    .members-list li {
      padding: 10px 0;
      border-bottom: 1px solid #ddd;
      font-size: 1rem;
      color: #555;
    }

    .members-list h3 {
      font-size: 1.5rem;
      color: #6a0dad;
      margin-bottom: 1rem;
    }
  </style>
</head>

<body>


  <div class="navbar">
    <h3>Dashboard</h3>
    <div>
      <a href="#" id="aboutLink">About</a>
      <a href="login.html">Logout</a>
    </div>
  </div>

  <div class="dashboard-content">
    <h2>Welcome, <span id="usernameDisplay"></span>!</h2>
    <p class="welcome-message">Selamat datang di halaman dashboard Anda! Di sini, Anda dapat mengakses berbagai informasi dan fitur yang akan membantu Anda lebih produktif. Jangan ragu untuk menjelajahi dan menikmati fitur kami.</p>

    <a href="#" class="btn" id="showMembersBtn">Daftar Anggota</a>
    <a href="jadwal" class="btn" id="jadwal">Lihat Jadwal</a>
    <a href="stock" class="btn" id="stock">inventaris</a>

    <div class="biodata" id="biodataSection">
      <h3>Biodata</h3>
      <img id="profilePhoto" src="paskal.jpg" alt="Profile Photo">
      <p>Name: <span id="biodataName"></span></p>
      <p>Welcome to your profile information. Keep your profile updated to ensure we can serve you better.</p>
    </div>

    <!-- Daftar Anggota -->
    <div class="members-list" id="membersListSection">
      <h3>Anggota:</h3>
      <ul id="membersList"></ul>
    </div>
  </div>

  <script>
    // Data anggota berdasarkan role
    const membersData = {
      "Luar kampus": [
        { name: "Syifa", kelas: "X", jurusan: "Design Engineering" },
        { name: "Nadzar", kelas: "XI", jurusan: "Manufacture Engineering" },
        { name: "Fajarul", kelas: "XII", jurusan: "Manufacture Engineering" },
        { name: "Hannifah", kelas: "X", jurusan: "Manufacture Engineering" },
        { name: "Dimyatin", kelas: "XI", jurusan: "Automation Engineering" },
        { name: "Lukman", kelas: "XII", jurusan: "Automation Engineering" },
      ],
      "Dalam kampus": [
        { name: "Hibban", kelas: "3FEA", jurusan: "Foundry Engineering" },
        { name: "April", kelas: "3AEA3", jurusan: "Automation Engineering" },
        { name: "Pepita", kelas: "3AEA1", jurusan: "Automation Engineering" },
        { name: "Rafi", kelas: "3FEA", jurusan: "Foundry Engineering" },
        { name: "Indra", kelas: "2MEB", jurusan: "Manufacture Engineering" },
        { name: "Yazid", kelas: "2DEA", jurusan: "Design Engineering" },
        { name: "Ratu", kelas: "2AEA3", jurusan: "Automation Engineering" },
        { name: "Annisa", kelas: "2FEC", jurusan: "Foundry Engineering" },
        { name: "Insan", kelas: "2AEC2", jurusan: "Automation Engineering" },
        { name: "Nilam", kelas: "2AEA1", jurusan: "Automation Engineering" },
      ],
      "Medinfo": [
        { name: "Rannisa", kelas: "X", jurusan: "Manufacture Engineering" },
        { name: "Ikmal", kelas: "XI", jurusan: "Design Engineering" },
        { name: "Fadzkal", kelas: "X", jurusan: "Automation Engineering" },
        { name: "Daffa", kelas: "XI", jurusan: "Automation Engineering" },
        { name: "Andini", kelas: "X", jurusan: "Automation Engineering" },
        { name: "Rifki", kelas: "XI", jurusan: "Automation Engineering" },
        { name: "Alief", kelas: "X", jurusan: "Automation Engineering" },
      ],
      "Kajian Strategis": [
        { name: "Rujhan", kelas: "X", jurusan: "Automation Engineering" },
        { name: "Wildan", kelas: "X", jurusan: "Foundry Engineering" },
      ],
      "Presiden BEM": [
        { name: "Dinda", kelas: "3AEA3", jurusan: "Automation Engineering" },
        { name: "Firza", kelas: "3DEA", jurusan: "Design Engineering" },
      ],
      "Sekertaris": [
        { name: "Ken Ken", kelas: "2FEC", jurusan: "Foundry  Engineering" },
        { name: "Anna", kelas: "2AEC1", jurusan: "Automation Engineering" },
        { name: "Perlita", kelas: "2AEA1", jurusan: "Automation Engineering" },
      ],
      "Keuangan": [
        { name: "Zahra", kelas: "3MEF1", jurusan: "Manufacture Engineering" },
        { name: "Zuhra", kelas: "3MEF1", jurusan: "Manufacture Engineering" },
        { name: "Arbiyan", kelas: "2AEC2", jurusan: "Automation Engineering" },
        { name: "Kara", kelas: "2AEC2", jurusan: "Automation Engineering" },
        { name: "Elsa", kelas: "2AEB1", jurusan: "Automation Engineering" },
      ],
      "PSDM": [
        { name: "Lina", kelas: "X", jurusan: "Manajemen" },
      ],
    };

    // Mendapatkan role pengguna dari localStorage
    const userRole = localStorage.getItem("userRole") || "Guest";

    // Daftar nama berdasarkan role
    const roleNames = {
      "Luar kampus": "Luar Kampus",
      "Dalam kampus": "Dalam Kampus",
      "Medinfo": "Medinfo",
      "Kajian Strategis": "Kajian Strategis",
      "Presiden BEM": "Presiden BEM",
      "Sekertaris": "Sekertaris",
      "Keuangan": "Keuangan",
      "PSDM": "PSDM"
    };

    // Menampilkan nama pengguna di dashboard
    document.getElementById("usernameDisplay").textContent = roleNames[userRole] || "Guest";

    // Fungsi untuk menampilkan anggota sesuai dengan role
    function displayMembers(role) {
      const membersList = document.getElementById("membersList");
      membersList.innerHTML = ""; // Clear previous list

      const members = membersData[role] || [];
      members.forEach(member => {
        const listItem = document.createElement("li");
        listItem.textContent = `${member.name} - Kelas: ${member.kelas} - Jurusan: ${member.jurusan}`;
        membersList.appendChild(listItem);
      });
    }

    // Menampilkan anggota berdasarkan role saat dashboard dimuat
    displayMembers(userRole);

    // Event listener untuk tombol "Daftar Anggota"
    document.getElementById("showMembersBtn").addEventListener("click", function () {
      const membersListSection = document.getElementById("membersListSection");
      membersListSection.style.display = membersListSection.style.display === "none" ? "block" : "none";
    });

    // Event listener untuk tombol About
    document.getElementById("aboutLink").addEventListener("click", function (event) {
      event.preventDefault();
      const biodataSection = document.getElementById("biodataSection");
      document.getElementById("biodataName").textContent = roleNames[userRole];
      biodataSection.style.display = "block";
      
      // Tampilkan anggota sesuai role
      displayMembers(userRole);
    });
  </script>

</body>

</html>
