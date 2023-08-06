const input_elements = document.querySelectorAll("input");

input_elements.forEach(input_element => {
	input_element.addEventListener("change", (event) => {
		const shopping_item_id = event.target.closest(".shopping_item").dataset.id;
		var value;
		var name;
		
		if (event.target.type == "checkbox") {
			value = event.target.checked ? 1 : 0;
			name = "checked";
		}
		if (event.target.type == "number") {
			value = event.target.value;
			name = "amount";
		}

		const xhr = new XMLHttpRequest();
            const url = "controller.php";
            const params = `action=update&id=${shopping_item_id}&value=${value}&name=${name}`;

            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
					console.log(this.response);
                    window.location.reload();
                }
            };

            xhr.send(params);
	});
});