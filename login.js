const form = document.querySelector("#loginForm");

form.addEventListener("submit", async (e) => {

    e.preventDefault();

    const data = {
        email: form.email.value,
        password: form.password.value
    };

    const res = await fetch("auth/login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    });

    const result = await res.json();

    if (result.status === "success") {

        // ADMIN
        if (result.role === "admin") {

            window.location.href = "admin.php";

        } else {

            // USER
            window.location.href = "user.php";
        }

    } else {

        alert(result.message);
    }
});