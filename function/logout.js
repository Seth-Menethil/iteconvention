function logout() {
    if (confirm('Are you sure you want to logout?')) {
        window.location.href = "/iteconvention/function/logout.php"; // Corrected this line
    } else {
        console.log("Logout cancelled");
    }
}
