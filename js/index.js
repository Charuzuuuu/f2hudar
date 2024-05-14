    const dark = document.getElementById("darkTheme");
    dark.onclick = setDark;

    //   const dash = document.getElementById("dashboard");
     //  dash.onclick = goDashboard;

    const menu = document.getElementById("menu");
    menu.onclick = goMenu;

    const pro = document.getElementById("profile");
    pro.onclick = goProfile;

    function setDark(){
        dark.classList.toggle("button-Active");
        document.body.classList.toggle("dark-color");
    }

    //function goDashboard(){
    //    const code = prompt("Please enter the code to proceed to the dashboard:");

      //     if(code === "admin"){
     //          alert("Access Granted");
     //          window.location.href = "dashboard.php";
    //       }else{
      //         alert("Access Denied");
     //      }
    //   }

    function goMenu(){
        window.location.href = "index.php";
    }

    function goReport() {
        window.location.href = "report.php";
    }

    function goProfile() {
        window.location.href = "profile.php";
    }


