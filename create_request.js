document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("#requestForm");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const data = {
            name: form.name.value,
            phone: form.phone.value,
            message: form.message.value,
            property_id: form.property_id.value
        };

        const res = await fetch("api/create_request.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        });

        const result = await res.json();

        if (result.status === "success") {
            alert("Заявка отправлена!");
            form.reset();
        } else {
            alert("Ошибка: " + result.message);
        }
    });
});
