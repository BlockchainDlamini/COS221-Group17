//if user is logged in, toggle class hidden for group .signupLogin
// if (localStorage.getItem("logged_in") == "true") {
//     $('#userAccountButton').fadeIn(500);//then now show user Account button
//     if (localStorage.getItem("user_type") != "MANAGER") {
//         $('#AdminOption').addClass("hidden");//hide the admin option if the user is not a manager
//     }
// }

$('#userAccountButton').fadeIn(500);//then now show user Account button
// $('#signupBtn').addClass("hidden");



//else do nothing


function logoutfunc() {
    sessionStorage.removeItem("logged_in");
    sessionStorage.removeItem("user_type");
    $('#userAccountButton').fadeOut(500);//then now hide user Account button
}


