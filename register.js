const form = document.querySelector("#registerForm");

form.addEventListener("submit", async (e) => {

    e.preventDefault();

    const data = {
        name: form.name.value,
        email: form.email.value,
        password: form.password.value
    };

    const res = await fetch("auth/register.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    });

    const result = await res.json();

    alert(result.message);
});