<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #eaf2e8;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .login-box {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 15px rgba(0, 128, 0, 0.2);
      width: 300px;
      text-align: center;
    }

    h2 {
      color: #2d6a4f;
      font-size: 24px;
      margin-bottom: 20px;
    }

    .login-box select, .login-box input, .login-box button {
      padding: 12px;
      width: 100%;
      margin: 10px 0;
      font-size: 16px;
      border: 1px solid #38a169;
      border-radius: 8px;
      box-sizing: border-box;
    }

    .login-box select {
      background-color: #f0f0f0;
    }

    .login-box input {
      background-color: #f9f9f9;
    }

    .login-box button {
      background-color: #38a169;
      color: white;
      border: none;
      cursor: pointer;
      font-weight: bold;
    }

    .login-box button:hover {
      background-color: #2f855a;
    }

    .error {
      color: #e53e3e;
      font-size: 14px;
      margin-top: 10px;
    }

    /* Alert Style */
    .alert {
      padding: 15px;
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
      border-radius: 5px;
      margin-top: 10px;
      display: none;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <div class="login-box">
      <h2>Login Admin</h2>
      <select id="userRole">
        <option value="Sekretaris">Sekretaris</option>
      </select>
      <input type="password" id="password" placeholder="Password" required />
      <button id="loginBtn">Login</button>
      <p id="errorMessage" class="error"></p>
    </div>
  </div>

  <<script>
  // Passwords for each role
  const passwords = {
    "Sekretaris": "adminsekretaris",
  };

  // Ketika tombol login ditekan
  document.getElementById("loginBtn").addEventListener("click", function () {
    const userRole = document.getElementById("userRole").value;
    const userPassword = document.getElementById("password").value;

    // Periksa apakah password yang dimasukkan sesuai dengan role yang dipilih
    if (userPassword === passwords[userRole]) {
      // Simpan role tersebut di localStorage
      localStorage.setItem("userRole", userRole);
      
      // Berikan akses CRUD jika pengguna adalah Presiden BEM atau Sekertaris
      if (userRole === "Presiden BEM" || userRole === "Sekertaris") {
        localStorage.setItem("hasCRUDPermission", "true");
      } else {
        localStorage.setItem("hasCRUDPermission", "false");
      }

      // Arahkan ke dashboard setelah login
      window.location.href = "app/Views/dashboardadmin/index.html";
    } else {
      document.getElementById("errorMessage").textContent = "Password salah untuk role " + userRole;
    }
  });
</script>

</body>
</html>
