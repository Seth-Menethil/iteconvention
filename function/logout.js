function logout() {
    if (confirm('Are you sure you want to logout?')) {
        window.location.href = "https://iteconvention.com/function/logout.php"; // Corrected this line
    } else {
        console.log("Logout cancelled");
    }
}
