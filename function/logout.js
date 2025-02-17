function logout() {
    if (confirm('Are you sure you want to logout?')) {
        window.location.href = "./function/logout.php"; // Corrected this line
    } else {
        console.log("Logout cancelled");
    }
}
