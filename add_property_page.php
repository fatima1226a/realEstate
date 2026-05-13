<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<link rel="stylesheet" href="style.css">

<title>Добавить объект</title>

</head>

<body class="auth-body">

<div class="auth-container">

    <h1>Добавить объект</h1>

    <form id="addForm" class="auth-form">

        <input
            type="text"
            name="title"
            placeholder="Название"
        >

        <input
            type="number"
            name="price"
            placeholder="Цена"
        >

        <input
            type="text"
            name="location"
            placeholder="Локация"
        >

        <input
            type="text"
            name="image"
            placeholder="image.jpg"
        >

        <textarea
            name="description"
            placeholder="Описание"
            style="padding:14px;border-radius:10px;"
        ></textarea>

        <button type="submit">
            Добавить
        </button>

    </form>

</div>

<script>

const form = document.querySelector("#addForm");

form.addEventListener("submit", async (e) => {

    e.preventDefault();

    const data = {

        title: form.title.value,
        price: form.price.value,
        location: form.location.value,
        image: form.image.value,
        description: form.description.value

    };

    try {

        const response = await fetch("create_property.php", {

            method: "POST",

            headers: {
                "Content-Type": "application/json"
            },

            body: JSON.stringify(data)

        });

        const result = await response.json();

        if(result.status === "success") {

            alert("Объект добавлен");

            window.location.href = "admin.php";

        } else {

            alert(result.message);
        }

    } catch(error) {

        alert("Ошибка сервера");
        console.log(error);
    }

});

</script>

</body>
</html>